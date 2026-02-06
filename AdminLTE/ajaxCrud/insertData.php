 <?php
 // Set the content type header for a JSON response
// header('Content-Type: application/json');
    include "connection.php";
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $address = $_POST["address"];
    $phoneNumber = $_POST["phoneNumber"];
    $gender = $_POST["gender"] ?? '';
    $hobbies = $_POST["hobbies"] ?? [];
    $country = $_POST["countryName"];
    $photo = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }
    $uploaddir = "uploads/";
    $targetdir = $uploaddir . $photo;
    move_uploaded_file($tmp_name, $targetdir);
    $hob = implode(",", $hobbies);
    $hasPassword = password_hash($password, PASSWORD_DEFAULT);
    $hasConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
    try {
        $query = "insert into ajaxCrud(firstName,lastName,email,password,confirmPassword,address,phonenumber,gender,hobbies,country,image) values(
           '$firstName','$lastName','$email','$hasPassword','$hasConfirmPassword','$address','$phoneNumber','$gender','$hob','$country','$targetdir')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            $response['status'] = 'success';
            $response['message'] = 'Successfully registered!';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Registration failed. Please try again.';
        }
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() === 1062) {
            $response['status'] = 'error';
            $response['message'] = "The email $email is already registered. Please use a different email.";
        } else {
            $response['status'] = 'error';
            $response['message'] = 'A database error occurred. Please try again later.';
        }
    }

echo json_encode($response);
// echo "hy";
