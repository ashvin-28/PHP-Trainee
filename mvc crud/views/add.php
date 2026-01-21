<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../index.php?action=store" method="POST" enctype="multipart/form-data" autocomplete="off">
        <label for="">First Name: </label>
        <input type="text" name="firstName">
        <br>
        <label for="">Last Name: </label>
        <input type="text" name="lastName">
        <br>
        <label for=""> Email: </label>
        <input type="email" name="email" autocomplete="off">

        <br>
        <label for=""> Password: </label>
        <input type="password" name="password" autocomplete="off">

        <br>
        <label for=""> Confirm Password: </label>
        <input type="password" name="confirmPassword" autocomplete="new-password">

        <br>
        <label for=""> Profile Image: </label>
        <input type="file" name="image">

        <br>
        <label for=""> Address: </label>
        <textarea name="address" id=""></textarea>

        <br>
        <label for=""> Phone Number: </label>
        <input type="number" name="phoneNumber" id="">
        <br>


        <label for=""> Gender: </label>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female

        <br>
        <label for=""> Hobbies: </label>
        <input type="checkbox" name="hobbies[]" value="Playing">Playing
        <input type="checkbox" name="hobbies[]" value="Reading">Reading

        <br>
        <label for="">Country: </label>
        <select name="countryName">
            <option value="Select Country">Select Country</option>
            <option value="India">India</option>
            <option value="USA">USA</option>
            <option value="Australia">Australia</option>
        </select>

        <br>
        <input type="submit" name="submit" value="Insert Data">

    </form>

</body>

</html>