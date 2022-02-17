<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: ../login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';
$log_email = $_SESSION['email'];


$sql = "SELECT name, email, phone FROM users where email='$log_email'";
$res = mysqli_query($con, $sql);
$fatch_acc = mysqli_fetch_assoc($res);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-4">
                <div class="card-header bg-info">
                    <h4 class="card-title d-flex justify-content-between text-capitalize"> edit profle information</h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['edt_err'])) { ?>
                        <div class="alert alert-warning" role="alert">
                            <?php
                            echo $_SESSION['edt_err'];
                            unset ($_SESSION['edt_err']);
                            ?>
                        </div>
                    <?php } ?>

                    <form action="edit_profile_post.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="text-capitalize">name</label>
                            <input type="text" name="edt_name" class="form-control" value="<?= $fatch_acc['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="text-capitalize">phone</label>
                            <input type="text" name="edt_phone" class="form-control" value="<?= $fatch_acc['phone'] ?>">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-warning text-capitalize">update</button>
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