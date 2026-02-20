<?php
include './connection.php'; 
header('Content-Type: application/json');
$response = [];

$id = $_POST['id'] ?? '';
$OrderNumber = $_POST['OrderNumber'];
$CustomerName = $_POST['CustomerName'];
$CustomerEmail = $_POST['CustomerEmail'];
$ProductName = $_POST['ProductName'];
$OrderAmount = $_POST['OrderAmount'];
$PaymentMethod = $_POST['PaymentMethod'];
$OrderStatus = $_POST['OrderStatus'] ?? '';
$DeliveryOptions = $_POST['DeliveryOptions'] ?? [];
$OrderDate = $_POST['OrderDate'];
$DeliveryAddress = $_POST['DeliveryAddress'];

$DeliveryOptionsString = implode(',', $DeliveryOptions);

$InvoiceFile = '';
if (!file_exists('uploads')) {
    mkdir('uploads', 0777, true);
}

if (!empty($_FILES['InvoiceFile']['name'])) {
    $InvoiceFile = time() . '_' . $_FILES['InvoiceFile']['name'];
    $InvoicePath = 'uploads/' . $InvoiceFile;
    move_uploaded_file($_FILES['InvoiceFile']['tmp_name'], $InvoicePath);
}

if ($id == '') {
    $sql = "INSERT INTO orderManagement (OrderNumber, CustomerName, CustomerEmail, ProductName, OrderAmount, PaymentMethod, OrderStatus, DeliveryOptions, OrderDate, DeliveryAddress, InvoiceFile) 
            VALUES ('$OrderNumber', '$CustomerName', '$CustomerEmail', '$ProductName', '$OrderAmount', '$PaymentMethod', '$OrderStatus', '$DeliveryOptionsString', '$OrderDate', '$DeliveryAddress', '$InvoiceFile')";
    
    if (mysqli_query($conn, $sql)) {
        $response['status'] = 'success';
        $response['message'] = 'Order added successfully';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Insert failed: ' . mysqli_error($conn);
    }
} else {
    $updateFileSql = $InvoiceFile != '' ? ", InvoiceFile='$InvoiceFile'" : "";
    $query = "UPDATE orderManagement SET 
              OrderNumber='$OrderNumber', 
              CustomerName='$CustomerName', 
              CustomerEmail='$CustomerEmail', 
              ProductName='$ProductName', 
              OrderAmount='$OrderAmount', 
              PaymentMethod='$PaymentMethod', 
              OrderStatus='$OrderStatus', 
              DeliveryOptions='$DeliveryOptionsString', 
              OrderDate='$OrderDate', 
              DeliveryAddress='$DeliveryAddress'
              $updateFileSql
              WHERE id='$id'";
              
    if (mysqli_query($conn, $query)) {
        $response['status'] = 'success';
        $response['message'] = 'Order updated successfully';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Update failed: ' . mysqli_error($conn);
    }
}

echo json_encode($response);