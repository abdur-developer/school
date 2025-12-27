<div class="col-md-12 mt-3 m-md-0">
    <div class="tt_carousel">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <?php
            // Fetch slides from database
            $query = "SELECT * FROM slider ORDER BY id ASC";
            $result = mysqli_query($conn, $query);
            $slides = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $total = count($slides);
            ?>
            
            <div class="carousel-indicators d-none d-md-flex">
                <?php foreach($slides as $index => $slide): ?>
                    <button type="button" data-bs-target="#carouselExampleIndicators" 
                        data-bs-slide-to="<?=$index?>" 
                        class="<?=$index === 0 ? 'active' : ''?>" 
                        <?=$index === 0 ? 'aria-current="true"' : ''?>>
                    </button>
                <?php endforeach; ?>
            </div>

            <div class="carousel-inner">
                <?php foreach($slides as $index => $slide): ?>
                    <div class="carousel-item <?=$index === 0 ? 'active' : ''?>" onclick="location.href='<?=$slide['link']?>'">
                        <img src="assets/img/a_rahman/<?=$slide['img']?>" class="d-block w-100" style="max-height: 400px;">
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-control-prev d-none d-md-block" type="button" 
                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next d-none d-md-block" type="button" 
                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>