 <?php
 
    include "connection.php";
    session_start();
        if(!isset($_SESSION["email"])){
            header("Location:loginPage.php");
        }
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
         $uploaddir="upload/";
         $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        
         $targetdir=$uploaddir . $photo;
         
         if($firstName=="" || strlen($firstName<3)){
             $errors[]="First Name contain at least 3 character";
         }
         if($lastName=="" || strlen($lastName<3)){
             $errors[]=" Last Name contain at least 3 character";
         }
         if( !(filter_var($email,FILTER_VALIDATE_EMAIL))){
             $errors[]="Email in specific format";
         }
         if($password=="" || strlen($password)<8)
         {
             $errors[]="Password contain eight character";
         }
         else if(!preg_match($pattern, $password)){
            $errors[]="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
         }
         else if($confirmPassword!=$password)
         {
             $errors[]="Confirm password has same as password";
         }
         if($address==""){
            $errors[]="Insert address";
         }
         if($phoneNumber=="" || (!preg_match('/^[0-9]{10}$/', $phoneNumber))){
            $errors[]=" phone number must bi 10 digit";
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
        if(!($_FILES["image"]["name"])){
            $errors[]="Insert image";
        }
         if(empty($errors)){ 
            if(move_uploaded_file($tmp_name,$targetdir)){
                echo "upload";
            }
            else{
                echo "not";
            }
         move_uploaded_file($tmp_name,$targetdir);        
         $hob=implode(",",$hobbies);
         $hasPassword=password_hash($password,PASSWORD_DEFAULT);
         $hasConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);

         $query="insert into employee(firstName,lastName,email,password,confirmPassword,address,phonenumber,gender,hobbies,country,image) values(
           '$firstName','$lastName','$email','$hasPassword','$hasConfirmPassword','$address','$phoneNumber','$gender','$hob','$country','$targetdir')";
         $result=mysqli_query($conn,$query);
         if($result){

             echo "<script>alert('Record Inserted');
                 window.location.href='listingData.php';
                </script>";
                    }
         else{
            echo "no";
             }
         }
         else{
               $_SESSION["errors"]=$errors;
            header("Location:insertEmployeeForm.php");
           
                    }
         
     }
     else{
        echo "Form not submitted";
     }

