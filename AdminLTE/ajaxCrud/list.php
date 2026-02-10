<?php
include "connection.php";
session_start();

        if (isset($_SESSION["sucess_message"])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                <strong><?php echo$_SESSION["sucess_message"] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        unset($_SESSION["sucess_message"]);

        if (isset($_SESSION['update_message'])) {
        ?>
            <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
                <strong><?php echo $_SESSION['update_message'] ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
        unset($_SESSION['update_message']);
        ?>
<div class="app-wrapper">
    <div class="card ">
        <div class="card-header m-3">
            <h3 class="card-title">Employee Table</h3>

        </div>

      


        <!-- /.card-header -->
        <div class="card-body  table-responsive">
            <table id="example1" class="table table-sm display responsive table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>firstName</th>
                        <th>lastName</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Gender</th>
                        <th>Hobbies</th>
                        <th>Country</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   

                    $sql = "select * from ajaxCrud";

                    $result = mysqli_query($conn, $sql);
                    $row_count = 1;

                    $numRows = mysqli_num_rows($result);
                    if ($numRows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr data-id="1" id="row_<?php echo $row['emp_id']; ?>">
                                <td class="row-data" data-name="emp_id"><?php echo $row_count++; ?></td>
                                <td class="row-data" data-name="firstName"><?php echo $row["firstName"]; ?></td>
                                <td class="row-data" data-name="lastName"><?php echo $row["lastName"]; ?></td>
                                <td class="row-data" data-name="email"><?php echo $row["email"]; ?></td>
                                <td class="row-data" data-name="address"><?php echo $row["address"]; ?></td>
                                <td class="row-data" data-name="phonenumber"><?php echo $row["phonenumber"]; ?></td>
                                <td class="row-data" data-name="gender"><?php echo $row["gender"]; ?></td>
                                <td class="row-data" data-name="hobbies"><?php echo $row["hobbies"]; ?></td>
                                <td class="row-data" data-name="country"><?php echo $row["country"]; ?></td>

                                <td class="row-data" data-name="name">

                                    <img src="/PHP-Trainee/AdminLTE/ajaxCrud/<?php echo $row["image"]; ?>" alt="" width="50px" hight="50px">


                                </td>


                                <!-- Table row me -->
                                <td>
                                   
                                   <button class="edit-btn btn btn-sm btn-primary edit-btn" data-bs-toggle="modal" data-bs-target="#adminPopupForm"
                                        data-id="<?php echo $row['emp_id']; ?>" onclick="editData(<?php echo $row['emp_id']; ?>)">
                                        Edit
                                    </button>
                                  
                                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?php echo $row['emp_id']; ?>)">Delete</button>
                                </td>


                            </tr>
                    <?php
                        }
                    } else {
                        echo "No data found";
                    }
                    ?>
                    <!-- Add more rows here -->
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</div>