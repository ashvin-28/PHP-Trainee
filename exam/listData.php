<?php
include "./header.php";
include "./sidebar.php";
include "./connection.php";
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<button type="button" class="btn btn-primary" onclick="addData()"
    style="width: 50px; margin: 2px 2px 2px 20px; padding: 2px;" data-bs-toggle="modal"
    data-bs-target="#adminPopupForm">
    Add
</button>

<div class="modal fade" id="adminPopupForm" tabindex="-1" aria-labelledby="adminPopupFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="adminPopupFormLabel">Order Management Form</h5>
                <button type="button" id="btnClose" onclick="closeModel()" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <div id="alertBox" class="alert d-none m-2" role="alert">
                <span id="message"></span>
            </div>
            <div class="modal-body">
                <form id="insertForm" class="m-4" enctype="multipart/form-data" autocomplete="off">
                    <div class="card-body">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group">
                            <label for="">OrderNumber </label>
                            <input type="text" class="form-control" name="OrderNumber" id="OrderNumber" value="">
                            <span class="error text-danger" id="OrderNumberError"></span><br><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CustomerName</label>
                            <input type="text" class="form-control" name="CustomerName" id="CustomerName" value="">
                            <span class="error text-danger" id="CustomerNameError"></span><br><br>

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">CustomerEmail</label>
                            <input type="text" id="CustomerEmail" class="form-control" name="CustomerEmail"
                                autocomplete="off" value="">
                            <span class="error text-danger" id="CustomerEmailError"></span><br><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">ProductName</label>
                            <input type="text" id="ProductName" class="form-control" name="ProductName"
                                autocomplete="new-password" value="">
                            <span class="error text-danger" id="ProductNameError"></span><br><br>
                        </div>
                        <div class="form-group">OrderAmount</label>
                            <input type="number" id="OrderAmount" class="form-control" name="OrderAmount" value="">
                            <span class="error text-danger" id="OrderAmountError"></span><br><br>
                        </div>


                        <div class="form-group">
                            <label>PaymentMethod</label>
                            <select class="form-control" id="PaymentMethod" name="PaymentMethod">
                                <option value="">Select PaymentMethod</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Bank Transfer">Bank Transfer</option>
                                <option value="COD">COD</option>
                            </select>
                            <span class="error text-danger" id="PaymentMethodError"></span><br><br>

                        </div>


                        <div class="form-group">
                            <label>Order Status</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="OrderStatus" value="Pending">
                                <label for="customRadio1" class="custom-control-label">Pending</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="OrderStatus" value="Processing">
                                <label for="customRadio1" class="custom-control-label">Processing</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="OrderStatus" value="Completed">
                                <label for="customRadio1" class="custom-control-label">Completed</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" name="OrderStatus" value="Cancelled">
                                <label for="customRadio1" class="custom-control-label">Cancelled</label>
                            </div>
                            <span class="error text-danger" id="OrderStatusError"></span><br><br>


                        </div>

                        <div class="form-group">
                            <label>DeliveryOptions:</label>

                            <div class="custom-control custom-checkbox">
                                <input class="DeliveryOptions custom-control-input" type="checkbox"
                                    name="DeliveryOptions[]" value="Express">
                                <label for="customCheckbox1" class="custom-control-label">Express</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="DeliveryOptions custom-control-input" type="checkbox"
                                    name="DeliveryOptions[]" value="Gift Wrap">
                                <label for="customCheckbox1" class="custom-control-label">Gift Wrap</label>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input class="DeliveryOptions custom-control-input" type="checkbox"
                                    name="DeliveryOptions[]" value="Insurance">
                                <label for="customCheckbox1" class="custom-control-label">Insurance</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="DeliveryOptions custom-control-input" type="checkbox"
                                    name="DeliveryOptions[]" value="Contactless">
                                <label for="customCheckbox1" class="custom-control-label">Contactless</label>
                            </div>
                            <span class="error text-danger" id="DeliveryOptionsError"></span><br><br>

                        </div>


                        <div class="form-group">
                            <label for="exampleInputFile">OrderDate</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="date" id="OrderDate" class="custom-file-input" name="OrderDate">
                                    <span class="error text-danger" id="OrderDateError"></span><br><br>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleTextarea">DeliveryAddress</label>
                            <textarea class="form-control" id="DeliveryAddress" rows="3" placeholder="Enter ..."
                                name="DeliveryAddress"></textarea>
                            <span class="error text-danger" id="DeliveryAddressError"></span><br><br>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">InvoiceFile</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="InvoiceFile" class="custom-file-input" name="InvoiceFile">
                                    <span class="error text-danger" id="InvoiceFileError"></span><br><br>
                                </div>

                            </div>
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
<!-- AdminLTE 4 Card Component -->
<div class="card card-primary card-outline m-2">
    <div class="card-header">
        <h3 class="card-title">Search Data</h3>
    </div>
    <div class="card-body">
        <form id="searchForm" class="row g-2">
            <div class="col-auto flex-grow-1">
                <!-- AdminLTE input styling -->
                <input type="search" name="inputSearch" id="inputSearch" class="form-control" placeholder="Search...">
            </div>
            <div class="col-auto ">
                <!-- AdminLTE button styling -->
                <button type="submit" name="btnSearch" id="btnSearch" class="btn btn-primary me-2">
                    <i class="fas fa-search"></i>
                    <!-- Reset button -->
                    <button type="reset" onclick="resetData()" class="btn btn-secondary">
                        <i class="fas fa-sync-alt"></i>
                    </button>
            </div>
        </form>
    </div>
</div>

<div id="tableContainer">
</div>
<script src="/exam/crud-ajax.js"></script>
<?php
include "./footer.php";