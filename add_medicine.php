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
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
            <div class="card-header">
                    <h4 class="card-title text-center text-primary">Add Medicine Form</h4>
                </div>
                <div class="card-body">
                    <?php 
                        if(isset($_SESSION['msg'])):
                    ?>
                        <div class="alert alert-warning" role="alert">
                            <?php
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            ?>
                        </div>
                    <?php 
                        endif
                    ?>
                    <form action="add_medicine_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-lable">Medicine Name</label>
                            <input class="form-control" type="text" name="medicine_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Type</label>
                            <input class="form-control" type="text" name="medicine_type">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Capacity</label>
                            <input class="form-control" type="text" name="medicine_capacity">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Unit Price</label>
                            <input class="form-control" type="text" name="unit_price">
                        </div>
                        
                        <div class="mb-3">
                            <button class="form-control btn btn-success">Add Medicine</button>
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