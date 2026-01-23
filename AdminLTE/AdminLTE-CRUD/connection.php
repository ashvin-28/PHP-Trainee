<?php
$conn=mysqli_connect("localhost","root","admin123","EmployeeDB");
if(!$conn){
    echo "Database not connected: " .mysqli_connect_error();
}