<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM medicine_list  ";
$res = mysqli_query($con,$sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
            <div class="card-header">
                    <h4 class="card-title d-flex justify-content-between">Medicine List <a href="add_medicine.php" class="text-capitalize btn btn-secondary">Add Medicine</a></h4>
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
                            <th>SL</th>
                            <th>Medicine Info</th>
                            <th>Type</th>
                            <th>Unit Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($res as $key=> $item):
                            ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td>
                                    Name: <b><?=$item['medicine_name'];?></b> 
                                    <small><?=$item['medicine_capacity'];?></small> <br>
                                    Expired Data: <?=$item['expired_date'];?>
                                </td>
                                <td class="text-capitalize"><?=$item['medicine_type'];?></td>
                                <td class="text-capitalize"><b><?=$item['unit_price'];?></b></td>
                                <td> 
                                    <a href="update_price.php?medicine_id=<?=$item['medicine_id'];?>" class="btn btn-sm btn-secondary">Update Price</a>
                                    <a href="delete_medicine.php?medicine_id=<?=$item['medicine_id'];?>" class="btn btn-sm btn-secondary">Delete</a>
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