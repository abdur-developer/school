<div class="page-header text-center mb-3">
    <h2> কর্মচারীবৃন্দ  </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="post-section p-0 p-md-3">
    <div class="post-content">
        <table>
        <tbody>
            <tr>
                <td>
                    <div style="text-align: center; "><b>ক্রমিক</b></div>
                </td>
                <td>
                    <div style="text-align: center; "><b>নাম</b></div>
                </td>
                <td>
                    <div style="text-align: center; "><b>পদবি</b></div>
                </td>
                <td>
                    <div style="text-align: center; "><b>মোবাইল</b></div>
                </td>
            </tr>
            <?php
                $sql = "SELECT * FROM staff";
                $staff = mysqli_query($conn, $sql);
                $i = 0;
                while ($row = mysqli_fetch_assoc($staff)){
                    $i++;
            ?>
            <tr>
                <td>
                    <div style="text-align: center; "><?=$i?></div>
                </td>
                <td>
                    <div style="text-align: center; "><?=$row['name']?></div>
                </td>
                <td>
                    <div style="text-align: center; "><?=$row['title']?></div>
                </td>
                <td>
                    <div style="text-align: center; "><?=$row['phone']?></div>
                </td>
            </tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
    <hr>
    <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
        <?php
            $sql = "SELECT time FROM staff ORDER BY time DESC LIMIT 1";
            echo getTime(mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '');
        ?>                 
    </p>
    <?php include("view/component/share.php"); ?>
</div>