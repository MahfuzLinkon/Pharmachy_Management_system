<?php
session_start();

if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="card mt-4">
                <div class="card-header bg-info">
                    <h4 class="card-title d-flex justify-content-between text-capitalize">Change Password</h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['pass_change_err'])){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?php 
                                echo $_SESSION['pass_change_err'];
                                unset($_SESSION['pass_change_err']);
                            ?>
                            </div>

                    <?php } ?>
                    <?php
                        if(isset($_SESSION['pass_chng_succ'])){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?php 
                                echo $_SESSION['pass_chng_succ'];
                                unset($_SESSION['pass_chng_succ']);
                            ?>
                            </div>

                    <?php } ?>
                     
                    <form action="change_pass_post.php" method="POST">
                        <div class="mb-3">
                            <label class="text-capitalize">old password</label>
                            <input type="text" name="old_pass" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="text-capitalize">new password</label>
                            <input type="text" name="new_pass" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="text-capitalize">confirm password</label>
                            <input type="text" name="confirm_pass" class="form-control">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success text-capitalize">change password</button>
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