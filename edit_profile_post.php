<?php
session_start();
require_once 'include/database.php';
// print_r($_POST);

$edt_name = $_POST['edt_name'];
$edt_phone = $_POST['edt_phone'];
// $email = $_POST['email'];
$email = $_SESSION['email'];


if($edt_name==null){
    $_SESSION['edt_err'] = "Name Field Can't be Empty!";
    header('location: edit_profile.php');
}else{
    if($edt_phone==null){
        $_SESSION['edt_err'] = "Phone Field Can't be Empty!";
        header('location: edit_profile.php');
    }else{
        if(strlen($edt_phone)>10){
            $sql = "UPDATE users SET name = '$edt_name', phone ='$edt_phone' WHERE email ='$email'";
            $res = mysqli_query($con,$sql);
            header('location: profile.php');
        }else{
            $_SESSION['edt_err'] = "Phone Number Must be 11 digit!";
            header('location: edit_profile.php');
        }
    }   
}




?>