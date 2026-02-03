<?php
require_once "controller/userController.php";
if (!isset($_SESSION["email"])) {
    header("Location:/PHP-Trainee/AdminLTE/loginPage.php");
}
if (isset($_SESSION['deleteMessage'])) {
    $deleteMessage = $_SESSION['deleteMessage'];
    echo "<script>alert('$deleteMessage');</script>";
}
unset($_SESSION['deleteMessage']);
$action = $_GET['action'] ?? 'list';
$controller = new userController();
if ($action == 'store') {
    $controller->store();
} elseif ($action == 'edit') {
    $id = $_GET['id'] ?? null;
    if ($id) {

        $data = (new User())->getById($id);
        include "views/edit.php";
        die();
    }
} elseif ($action == 'update') {
    $controller->update();
} else {
    if ($action == 'search') {
        $data = $controller->getSearch();
    } else {

        $data = (new User())->getAll();
    }
    if (!$data) {
        $data = null;
    }
    include "views/list.php";
}
