<?php
session_start();
if (isset($_SESSION['user_status'])) {
    header('location: dashboard.php');
}
require_once 'include/header.php';
?>

<div class="container d-flex justify-content-center align-items-center"
style="min-height: 100vh;">
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="card  shadow  p-3 login_form">
                <div class="card-title">
                    <h3 class="card-title text-center">LOGIN</h3>
                </div>
                <div class="card-body">
                <?php 
                    if(isset($_SESSION['login_err'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['login_err'];
                        unset($_SESSION['login_err']);
                        ?>
                    </div>

                    <?php 
                        endif
                    ?>
                    <form action="login_post.php" method="post" style="width: 300px;">
                        <div class="mb-3">
                            <label class="form-lable">Email</label>
                            <input class="form-control" type="text" name="email">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Password</label>
                            <input class="form-control" type="password" name="password">
                        </div>
                        <div class="mb-3">
                        <select class="form-select" aria-label="Default select example" name="role">
                            <option  value="admin">Admin</option>
                            <option value="manager">Manager</option>
                            <option value="salseman">Salseman</option>
                        </select>
                        </div>
                        <div class="mb-3">
                            <button class="form-control btn btn-success">LOGIN</button>
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