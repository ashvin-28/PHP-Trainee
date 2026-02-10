<?php
include "connection.php";

$id = $_POST['id'];

$sql = "SELECT * FROM ajaxCrud WHERE emp_id='$id'";
$res = mysqli_query($conn, $sql);

echo json_encode(mysqli_fetch_assoc($res));
