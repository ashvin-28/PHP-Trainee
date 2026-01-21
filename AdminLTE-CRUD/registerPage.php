<!DOCTYPE html>
<html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <title>Register Form</title>
            <!--begin::Accessibility Meta Tags-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
            <meta name="color-scheme" content="light dark" />
            <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
            <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
            <!--end::Accessibility Meta Tags-->
            <!--begin::Primary Meta Tags-->
            <meta name="title" content="AdminLTE v4 | Dashboard" />
            <meta name="author" content="ColorlibHQ" />
            <meta
                name="description"
                content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS. Fully accessible with WCAG 2.1 AA compliance." />
            <meta
                name="keywords"
                content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel, WCAG compliant" />
            <!--end::Primary Meta Tags-->
            <!--begin::Accessibility Features-->
            <!-- Skip links will be dynamically added by accessibility.js -->
            <meta name="supported-color-schemes" content="light dark" />
            <link rel="preload" href="dist/css/adminlte.css" as="style" />
            <!--end::Accessibility Features-->
            <!--begin::Fonts-->
            <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
                integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
                crossorigin="anonymous"
                media="print"
                onload="this.media='all'" />
            <!--end::Fonts-->
            <!--begin::Third Party Plugin(OverlayScrollbars)-->
            <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
                crossorigin="anonymous" />
            <!--end::Third Party Plugin(OverlayScrollbars)-->
            <!--begin::Third Party Plugin(Bootstrap Icons)-->
            <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
                crossorigin="anonymous" />
            <!--end::Third Party Plugin(Bootstrap Icons)-->
            <!--begin::Required Plugin(AdminLTE)-->
            <link rel="stylesheet" href="dist/css/adminlte.css" />
            <!--end::Required Plugin(AdminLTE)-->
            <!-- apexcharts -->
            <link
                rel="stylesheet"
                href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
                integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
                crossorigin="anonymous" />

        </head>
<?php
include "connection.php";
$errors = [];
$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = trim($_POST["firstName"]);
    $lastName = trim($_POST["lastName"]);
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if ($firstName == "" || strlen($firstName < 3)) {
        $errors[] = "First Name contain at least 3 character";
    }
    if ($lastName == "" || strlen($lastName < 3)) {
        $errors[] = " Last Name contain at least 3 character";
    }
    if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
        $errors[] = "Email in specific format";
    }
   
    if($password=="" || strlen($password)<8)
         {
             $errors[]="Password contain eight character";
         }
    else if(!preg_match($pattern, $password)){
            $errors[]="Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
    }
    elseif ($confirmPassword != $password) {
        $errors[] = "Confirm password has same as password";
    }
 
            

    if (empty($errors)) {

        $hasPassword = password_hash($password, PASSWORD_DEFAULT);
        $hasConfirmPassword = password_hash($confirmPassword, PASSWORD_DEFAULT);
    
        $query = "insert into employee(firstName,lastName,email,password,confirmPassword) values(
           '$firstName','$lastName','$email','$hasPassword','$hasConfirmPassword')";
        $result = mysqli_query($conn, $query) or die ('Error querying database.');
        if ($result) {

            echo "<script>alert('Register Sucessfully');
                 window.location.href='loginPage.php';
                </script>";
        } else {
           
        }
    }
} 
?>


<body>
    <div class=" m-auto mt-3 w-50 card card-primary card-outline mb-4">
      
        <!--begin::Header-->
     
        <!--end::Header-->
        <!--begin::Form-->
        <div class="card card-primary m-4">
            <div class="card-header">
                <h3 class="card-title">Register Form</h3>

            </div>
            <?php
            if ($errors) {
            ?>
                <div class="alert alert-danger alert-dismissible m-2">
                    <button type="button" class="close " data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                        <?php foreach ($errors as  $error_message): ?>
                            <li><?php echo $error_message;  ?></li>

                        <?php endforeach;
                        ?>
                    </ul>
                </div>
            <?php
            }
            ?>
        </div>

        <form class="m-4" method="POST" autocomplete="off">
            <div class="card-body">

                <div class="form-group">
                    <label for="">First Name: </label>
                    <input type="text" class="form-control" name="firstName">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lastName">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" autocomplete="new-password">
                </div>
                <div class="form-group">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword">
                </div>
                <div class="card-footer m-2">
                    <button type="submit" class="btn btn-primary">Register</button>
                     <p class="mb-0">
                        Already Registerd?
                       <a href="loginPage.php" class="text-center">Login</a>
                     </p>
                </div>
        </form>
    </div>
    <!--end::Form-->
    </div>


</body>

<!--end::App Wrapper-->
<!--begin::Script-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="dist/js/adminlte.js"></script>
<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->

<script
    src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8="
    crossorigin="anonymous"></script>
<!-- ChartJS -->
<script
    src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
    integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y="
    crossorigin="anonymous"></script>
<script
    src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
    integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY="
    crossorigin="anonymous"></script>
<!-- jsvectormap -->

<!--end::Script-->

</html>