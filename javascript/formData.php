<?php
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phonenumber = $_POST["phonenumber"];
    $gender = $_POST["gender"];
    $hobbies = $_POST["hobbies"];
    $hob=implode(",", $hobbies);
    $city = $_POST["city"];

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <table border="1" cellpadding="10" style="border-collapse: collapse; width: 50%;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>Field</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr><td><strong>Name</strong></td><td><?php echo ($name); ?></td></tr>
        <tr><td><strong>Email</strong></td><td><?php echo ($email); ?></td></tr>
        <tr><td><strong>Password</strong></td><td><?php echo ($password); ?></td></tr>
        <tr><td><strong>Phone</strong></td><td><?php echo ($phonenumber); ?></td></tr>
        <tr><td><strong>Gender</strong></td><td><?php echo ($gender); ?></td></tr>
        <tr><td><strong>Hobbies</strong></td><td><?php echo ($hob); ?></td></tr>
        <tr><td><strong>City</strong></td><td><?php echo ($city); ?></td></tr>
    </tbody>
</table>
    </body>
    </html>