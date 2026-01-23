<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:/PHP-Trainee/AdminLTE/AdminLTE-CRUD/loginPage.php");
}
require_once('../controller/userController.php');
$id = $_GET['id'] ?? null;
if ($id) {
    (new User())->delete($id);
    header("Location:/PHP-Trainee/AdminLTE/mvcCrud/index.php ");
}
