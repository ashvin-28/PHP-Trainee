<?php
  include "connection.php";
    session_start();
    $errors=[];
    if($_SERVER["REQUEST_METHOD"]=="POST"){
         $firstName=trim($_POST["firstName"]);
         $lastName=trim($_POST["lastName"]);
         $email=$_POST["email"];
         $password=$_POST["password"];
         $confirmPassword=$_POST["confirmPassword"];
         $address=$_POST["address"];
         $phoneNumber=$_POST["phoneNumber"];
         $gender=$_POST["gender"]?? '';
         $hobbies=$_POST["hobbies"]?? [];
         $country=$_POST["countryName"];
         $photo=$_FILES["image"]["name"];
         $tmp_name=$_FILES["image"]["tmp_name"];
         $id=$_POST["id"];

         
         $hob=implode(",",$hobbies);
         $targetdir='upload/' . $photo;
         if($firstName=="" || strlen($firstName<3)){
             $errors[]="First Name contain at least 3 character";
         }
         if($lastName=="" || strlen($lastName<3)){
             $errors[]=" Last Name contain at least 3 character";
         }
         if( !(filter_var($email,FILTER_VALIDATE_EMAIL))){
             $errors[]="Email in specific format";
         }
       
         if($address==""){
            $errors[]="Insert address";
         }
         if($phoneNumber==""){
            $errors[]="Insert phone number";
         }
         if($gender==""){
            $errors[]="Select gender";
         }
         if(empty($hobbies)){
            $errors[]="Select hobbies";
         }
         if($country==""){
            $errors[]="Select country";
         }
         $oldPassword=$_SESSION["oldPassword"];
          if(!empty($password) || strlen($password)<6){
            $password=$_POST["password"];
          }
          else{
            $password=$oldPassword;
          }
          $hashPassword=password_hash($password,PASSWORD_DEFAULT);
          if(!empty($confirmPassword ||$confirmPassword==$password)){
            if(password_verify($confirmPassword,$hashPassword)){
                $confirmPassword=$_POST["password"];
            }else{
                  $errors[]="Confirm password has same as password";
            }
          }
          else{
            $confirmPassword=$oldPassword;
          }
          $hasConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);
         if(empty($errors)){
            if($_FILES["image"]["name"]){
             move_uploaded_file($tmp_name,$targetdir);
            $updateDatawithFile="update employee set firstName='$firstName',lastName='$lastName',email='$email',
             password='$hashPassword',confirmPassword='$hasConfirmPassword',address='$address',phonenumber='$phoneNumber',
             gender='$gender',hobbies='$hob',country='$country', image='$targetdir' where emp_id=$id";
             $updatedQuerywithFile=mysqli_query($conn,$updateDatawithFile);
           

             if($updatedQuerywithFile){
                echo "<script>alert('Record updated');
                 window.location.href='listData.php';
                </script>";
             }  
         }
         else{
            $updateData="update employee set firstName='$firstName',lastName='$lastName',email='$email',
             password='$hashPassword',confirmPassword='$hasConfirmPassword',address='$address',phonenumber='$phoneNumber',
             gender='$gender',hobbies='$hob',country='$country' where emp_id='$id'";
             $updatedQuery=mysqli_query($conn,$updateData);
             if($updatedQuery){
                echo "<script>alert('Record updated');
                 window.location.href='listData.php';
                </script>";
             }  
         }
        } 
        else{
            $_SESSION["updateerrors"]=$errors;
            header("Location:updateForm.php");
            }
        }

