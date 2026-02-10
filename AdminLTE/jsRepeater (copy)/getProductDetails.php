<?php
header('Content-Type: application/json');
include "connection.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM product WHERE product_id = '$id'");
$row = mysqli_fetch_assoc($result);

$rows = [];

if ($row) {
    $sizes  = explode(',', $row['size']);
    $qtys   = explode(',', $row['qty']);
    $colors = explode(',', $row['color']);
    $prices = explode(',', $row['price']);

    foreach ($sizes as $index => $val) {
        $rows[] = [
            'product_id' => $row['product_id'],
            'productName' => $row['productName'],
            'size'  => $val,
            'qty'   => $qtys[$index] ?? '',
            'color' => $colors[$index] ?? '',
            'price' => $prices[$index] ?? ''
        ];
    }
}

echo json_encode($rows);
