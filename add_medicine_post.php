<?php 
session_start();
require_once 'include/database.php';

// print_r($_POST);
$medicine_name =$_POST['medicine_name'];
$medicine_type =$_POST['medicine_type'];
$medicine_capacity =$_POST['medicine_capacity'];
$unit_price =$_POST['unit_price'];

if($medicine_name==null || $medicine_type==null || $medicine_capacity==null || $unit_price==null){

    $_SESSION['msg']= "All Field Requuired! ";
    header('location: add_medicine.php');

}else{
    $medicine_list_sql = "INSERT INTO medicine_list (medicine_name, medicine_type, medicine_capacity, unit_price) VALUES('$medicine_name', '$medicine_type', '$medicine_capacity', '$unit_price')";
    mysqli_query($con, $medicine_list_sql);

    $pharmachy_sql = "INSERT INTO pharmachy_stock (medicine_name, medicine_type, medicine_capacity, unit_price) VALUES('$medicine_name', '$medicine_type', '$medicine_capacity', '$unit_price')";
    mysqli_query($con, $pharmachy_sql);
    
    $_SESSION['msg']= "Medicine Add Successful !";
    header('location: add_medicine.php');
    
}



?>