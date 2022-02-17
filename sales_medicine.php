<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM sales_medicine";
$res = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title d-flex justify-content-between">Sales List<a href="new_sales.php" class="text-capitalize btn btn-secondary">New Sales</a></h4>
                </div>
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
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>S.N</th>
                            <th>Customer Type</th>
                            <th>Details</th>
                            <th>Unit Price</th>
                            <th>Medicine Quantity</th>
                            <th>Total Price</th>
                            <th>Date</th>
                            <th>Sales Number</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $key => $item) :
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $item['customer_type'] ?></td>
                                    <td><?= $item['details'] ?></td>
                                    <td><?= $item['unit_price'] ?></td>
                                    <td><?= $item['medicine_quantity'] ?></td>
                                    <td><?= $item['total_price'] ?></td>
                                    <td><?= $item['sales_date'] ?></td>
                                    <td><?= $item['sales_id'] ?></td>
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