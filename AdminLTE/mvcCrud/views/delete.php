<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:/PHP-Trainee/AdminLTE/loginPage.php");
}
require_once('../controller/userController.php');
$id = $_GET['id'] ?? null;
if ($id) {
    (new User())->delete($id);
    $_SESSION['deleteMessage'] = 'Record deleted successfully.';
    header("Location:/PHP-Trainee/AdminLTE/mvcCrud/index.php ");
}
