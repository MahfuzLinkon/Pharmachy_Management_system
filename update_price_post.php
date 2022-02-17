<?php 
session_start();
require_once 'include/database.php';
$medicine_id = $_POST['medicine_id'];
$update_unit_price = $_POST['update_unit_price'];

$sql = "UPDATE medicine_list SET unit_price = $update_unit_price WHERE medicine_id=$medicine_id";
mysqli_query($con,$sql);

$sql = "UPDATE pharmachy_stock SET unit_price = $update_unit_price WHERE medicine_id=$medicine_id";
mysqli_query($con,$sql);
$_SESSION['msg']= "Price Updated";
header('location: medicine_list.php');


?>