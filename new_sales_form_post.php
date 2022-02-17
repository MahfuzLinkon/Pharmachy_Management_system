<?php
session_start();
require_once 'include/database.php';

$customer_type = $_POST['customer_type'];
$medicine_name = $_POST['medicine_name'];
$medicine_quantity = $_POST['medicine_quantity'];
$unit_price = $_POST['unit_price'];
$medicine_id = $_POST['medicine_id'];


$check_Pharmachy = "SELECT * FROM pharmachy_stock WHERE medicine_id  = $medicine_id";
    $check_Pharmachy_res= mysqli_query($con,$check_Pharmachy);
    $fetch_acco = mysqli_fetch_assoc($check_Pharmachy_res);
    $fetch_acco['medicine_quantity'];

    if($fetch_acco['medicine_quantity']<=0){
        $_SESSION['msg']= "Medicine Out of Stock";
        header('location: new_sales.php');
    }else{
        $insert_sql = "INSERT INTO sales_medicine (customer_type, details, unit_price, medicine_quantity,total_price ) VALUES('$customer_type','$medicine_name','$unit_price', '$medicine_quantity', (unit_price*medicine_quantity) )";
        mysqli_query($con, $insert_sql);

        $update_stock="UPDATE pharmachy_stock SET medicine_quantity = (medicine_quantity - '$medicine_quantity') WHERE medicine_id=$medicine_id";
        mysqli_query($con, $update_stock);
        $_SESSION['msg']="Sales Confirm";
        header('location: sales_medicine.php');
    }




?>
