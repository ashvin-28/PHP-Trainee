<?php
include './connection.php';
header('Content-Type: application/json');

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id=$_POST['id'];
    
    $sql = "SELECT * FROM orderManagement WHERE id = '$id'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'No record found']);
    }
} else {
    echo json_encode(['error' => 'No ID provided']);
}