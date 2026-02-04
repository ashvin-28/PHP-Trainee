<?php
session_start();

if (!isset($_SESSION["email"])) {
    header("Location:/PHP-Trainee/AdminLTE/loginPage.php");
}
$oldData = isset($_SESSION['oldData']) ? $_SESSION['oldData'] : [];
unset($_SESSION['oldData']);
if (isset($_GET['id'])) {
    $id = $_GET["id"];
} elseif (isset($_SESSION["hiddenId"])) {
    $id = $_SESSION["hiddenId"];
} else {

    header("Location: listingData.php");
    exit();
}
include "../header.php";
include "../sidebar.php";
include "connection.php";

$query = "select * from employee where emp_id=$id";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["emp_id"];
    $hobbyArr = explode(",", $row["hobbies"]);
    $oldPassword = $row['password'];

?>
    <div class="card card-primary m-4">
        <div class="card-header">
            <h3 class="card-title">Employee Update Form</h3>

        </div>
        <?php
        $errors = [];
        if (isset($_SESSION["errors"])) {
            $errors = $_SESSION["errors"];
        }
        if ($errors) {
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


    <form class="m-4" method="POST" action="updateData.php" ; enctype="multipart/form-data" autocomplete="off">
        <div class="card-body">
            <input type="hidden" name="id_to_update" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="">First Name: </label>

                <input type="text" class="form-control" name="firstName" value="<?php echo $oldData['firstName'] ?? $row["firstName"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $oldData['lastName'] ?? $row["lastName"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" value="<?php echo $oldData['email'] ?? $row["email"]; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" autocomplete="new-password">
                <input type="hidden" class="form-control" name="update_password" autocomplete="new-password" value="<?php echo $row['password']; ?>">
            </div>
            <div class="form-group">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword">
            </div>

            <div class="form-group">
                <?php if ($row["image"]) {
                ?>
                    <img src="<?php echo $row["image"]; ?>" alt="" width="50px" hight="50px">
                    </td>
                <?php
                } else {
                ?>
                    <img
                        src="../dist/assets/img/randomImage.png"
                        class="user-image rounded-circle shadow"
                        alt="User Image" width="50px" hight="50px" />
                <?php
                }
                ?>
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
                <textarea class="form-control" rows="3" placeholder="Enter ..." name="address"><?php echo $oldData['address'] ?? $row["address"]; ?></textarea>
            </div>
            <div class="form-group">Phone Number</label>
                <input type="number" class="form-control" name="phoneNumber" value="<?php echo $oldData['phoneNumber'] ?? $row["phonenumber"]; ?>">

                <div class="form-group">
                    <label>Gender:</label>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="gender" value="Male" <?php echo ((($oldData['gender'] ?? '') == 'Male') || ($row['gender'] == 'Male')) ? 'checked' : ''; ?>>
                        <label for="customRadio1" class="custom-control-label">Male</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="gender" value="Female" <?php echo ((($oldData['gender'] ?? '') == 'Female') || ($row['gender'] == 'Female')) ? 'checked' : ''; ?>>
                        <label for="customRadio1" class="custom-control-label">Female</label>
                    </div>

                </div>

                <div class="form-group">
                    <label>Hobbies:</label>

                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Playing" <?php echo (in_array('Playing', $oldData['hobbies'] ?? [])) || (in_array("Playing", $hobbyArr)) ? 'checked' : ''; ?>>
                        <label for="customCheckbox1" class="custom-control-label">Playing</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="hobbies[]" value="Reading" <?php echo (in_array('Reading', $oldData['hobbies'] ?? [])) || (in_array("Reading", $hobbyArr)) ? 'checked' : ''; ?>>
                        <label for="customCheckbox1" class="custom-control-label">Reading</label>
                    </div>
                </div>



                <div class="form-group">
                    <label>Select</label>
                    <select class="form-control" name="countryName">
                        <option value="" selected disabled>Select Country</option>
                        <option value="India" <?php echo (($oldData['countryName'] ?? '') == 'India') || ($row['country'] == 'India') ? 'selected' : ''; ?>>India</option>
                        <option value="USA" <?php echo (($oldData['countryName'] ?? '') == 'USA') || ($row['country'] == 'USA') ? 'selected' : ''; ?>>USA</option>
                        <option value="Australia" <?php echo (($oldData['countryName'] ?? '') == 'Australia') || ($row['country'] == 'Australia') ? 'selected' : ''; ?>>Australia</option>
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
    include "../footer.php";
