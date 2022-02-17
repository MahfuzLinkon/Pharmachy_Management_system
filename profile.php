<?php
session_start();
$log_email = $_SESSION['email'];
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$log_email = $_SESSION['email'];

$sql = "SELECT name, email, phone, role FROM users where email='$log_email'";
$res = mysqli_query($con,$sql);
$fatch_acc = mysqli_fetch_assoc($res);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-4">
                <div class="card-header bg-info">
                    <h4 class="card-title d-flex justify-content-between">Profle information <a href="edit_profile.php" class="text-capitalize btn btn-warning">edit profile</a></h4>
                </div>
                <div class="card-body">
                    <p><span class="text text-capitalize text-primary me-2">name:</span> <?=$fatch_acc['name'];?> </p>
                    <p><span class="text text-capitalize text-primary me-2">email:</span> <?=$fatch_acc['email'];?> </p>
                    <p><span class="text text-capitalize text-primary me-2">phone:</span> <?=$fatch_acc['phone'];?> </p>
                    <p><span class="text text-capitalize text-primary me-2">Role:</span> <?=$fatch_acc['role'];?> </p>
                </div>
            </div>
        </div>
    </div>
</div>





<?php
require_once 'include/footer.php';
?>