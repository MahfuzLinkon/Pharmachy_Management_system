<?php
session_start();
require_once 'include/database.php';

// print_r ($_POST);
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$enc_pass = md5($password);
$role = $_POST['role'];

if($name==null || $email==null || $phone == null || $password==null || $role==null){
    $_SESSION['msg']= "All field Required";
    header('location: admin_add.php');
}else{
    if(strlen($phone)>10){
        if(strlen($password>=6)){
        // echo "kora jabe password thik ace";
        $insert_sql = "INSERT INTO users (name, email, phone, password, role) VALUES ('$name', '$email', '$phone', '$enc_pass', '$role')";
        mysqli_query($con, $insert_sql);
        $_SESSION['msg']= "Admin Add Successful";
        header('location: admin_add.php');

    }else{
        $_SESSION['msg']= "Password Must Be 6 charcter !";
        header('location: admin_add.php');
    }
    }else{
        $_SESSION['msg']= "Phone Number must Be 11 Digit !";
        header('location: admin_add.php');
    }
}



?>