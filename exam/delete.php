<?php
include "connection.php";

if(isset($_POST['id'])){
    $id = (int) $_POST['id']; 
    $sql = "DELETE FROM orderManagement WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if($result && mysqli_affected_rows($conn) > 0){
        echo "success";
    }else{
        echo "failed";
    }
}