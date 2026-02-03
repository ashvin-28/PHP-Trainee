      <?php
        session_start();
        if (!isset($_SESSION["email"])) {
            header("Location:/PHP-Trainee/AdminLTE/loginPage.php");
        }
        include '../../header.php';
        include "../../sidebar.php";

        $errors = [];
        $oldData = isset($_SESSION['oldData']) ? $_SESSION['oldData'] : [];
        unset($_SESSION['oldData']);
        if ((isset($_SESSION["errors"]))) {
            $errors = $_SESSION["errors"];
        }
        ?>

      <div class="card card-primary m-4">
          <div class="card-header">
              <h3 class="card-title">Employee Form</h3>

          </div>
          <?php
            if ($errors) {
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
          <div class="form-group">
            <label for="">First Name: </label>
            <input type="text" class="form-control" name="firstName" value="<?php echo $oldData['firstName'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" class="form-control" name="lastName" value="<?php echo $oldData['lastName'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $oldData['email'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="password" class="form-control" name="password" autocomplete="new-password" value="<?php echo $oldData['password'] ?? ''; ?>">
        </div>
        <div class="form-group">Confirm Password</label>
            <input type="password" class="form-control" name="confirmPassword" value="<?php echo $oldData['confirmPassword'] ?? ''; ?>">
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
            <textarea class="form-control" rows="3" placeholder="Enter ..." name="address"><?php echo $oldData['address'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">Phone Number</label>
            <input type="number" class="form-control" name="phoneNumber" value="<?php echo $oldData['phoneNumber'] ?? ''; ?>">
        </div>


        <div class="form-group">
            <label>Gender:</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" value="Male" <?php echo (($oldData['gender'] ?? '') == 'Male') ? 'checked' : ''; ?>>
                <label for="customRadio1" class="custom-control-label">Male</label>
            </div>

            <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" name="gender" value="Female"  <?php echo (($oldData['gender'] ?? '') == 'Female') ? 'checked' : ''; ?>>
                <label for="customRadio1" class="custom-control-label">Female</label>
            </div>

        </div>

        <div class="form-group">
            <label>Hobbies:</label>

            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Playing" <?php echo (in_array('Playing', $oldData['hobbies'] ?? [])) ? 'checked' : ''; ?>>
                <label for="customCheckbox1" class="custom-control-label">Playing</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Reading" <?php echo (in_array('Reading', $oldData['hobbies'] ?? [])) ? 'checked' : ''; ?>>
                <label for="customCheckbox1" class="custom-control-label">Reading</label>
            </div>
        </div>



        <div class="form-group">
            <label>Select</label>
            <select class="form-control" name="countryName">
                <option value="" selected disabled>Select Country</option>
                <option value="India" <?php echo (($oldData['countryName'] ?? '') == 'India') ? 'selected' : ''; ?>>India</option>
                <option value="USA" <?php echo (($oldData['countryName'] ?? '') == 'USA') ? 'selected' : ''; ?>>USA</option>
                <option value="Australia" <?php echo (($oldData['countryName'] ?? '') == 'Australia') ? 'selected' : ''; ?>>Australia</option>
            </select>
        </div>



        <div class="card-footer m-2">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </div>
      </form>
      <?php
        include "../../footer.php";
        ?>