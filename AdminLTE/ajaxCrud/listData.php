<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location:../loginPage.php");
}
include "connection.php";
include "../header.php";
include "../sidebar.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<button type="button" class="btn btn-primary" onclick="addData()"  style="width: 50px; margin: 2px 2px 2px 20px; padding: 2px;" data-bs-toggle="modal" data-bs-target="#adminPopupForm">
    Add 
</button>

<div class="modal fade" id="adminPopupForm" tabindex="-1" aria-labelledby="adminPopupFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="adminPopupFormLabel">Employee Form</h5>
                <button type="button" id="btnClose" onclick="closeModel()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
             
            <div id="alertBox" class="alert d-none m-2" role="alert">
                <span id="message"></span>
            </div>
            <div class="modal-body">
                <form id="insertForm" class="m-4"  enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="emp_id" id="emp_id">
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
                            <input type="text" id="email" class="form-control" name="email" autocomplete="off" value="">
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
                            <img id='updatedImage' src="" alt="updatedImage" width="50px" hight="50px">
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
                                <input class="custom-control-input" type="radio" name="gender" value="Female">
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
                                <option value="">Select Country</option>
                                <option value="India">India</option>
                                <option value="USA">USA</option>
                                <option value="Australia">Australia</option>
                            </select>
                            <span class="error text-danger" id="countryError"></span><br><br>

                        </div>



                        <div class="card-footer m-2">
                            <button type="submit" class="btn btn-primary " id="closeModalButton">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
</div>
 
<div id="tableContainer">
</div>
<script src="crud.js"></script>
<?php
include "../footer.php";
