$(document).ready(function () {
  $("#myForm").submit(function (e) {
    e.preventDefault();
    let name = $("#name").val();
    let email = $("#email").val();
    let file = $("#file")[0];

    if (name == "") {
      $("#responseMessage").html("Enter name");
      return;
    }
    if (email == "") {
      $("#responseMessage").html("Enter email");
      return;
    }
    if (file.files.length==0) {
      $("#responseMessage").html("upload file");
      return;
    }
    if ($(".hobby:checked").length == 0) {
      $("#responseMessage").text("Select at least one hobby");
      return;
    }
    var formData = new FormData(this);
    var formObject = Object.fromEntries(formData.entries());
    console.log(formObject);
    $.ajax({
      url: "formData.php",
      type: "POST",
      data: formData,
      success: function (response) {
        console.log(response);  
        $("#responseMessage").html(response);
      },
      error: function (xhr, status, error) {
        $("#responseMessage").html("An error occurred: " + error);
      },
      processData: false,
      contentType: false,
    });
  });
});
