<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT *, (unit_price * medicine_quantity) AS total_amount  FROM pharmachy_stock";
$res = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4 class="card-title d-flex justify-content-between">Pharmachy Stock<a href="receive_medicine_pharmachy.php" class="text-capitalize btn btn-secondary">Receive Medicine To Pharmachy</a></h4>
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
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $key => $medicine) :
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <b><?= $medicine['medicine_name'] ?></b>
                                        <small><?= $medicine['medicine_capacity'] ?></small>
                                    </td>

                                    <td class="
                                    <?php if ($medicine['medicine_quantity'] == 0) {
                                        echo "bg-warning";
                                    } ?>
                                    "><?= $medicine['medicine_quantity'] ?></td>

                                    <td><?= $medicine['unit_price'] ?></td>
                                    <td><?= $medicine['total_amount'] ?></td>

                                    <td class="
                                    <?php
                                    $date = date('Y-m-d');
                                     if($medicine['expired_date'] < $date ){
                                         echo "bg-danger";
                                     }
                                    ?>
                                    "><?= $medicine['expired_date'] ?>
                                    </td>

                                    <td>
                                        <a href="edit_medicine.php?medicine_id=<?= $medicine['medicine_id'] ?>" class="btn btn-secondary">Edit</a>
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