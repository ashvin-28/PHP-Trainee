$("#tableContainer").load("listProduct.php");
$(document).ready(function () {
  $("#tableContainer").load("listProduct.php");
  $("#repeater-container").hide();
});

var rowCount = 0;

function createRow() {
  const rowHtml = `
<div class="row">
    <input type="text" name="size[]" placeholder="Size">
    <input type="number" name="qty[]" placeholder="Qty">
    <input type="text" name="color[]" placeholder="Color">
    <input type="text" name="price[]" placeholder="Price">
    <button type="button" class="remove-btn">Remove</button>
</div>`;
  $("#repeater-container").append(rowHtml);
  rowCount++;
}

$("#add-btn").click(function () {
  $("#repeater-container").show();
  createRow();
});

$(document).on("click", ".remove-btn", function () {
  if ($("#repeater-container .row").length >= 1) {
    $(this).closest(".row").remove();
  }
});
$("#insertForm").submit(function (e) {
  e.preventDefault();
  $(".error").text("");

  let isValid = true;

  let productName = $("#productName").val();
  if (productName == "") {
    $("#productError").text("Enter Product");
    isValid = false;
  }
  $(".error-message").remove(); 

    $("#repeater-container .row").each(function() {
        let row = $(this);
        
        if (row.find('input[name="size[]"]').val().trim() === "") {
            showError(row.find('input[name="size[]"]'), "Size is required");
            isValid = false;
        }
        
        let qty = row.find('input[name="qty[]"]').val();
        if (qty.trim() === "" || qty <= 0) {
            showError(row.find('input[name="qty[]"]'), "Valid Qty required");
            isValid = false;
        }

        if (row.find('input[name="color[]"]').val().trim() === "") {
            showError(row.find('input[name="color[]"]'), "Color is required");
            isValid = false;
        }

        if (row.find('input[name="price[]"]').val().trim() === "") {
            showError(row.find('input[name="price[]"]'), "Price is required");
            isValid = false;
        }
    });
function showError(inputField, message) {
    inputField.after('<span class="error error-message" style="color:red; display:block;">' + message + '</span>');
}

  if (isValid) {
    let formData = new FormData(this);
    console.log(formData.get("productName"));
    console.log(formData.get("product_id"));
    console.log("hy");
    $.ajax({
      type: "POST",
      url: "formsData.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        if (response.status == "success") {
            resetFormAndMode();
          $("#tableContainer").load("listProduct.php");
              alert(response.message);
          
        } else {
              alert(response.message);
            console.log(response.message);
          $("#message").text(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText); 
      },
    });
  }
});

function editData(id) {
  $.ajax({
    url: "getProductDetails.php",
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      if (data && data.length > 0) {
        $("#productName").val(data[0].productName);
        console.log(data[0].productName);
        $("#product_id").val(data[0].product_id);
        console.log(data[0].product_id);
        $("#repeater-container").empty().show();
        $("#add-btn").hide();
           $("#btnSubmit").attr("value","Update");

        data.forEach(function (item) {
          const rowHtml = `
            <div class="row">
                <input type="text" name="size[]" value="${item.size}" placeholder="Size">
                <input type="number" name="qty[]" value="${item.qty}" placeholder="Qty">
                <input type="text" name="color[]" value="${item.color}" placeholder="Color">
                <input type="text" name="price[]" value="${item.price}" placeholder="Price">
            </div>`;
          $("#repeater-container").append(rowHtml);
        });
      }
    },
    error: function(xhr) {
        console.error(xhr.responseText);
    }
  });
}
function deleteData(id){
    if (confirm("Are you sure?")) {
    $.ajax({
      type: "POST",
      url: "delete.php",
      data: { id: id },
      success: function (response) {
        console.log(id);
        if (response == "success") {
          alert("Data Deleted Successfully");
          $("#row_" + id).remove();
        } else {
          alert("Delete Failed");
        }
      },
    });
  }
}
function resetFormAndMode() {
  $("#insertForm")[0].reset();
  $("#product_id").val("");
   $("#btnSubmit").attr("value","Submit");
  $(".error").text("");
   $("#repeater-container").empty().show();
    $("#add-btn").show();

}
