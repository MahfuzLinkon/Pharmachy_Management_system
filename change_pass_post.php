<?php
session_start();
require_once 'include/database.php';

$old_pass = $_POST['old_pass'];
$new_pass = $_POST['new_pass'];
$confirm_pass = $_POST['confirm_pass'];
$log_email = $_SESSION['email'];

if($old_pass == null || $new_pass == null || $confirm_pass == null){
    // echo "change kora jabe nah";
    $_SESSION['pass_change_err'] = "All field Are Required";
    header('location: change_password.php');
}else{
    if(strlen($new_pass) > 5 && strlen($confirm_pass) > 5 ){
            if($new_pass == $confirm_pass){
                if($old_pass != $new_pass){
                    // echo "edit kora jabe";
                    $enc_old_pass=md5($old_pass);
                    $check_sql = "SELECT COUNT(*) AS total_user FROM users WHERE email = '$log_email' AND password = '$enc_old_pass' ";
                    $check_res = mysqli_query($con, $check_sql);
                    $assoc_res = mysqli_fetch_assoc($check_res);
                    // print_r($assoc_res);
                    if($assoc_res['total_user']==1){
                        $enc_new_pass = md5($new_pass);
                        $update_sql = "UPDATE users SET password = '$enc_new_pass' WHERE email ='$log_email'";
                        mysqli_query($con, $update_sql);
                        $_SESSION['pass_chng_succ'] = "Password Change Succesfull !";
                        header('location: change_password.php');
                    }else{
                        $_SESSION['pass_change_err'] = "Invalid Old Password !";
                        header('location: change_password.php');
                    }
                }else{
                    $_SESSION['pass_change_err'] = "You have already Used this Password !";
                    header('location: change_password.php');
                }
            }else{
                $_SESSION['pass_change_err'] = "New Password And Comfirm Password Does Not Match!";
                header('location: change_password.php');
            }
    }else {
        $_SESSION['pass_change_err'] = "Password Length Must be at least 6 Charecter !";
        header('location: change_password.php');
    }
}


?>