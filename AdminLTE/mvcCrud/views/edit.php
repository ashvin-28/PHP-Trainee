<?php
require_once('../controller/userController.php');
if (!isset($_SESSION["email"])) {
    header("Location:../AdminLTE-CRUD/loginPage.php");
}
include '../../header.php';


include "../../sidebar.php";
$errors = [];
if (isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}


$id = $_GET['id'] ?? null;
if (!$id) {
    if (isset($_SESSION["hiddenId"])) {
        $id = $_SESSION["hiddenId"];
    }
}
$data = (new User())->getById($id);


if ($data && $data->num_rows > 0) {
    while ($row = $data->fetch_assoc()) {
        $hobbyArr = explode(",", $row["hobbies"]);

?>
        <div class="card card-primary m-4">
            <div class="card-header">
                <h3 class="card-title">Employee Edit Form</h3>

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
        <form class="m-4" action="../index.php?action=update" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="card-body">

                <input type="hidden" name="id" value="<?= $row['emp_id'] ?>">
                <div class="form-group">
                    <label for="">First Name: </label>
                    <input type="text" class="form-control" name="firstName" value="<?= $row['firstName'] ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="<?php echo $row["lastName"]; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" autocomplete="off" value="<?php echo $row["email"]; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                    <input type="hidden" name="update_password" autocomplete="off" value="<?php echo $row['password']; ?>">

                </div>
                <div class="form-group">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Photo Input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image">
                            <input type="hidden" name="old_image" value="<?= $row['image'] ?>">

                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Address</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." name="address"><?php echo $row["address"]; ?></textarea>
                </div>
                <div class="form-group">Phone Number</label>
                    <input type="number" class="form-control" name="phoneNumber" value="<?php echo $row['phonenumber']; ?>">
                </div>


                <div class="form-group">
                    <label>Gender:</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="gender" value="Male" <?php if ($row['gender'] == 'Male') echo 'checked'; ?>>
                        <label for="customRadio1" class="custom-control-label">Male</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="gender" value="Female" <?php if ($row['gender'] == 'Female') echo 'checked'; ?>>
                        <label for="customRadio1" class="custom-control-label">Female</label>
                    </div>

                </div>

                <div class="form-group">
                    <label>Hobbies:</label>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Playing" <?php if (in_array("Playing", $hobbyArr)) echo 'checked'; ?>>
                        <label for="customCheckbox1" class="custom-control-label">Playing</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Reading" <?php if (in_array("Reading", $hobbyArr)) echo 'checked'; ?>>
                        <label for="customCheckbox1" class="custom-control-label">Reading</label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="countryName">
                        <option value="Select Country" <?php if ($row['country'] == 'Select Country') echo 'selected'; ?>>Select Country</option>
                        <option value="India" <?php if ($row['country'] == 'India') echo 'selected'; ?>>India</option>
                        <option value="USA" <?php if ($row['country'] == 'USA') echo 'selected'; ?>>USA</option>
                        <option value="Australia">Australia</option>
                    </select>
                </div>



                <div class="card-footer m-2">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
        </form>
<?php
    }
} else {
    echo "Employee not found.";
}

include "../../footer.php";
?>