<?php 
session_start();
require_once 'include/database.php';

$medicine_id = $_GET['medicine_id'];

$sql = "DELETE FROM medicine_list WHERE medicine_id=$medicine_id";
mysqli_query($con,$sql);

$sql = "DELETE FROM pharmachy_stock WHERE medicine_id=$medicine_id";
mysqli_query($con,$sql);
$_SESSION['msg']= "Medicine Deleted";
header('location: medicine_list.php');

?>