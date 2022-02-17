<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

$sql = "SELECT * FROM users WHERE role = 'manager' ";
$res = mysqli_query($con, $sql);
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-primary text-center">Manager List</h3>
                </div>
                <?php
                if (isset($_SESSION['msg'])) :
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
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th class="
                                <?php if ($_SESSION['role'] != 'admin') {
                                    echo "d-none";
                                } ?>
                                ">Action</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($res as $key => $users) :
                            ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $users['name'] ?></td>
                                    <td><?= $users['email'] ?></td>
                                    <td><?= $users['phone'] ?></td>
                                    <td class="
                                <?php if ($_SESSION['role'] != 'admin') {
                                    echo "d-none";
                                } ?>
                                ">
                                        <a href="manager_delete.php?manager_id=<?= $users['id'] ?>" class="btn btn-danger">Delete</a>
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