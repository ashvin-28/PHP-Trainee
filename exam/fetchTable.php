<?php
include "./connection.php";
?>
<div class="app-wrapper">
    <div class="card ">
        <div class="card-header m-3">
            <h3 class="card-title">Order Management Table</h3>
        </div>



        <!-- /.card-header -->
        <div class=" card-body table-responsive">
            <table id="example1" class="table table-sm display responsive table-bordered table-striped ">
                <thead>
                    <tr>
                        <th>OrderNumber</th>
                        <th>CustomerName</th>
                        <th>CustomerEmail </th>
                        <th>ProductName</th>
                        <th>OrderAmount</th>
                        <th>PaymentMethod</th>
                        <th>OrderStatus</th>
                        <th>DeliveryOptions</th>
                        <th>OrderDate</th>
                        <th>DeliveryAddress</th>
                        <th>InvoiceFile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $inputSearch = $_POST["inputSearch"] ?? "";
                    if ($inputSearch) {
                        $sql = "select * from orderManagement where OrderNumber like '$inputSearch%' or CustomerName like '$inputSearch%' or ProductName like '$inputSearch%'";
                    } else {

                        $sql = "select * from orderManagement";
                    }


                    $result = mysqli_query($conn, $sql);
                    $row_count = 1;

                    $numRows = mysqli_num_rows($result);
                    if ($numRows > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr data-id="1" id="row_<?php echo $row['id']; ?>">
                        <td class="row-data" data-name="OrderNumber"><?php echo $row["OrderNumber"]; ?></td>
                        <td class="row-data" data-name="CustomerName"><?php echo $row["CustomerName"]; ?></td>
                        <td class="row-data" data-name="CustomerEmail"><?php echo $row["CustomerEmail"]; ?></td>
                        <td class="row-data" data-name="ProductName"><?php echo $row["ProductName"]; ?></td>
                        <td class="row-data" data-name="OrderAmount"><?php echo $row["OrderAmount"]; ?></td>
                        <td class="row-data" data-name="PaymentMethod "><?php echo $row["PaymentMethod"]; ?></td>
                        <td class="row-data" data-name="OrderStatus"><?php echo $row["OrderStatus"]; ?></td>
                        <td class="row-data" data-name="DeliveryOptions"><?php echo $row["DeliveryOptions"]; ?></td>
                        <td class="row-data" data-name="OrderDate"><?php echo $row["OrderDate"]; ?></td>
                        <td class="row-data" data-name="DeliveryAddress"><?php echo $row["DeliveryAddress"]; ?></td>

                        <td class="row-data" data-name="name">



                            <a href="/exam/uploads/<?php echo $row["InvoiceFile"]; ?>" target="_blank"
                                class="download-btn">
                                <i class="fa fa-download"></i> View/Download Invoice
                            </a>


                        </td>


                        <!-- Table row me -->
                        <td>

                            <button class="edit-btn btn btn-sm btn-primary edit-btn" data-bs-toggle="modal"
                                data-bs-target="#adminPopupForm" data-id="<?php echo $row['id']; ?>"
                                onclick="editData('<?php echo $row['id']; ?>')">
                                Edit
                            </button>

                            <button class="btn btn-sm btn-danger" data-id="<?php echo $row['id']; ?>"
                                onclick="deleteData('<?php echo $row['id']; ?>')">Delete</button>
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