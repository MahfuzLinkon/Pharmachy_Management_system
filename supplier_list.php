<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM supplier";
$res = mysqli_query($con, $sql);
?>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Supplier List</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Type</th>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($res as $key => $item):
                            ?>
                            <tr>
                                <td><?=$key+1?></td>
                                <td><?=$item['supplier_name']?></td>
                                <td><?=$item['supplier_type']?></td>
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