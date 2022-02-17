<?php 
session_start();
require_once 'include/database.php';
$admin_id = $_GET['admin_id'];

$sql = "DELETE FROM users WHERE id = $admin_id";
mysqli_query($con, $sql);
$_SESSION['msg']= "Delete Successful !";
header('location: admin_list.php');

?>