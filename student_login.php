<?php


if (isset($_POST['login'])) {
$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";

$mail=$_POST['email'];
$pass=$_POST['password'];
// $ind=$_GET['ind'];


// echo $pass;

$ar=array("administrative_body","proctorial_body","hall_administration");
$redirect=array("administrative_admin_profile.php","proctor_admin_profile.php","hall_admin_profile.php");
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else 
{
    $sql="SELECT * FROM `student_profile` WHERE `email`='$mail'  and `password`='$pass';";
    //  $sql="SELECT * FROM `student_status` WHERE `roll`=19102019 and `regNumber`=7738;";
    if ($result = mysqli_query($conn, $sql))
    { 
        while ($row = mysqli_fetch_row($result))
         {
        setcookie("userMail", $mail, time() + 3600, "/");
        setcookie("userPass", $pass, time() + 3600, "/");
         header("Location: studend_profile.php");
       
         }
    
            echo "some error occured.";
      
    }

}
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
                <h3 class="text-center">Login</h3>

                <div class="mb-3">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email Address" onkeyup="validateEmail()" required />
                    <span id="email_err" class="text-danger"></span>
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
                <!-- <p class="forgot-password text-right mt-2">
                    <a href="forget_password.php">Forgot password?</a>
                </p> -->
                <br><br>
                <p class="forgot-password text-right">
                    Do you have any account?
                    <a href="student_sign_up.php">sign up?</a>
                </p>
            </form>

        </div>
    </div>
</div>

<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>
</body>
</html>