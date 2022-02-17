<?php
session_start();

if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

?>

<h1 class="text-info text-center mt-3">Dashboard</h1>
<div class="container mt-5">
    <div class="row">
        <!-- SALES -->
        <div class="col-md-3">
            <?php
            $sales_count = "SELECT COUNT(*) AS sales_count FROM sales_medicine";
            $sales_count_res = mysqli_query($con, $sales_count);
            $fetch_accos = mysqli_fetch_assoc($sales_count_res);
            ?>
            <div class="bg-info p-2">
                <h3 class="text-center">TOTAL SALES</h3>
                <h1 class="text-center"><?= $fetch_accos['sales_count']; ?></h1>
            </div>
        </div>
        <!-- MEDICINE LIST -->
        <div class="col-md-3">
            <?php
            $medicine_count = "SELECT COUNT(*) AS medicine_count FROM medicine_list";
            $medicine_count_res = mysqli_query($con, $medicine_count);
            $fetch_accos = mysqli_fetch_assoc($medicine_count_res);
            ?>
            <div class="bg-secondary p-2">
                <h3 class="text-center text-white">MEDICINE LIST</h3>
                <h1 class="text-center text-white"><?= $fetch_accos['medicine_count']; ?></h1>
            </div>
        </div>
        <!-- EXPIRED DRUGS -->
        <div class="col-md-3">
            <?php
            $date = date('Y-m-d');
            $medicine_exp_count = "SELECT COUNT(*) AS medicine_exp_count FROM medicine_list WHERE expired_date < '$date' ";
            $medicine_exp_count_res = mysqli_query($con, $medicine_exp_count);
            $fetch_accos = mysqli_fetch_assoc($medicine_exp_count_res);
            ?>
            <div class="bg-danger p-2">
                <h3 class="text-center text-white">EXPIRED DRUGS</h3>
                <h1 class="text-center text-white"><?= $fetch_accos['medicine_exp_count']; ?></h1>
            </div>
        </div>
        <!-- TRANSATION -->
        <div class="col-md-3">
            <?php
            $date = date('Y-m-d');
            $sales_count_today = "SELECT COUNT(*) AS sales_count_today FROM sales_medicine WHERE sales_date >= '$date'";
            $sales_count_today_res = mysqli_query($con, $sales_count_today);
            $fetch_accos = mysqli_fetch_assoc($sales_count_today_res);
            ?>
            <div class="bg-warning p-2">
                <h3 class="text-center">TRANSATION TODAY</h3>
                <h1 class="text-center"><?= $fetch_accos['sales_count_today']; ?></h1>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card">
                    <div class="card-header bg-warning">
                        <h4>Medicine Stock Out From Pharmachy Stock</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Expire Date</th>
                            </thead>
                            <tbody>
                                <?php 
                                $stock_out_med = "SELECT * FROM pharmachy_stock WHERE medicine_quantity=0 ";
                                $stock_out_med_res = mysqli_query($con,$stock_out_med);
                                foreach($stock_out_med_res as $key => $item):
                                ?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td>
                                        <b><?=$item['medicine_name'];?></b> 
                                        <small><?=$item['medicine_capacity'];?></small>
                                    </td>
                                    <td><?=$item['expired_date']?></td>
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
        <!-- date expired medicine list  -->
        <div class="col-md-6">
            <div class="card">
                <div class="card">
                    <div class="card-header bg-danger">
                        <h4 class="card-title text-white">Date Expire Medicine List</h4>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <th>S.L</th>
                                <th>Name</th>
                                <th>Expire Date</th>
                            </thead>
                            <tbody>
                                <?php
                                $date = date('Y-m-d');
                                $expired_med = "SELECT * FROM pharmachy_stock WHERE expired_date <'$date' ";
                                $expired_med_res = mysqli_query($con,$expired_med);
                                foreach($expired_med_res as $key => $item):
                                ?>
                                <tr>
                                    <td><?=$key+1?></td>
                                    <td>
                                        <b><?=$item['medicine_name'];?></b> 
                                        <small><?=$item['medicine_capacity'];?></small>
                                    </td>
                                    <td><?=$item['expired_date']?></td>
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
</div>


<?php
require_once 'include/footer.php';
?>