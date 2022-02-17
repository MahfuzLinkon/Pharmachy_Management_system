<?php
session_start();

require_once 'include/database.php';

// print_r($_POST);

$medicine_id = $_POST['medicine_id'];
$medicine_name = $_POST['medicine_name'];
$medicine_type = $_POST['medicine_type'];
$medicine_capacity = $_POST['medicine_capacity'];
$unit_price = $_POST['unit_price'];
$expired_date = date('Y-m-d', strtotime($_POST['expire_date']));

if($medicine_name==null || $medicine_type==null || $medicine_capacity==null || $unit_price==null || $expired_date==null){

    $_SESSION['msg']= "All Field Requuired! ";
    header('location: pharmachy_stock.php');

}else{
    $medicine_update_sql = "UPDATE medicine_list SET medicine_name = '$medicine_name', medicine_type = '$medicine_type', medicine_capacity = '$medicine_capacity', unit_price = '$unit_price', expired_date='$expired_date' WHERE medicine_id= '$medicine_id'";
    mysqli_query($con, $medicine_update_sql);

    $pharmachy_update_sql = "UPDATE pharmachy_stock SET medicine_name = '$medicine_name', medicine_type = '$medicine_type', medicine_capacity = '$medicine_capacity', unit_price = '$unit_price', expired_date='$expired_date' WHERE medicine_id= '$medicine_id' ";
    mysqli_query($con, $pharmachy_update_sql);
    
    $_SESSION['msg']= "Medicine Update Successful !";
    header('location: pharmachy_stock.php');
    
}


?>