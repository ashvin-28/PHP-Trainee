<?php
include "connection.php";
?>
        <!-- /.card-header -->
        <div class="card-body  table-responsive">
            <table id="example1" class="table table-sm display responsive table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>productName</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $sql = "select * from product";

                    $result = mysqli_query($conn, $sql);
                    $row_count = 1;

                    $numRows = mysqli_num_rows($result);
                    if ($numRows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr data-id="1" id="row_<?php echo $row['product_id']; ?>">
                                <td class="row-data" data-name="emp_id"><?php echo $row_count++; ?></td>
                                <td class="row-data" data-name="productName"><?php echo $row["productName"]; ?></td>


                                <td>

                                    <button class="edit-btn btn btn-sm btn-primary edit-btn" onclick="editData(<?php echo $row['product_id'];  ?>)" data-bs-toggle="modal" data-bs-target="#adminPopupForm">
                                        Edit
                                    </button>

                                    <button class="btn btn-sm btn-danger" onclick="deleteData(<?php echo $row['product_id'];  ?>)">Delete</button>
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
