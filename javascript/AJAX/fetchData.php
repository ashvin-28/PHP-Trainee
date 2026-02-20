<?php
// Simulating a database query
$data = array(
    array('id' => 1, 'name' => 'John Doe'),
    array('id' => 2, 'name' => 'Jane Smith'),
    array('id' => 3, 'name' => 'Bob Johnson')
);
// var_dump($data);

// Convert the data to JSON
$jsonData = json_encode($data);

// Send the JSON response
header('Content-Type: application/json');
echo $jsonData;
exit();
