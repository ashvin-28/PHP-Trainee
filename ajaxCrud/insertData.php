<?php
include "connection.php";
session_start();
header('Content-Type: application/json');

$response = [];

$emp_id   = $_POST["emp_id"] ?? "";

$firstName = $_POST["firstName"];
$lastName  = $_POST["lastName"];
$email     = $_POST["email"];
$password  = $_POST["password"];
$confirmPassword = $_POST["confirmPassword"];
$address   = $_POST["address"];
$phoneNumber = $_POST["phoneNumber"];
$gender    = $_POST["gender"] ?? '';
$hobbies   = $_POST["hobbies"] ?? [];
$country   = $_POST["countryName"];

$hob = implode(",", $hobbies);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$hashedConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);

$imagePath = "";
if (!empty($_FILES["image"]["name"])) {
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }
    $imageName = time() . "_" . $_FILES["image"]["name"];
    $imagePath = "uploads/" . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
}

try {

    if ($emp_id == "") {

        $query = "INSERT INTO ajaxCrud
        (firstName,lastName,email,password,confirmPassword,address,phonenumber,gender,hobbies,country,image)
        VALUES
        ('$firstName','$lastName','$email','$hashedPassword','$hashedConfirmPassword',
         '$address','$phoneNumber','$gender','$hob','$country','$imagePath')";

        if (mysqli_query($conn, $query)) {
            $_SESSION["sucess_message"]='Employee added successfully';
            $response['status'] = 'success';
            // $response['message'] = 'Employee added successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Insert failed';
        }

    } 
    else {

        if ($imagePath != "") {
            $query = "UPDATE ajaxCrud SET
                firstName='$firstName',
                lastName='$lastName',
                email='$email',
                address='$address',
                phonenumber='$phoneNumber',
                gender='$gender',
                hobbies='$hob',
                country='$country',
                image='$imagePath'
                WHERE emp_id='$emp_id'";
        } else {
            $query = "UPDATE ajaxCrud SET
                firstName='$firstName',
                lastName='$lastName',
                email='$email',
                address='$address',
                phonenumber='$phoneNumber',
                gender='$gender',
                hobbies='$hob',
                country='$country'
                WHERE emp_id='$emp_id'";
        }

        if (mysqli_query($conn, $query)) {
            $_SESSION["update_message"]='Employee Updated successfully';
            $response['status'] = 'success';
            // $response['message'] = 'Employee updated successfully';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Update failed';
        }
    }

} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        $response['status'] = 'error';
        $response['message'] = 'Email already exists';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Database error';
    }
}

echo json_encode($response);
