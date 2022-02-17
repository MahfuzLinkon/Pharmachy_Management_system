<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$medicine_id = $_GET['medicine_id'];


$sql = "SELECT * FROM pharmachy_stock WHERE medicine_id = '$medicine_id' ";
$res = mysqli_query($con, $sql);
$fetch_acco = mysqli_fetch_assoc($res);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title text-center text-primary">Edit Medicine Form</h4>
                </div>
                <div class="card-body">
                    <form action="edit_medicine_post.php" method="post">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="medicine_id" value="<?= $fetch_acco['medicine_id'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Name</label>
                            <input class="form-control" type="text" name="medicine_name" value="<?= $fetch_acco['medicine_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Type</label>
                            <input class="form-control" type="text" name="medicine_type" value="<?= $fetch_acco['medicine_type'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Capacity</label>
                            <input class="form-control" type="text" name="medicine_capacity" value="<?= $fetch_acco['medicine_capacity'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Unit Price</label>
                            <input class="form-control" type="text" name="unit_price" value="<?= $fetch_acco['unit_price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Expire Date</label>
                            <input class="form-control" type="date" name="expire_date" value="<?= $fetch_acco['expired_date'] ?>">
                        </div>

                        <div class="mb-3">
                            <button class="form-control btn btn-success">Update Medicine</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'include/footer.php';
?>