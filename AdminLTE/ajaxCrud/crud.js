// function loadData() {
//     // console.log("load")
//   }
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
  console.log(countryName);

  console.log("form");
  if (firstName == "") {
    $("#firstNameError").text("First Name contain at least 3 character");
    isValid = false;
  }
  if (lastName == "") {
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
      processData: false,
      contentType: false,
      success: function (response) {
        console.log("hello");
       console.log(response);
        if(response.status=="success"){
        console.log(response.message);
            //   loadData();
            $("#message").html(response.message);
            $("#insertForm")[0].reset();
        }
        else{
        console.log(response.message);
            $("#message").html(response.message);
        }
      },
      error: function (xhr, status, error) {
        console.error("Error: " + status + " - " + error);
        console.log(xhr.responseText);
      },
    });
  }
});
