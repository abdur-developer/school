<div class="page-header text-center mb-3">
    <h2> পরিচালনা পর্ষদ  </h2>
    <img src="assets/img/icon/icon-image.png" alt="Separetor">
</div>
<div class="page-content public_data_table">
    <table id="tableID" class="display dataTable" style="width:100%">
        <thead>
        <tr>
            <th class="text-center" width="40px">ছবি</th>
            <th class="text-center">নাম</th>
            <th class="text-center">পদবি</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <?php include("view/component/share.php"); ?>
    <script>
        $(document).ready(function() {
        
            /* marksscored is sorted in descending */
            $('#tableID').DataTable({
                order: [[ 5, 'desc' ]]
            });
        });
    </script>
</div>