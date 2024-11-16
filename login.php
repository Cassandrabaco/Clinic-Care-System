<?php
    require_once '../includes/connection.php';
    $id = 14;
    if(isset($_POST['submitlogin'])) {
    $sql = "SELECT * FROM user WHERE firstname=? OR id='$id';";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ./index.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                session_start();
                $_SESSION['id'] = $row['id'];
                header("location: ./index.php?success");
                } else {
                header("location: ./index.php?error=nouser");
                exit();
            }
        }
    }