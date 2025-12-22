<style>
    .st-card {
        background: #fff;
        padding: 15px 15px 5px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,.1);
        position: relative;
        margin-top: 60px;
        text-align: center;
    }
    .st-img {
        width: 115px;
        height: 115px;
        border-radius: 50%;
        border: 6px solid white;
        object-fit: cover;
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        box-shadow: 0 0 10px rgba(0,0,0,.1);
    }
    .st-card h4 {
        margin-top: 40px;
        font-size: 18px;
        font-weight: 700;
    }
</style>
<div class="page-header text-center mb-3">
    <h2> কৃতি শিক্ষার্থী </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="row g-4">
    <?php
    $sql = "SELECT * FROM `meritorious_st`";
    $m_st = mysqli_query($conn, $sql);

    while($student = mysqli_fetch_assoc($m_st)){ ?>
        <div class="col-md-4">
            <div class="st-card">
                <img src="<?= $student['img'] ?>" class="st-img" alt="<?=$student['name']?>">
                <h4 class="mb-0"><?= $student['name'] ?></h4>
                <p class="m-0"><?= '<b>Batch: </b>'.$student['batch'] ?></p>
                <p class="m-0"><?= $student['designation'] ?></p>
                <p class="m-0">at <?= $student['company'] ?></p>
            </div>
        </div>
    <?php } ?>
    <hr>
    <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
        ২০২৩-১২-০২ ২৩:১৬:৩৩                 
    </p>
    <?php include("view/component/share.php"); ?>
</div>