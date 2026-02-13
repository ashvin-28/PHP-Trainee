$(document).ready(function () {
  $("#searchForm").submit(function (e) {
    e.preventDefault();
    let inputSearch = $("#inputSearch").val();
    $.ajax({
      type: "POST",
      url: "/exam/fetchTable.php",
      data: { inputSearch: inputSearch },
      success: function (response) {
        $("#tableContainer").html(response);
      },
    });
  });
  $("#tableContainer").load("/exam/fetchTable.php");
});
function resetData(){
  $("#tableContainer").load("/exam/fetchTable.php");
}
$("#insertForm").submit(function (e) {
  e.preventDefault();
  $(".error").text("");
  let isValid = true;
  let OrderNumber = $("#OrderNumber").val();
  let CustomerName = $("#CustomerName").val();
  let CustomerEmail = $("#CustomerEmail").val();
  let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  let ProductName = $("#ProductName").val();
  let OrderAmount = $("#OrderAmount").val();
  let orderDate = $("#OrderDate").val();
  let DeliveryAddress = $("#DeliveryAddress").val();
  let PaymentMethod = $("#PaymentMethod").val();
  let InvoiceFile = $("#InvoiceFile")[0];
  isEditMode = $("#id").val() != "" && $("#id").val() != undefined;
  if (OrderNumber == "") {
    $("#OrderNumberError").text("Enter order Number");
    isValid = false;
  }
  if (CustomerName == "") {
    $("#CustomerNameError").text("Enter customer name");
    isValid = false;
  }
  if (CustomerEmail == "") {
    $("#CustomerEmailError").text("Email is required");
    isValid = false;
  } else if (!CustomerEmail.match(emailPattern)) {
    $("#CustomerEmailError").text("Email is specefic format");
    isValid = false;
  }
  if (ProductName == "") {
    $("#ProductNameError").text("Insert product name");
    isValid = false;
  }
  if (orderDate == "") {
    $("#orderDateError").text("Enter order date");
    isValid = false;
  }
  if (OrderAmount == "") {
    $("#OrderAmountError").text("Insert Order Amount");
    isValid = false;
  }
  if (!isEditMode) {
    if (InvoiceFile.files.length == 0) {
      $("#InvoiceFileError").text("Upload File");
      isValid = false;
    }
  }

  if (DeliveryAddress == "") {
    $("#DeliveryAddressError").text("Enter address");
    isValid = false;
  }

  if (!$("input[name='OrderStatus']:checked").val()) {
    $("#OrderStatusError").text("Select order Status");
    isValid = false;
  }
  if ($(".DeliveryOptions:checked").length == 0) {
    $("#DeliveryOptionsError").text("Select at least one DeliveryOptions");
    isValid = false;
  }
  if (PaymentMethod == "") {
    $("#PaymentMethodError").text("Select PaymentMethod");
    isValid = false;
  }
  if (isValid) {
    let formData = new FormData(this);
    var formObject = Object.fromEntries(formData.entries());
    console.log(formObject);
    $.ajax({
      type: "POST",
      url: "/exam/insertRecord.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        let modal = bootstrap.Modal.getInstance($("#adminPopupForm"));
        if (modal) modal.hide();
        $("#alertBox").removeClass("d-none");
        if (response.status == "success") {
          resetFormAndMode();
          let modal = bootstrap.Modal.getInstance($("#adminPopupForm"));
          if (modal) modal.hide();
          alert(response.message);
          $("#tableContainer").load("/exam/fetchTable.php");
        } else {
          $("#alertBox").addClass("alert-danger");
          $("#message").text(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.log("error");
        console.error("Error: " + status + " - " + error);
      },
    });
  }
});

function deleteData(id) {
  if (confirm("Are you sure?")) {
    $.ajax({
      type: "POST",
      url: "/exam/delete.php",
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

function editData(id) {
  console.log("Editing ID:", id);
  isEditMode = true;
  $("#alertBox").addClass("d-none");

  $.ajax({
    url: "/exam/getSingleRecord.php",
    type: "POST",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      console.log("Data received:", data.OrderNumber);
      $("#id").val(data.id);
      $("#OrderNumber").val(data.OrderNumber);
      $("#CustomerName").val(data.CustomerName);
      $("#CustomerEmail").val(data.CustomerEmail);
      $("#ProductName").val(data.ProductName);
      $("#OrderAmount").val(data.OrderAmount);
      $("#OrderAmount").val(data.OrderAmount);
      $("#PaymentMethod").val(data.PaymentMethod);
      $("#DeliveryAddress").val(data.DeliveryAddress);
      $("#OrderDate").val(data.OrderDate);

      $("input[name=OrderStatus][value='" + data.OrderStatus + "']").prop(
        "checked",
        true,
      );

      $(".DeliveryOptions").prop("checked", false);
      if (data.DeliveryOptions) {
        data.DeliveryOptions.split(",").forEach((h) => {
          $(".DeliveryOptions[value='" + h + "']").prop("checked", true);
        });
      }
      $("button[type=submit]").text("Update");
    },
    error: function (xhr, status, error) {
      console.error("AJAX Error:", status, error);
      console.error("Response Text:", xhr.responseText);
    },
  });
}

function resetFormAndMode() {
  $("#insertForm")[0].reset();
  $("#id").val("");
  $("button[type='submit']").text("Submit");
  $(".error").text("");
  isEditMode = false;
}
function addData() {
  $("#alertBox").addClass("d-none");
}
function closeModel() {
  resetFormAndMode();
  $("#alertBox").addClass("d-none");
}
