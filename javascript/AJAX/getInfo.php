<?php
$name=$_GET["name"];
$age=$_GET["age"];
$response= "my name is ". $name ." and age is ". $age; 
echo $response; 

// $name = isset($_GET["name"]) ? $_GET["name"] : '';
// $age = isset($_GET["age"]) ? (int)$_GET["age"] : 0;

// // Create an associative array with the data
// $response = [
//     'name' => $name,
//     'age' => $age,
//     'message' => "my name is " . $name . " and age is " . $age
// ];

// // Echo the JSON encoded string
// echo json_encode($response);
?>
