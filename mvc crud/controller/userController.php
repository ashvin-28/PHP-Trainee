<?php
require_once "model/User.php";

// include "index.php";
class userController{
     public $errors=[];
    public function store() {
 
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
        //  $uploaddir="upload/";
        //  if (!is_dir($uploaddir)) {
        //      mkdir($uploaddir, 0777, true);
        //     }
        //  $targetdir=$uploaddir . $photo;
         
         if($firstName=="" || strlen($firstName<3)){
             $errors[]="First Name contain at least 3 character";
         }
         if($lastName=="" || strlen($lastName<3)){
             $errors[]=" Last Name contain at least 3 character";
         }
         if( !(filter_var($email,FILTER_VALIDATE_EMAIL))){
             $errors[]="Email in specific format";
         }
         if($password=="" || strlen($password)<6)
         {
             $errors[]="Password contain six character";
         }
         if($confirmPassword!=$password)
         {
             $errors[]="Confirm password has same as password";
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
        if(!($_FILES["image"]["name"])){
            $errors[]="Insert image";
        }
         if(empty($errors)){ 
            // if(move_uploaded_file($tmp_name,"uploads/".$photo)){
            //     echo "upload";
            // }
            // else{
            //     echo "not";
            // }
         move_uploaded_file($tmp_name,"uploads/".$photo);        
        }
        $hob=implode(",",$hobbies);
        $hasPassword=password_hash($password,PASSWORD_DEFAULT);
        $hasConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);
       
 
}
 $data = [
              "firstName"=>$firstName,
              "lastName"=>$lastName,
              "email"=>$email,
              "hasPassword"=>$hasPassword,
              "hasConfirmPassword"=>$hasConfirmPassword,
              "phoneNumber"=>$phoneNumber,
              "address"=>$address,
              "gender"=>$gender,
              "hob"=>$hob,
              "country"=>$country,
              "targetdir"=>$photo,
        ];
(new User())->insert($data);
header("Location:index.php");
 
 
}

}
