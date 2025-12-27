<?php

    $notice = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM notice WHERE id = ".decryptSt($_GET['notice'])));


?>
<div class="page-header mb-3">
    <h4 class="post_catrgory_title">নোটিশ বোর্ড</h4>
    <h2 class="post_title_single"><?=$notice['title']?></h2>
    <div class="abot_post">
        <p><i class="bi bi-clock"></i> <?=date("F j, Y", strtotime($notice['publish_date']))?></p>
        <hr>
    </div>
</div>
<div class="post-section p-0">
    <div class="notice_file mb-2">
    </div>
    <div class="post-content">
        <?=$notice['description']?>
    </div>
</div>
<div class="page-content">
</div>   
<hr>
<?php include("view/component/share.php"); ?>