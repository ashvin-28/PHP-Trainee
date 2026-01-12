<?php
include "connection.php";
$id=$_GET['id'];
$query="delete from employee where emp_id=$id";
$result=mysqli_query($conn,$query);
if($result){
    echo "<script>alert('Record deleted');
    window.location.href='listData.php';
    </script>";
}
// header("Location:listData.php");