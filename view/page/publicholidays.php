<div class="page-header text-center mb-3">
    <h2> সরকারি ছুটির তালিকা  </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="post-section p-0 p-md-3">
    <div class="post-content">
        <table>
        <tbody>
            <tr>
                <td>তারিখ</td>
                <td>দিন</td>
                <td>ছুটির</td>
            </tr>
            <?php
                $sql = "SELECT * FROM publicholidays";
                $holi = mysqli_query($conn, $sql);
                $i = 0;
                while ($row = mysqli_fetch_assoc($holi)){
                    $i++;
            ?>
            <tr>
                <td><?=$row['date']?></td>
                <td><?=$row['day']?></td>
                <td><?=$row['name']?></td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
    <hr>
    <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
        <?php
            $sql = "SELECT time FROM publicholidays ORDER BY time DESC LIMIT 1";
            echo mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '';
        ?>                
    </p>
    <?php include("view/component/share.php"); ?>
</div>