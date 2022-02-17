<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT medicine_name, medicine_quantity, medicine_capacity, unit_price, expired_date, (medicine_quantity * unit_price) AS total_amount FROM medicine_list  ";
$res = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title d-flex justify-content-between">Warehouse List <a href="receive_medicine_warehouse.php" class="text-capitalize btn btn-secondary">Receive Medicine</a></h4>
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

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>S.N</th>
                            <th>Medicine Name</th>
                            <th>Stock Available</th>
                            <th>Unit Price</th>
                            <th>Total Amount</th>
                            <th>Expire Date</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $key => $item) :
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <b><?= $item['medicine_name']; ?></b>
                                        <small><?= $item['medicine_capacity']; ?></small>
                                    </td>
                                    <td><?= $item['medicine_quantity'] ?></td>
                                    <td><?= $item['unit_price'] ?></td>
                                    <td><?= $item['total_amount'] ?></td>
                                    <td><?= $item['expired_date'] ?></td>
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