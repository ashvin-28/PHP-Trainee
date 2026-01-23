      <?php
        session_start();
        // if(!isset($_SESSION["email"])){
        //     header("Location:loginPage.php");
        // }
        include '../../header.php';
        include "../../sidebar.php";
        
        $errors=[];
        if((isset($_SESSION["errors"]))){
            $errors=$_SESSION["errors"];
           }
      ?>
    
    <div class="card card-primary m-4">
    <div class="card-header">
        <h3 class="card-title">Employee Form</h3>
      
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
                <li><?php echo $error_message;  ?></li>

            <?php endforeach;
             unset($_SESSION["errors"]);
            ?>
        </ul>
      </div>
        <?php
          }
         ?>
    </div>
   
    <form class="m-4" action="../index.php?action=store" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="card-body">
      
            <div class="form-group">
               <label for="">First Name: </label>
            <input type="text" class="form-control" name="firstName"   >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lastName" >
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" autocomplete="off" >
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
                <textarea  class="form-control" rows="3" placeholder="Enter ..." name="address"></textarea>
            </div>
            <div class="form-group">Phone Number</label>
                <input type="number" class="form-control" name="phoneNumber" >
            </div>
           

             <div class="form-group">
                <label>Gender:</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"  name="gender" value="Male" >
                    <label for="customRadio1" class="custom-control-label">Male</label>
                </div>
                
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio"  name="gender" value="Female" >
                    <label for="customRadio1" class="custom-control-label">Female</label>
                </div>
                
            </div>

            <div class="form-group">
                <label>Hobbies:</label>

                 <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Playing">
                    <label for="customCheckbox1" class="custom-control-label">Playing</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Reading">
                    <label for="customCheckbox1" class="custom-control-label">Reading</label>
                </div>
            </div>

           

            <div class="form-group">
                <label>Select</label>
                <select class="form-control" name="countryName">
                     <option value="Select Country">Select Country</option>
                <option value="India">India</option>
                <option value="USA">USA</option>
                <option value="Australia">Australia</option>
                </select>
            </div>
            
           
       
        <div class="card-footer m-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
   <?php
     include "../../footer.php";
   ?>
   
   