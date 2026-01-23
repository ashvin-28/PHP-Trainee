<?php
include "connection.php";
session_start();
$errors = [];
$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($firstName == "" || strlen($firstName < 3)) {
        $errors[] = "First Name contain at least 3 character";
    }
    if ($lastName == "" || strlen($lastName < 3)) {
        $errors[] = " Last Name contain at least 3 character";
    }
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $errors[] = "Email in specific format";
    }
   
    if($password=="" || strlen($password)<8)
         {
             $errors[]="Password contain eight character";
         }
    else if(!preg_match($pattern, $password)){
            $errors[]="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }
    elseif ($confirmPassword != $password) {
        $errors[] = "Confirm password has same as password";
    }
 
            

    if (empty($errors)) {

        $hasPassword = password_hash($password, PASSWORD_DEFAULT);
        $hasConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
    
        $query = "insert into employee(firstName,lastName,email,password,confirmPassword) values(
           '$firstName','$lastName','$email','$hasPassword','$hasConfirmPassword')";
        $result = mysqli_query($conn, $query) or die ('Error querying database.');
        if ($result) {

            echo "<script>alert('Register Sucessfully');
                 window.location.href='loginPage.php';
                </script>";
        } 
    }
    else {
             $_SESSION["errors"]=$errors;
             var_dump ( $_SESSION["errors"]);
             header("Location:registerPage.php");
        }
} 


