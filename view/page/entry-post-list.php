<div class="page-header text-center mb-3">
    <h2> শূণ্যপদের তালিকা  </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="post-section p-0 p-md-3">
    <div class="post-content">
        <table class="table-1">
        <tbody>
            <tr>
                <td style="text-align: center; "><b>ক্রমিক</b></td>
                <td style="text-align: center; "><b>পদের নাম</b></td>
                <td style="text-align: center; "><b>শুন্য পদের সংখ্যা</b></td>
            </tr>
            <?php
                $i = 0;
                $empty_post = mysqli_query($conn, "SELECT * FROM empty_post");
                while ($row = mysqli_fetch_assoc($empty_post)) {
                $i++;
            ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$row['name']?></td>
                <td><?=$row['num_of_post']?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
    <hr>
    <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
        <?php
            $sql = "SELECT time FROM `empty_post` ORDER BY time DESC;";
            echo getTime(mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '');
        ?>      
    </p>
    <?php include("view/component/share.php"); ?>
</div>