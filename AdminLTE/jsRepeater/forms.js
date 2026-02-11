$(document).ready(function () {
  $("#tableContainer").load("listProduct.php");

  $("#repeater-container").hide();

  $("#add-btn").click(function () {
    $("#repeater-container").show();
    createRow();
  });

  $(document).on("click", ".remove-btn", function () {
    $(this).closest(".variant-row").remove();

    if ($("#repeater-container .variant-row").length == 0) {
      $("#repeater-container").hide();
    }
  });

  $("#insertForm").submit(function (e) {
    e.preventDefault();
    $(".error, .error-message").remove();

    let isValid = true;

    if ($("#productName").val() == "") {
      $("#productError").text("Enter Product Name");
      isValid = false;
    }
    $(".error-message").remove();

    $("#repeater-container .row").each(function () {
      let row = $(this);

      if (row.find('input[name="size[]"]').val() == "") {
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
      inputField
        .parent()
        .parent()
        .before(
          '<span class="error error-message" style="color:red; display:block;">' +
            message +
            "</span>",
        );
    }

    if (!isValid) return;

    let formData = new FormData(this);

    $.ajax({
      type: "POST",
      url: "formsData.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        alert(response.message);
        if (response.status == "success") {
          resetFormAndMode();
          $("#tableContainer").load("listProduct.php");
        }
      },
      error: function (xhr) {
        console.error(xhr.responseText);
      },
    });
  });
});

function createRow(data = {}) {
  let rowHtml = `
    <div class="row g-2 align-items-center mb-2 variant-row">
        <div class="col-md-3">
            <input type="text" name="size[]" class="form-control form-control-sm"
                   placeholder="Size" value="${data.size || ""}">
        </div>
        <div class="col-md-2">
            <input type="number" name="qty[]" class="form-control form-control-sm"
                   placeholder="Qty" value="${data.qty || ""}">
        </div>
        <div class="col-md-3">
            <input type="text" name="color[]" class="form-control form-control-sm"
                   placeholder="Color" value="${data.color || ""}">
        </div>
        <div class="col-md-2">
            <input type="text" name="price[]" class="form-control form-control-sm"
                   placeholder="Price" value="${data.price || ""}">
        </div>
        <div class="col-md-2 text-center">
            <button type="button" class="btn btn-outline-danger btn-sm remove-btn">
                <i class="fas fa-minus"></i>
            </button>
        </div>
    </div>`;

  $("#repeater-container").append(rowHtml);
}

function editData(id) {
  $("#productError").text("");
  $("#productTitle").text("Update Product");
  $.ajax({
    url: "getProductDetails.php",
    type: "GET",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      if (!data || data.length === 0) return;
      $("#productName").val(data[0].productName);
      $("#product_id").val(data[0].product_id);

      $("#repeater-container").empty().show();
      // $("#add-btn").hide();
      
      $("#btnSubmit").attr("value", "Update");
      $("#btnReset").attr("value","New")
      $(".error, .error-message").remove();
      $(".error-message").hide();
       
      data.forEach((item) => createRow(item));
    },
  });
}

function deleteData(id) {
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
  $("#productTitle").text("Add Product");
  $("#btnSubmit").attr("value", "Submit");
  $("#btnReset").attr("value", "Reset");
  $("#add-btn").show();
  $("#repeater-container").empty().hide();
  $(".error, .error-message").remove();
  $(".error-message").hide();
  $("#productError").text("");
}
$("#btnReset").click(function(){
    resetFormAndMode();
});

