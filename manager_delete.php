<?php 
session_start();
require_once 'include/database.php';
$manager_id = $_GET['manager_id'];

$sql = "DELETE FROM users WHERE id = $manager_id";
mysqli_query($con, $sql);
$_SESSION['msg']= "Delete Successful !";
header('location: manager_list.php');

?>