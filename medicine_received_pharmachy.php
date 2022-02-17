<?php
session_start();
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$medicine_id = $_GET['medicine_id'];

$sql = "SELECT medicine_name, medicine_capacity FROM pharmachy_stock WHERE medicine_id = $medicine_id";
$res = mysqli_query($con, $sql);
$fetch_acco = mysqli_fetch_assoc($res);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <div class="mb-3 text-center">
                        <h4>Receive Medicine</h4>
                    </div>

                    <?php
                    if (isset($_SESSION['msg'])) :
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
                    
                    <form action="medicine_received_pharmachy_post.php" method="post">
                        <div class="mb-3">
                            <input class="form-control" type="hidden" name="medicine_id" value="<?= $medicine_id ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Name</label>
                            <input class="form-control" type="text" name="medicine_name" value="<?= $fetch_acco['medicine_name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Medicine Quantity</label>
                            <input class="form-control" type="text" name="medicine_quantity">
                        </div>
                        <div class="mb-3">
                            <button class="form-control btn btn-success">Receive Medicine</button>
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