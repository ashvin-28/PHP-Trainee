<?php
include "connection.php";
 if($_SERVER["REQUEST_METHOD"]=="POST"){
         $id = $_POST['id_to_update'];
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
         $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
         $oldPassword= $_POST["update_password"];
         
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
       
        
        if($phoneNumber!=""){

            if(!preg_match('/^[0-9]{10}$/', $phoneNumber)){
                $errors[]=" Phone number must 10 digit";
        }
         }
        
       
          if(!empty($password)){
            if(!(strlen($password<8))){
               if(!preg_match($pattern, $password)){
                 $errors[]="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";

               }else{

                   $password=$_POST["password"];
                   $hashPassword=password_hash($password,PASSWORD_DEFAULT);
                }

            }
            else{
               $errors[]="Password contain at least 8 character";
            }
          }
          else{
            $hashPassword=$oldPassword;
          }
          
          if(!empty($confirmPassword )){
            
              $hasConfirmPassword=$hashPassword;
            
              if(password_verify($confirmPassword,$hasConfirmPassword)){
                $confirmPassword=$_POST["password"];
                $hasConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);
              }
              else{
                $errors[]="Confirm password has same as password";
              }
            
          }
          else{
            $hasConfirmPassword=$oldPassword;
          }
         if(empty($errors)){
            if($_FILES["image"]["name"]){
             move_uploaded_file($tmp_name,$targetdir);
            $updateDatawithFile="update employee set firstName='$firstName',lastName='$lastName',email='$email',
             password='$hashPassword',confirmPassword='$hasConfirmPassword',address='$address',phonenumber='$phoneNumber',
             gender='$gender',hobbies='$hob',country='$country', image='$targetdir' where emp_id=$id";
             $updatedQuerywithFile=mysqli_query($conn,$updateDatawithFile);
           

             if($updatedQuerywithFile){
                if($_SESSION["email"]==$email){

                    $_SESSION["image"]=$targetdir;
                }
                echo "<script>alert('Record updated');
                 window.location.href='listingData.php';
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
                 window.location.href='listingData.php';
                </script>";
             }  
         }
         }
         else{
            $_SESSION["errors"]=$errors;
            $_SESSION['update_error_data']['id'] = $id;
            if($_SESSION["errors"]){
                $error_msg="Please valid field";
            }
            echo "<script>
                alert('$error_msg');
                window.location.href = 'updateFormData.php?id=" . urlencode($id) . "';
            </script>";
            exit;
           
         }
        }
  