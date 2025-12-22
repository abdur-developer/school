<?php

    $sql = "SELECT * FROM `system_info` WHERE id = 1";
    $sys = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $sql = "SELECT * FROM `h-teacher` WHERE id = 1";
    $h_teacher = mysqli_fetch_assoc(mysqli_query($conn, $sql));