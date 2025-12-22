<?php    
    $sql = "SELECT * FROM `custom_page` WHERE slag = '$c'";
    $custom = mysqli_fetch_assoc(mysqli_query($conn, $sql));
?>
<div class="page-header text-center mb-3">
    <h2> <?=$custom['name']?> </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="post-section p-0 p-md-3">
    <div class="post-content">
        <?=$custom['html_txt']?>
    </div>
    <hr>
    <p class="m-0 text-center">
        <i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   <?=$custom['update_time']?>
    </p>
    <?php include("view/component/share.php"); ?>
</div>