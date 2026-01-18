<style>
    .teacher-card {
        background: #fff;
        padding: 15px 15px 5px;
        border-radius: 12px;
        box-shadow: 0 0 15px rgba(0,0,0,.1);
        position: relative;
        margin-top: 60px;
        text-align: center;
    }
    .teacher-img {
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
    .teacher-card h4 {
        margin-top: 40px;
        font-size: 18px;
        font-weight: 700;
    }
</style>
<div class="page-header text-center mb-3">
    <h2> শিক্ষকদের তথ্য </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="row g-4">
    <?php
    $sql = "SELECT * FROM teachers ORDER BY position ASC";
    $teachers = mysqli_query($conn, $sql);

    while($t = mysqli_fetch_assoc($teachers)){ ?>
        <div class="col-md-4">
            <div class="teacher-card">
                <img src="assets/img/a_rahman/<?= $t['img'] ?>" class="teacher-img" alt="Teacher">
                <h4 class="mb-0"><?= $t['name'] ?></h4>
                <p class="m-0"><?= $t['designation'] ?></p>
                <p class="m-0">subject: <?= $t['department'] ?></p>
                <p>Since <?= $t['joining_date'] ?></p>
            </div>
        </div>
    <?php } ?>
    <hr>
    <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
        <?php
            $sql = "SELECT time FROM teachers ORDER BY time DESC LIMIT 1";
            echo getTime(mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '');
        ?>                 
    </p>
    <?php include("view/component/share.php"); ?>
</div>