<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

?>
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Supplier Add Form</h4>
                </div>
                <div class="card-body">
                <form action="add_supplier_post.php" method="post">
                        <div class="mb-3">
                            <label class="form-lable">Supplier Name</label>
                            <input class="form-control" type="text" name="supplier_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-lable">Supplier Type</label>
                            <input class="form-control" type="text" name="supplier_type">
                        </div>
                        
                        <div class="mb-3">
                            <button class="form-control btn btn-success">Add Medicine</button>
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