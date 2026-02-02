<?php
session_start();
include './AdminLTE-CRUD/connection.php';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST["email"];
  $password = $_POST["password"];

  if ($email == "" || $password == "") {
    $errors[] = "Enter email and password";
    $_SESSION["errors"] = $errors;
    header("Location:loginPage.php");
  } else {
    $sql = "select * from employee where email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result) {

      $row = mysqli_num_rows($result);
      if ($row == 1) {
        while ($data = mysqli_fetch_assoc($result)) {
          $hashPassword = $data["password"];
          if (password_verify($password, $hashPassword)) {
            $_SESSION["email"] = $data["email"];
            $_SESSION["userId"] = $data["emp_id"];
            $_SESSION["firstName"] = $data["firstName"];
            $_SESSION["lastName"] = $data["lastName"];
            $_SESSION["image"] = $data["image"];

            header("Location:./AdminLTE-CRUD/listingData.php");
          } else {
            $errors[] = "Invalid Credintial";
            $_SESSION["errors"] = $errors;
            var_dump($_SESSION["errors"]);
            header("Location:loginPage.php");
          }
        }
      } else {
        $errors[] = " User not registered";
        $_SESSION["errors"] = $errors;
        var_dump($_SESSION["errors"]);
        header("Location:loginPage.php");
      }
    }
  }
}
