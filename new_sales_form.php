<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';
// print_r($_POST);
$medicine_id = $_GET['medicine_id'];

$select_sql = "SELECT * FROM pharmachy_stock WHERE medicine_id = $medicine_id";
$select_res = mysqli_query($con, $select_sql);
$fetch_acos = mysqli_fetch_assoc($select_res);

// echo $fetch_acos['medicine_name'];
// echo $fetch_acos['medicine_capacity'];
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h3>Issue Medicine</h3>
                </div>
                <div class="card-body">
                    <form action="new_sales_form_post.php" method="POST">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="medicine_id" value="<?= $fetch_acos['medicine_id']?>">
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="unit_price" value="<?= $fetch_acos['unit_price']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Customer Type</label>
                            <select class="form-select" aria-label="Default select example" name="customer_type">
                                <option value="new_customer">New Customer</option>
                                <option value="returning_customer">Returning Customer</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Name</label>
                            <input class="form-control" type="text" name="medicine_name" value="<?= $fetch_acos['medicine_name'] . " " . $fetch_acos['medicine_capacity'] . " Expire date:" . $fetch_acos['expired_date'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Quantity</label>
                            <input class="form-control" type="number" name="medicine_quantity" required>
                        </div>
                        <button type="submit" class="btn btn-success form-control">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>








<?php
require_once 'include/footer.php';
?>