<?php require_once "controller/userController.php";

$action = $_GET['action'] ?? 'list'; 
$controller = new userController();
if ($action == 'store') {
    $controller->store();
   
} elseif ($action == 'delete') {
    $id = $_GET['id'] ?? null; 
    if ($id) {
        (new User())->delete($id);
        include "index.php";
    }
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
    $data = (new User())->getAll();
    if(!$data){
        $data=null;
    }
    include "views/list.php";
}
?>
