<?php
    if(isset($_GET['class'])){
        $class = $_GET['class'];

        include("view/page/admission/class.php");
    }else{
        include("view/page/admission/main.php");
    }
?>