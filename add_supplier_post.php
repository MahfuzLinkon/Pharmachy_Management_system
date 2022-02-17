<?php
session_start();
// print_r($_POST);
require_once 'include/database.php';


$supplier_name = $_POST['supplier_name'];
$supplier_type = $_POST['supplier_type'];

if($supplier_name==null || $supplier_type==null){
    // echo "kora jabe nah";
}else{
    $sql = "INSERT INTO supplier (supplier_name,supplier_type) VALUES ('$supplier_name', '$supplier_type')";
    mysqli_query($con,$sql);
    header('location: supplier_list.php');
}

?>