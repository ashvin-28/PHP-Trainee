<?php
require_once "controller/userController.php";
if (!isset($_SESSION["email"])) {
    header("Location:../AdminLTE-CRUD/loginPage.php");
}
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
