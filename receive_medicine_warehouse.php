<?php
session_start();
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM medicine_list";
$res = mysqli_query($con,$sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-body">
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
                    <div class="mb-3">
                        <h4>Receive Medicine From Suplier</h4>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <th>Medicine Name</th>
                            <th>Stock Available</th>
                            <th>Expire Date</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($res as $item):
                            ?>
                            <tr>
                                <td><b><?=$item['medicine_name']?></b> <Small><?=$item['medicine_capacity']?></Small></td>
                                <td><?=$item['medicine_quantity']?></td>
                                <td><?=$item['expired_date']?></td>
                                <td>
                                    <a class="btn btn-secondary" href="medicine_received_form.php?medicine_id=<?=$item['medicine_id']?>">Receive</a>
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