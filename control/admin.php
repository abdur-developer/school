<?php
    include("../includes/dbcon.php");
    session_start();
    function chotoKro($str, $len=50){
        return substr($str, 0, $len) . "...";
    }
    function isLogged() {
        if (!isset($_SESSION['user_id'], $_SESSION['login_time'], $_SESSION['password_hash'])) {
            return false;
        }

        global $conn;
        $user_id = $_SESSION['user_id'];
        $stmt = mysqli_prepare($conn, "SELECT password FROM admin WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);

        if (!$user || $user['password'] !== $_SESSION['password_hash']) {
            header("location: logout.php");
            exit;
        }

        return true;
    }
    if(!isLogged()){
        header("location: auth.php?error=session_expire");
    }

    if(isset($_REQUEST['admin-username'])){
        $username = trim($_REQUEST['admin-username']);
        $password = $_REQUEST['password'];

        // Basic validation
        if (empty($username) || empty($password)) return;
        if (strlen($password) < 6) return;

        // Hash the password securely
        $pp = '';
        if(!str_starts_with($password, '$2y')){
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $pp = ", password = '$hashed_password'";
        }

        try {
            $sql = "UPDATE admin SET username = '$username' $pp WHERE id = 1";
            if (mysqli_query($conn, $sql)) header("Location: ?q=settings&success=successfully+Updated");
            
        } catch (Exception $e) {
            header("Location: ?q=settings&success=updated+failed");
        }
    }
?>