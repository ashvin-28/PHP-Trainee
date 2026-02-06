<?php
include "connection.php";
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:/PHP-Trainee/AdminLTE/loginPage.php");
}
include "../header.php";
include "../sidebar.php";


?>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="card card-primary m-4">
    <div class="card-header">
        <h3 class="card-title">Employee Form</h3>

   
</div>

  <form id="insertForm" class="m-4" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="card-body">
    
            <div class="form-group">
                <label for="">First Name: </label>
                <input type="text" class="form-control" name="firstName" id="firstName" value="">
                <span class="error text-danger" id="firstNameError"></span><br><br>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lastName" id="lastName" value="">
                <span class="error text-danger" id="lastNameError"></span><br><br>
    
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" id="email" class="form-control" name="email" autocomplete="off" value="">
                <span class="error text-danger" id="emailError"></span><br><br>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" id="password" class="form-control" name="password" autocomplete="new-password" value="">
                <span class="error text-danger" id="passwordError"></span><br><br>
            </div>
            <div class="form-group">Confirm Password</label>
                <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" value="">
                <span class="error text-danger" id="confirmPasswordError"></span><br><br> 
            </div>
    
            <div class="form-group">
                <label for="exampleInputFile">Photo Input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" id="image" class="custom-file-input" name="image">
                        <span class="error text-danger" id="fileError"></span><br><br>
                    </div>
    
                </div>
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Address</label>
                <textarea class="form-control" id="address" rows="3" placeholder="Enter ..." name="address"></textarea>
                <span class="error text-danger" id="addressError"></span><br><br>
            </div>
            <div class="form-group">Phone Number</label>
            <input type="number" id="phoneNumber" class="form-control" name="phoneNumber" value="">
            <span class="error text-danger" id="phoneNumberError"></span><br><br>
            </div>
    
    
            <div class="form-group">
                <label>Gender:</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="gender" value="Male">
                    <label for="customRadio1" class="custom-control-label">Male</label>
                </div>
    
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" name="gender" value="Female"  >
                    <label for="customRadio1" class="custom-control-label">Female</label>
                </div>
                <span class="error text-danger" id="genderError"></span><br><br>
    
    
            </div>
    
            <div class="form-group">
                <label>Hobbies:</label>
    
                <div class="custom-control custom-checkbox">
                    <input class="hobbies custom-control-input" type="checkbox" name="hobbies[]" value="Playing" <?php echo (in_array('Playing', $oldData['hobbies'] ?? [])) ? 'checked' : ''; ?>>
                    <label for="customCheckbox1" class="custom-control-label">Playing</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input class="hobbies custom-control-input" type="checkbox" name="hobbies[]" value="Reading" <?php echo (in_array('Reading', $oldData['hobbies'] ?? [])) ? 'checked' : ''; ?>>
                    <label for="customCheckbox1" class="custom-control-label">Reading</label>
                </div>
                <span class="error text-danger" id="hobbiesError"></span><br><br>
    
            </div>
    
    
    
            <div class="form-group">
                <label>Select</label>
                <select class="form-control" id="countryName" name="countryName">
                    <option value="" >Select Country</option>
                    <option value="India" >India</option>
                    <option value="USA" >USA</option>
                    <option value="Australia" >Australia</option>
                </select>
                <span class="error text-danger" id="countryError"></span><br><br>
    
            </div>
    
    
    
            <div class="card-footer m-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script src="/PHP-Trainee/AdminLTE/ajaxCrud/crud.js"></script>
    <p id="message">njgh</p>

<?php
include "../footer.php";
