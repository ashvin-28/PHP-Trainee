$(document).ready(function () {
  $("#myForm").submit(function (e) {
    e.preventDefault();
    $(".error").text("");
    let isValid = true;
    let name = $("#name").val();
    if (name == "") {
      $("#nameErr").text("Name is required");
      isValid = false;
    }
    let email = $("#email").val();
    let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email == "") {
      $("#emailErr").text("Email is required");
      isValid = false;
    } else if (!email.match(emailPattern)) {
      $("#emailErr").text("Email is specefic format");
      isValid = false;
    }
    let password = $("#password").val();
    if (password == "" || password.length < 8) {
      $("#passErr").text("Password contain 8 character");
      isValid = false;
    }
    let mobile = $("#mobile").val();
    if (mobile == "" || !$.isNumeric(mobile) || mobile.length != 10) {
      $("#mobErr").text("Enter valid 10 digit number");
      isValid = false;
    }
    if (!$("input[name='gender']:checked").val()) {
      $("#genderErr").text("Select gender");
      isValid = false;
    }
    if ($(".hobby:checked").length == 0) {
      $("#hobbyErr").text("Select at least one hobby");
      isValid = false;
    }
    if ($("#city").val() == "") {
      $("#cityErr").text("Select city");
      isValid = false;
    }

    if (isValid) {
      alert("form submitted sucessfully");
      console.log(name);
      this.submit();
      // window.location.href = "formData.php";
    }
  });
});
