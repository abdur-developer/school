<section class="container">
    <div class="tt_boxed p-md-2 p-0">
        <div class="row">
            <!-- main -->
            <?php
                $show_sidebar = true;
                $q = $_REQUEST['q'] ?? ''; // page value
                $c = $_REQUEST['c'] ?? ''; // custom value

                $allowed_q = [
                    "h-teacher", "managing-committee", "teachers", "stuff-information", 
                    "meritorious-student", "student-information", "room-information", 
                    "entry-post-list", "publicholidays", "admission", "routine", 
                    "notice-board", "post", "view-post", "photo-gallary", "view_notice"
                ];
                $allowed_c = ["history", "computer-use", "extracurricular", "contact"];
                $disable_sidebar = ["photo-gallary", "post"];

                if($q && in_array($q, $disable_sidebar)) $show_sidebar = false;
                else echo '<div class="col-md-8">';

                if ($q && in_array($q, $allowed_q)) include "view/page/{$q}.php";
                elseif($c && in_array($c, $allowed_c)) include "view/page/common.php";
                else include "view/home/main.php";
                
                if(!($q && in_array($q, $disable_sidebar))) echo '</div>';
            ?>
            <!-- notice -->
            <?php if($show_sidebar)include("view/home/sidebar.php"); ?>
            <!-- other -->
            <?php if($show_sidebar) include("view/home/other.php"); ?>
        </div>
    </div>
</section>