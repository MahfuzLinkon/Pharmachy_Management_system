<?php
session_start();
require_once 'include/database.php';

// print_r($_POST);
$medicine_id = $_POST['medicine_id'];
$medicine_quantity = $_POST['medicine_quantity'];

if($medicine_quantity==null){
    $_SESSION['msg']= "All Field Required";
    header('location: receive_medicine_pharmachy.php');
}else{

    $check_warehouse = "SELECT * FROM medicine_list WHERE medicine_id  = $medicine_id";
    $check_res= mysqli_query($con,$check_warehouse);
    $fetch_acco = mysqli_fetch_assoc($check_res);
    $fetch_acco['medicine_quantity'];

    if($fetch_acco['medicine_quantity']<=0){
        $_SESSION['msg']= "Medicine Out of Stock";
        header('location: pharmachy_stock.php');
    }else{
        $sql_pharmachy_stock ="UPDATE pharmachy_stock SET medicine_quantity = (medicine_quantity + '$medicine_quantity' )WHERE medicine_id= '$medicine_id' ";
    mysqli_query($con,$sql_pharmachy_stock);
    $_SESSION['msg']= "Medicine Add Successful";
    header('location: pharmachy_stock.php');


    $sql_warehouse_stock ="UPDATE medicine_list SET medicine_quantity = (medicine_quantity - '$medicine_quantity' )  WHERE medicine_id= '$medicine_id' ";
    mysqli_query($con,$sql_warehouse_stock);
    }

    
}


?>