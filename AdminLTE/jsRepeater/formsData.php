<?php
include "connection.php";
$response = [];
$product_id = $_POST['product_id'] ?? '';
$productName = $_POST['productName'];
$size   = $_POST["size"] ?? [];
$qty   = $_POST["qty"] ?? [];
$color   = $_POST["color"] ?? [];
$price   = $_POST["price"] ?? [];

$sizeArray = implode(",", $size);
$qtyArray = implode(",", $qty);
$colorArray = implode(",", $color);
$priceArray = implode(",", $price);

try {
    if ($product_id == "") {
        $query = "INSERT INTO product (productName,size,qty,color,price) 
                  VALUES ('$productName','$sizeArray','$qtyArray','$colorArray','$priceArray')";
        
        if (mysqli_query($conn, $query)) {
            $response['status'] = 'success';
            $response['message'] = 'Product added successfully';
        }
    } else {
        $query = "UPDATE product SET 
                  productName='$productName', 
                  size='$sizeArray', 
                  qty='$qtyArray', 
                  color='$colorArray', 
                  price='$priceArray' 
                  WHERE product_id='$product_id'";

        if (mysqli_query($conn, $query)) {
            $response['status'] = 'success';
            $response['message'] = 'Product updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Update failed';
        }
    }
} catch (mysqli_sql_exception $e) {
     if ($e->getCode() == 1062) {
        $response['status'] = 'error';
        $response['message'] = ' Product already exists';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database error';
    }
}


echo json_encode($response);
