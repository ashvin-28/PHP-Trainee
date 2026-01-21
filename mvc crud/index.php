<?php
require_once "controller/userController.php";
$action = $_GET['action'] ?? '';
echo $action;
$controller = new userController();
if($action == "store")
    {
        echo $action;
        $controller->store();
    } 
if($action=="delete")
  {
      $id=$_GET["id"];
     (new User())->delete($id);
  }        
$data = (new User())->getAll();
include "views/list.php";