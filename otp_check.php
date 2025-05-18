<?php
  session_start();

  $email = $_SESSION['page1_data']['mail'];
  $name=$_SESSION['page1_data']['fullName'];




  $count = isset($_COOKIE['click_count']) ? intval($_COOKIE['click_count']) : 0;

  $otpName=$email."_otp";


  if (isset($_POST['otp_button'])){
    //   echo $_POST['otp'];
      $count++;
      setcookie('click_count', $count, time() + (60 * 60 * 24 ), '/');
    if($_SESSION[$otpName]==$_POST['otp'] && $count<4){
         header("Location: create_student_profile.php");
        echo "yes";
    }
  }


  if($cout==3){
      echo "You are out of try!";
  }
//   echo $count;

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
<body>

<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-7 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" >
                <h2 class="text-center">Verify Your Mail</h2><br><br>
                <p>An opt has been sent to your mail.Please submit the OTP code.That will verify your email.</p>
                
                <div class="mb-3">
                    <label for="otp">OTP CODE</label>
                    <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter Your OTP Code"  required/>
                    <span id="otp_err" class="text-danger"></span>
                </div>
                
                <div class="">
                    <button type="submit" class="btn btn-primary" name="otp_button">
                        Submit
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
</body>
</html>