<?php


if (isset($_POST['login'])) {
$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";

$nm=$_POST['name'];
$pass=$_POST['password'];
// $ind=$_GET['ind'];


// echo $pass;

$ar=array("administrative_body","proctorial_body","hall_administration");
$redirect=array("administrative_admin_profile.php","proctor_admin_profile.php","hall_admin_profile.php");

if($nm=="admin1" && $pass="123")    
header("Location: administrative_admin_profile.php");
if($nm=="admin2" && $pass="123")    
header("Location: proctor_admin_profile.php");
if($nm=="admin3" && $pass="123")    
header("Location: hall_admin_profile.php");
if($nm=="admin4" && $pass="123")    
header("Location: library_admin_profile.php");
if($nm=="admin5" && $pass="123")    
header("Location: ict_cell_admin.php");
if($nm=="admin6" && $pass="123")    
header("Location: physical_education_and_medical_center_admin.php");
if($nm=="admin7" && $pass="123")    
header("Location: transport_and_finance_admin.php");
if($nm=="admin8" && $pass="123")    
header("Location: cse_dept_admin.php");

}

?>












<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Here is the AOS CSS file  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css
" rel="stylesheet">
    <Link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css
" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css
">
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript and Popper.js libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js
"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js
"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js
"></script>

    
</head>
<body class="">
<header>    
        <?php include_once('entry_page_header.php') ?>
</header>
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-7 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="return loginFormData()">
                <h3 class="text-center">Admin Login</h3>

                <div class="mb-3">
                    <label for="name">Email address</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Admin Name" onkeyup="validateEmail()" required />
                    <span id="name_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Your Password" onkeyup="validatePassword()" required />
                    <span id="password_err" class="text-danger"></span>
                </div>



                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="login">
                        Login
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>
</body>
</html>