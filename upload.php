<?php
session_start();
require_once '../includes/connection.php';
$id  = $_SESSION['id'];
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        //print_r($file);

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png'); #allowing only certain file type

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
                if($fileSize < 1000000) {
                    $fileNameNew = "profile".$id."."."jpg";
                    $fileDestination = "uploads/".$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    $sql = "UPDATE profile_picture SET STATUS = 0 WHERE user_id = '$id';";
                    $result = mysqli_query($conn, $sql);
                    header("location: ./index.php?Success");
                } else {
                    echo 'Your file is too big!';
                }
            } else {
                echo 'There was an error uploading your file!';
            }
        } else {
            echo 'You cannot upload file of this type!';
        }
    }