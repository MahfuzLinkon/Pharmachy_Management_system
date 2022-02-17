<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM pharmachy_stock ";
$res = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title">Select Item You Want To Sales</h4>

                </div>
                <div class="card-body">
                <?php 
                    if(isset($_SESSION['msg'])):
                    ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        ?>
                    </div>

                    <?php 
                        endif
                    ?>
                        <table class="table table-bordered">
                            <thead>
                                <th>Medicine Name</th>
                                <th>Stock Available</th>
                                <th>Expire Date</th>
                                <th>Action</th>
                            </thead>
                            <tbody>

                                <?php
                                foreach ($res as $item) :
                                ?>
                                    <tr>                
                                        <td><?= $item['medicine_name'] ?></td>
                                        <td><?= $item['medicine_quantity'] ?></td>
                                        <td><?= $item['expired_date'] ?></td>
                                        <td>
                                            <a href="new_sales_form.php?medicine_id=<?= $item['medicine_id'] ?>"class="btn btn-secondary">Continue To Sales</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach
                                ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once 'include/footer.php';
?>