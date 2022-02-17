<?php
require_once 'header.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="dashboard.php"> <small>PHARMACHY</small> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <!-- admin  -->
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="dashboard.php">Dashboard</a>
        </li>
        <?php
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') :
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="admin_list.php">Admin List</a></li>
              <?php
              if ($_SESSION['role'] == 'admin') :
              ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="admin_add.php">Add Admin</a></li>
              <?php
              endif
              ?>
            </ul>
          </li>
        <?php
        endif
        ?>

        <!-- manager  -->

        <?php
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'salseman') :
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Manager
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="manager_list.php">Manager List</a></li>
              <?php
              if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') :
              ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="manager_add.php">Add Manager</a></li>
              <?php
              endif
              ?>
            </ul>
          </li>
        <?php
        endif
        ?>

        <!-- salseman  -->

        <?php
        if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager' || $_SESSION['role'] == 'salseman') :
        ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Salseman
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="salseman_list.php">Salseman List</a></li>
              <?php
              if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager') :
              ?>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="salseman_add.php">Add Salseman</a></li>
              <?php
              endif
              ?>
            </ul>
          </li>
        <?php
        endif
        ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Supplier
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="supplier_list.php">Supplier List</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="add_supplier.php">Add Supplier</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Store
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="pharmachy_stock.php">Pharmachy Stock</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="warehouse.php">Warehouse</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="medicine_list.php">Medicine List</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="sales_medicine.php">Sales</a>
        </li>

        

      </ul>


      <div class="dropdown">
        <a class="dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
          <?= $_SESSION['email']; ?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <li><a class="dropdown-item" href="profile.php">Profile</a></li>
          <li><a class="dropdown-item" href="change_password.php">Change Password</a></li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li><a class="dropdown-item text-danger" href="logout.php">LogOut</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<?php
require_once 'footer.php';
?>