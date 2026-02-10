<?php 
session_start(); 
if (!isset($_SESSION['email'])) { 
    header("Location:../loginPage.php"); 
} 
include "connection.php"; 
include "../header.php"; 
include "../sidebar.php"; 
?>

<!-- Content Wrapper -->
<div class="app-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Side: Form -->
            <div class="col-md-5">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add New Product</h3>
                    </div>
                    <form action="" id="insertForm" method="POST">
                        <div class="card-body">
                            <input type="hidden" id="product_id" name="product_id">
                            <div class="form-group mb-3">
                                <label for="productName">Product Name</label>
                                <input type="text" name="productName" id="productName" class="form-control" placeholder="Enter product name">
                                <span id="productError" class="error text-danger"></span>
                            </div>
                            <div id="repeater-container">
                                <label>Variants</label>
                            </div>
                            <button type="button" id="add-btn" class="btn btn-secondary mt-2">
                                <i class="fas fa-plus"></i> Add Variant
                            </button>
                        </div>
                        <div class="card-footer">
                            <input type="submit" id="btnSubmit" name="submit" value="Submit Product" class="btn btn-primary w-100">
                        </div>
                    </form>
                </div>
            </div>

            <!-- Right Side: Table -->
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product List</h3>
                    </div>
                    <div class="card-body p-0">
                        <div id="tableContainer">
                            <!-- Table will be loaded here via JS -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="forms.js"></script>
<?php include "../footer.php"; ?>
