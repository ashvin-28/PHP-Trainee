<?php
 include "connection.php";
 $errors=[];
  $id=$_GET["id"];

 session_start();
$_SESSION["id"]=$id;
 if(isset($_SESSION["updateerrrors"])){

     $errors=$_SESSION["updateerrors"];
 }

   $query="select * from employee where emp_id=$id";
   $result=mysqli_query($conn,$query);
    
  while($row=mysqli_fetch_assoc($result)){
    $hobbyArr=explode(",",$row["hobbies"]);
    $oldPassword=$row['password'];
  $_SESSION["oldPassword"]=$oldPassword;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form method="POST" action="updateData.php" autocomplete="off" enctype="multipart/form-data">
                 <?php foreach ($errors as $e) {
                 echo "<p style='color:red;'>$e</p>";
                } ?>
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
            <input type="password" name="password" value="" >  

            <br>
            <label for=""> Confirm Password: </label>
            <input type="password" name="confirmPassword" value="">  

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
             <input type="radio" name="gender" value="Male" <?php if( $row['gender']=='Male') echo 'checked';?>>Male
             <input type="radio" name="gender" value="Female" <?php if( $row['gender']=='Female') echo 'checked';?>>Female

            <br>
            <label for=""> Hobbies: </label>
            <input type="checkbox" name="hobbies[]" value="Playing" <?php if( in_array("Playing",$hobbyArr)) echo 'checked';?>>Playing
             <input type="checkbox" name="hobbies[]" value="Reading" <?php if( in_array("Reading",$hobbyArr)) echo 'checked';?> >Reading

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