<?php 
session_start();
require_once 'include/database.php';
$salseman_id = $_GET['salseman_id'];

$sql = "DELETE FROM users WHERE id = $salseman_id";
mysqli_query($con, $sql);
$_SESSION['msg']= "Delete Successful !";
header('location: salseman_list.php');

?>