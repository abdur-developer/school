<div class="page-header text-center mb-3">
    <h2> কক্ষ  সংখ্যা   </h2>
    <img src="assets/img/icon/icon-image.png" alt="">
</div>
<?php
    $sql = "SELECT * FROM room";
    $rooms = mysqli_query($conn, $sql);
?>
<div class="post-section p-0 p-md-3">
   <div class="post-content">
      <div style="text-align: center;"><span style="font-size: 0.875em;">পাকা ভবন সংখ্যা&nbsp; - টি, মোট ভবন সংখ্যা -টি, নির্মানাধীন ভবন -টি,&nbsp;&nbsp;</span></div>
      <div>
         <table class="MsoTableGrid" border="1" cellspacing="0" cellpadding="0" width="100%" style="border: none;">
            <style>
                table tr td {
                    border: 1px solid black;
                    padding: 8px;
                }

                .serial {
                    width: 15%;
                    text-align: center;
                }

                .room-name {
                    width: 60%;
                    text-align: left;
                }

                .room-count {
                    width: 25%;
                    text-align: center;
                }
            </style>
            <tbody>
                <tr>
                    <td width="14%" valign="top" style="width: 14.18%; border-width: 1pt; border-color: black; padding: 0in 5.4pt;">
                        <div style="text-align: center; ">
                            <span lang="BN" style="font-family:
                            " vrinda","sans-serif";mso-ascii-font-family:calibri;mso-ascii-theme-font:="" minor-latin;mso-hansi-font-family:calibri;mso-hansi-theme-font:minor-latin;="" mso-bidi-font-family:vrinda;mso-bidi-theme-font:minor-bidi;mso-bidi-language:="" bn"="">ক্রমিক 
                            <o:p></o:p>
                            </span>
                        </div>
                    </td>
                    <td width="61%" valign="top" style="width: 61.76%; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0in 5.4pt;">
                        <div style="text-align: center; ">
                            <span lang="BN" style="font-family:" vrinda","sans-serif";mso-ascii-font-family:calibri;="" mso-ascii-theme-font:minor-latin;mso-hansi-font-family:calibri;mso-hansi-theme-font:="" minor-latin;mso-bidi-font-family:vrinda;mso-bidi-theme-font:minor-bidi;="" mso-bidi-language:bn"="">নাম</span>
                            <o:p></o:p>
                        </div>
                    </td>
                    <td width="24%" valign="top" style="width: 24.06%; border-top-width: 1pt; border-right-width: 1pt; border-bottom-width: 1pt; border-top-color: black; border-right-color: black; border-bottom-color: black; border-left: none; padding: 0in 5.4pt;">
                        <div style="text-align: center; ">
                            <span lang="BN" style="font-family:" vrinda","sans-serif";mso-ascii-font-family:calibri;="" mso-ascii-theme-font:minor-latin;mso-hansi-font-family:calibri;mso-hansi-theme-font:="" minor-latin;mso-bidi-font-family:vrinda;mso-bidi-theme-font:minor-bidi;="" mso-bidi-language:bn"="">সংখ্যা </span>
                            <o:p></o:p>
                        </div>
                    </td>
                </tr>
                <?php
                    $i = 0;
                    while($room = mysqli_fetch_assoc($rooms)){
                    $i++;
                ?>
                    <tr>
                        <td class="serial"><?=$i?></td>
                        <td class="room-name"><?=$room['name']?></td>
                        <td class="room-count"><?=$room['num_of_room']?></td>
                    </tr>
                <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
   <hr>
   <p class="m-0 text-center"><i class="bi bi-clock"> </i>
   শেষ হাল-নাগাদ করা হয়েছে:
   <?php
        $sql = "SELECT time FROM room ORDER BY time DESC LIMIT 1";
        echo getTime(mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '');
    ?>
    </p>
   <?php include("view/component/share.php"); ?>
</div>         