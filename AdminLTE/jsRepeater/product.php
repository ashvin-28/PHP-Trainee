<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location:../loginPage.php");
}
include "connection.php";
include "../header.php";
include "../sidebar.php";
?>

<div class="app-content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-5">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title fw-bold" id="productTitle">Add Product</h3>
                    </div>

                    <form id="insertForm">
                        <div class="card-body" id="productExist">

                            <input type="hidden" id="product_id" name="product_id">

                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" id="productName" name="productName"
                                    class="form-control" placeholder="Enter product name">
                                <small class="text-danger" id="productError"></small>
                            </div>


                            <button type="button" id="add-btn"
                                class="btn btn-outline-primary btn-sm mt-2 mb-2">
                                Add Variant
                            </button>
                            <div id="repeater-container">
                            </div>

                        </div>

                        <div class="card-footer button-container">
                            <input type="submit" id="btnSubmit" value="Submit" class="btn btn-primary">
                           <input type="button" id="btnReset" value="Reset" class="btn btn-outline-success">

                        </div>

                    </form>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="card card-outline card-secondary">
                    <div class="card-header">
                        <h3 class="card-title fw-bold">Product List</h3>
                    </div>

                    <div class="card-body p-2">
                        <div id="tableContainer"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="forms.js"></script>

<?php include "../footer.php"; ?>