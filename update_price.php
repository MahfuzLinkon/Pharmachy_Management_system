<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';
$medicine_id = $_GET['medicine_id'];

$sql = "SELECT * FROM medicine_list WHERE medicine_id= $medicine_id ";
$res = mysqli_query($con,$sql);
$fetch_acos = mysqli_fetch_assoc($res);
?>

<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card mt-5">
                <div class="card-header bg-secondary">
                    <h3 class="text-center text-white">Update Medicine Price</h3>
                </div>
                <div class="card-body">

                    <form action="update_price_post.php" method="post">
                    <div class="mb-3">
                            <input class="form-control" type="hidden" name="medicine_id" value="<?=$fetch_acos['medicine_id']?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Name</label>
                            <input class="form-control" type="text" name="medicine_name" value="<?=$fetch_acos['medicine_name']." ".$fetch_acos['medicine_capacity']?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable">Unit Price</label>
                            <input class="form-control" type="text" name="update_unit_price" value="<?=$fetch_acos['unit_price']?>">
                        </div>

                        <div class="mb-3">
                            <button class="form-control btn btn-success">Update Price</button>
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