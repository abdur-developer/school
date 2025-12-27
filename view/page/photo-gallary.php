<div class="tt_boxed p-md-2 p-0">
    <div class="row justify-content-cente mt-5 mb-5r">
        <div class="col-12">
            <div class="page-header text-center mb-4">
                <h2> ফটো গ্যালারী </h2>
                <img src="assets/img/icon/icon-image.png" alt="Separetor">
            </div>
        </div>
        <div class="col-12">
            <?php
                $sql = "SELECT * FROM images ORDER BY id DESC";
                $result = $conn->query($sql);
                if($result->num_rows <= 0){
                    echo "কোন ছবি নেই !";
                }else{                
            ?>
                <style>
                    .gallery {
                        column-count: 3;
                        column-gap: 15px;
                        margin-bottom: 40px;
                    }

                    .gallery-item {
                        break-inside: avoid;
                        margin-bottom: 15px;
                        position: relative;
                        border-radius: 20px;
                        overflow: hidden;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
                        transition: all 0.4s ease;
                        background: white;
                    }

                    .gallery-item:hover {
                        transform: translateY(-6px);
                        box-shadow: 0 20px 40px rgba(0,0,0,0.15);
                    }

                    .gallery-item img {
                        width: 100%;
                        height: auto;
                        display: block;
                        transition: transform 0.5s ease;
                    }

                    .gallery-item:hover img {
                        transform: scale(1.05);
                    }

                    .image-overlay {
                        position: absolute;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
                        color: white;
                        padding: 30px 20px 20px;
                        transform: translateY(100%);
                        transition: transform 0.4s ease;
                    }

                    .gallery-item:hover .image-overlay {
                        transform: translateY(0);
                    }

                    .image-title {
                        font-size: 1.2rem;
                        font-weight: 600;
                    }

                    @media (max-width: 768px) {
                        .gallery {
                            column-count: 2;
                        }
                    }
                </style>

                <div class="gallery">
                    <?php while($image = $result->fetch_assoc()){ ?>
                        <div class="gallery-item">
                            <img src="assets/img/a_rahman/<?php echo htmlspecialchars($image['image_url']); ?>" 
                                    alt="<?php echo htmlspecialchars($image['title']); ?>">
                            <div class="image-overlay">
                                <div class="image-title"><?php echo htmlspecialchars($image['title']); ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


<script>
    // Add loading animation
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.gallery-item');
        items.forEach((item, index) => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                item.style.opacity = '1';
                item.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
</script>
<hr>
<p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
    <?php
        $sql = "SELECT created_at FROM images ORDER BY created_at DESC LIMIT 1";
        echo mysqli_fetch_assoc(mysqli_query($conn, $sql))['created_at'] ?? '';
    ?>           
</p>
<?php include("view/component/share.php"); ?>