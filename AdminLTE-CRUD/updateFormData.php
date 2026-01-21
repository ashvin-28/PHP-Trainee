<?php
 session_start();
if(!isset($_SESSION["email"])){
    header("Location:loginPage.php");
}
include "header.php";
include "sidebar.php";
include "connection.php";

 $id=$_GET["id"];
 $errors=[];
 $query="select * from employee where emp_id=$id";
 $result=mysqli_query($conn,$query);
 while($row=mysqli_fetch_assoc($result)){
    $hobbyArr=explode(",",$row["hobbies"]);
    $oldPassword=$row['password'];    
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
         $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

         
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
       
        //  if($address==""){
        //     $errors[]="Insert address";
        //  }
        if($phoneNumber!=""){

            if(!preg_match('/^[0-9]{10}$/', $phoneNumber)){
                $errors[]=" Phone number must 10 digit";
        }
         }
        //  if($gender==""){
        //     $errors[]="Select gender";
        //  }
        //  if(empty($hobbies)){
        //     $errors[]="Select hobbies";
        //  }
        //  if($country==""){
        //     $errors[]="Select country";
        //  }
       
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
        }?>
  
    <div class="card card-primary m-4">
    <div class="card-header">
        <h3 class="card-title">Employee Update Form</h3>
         
    </div>
    <?php 
       if($errors){
    ?>
      <div class="alert alert-danger alert-dismissible m-2">
        <button type="button" class="close " data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            <?php foreach ($errors as  $error_message): ?>
                <li><?php echo $error_message; ?></li>
            <?php endforeach;
             unset($_SESSION["errors"]);
            
            ?>
        </ul>
        </div>
        <?php
       }
         ?>
      </div>
   
   
    <form class="m-4" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="card-body">
      
            <div class="form-group">
               <label for="">First Name: </label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName'];?>"   >
                   </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName'];?>" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $row['email'];?>" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" autocomplete="new-password" >
            </div>
            <div class="form-group">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword" >
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Photo Input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                    </div>
              
                </div>
            </div>
             <div class="form-group">
                <label for="exampleTextarea">Address</label>
                <textarea  class="form-control" rows="3" placeholder="Enter ..." name="address"><?php echo $row['address'];?></textarea>
            </div>
            <div class="form-group">Phone Number</label>
                <input type="number" class="form-control" name="phoneNumber" value="<?php echo $row['phonenumber'];?>">

             <div class="form-group">
                <label>Gender:</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"  name="gender" value="Male" <?php if( $row['gender']=='Male') echo 'checked';?> >
                    <label for="customRadio1" class="custom-control-label">Male</label>
                </div>
                
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"  name="gender" value="Female" <?php if( $row['gender']=='Female') echo 'checked';?> >
                    <label for="customRadio1" class="custom-control-label">Female</label>
                </div>
                
            </div>

            <div class="form-group">
                <label>Hobbies:</label>

                 <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Playing" <?php if( in_array("Playing",$hobbyArr)) echo 'checked';?>>
                    <label for="customCheckbox1" class="custom-control-label">Playing</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Reading" <?php if( in_array("Reading",$hobbyArr)) echo 'checked';?>>
                    <label for="customCheckbox1" class="custom-control-label">Reading</label>
                </div>
            </div>

           

            <div class="form-group">
                <label>Select</label>
                <select class="form-control" name="countryName">
                     <option value="Select Country" <?php if ($row['country'] == 'Select Country') echo 'selected'; ?>>Select Country</option>
                <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
                <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
                <option value="Australia" <?php if ($row['country'] == 'Australia') echo 'selected'; ?>>Australia</option>
                </select>
            </div>
            
           
        </div>
            <?php
                }
            ?>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary m-2">Update</button>
        </div>
    </form>
  </div>
   
   <?php
     include "footer.php";
   ?>
  