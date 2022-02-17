<?php
session_start();

require_once 'include/database.php';

// print_r($_POST);
$medicine_id = $_POST['medicine_id'];
$expire_date = date('Y-m-d', strtotime($_POST['expire_date']));
$medicine_quantity = $_POST['medicine_quantity'];

if($expire_date==null || $medicine_quantity==null){
    $_SESSION['msg']= "All Field Required";
    header('location: receive_medicine_warehouse.php');
}else{
    $sql ="UPDATE medicine_list SET expired_date= '$expire_date', medicine_quantity= (medicine_quantity + '$medicine_quantity') WHERE medicine_id= '$medicine_id' ";
    mysqli_query($con,$sql);
    $_SESSION['msg']= "Medicine Add Successful";
    header('location: warehouse.php');

    $sql_pharmachy_stock ="UPDATE pharmachy_stock SET expired_date= '$expire_date' WHERE medicine_id= '$medicine_id' ";
    mysqli_query($con,$sql_pharmachy_stock);
    
}


?>