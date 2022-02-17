<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-primary text-center">Manager Add form</h3>
                </div>
                <div class="card-body">

                    <?php 
                    if(isset($_SESSION['msg'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['msg'];
                        unset($_SESSION['msg']);
                        ?>
                    </div>

                    <?php 
                        endif
                    ?>

                    <form action="manager_add_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-lable">Name</label>
                            <input class="form-control" type="text" name="name">
                        </div>

                        <div class="mb-3">
                            <label class="form-lable">Email</label>
                            <input class="form-control" type="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Phone</label>
                            <input class="form-control" type="text" name="phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="mb-3">
                            <select class="form-select" aria-label="Default select example" name="role">
                                <option value="manager">Manager</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <button class="form-control btn btn-success">Register</button>
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