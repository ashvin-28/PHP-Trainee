<!DOCTYPE html>
<html>

<head>
  <title>jQuery Validation</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="validation.js"></script>


  <style>
    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <form id="myForm" method="POST" action="formData.php">

    Name: <input type="text" id="name" name="name">
    <span class="error" id="nameErr"></span><br><br>

    Email: <input type="text" id="email" name="email">
    <span class="error" id="emailErr"></span><br><br>

    Password: <input type="password" id="password" name="password">
    <span class="error" id="passErr"></span><br><br>

    Mobile: <input type="text" id="mobile" name="phonenumber">
    <span class="error" id="mobErr"></span><br><br>

    Gender:
    <input type="radio" name="gender" value="male"> Male
    <input type="radio" name="gender" value="female"> Female
    <span class="error" id="genderErr"></span><br><br>

    Hobbies:
    <input type="checkbox" class="hobby" value="cricket" name="hobbies[]"> Cricket
    <input type="checkbox" class="hobby" value="music" name="hobbies[]"> Music
    <span class="error" id="hobbyErr"></span><br><br>

    City:
    <select id="city" name="city">
      <option value="">Select</option>
      <option value="Ahmedabad">Ahmedabad</option>
      <option value="Surat">Surat</option>
    </select>
    <span class="error" id="cityErr"></span><br><br>

    <button name="btnSubmit" type="submit">Submit</button>

  </form>


</body>

</html>