<?php
session_start();
if (!isset($_SESSION['user_status'])) {
    header('location: login.php');
}
require_once 'include/header.php';
require_once 'include/navbar.php';
require_once 'include/database.php';

?>

<h1 class="text-center mt-5 text-info">Coming Soon...</h1>


<?php
require_once 'include/footer.php';
?>