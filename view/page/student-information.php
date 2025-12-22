<div class="page-header text-center mb-3">
   <h2> শিক্ষার্থীর তথ্য  </h2>
   <img src="assets/img/icon/icon-image.png" alt="">
</div>
<div class="post-section p-0 p-md-3">
    <div class="post-content">
        <table>
            <tbody>
                <style>
                    td{
                        text-align: center;
                    }
                </style>
                <tr>
                    <td><b>শ্রেণী</b></td>
                    <td><b>ছাত্র/ছাত্রী</b></td>
                    <td><b>সংখ্যা</b></td>
                    <td><b>মোট</b></td>
                </tr>

                <?php
                $result = mysqli_query($conn, "SELECT * FROM student_count");

                $total_boys = 0;
                $total_girls = 0;

                while ($row = mysqli_fetch_assoc($result)):
                    $class_total = $row['boys'] + $row['girls'];
                    $total_boys += $row['boys'];
                    $total_girls += $row['girls'];
                ?>
                <tr>
                    <td rowspan="2"><?= $row['class_name'] ?></td>
                    <td>ছাত্র</td>
                    <td><?= $row['boys'] ?></td>
                    <td rowspan="2"><?= $class_total ?></td>
                </tr>
                <tr>
                    <td>ছাত্রী</td>
                    <td><?= $row['girls'] ?></td>
                </tr>
                <?php endwhile; ?>

                <!-- Grand Total -->
                <tr>
                    <td rowspan="2"><b>মোট</b></td>
                    <td>ছাত্র</td>
                    <td><b><?= $total_boys ?></b></td>
                    <td rowspan="2"><b><?= $total_boys + $total_girls ?></b></td>
                </tr>
                <tr>
                    <td>ছাত্রী</td>
                    <td><b><?= $total_girls ?></b></td>
                </tr>
            </tbody>
        </table>      
    </div>
        <hr>
        <p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
            ২০২৩-১২-০২ ২৩:১৬:৩৩                 
        </p>
        <?php include("view/component/share.php"); ?>
</div>