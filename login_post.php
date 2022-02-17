<?php
session_start();
require_once 'include/database.php';
// print_r ($_POST);

$email = $_POST['email'];
$password = md5($_POST['password']);
// $password = $_POST['password'];
$role = $_POST['role'];


$checkin_sql = "SELECT COUNT(*) AS total_users FROM users WHERE email= '$email' AND password = '$password' AND role= '$role'";
$from_db = mysqli_query($con, $checkin_sql);

$fatch_acos = mysqli_fetch_assoc($from_db);
// print_r($fatch_acos);

if ($fatch_acos['total_users'] == 1) {
    $_SESSION['email'] = $email;
    $_SESSION['role'] = $role;
    $_SESSION['user_status'] = 'yes';
    header('location: dashboard.php');
} else {
    $_SESSION['login_err'] = " Invalid Email Or Password !";
    header('location: index.php');
}



?>