var isEditMode;
$("#tableContainer").load("/PHP-Trainee/AdminLTE/ajaxCrud/list.php");
$(document).ready(function () {
  closeModel();
  $("#tableContainer").load("/PHP-Trainee/AdminLTE/ajaxCrud/list.php");
});
$("#insertForm").submit(function (e) {
  e.preventDefault();
  $(".error").text("");
  let isValid = true;
  let firstName = $("#firstName").val();
  let lastName = $("#lastName").val();
  let email = $("#email").val();
  let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  let password = $("#password").val();
  let strongPasswordRegex =
    /^(?!.*\s)(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()\-+={}[\]|\\:;"'<>,.?/_₹]).{8,16}$/;
  let confirmPassword = $("#confirmPassword").val();
  let address = $("#address").val();
  let phoneNumber = $("#phoneNumber").val();
  let photo = $("#image")[0];
  countryName = $("#countryName").val();
  isEditMode = $("#emp_id").val() != "" && $("#emp_id").val() != undefined;
  if (firstName == "" || firstName.length < 3) {
    $("#firstNameError").text("First Name contain at least 3 character");
    isValid = false;
  }
  if (lastName == "" || lastName.length < 3) {
    $("#lastNameError").text("Last Name contain at least 3 character");
    isValid = false;
  }
  if (email == "") {
    $("#emailError").text("Email is required");
    isValid = false;
  } else if (!email.match(emailPattern)) {
    $("#emailError").text("Email is specefic format");
    isValid = false;
  }
  if (!isEditMode) {
    if (password == "") {
      $("#passwordError").text("Insert password");
      isValid = false;
    } else if (!password.match(strongPasswordRegex)) {
      $("#passwordError").text(
        "Your password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character",
      );
      isValid = false;
    }
    if (confirmPassword == "") {
      $("#confirmPasswordError").text("Insert confirm password");
      isValid = false;
    } else if (password != confirmPassword) {
      $("#confirmPasswordError").text("confirm passsword same as password");
      isValid = false;
    }
    if (photo.files.length == 0) {
      $("#fileError").text("Upload image");
      isValid = false;
    }
  }
  if (address == "") {
    $("#addressError").text("Etner address");
    isValid = false;
  }

  if (
    phoneNumber == "" ||
    !$.isNumeric(phoneNumber) ||
    phoneNumber.length != 10
  ) {
    $("#phoneNumberError").text("Enter valid 10 digit number");
    isValid = false;
  }
  if (!$("input[name='gender']:checked").val()) {
    $("#genderError").text("Select gender");
    isValid = false;
  }
  if ($(".hobbies:checked").length == 0) {
    $("#hobbiesError").text("Select at least one hobby");
    isValid = false;
  }
  if (countryName == "") {
    console.log("country");
    $("#countryError").text("Select country");
    isValid = false;
  }

  if (isValid) {
    let formData = new FormData(this);
    var formObject = Object.fromEntries(formData.entries());
    console.log(formObject);
    $.ajax({
      type: "POST",
      url: "/PHP-Trainee/AdminLTE/ajaxCrud/insertData.php",
      data: formData,
      dataType: "json",
      processData: false,
      contentType: false,
      success: function (response) {
        $("#alertBox").removeClass("d-none");
        if (response.status == "success") {
          resetFormAndMode();
          let modal = bootstrap.Modal.getInstance($("#adminPopupForm"));
          if (modal) modal.hide();

          $("#tableContainer").load("/PHP-Trainee/AdminLTE/ajaxCrud/list.php");
        } else {
          $("#alertBox").addClass("alert-danger");
          $("#message").text(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error: " + status + " - " + error);
        console.log(xhr.responseText);
      },
    });
  }
});

function deleteData(id) {
  if (confirm("Are you sure?")) {
    $.ajax({
      type: "POST",
      url: "/PHP-Trainee/AdminLTE/ajaxCrud/delete.php",
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
  $("#updatedImage").removeClass("d-none");
  isEditMode = true;
  $("#alertBox").addClass("d-none");
  $.ajax({
    url: "/PHP-Trainee/AdminLTE/ajaxCrud/getSingleRecord.php",
    type: "POST",
    data: { id: id },
    dataType: "json",
    success: function (data) {
      $("#emp_id").val(data.emp_id);
      $("#firstName").val(data.firstName);
      $("#lastName").val(data.lastName);
      $("#email").val(data.email);
      $("#address").val(data.address);
      $("#phoneNumber").val(data.phonenumber);
      $("#countryName").val(data.country);
      $("#updatedImage").attr("src", data.image);

      $("input[name='gender'][value='" + data.gender + "']").prop(
        "checked",
        true,
      );

      $(".hobbies").prop("checked", false);
      data.hobbies.split(",").forEach((h) => {
        $(".hobbies[value='" + h + "']").prop("checked", true);
      });

      $("button[type='submit']").text("Update");
    },
  });
}

function closeModel() {
  resetFormAndMode();
  $("#alertBox").addClass("d-none");
}
function resetFormAndMode() {
  $("#insertForm")[0].reset();
  $("#emp_id").val("");
  isEditMode = false;
  $("button[type='submit']").text("Submit");
  $(".error").text("");

}
function addData() {
  $("#alertBox").addClass("d-none");
  $("#updatedImage").addClass("d-none");

}

