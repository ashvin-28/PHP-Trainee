<?php
require_once(__DIR__ . '/../model/User.php');
// require_once('model/User.php');
session_start();
class userController
{
   public function store()
   {
      $user = new User();
      $errors = [];

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $firstName = trim($_POST["firstName"]);
         $lastName = trim($_POST["lastName"]);
         $email = $_POST["email"];
         $password = $_POST["password"];
         $confirmPassword = $_POST["confirmPassword"];
         $address = $_POST["address"];
         $phoneNumber = $_POST["phoneNumber"];
         $gender = $_POST["gender"] ?? '';
         $hobbies = $_POST["hobbies"] ?? [];
         $country = $_POST["countryName"];
         $photo = $_FILES["image"]["name"];
         $tmp_name = $_FILES["image"]["tmp_name"];
         $uploaddir = "upload/";
         $targetdir = $uploaddir . $photo;

         if ($firstName == "" || strlen($firstName) < 3) {
            $errors[] = "First Name contain at least 3 character";
         }
         if ($lastName == "" || strlen($lastName) < 3) {
            $errors[] = " Last Name contain at least 3 character";
         }
         if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = "Email in specific format";
         }
         if ($password == "" || strlen($password) < 6) {
            $errors[] = "Password contain six character";
         }
         if ($confirmPassword == "" || $confirmPassword != $password) {
            $errors[] = "Confirm password has same as password";
         }
         if ($address == "") {
            $errors[] = "Insert address";
         }
         if ($phoneNumber == "") {
            $errors[] = "Insert phone number";
         }
         if ($gender == "") {
            $errors[] = "Select gender";
         }
         if (empty($hobbies)) {
            $errors[] = "Select hobbies";
         }
         if ($country == "") {
            $errors[] = "Select country";
         }
         if (!($_FILES["image"]["name"])) {
            $errors[] = "Insert image";
         }
         if (empty($errors)) {
            move_uploaded_file($tmp_name, $targetdir);
            $hob = implode(",", $hobbies);
            $hasPassword = password_hash($password, PASSWORD_DEFAULT);
            $hasConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
            $data = [
               "firstName" => $firstName,
               "lastName" => $lastName,
               "email" => $email,
               "hasPassword" => $hasPassword,
               "hasConfirmPassword" => $hasConfirmPassword,
               "phoneNumber" => $phoneNumber,
               "address" => $address,
               "gender" => $gender,
               "hob" => $hob,
               "country" => $country,
               "targetdir" => $targetdir,
            ];
            $user->insert($data);
            header("Location:index.php");
         } else {
            $_SESSION["errors"] = $errors;

            header("Location:views/add.php");
         }
      }
   }

   public function update()
   {

      $user = new User();
      $errors = [];

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
         $id = $_POST['id'];
         $firstName = trim($_POST["firstName"]);
         $lastName = trim($_POST["lastName"]);
         $email = $_POST["email"];
         $password = $_POST["password"];
         $confirmPassword = $_POST["confirmPassword"];
         $address = $_POST["address"];
         $phoneNumber = $_POST["phoneNumber"];
         $gender = $_POST["gender"] ?? '';
         $hobbies = $_POST["hobbies"] ?? [];
         $country = $_POST["countryName"];
         $photo = $_FILES['image']['name'];
         $image = $_POST['old_image'];
         $uploaddir = "upload/";
         $targetdir = $uploaddir . $photo;
         $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
         $oldPassword = $_POST["update_password"];
         if ($firstName == "" || strlen($firstName < 3)) {
            $errors[] = "First Name contain at least 3 character";
         }
         if ($lastName == "" || strlen($lastName < 3)) {
            $errors[] = " Last Name contain at least 3 character";
         }
         if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            $errors[] = "Email in specific format";
         }


         if ($phoneNumber != "") {

            if (!preg_match('/^[0-9]{10}$/', $phoneNumber)) {
               $errors[] = " Phone number must 10 digit";
            }
         }


         if (!empty($password)) {
            if (!(strlen($password < 8))) {
               if (!preg_match($pattern, $password)) {
                  $errors[] = "Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
               } else {

                  $password = $_POST["password"];
                  $hashPassword = password_hash($password, PASSWORD_DEFAULT);
               }
            } else {
               $errors[] = "Password contain at least 8 character";
            }
         } else {
            $hashPassword = $oldPassword;
         }
         if ($password != "" && $confirmPassword == "") {
            $errors[] = " Enter Confirm password has same as password";
         }

         if (!empty($confirmPassword)) {

            $hasConfirmPassword = $hashPassword;

            if (password_verify($confirmPassword, $hasConfirmPassword)) {
               $confirmPassword = $_POST["password"];
               $hasConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
            } else {
               $errors[] = "Confirm password has same as password";
            }
         } else {
            $hasConfirmPassword = $oldPassword;
         }
         if ($_FILES['image']['name']) {

            move_uploaded_file($_FILES['image']['tmp_name'], $targetdir);
            $image = $targetdir;
         }
         if (empty($errors)) {

            $data = [
               "id" => $id,
               "firstName" => $firstName,
               "lastName" => $lastName,
               "email" => $email,
               "password" => $hashPassword,
               "confirmPassword" => $hasConfirmPassword,
               "phoneNumber" => $phoneNumber,
               "address" => $address,
               "gender" => $gender,
               "hobbies" => implode(",", $hobbies),
               "country" => $country,
               "targetdir" => $image,
            ];
            $user->update($data);
            header("Location:index.php");
         } else {
            $_SESSION["errors"] = $errors;
            $_SESSION["hiddenId"] = $id;
            var_dump($_SESSION["hiddenId"]);
            header("Location:views/edit.php");
         }
      }
   }
   public function getSearch()
   {
      $user = new User();
      if (isset($_POST["searchButton"])) {
         $serachInput = $_POST["searchInput"];
         $data = $user->getSearch($serachInput);
      }
      return $data;
   }
}
