<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:loginPage.php");
}
include "connection.php";
$id = $_GET['id'];
$query = "delete from employee where emp_id=$id";
$result = mysqli_query($conn, $query);
if ($result) {
    if (isset($_SESSION['userId']) && $_SESSION['userId'] == $id) {
        session_unset();
        session_destroy();
        echo "<script>alert('Your account has been deleted. You are now logged out.'); window.location.href='/PHP-Trainee/AdminLTE/loginPage.php';</script>";
        exit();
    } else {
        echo "<script>alert('Record deleted'); window.location.href='listingData.php';</script>";
        exit();
    }
}
