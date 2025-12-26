<div class="page-header text-center mb-3">
    <h2> প্রকাশিত রুটিন </h2>
    <img src="assets/img/icon/icon-image.png" alt="Separetor">
</div>

<div class="page-content public_data_table">
    <div id="tableID_wrapper" class="dataTables_wrapper no-footer">
        <div class="dataTables_length" id="tableID_length"><label>প্রতি পাতায় <select name="tableID_length" aria-controls="tableID" class="">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select> টি নোটিশ</label></div>
        <div id="tableID_filter" class="dataTables_filter">
            <label>অনুসন্ধান<input type="search" class="" placeholder="" aria-controls="tableID"></label>
        </div>
        <table id="tableID" class="display dataTable no-footer" style="width:100%" role="grid"
            aria-describedby="tableID_info">
            <thead>
                <tr role="row">
                    <th class="text-center sorting_asc" tabindex="0" aria-controls="tableID" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ক্রমিক: activate to sort column descending" style="width: 50.3438px;">ক্রমিক</th>
                    <th class="text-center sorting" tabindex="0" aria-controls="tableID" rowspan="1" colspan="1" aria-label="শিরোনাম: activate to sort column ascending" style="width: 336.016px;">শিরোনাম</th>
                    <th class="text-center sorting" tabindex="0" aria-controls="tableID" rowspan="1" colspan="1" aria-label="প্রকাশের তারিখ: activate to sort column ascending" style="width: 105.234px;">প্রকাশের তারিখ</th>
                    <th class="text-center sorting" tabindex="0" aria-controls="tableID" rowspan="1" colspan="1" aria-label="ডাউনলোড: activate to sort column ascending" style="width: 81.7344px;">ডাউনলোড</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT * FROM routine ORDER BY id DESC LIMIT 25";
                    $routine = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($routine)){
                        $i++;
                ?>
                <tr role="row" class="<?= ($i%2 == 0) ? 'even': 'odd';?>">
                    <td class="text-center bangla sorting_1"><?=$i?></td>
                    <td><?=$row['title']?></td>
                    <td class="text-center"><?=$row['publish_date']?></td>
                    <td class="text-center">
                        <?php if($row['download_link']){ ?>
                            <a target="_blank" href="<?=$row['download_link']?>" download>
                                <img height="30px" src="assets/img/icon/icons8-download-48.png" alt="Download File">
                            </a>
                        <?php }else{ ?>        
                            <img height="30px" src="assets/img/icon/icons8-block-48.png" alt="No File">
                        <?php } ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script>
    $(document).ready(function() {

        /* marksscored is sorted in descending */
        $('#tableID').DataTable();
        // Find the label element, get its child nodes, and filter for text nodes
        $("#tableID_filter label").contents().filter(function() {
            return this.nodeType === 3;
        }).first().replaceWith("অনুসন্ধান");
        // Find and replace the text inside the label element
        $("label").html(function(i, text) {
            return text.replace("Show", "প্রতি পাতায়").replace("entries", "টি নোটিশ");
        });
    });
    </script>

</div>

<hr>
<p class="m-0 text-center"><i class="bi bi-clock"> </i> শেষ হাল-নাগাদ করা হয়েছে:   
    <?php
        $sql = "SELECT time FROM routine ORDER BY time DESC LIMIT 1";
        echo mysqli_fetch_assoc(mysqli_query($conn, $sql))['time'] ?? '';
    ?>                 
</p>
<?php include("view/component/share.php"); ?>