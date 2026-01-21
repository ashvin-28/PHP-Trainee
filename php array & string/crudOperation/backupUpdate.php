<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form method="POST" autocomplete="off" enctype="multipart/form-data">
        <?php
  include "connection.php";
    $errors=[];
  $id=$_GET["id"];
  $errors=[];
  $query="select * from employee where emp_id=$id";
  $result=mysqli_query($conn,$query);
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
        //  if($password=="" || strlen($password)<6)
        //  {
        //      $errors[]="Password contain six character";
        //  }
        //  if($confirmPassword!=$password)
        //  {
        //      $errors[]="Confirm password has same as password";
        //  }
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
         if(empty($errors)){
             $hob=implode(",",$hobbies);
         $hasPassword=password_hash($password,PASSWORD_DEFAULT);
         $hasConfirmPassword=password_hash($confirmPassword,PASSWORD_DEFAULT);

         if($_FILES["image"]["name"]){
         move_uploaded_file($tmp_name,$targetdir);
        $updateDatawithFile="update employee set firstName='$firstName',lastName='$lastName',email='$email',
             password='$hasPassword',confirmPassword='$confirmPassword',address='$address',phonenumber='$phoneNumber',
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
             password='$password',confirmPassword='$confirmPassword',address='$address',phonenumber='$phoneNumber',
             gender='$gender',hobbies='$hob',country='$country' where emp_id=$id";
             $updatedQuery=mysqli_query($conn,$updateData);
             if($updatedQuery){
                echo "<script>alert('Record updated');
                 window.location.href='listData.php';
                </script>";
             }  
         }
        }
       
        }
    
  while($row=mysqli_fetch_assoc($result)){

    $hobbyArr=explode(",",$row["hobbies"]);


          foreach ($errors as $e) {
                 echo "<p style='color:red;'>$e</p>";
                }
        ?>
            <label for="">First Name: </label>
            <input type="text" name="firstName" value="<?php echo $row['firstName'];?>"  >
            <br>
            <label for="">Last Name: </label>
            <input type="text" name="lastName" value="<?php echo $row['lastName'];?>">
            <br>
            <label for=""> Email: </label>
            <input type="email" name="email" value="<?php echo $row['email'];?>" autocomplete="off"  > 

            <br>
            <label for=""> Password: </label>
            <input type="password" name="password" value="<?php echo $row['password'];?>" >  

            <br>
            <label for=""> Confirm Password: </label>
            <input type="password" name="confirmPassword" value="<?php echo $row['confirmPassword'];?>">  

            <br>
            <label for=""> Profile Image: </label>
            <input type="file" name="image"  >  

            <br>
            <label for=""> Address: </label>
            <textarea name="address" id=""  ><?php echo $row['address'];?></textarea>

            <br>
            <label for=""> Phone Number: </label>
            <input type="number" name="phoneNumber" value="<?php echo $row['phonenumber'];?>" id="" >
            <br>
            

            <label for=""> Gender: </label>
            Male: <input type="radio" name="gender" value="Male" <?php if( $row['gender']=='Male') echo 'checked';?>>
            Female: <input type="radio" name="gender" value="Female" <?php if( $row['gender']=='Female') echo 'checked';?>>

            <br>
            <label for=""> Hobbies: </label>
            Playing: <input type="checkbox" name="hobbies[]" value="Playing" <?php if( in_array("Playing",$hobbyArr)) echo 'checked';?>>
            Reading: <input type="checkbox" name="hobbies[]" value="Reading" <?php if( in_array("Reading",$hobbyArr)) echo 'checked';?> >

            <br>
            <label for="">Country: </label>
            <select name="countryName" >
                <option value="Select Country"  <?php if ($row['country'] == 'Select Country') echo 'selected'; ?>>Select Country</option>
                <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
                <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
                <option value="Australia" <?php if ($row['country'] == 'Australia') echo 'selected'; ?>>Australia</option>
            </select>
            <?php
                }
            ?>
            <br>
            <input type="submit" name="submit" value="Update Data">

        </form>
</body>
</html>