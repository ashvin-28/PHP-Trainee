<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
    <form action="" id="insertForm">
        <input type="hidden" id="product_id" name="product_id">
 <input type="text" name="productName" id="productName" placeholder="ProductName">
 <span  id="productError" name="productError" class="error text-danger"></span>
        <div id="repeater-container" >
           
        </div>
        <button type="button" id="add-btn">Add Variant</button>
        <input type="submit" id="btnSubmit" name="submit" value="Submit">
    </form> 
<div id="tableContainer">

</div>
<script src="forms.js"></script>
</body>
</html>