<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $_SESSION['page1_data'] = $_POST;

    // $imageName = $_FILES["student_profile_image"]["name"];
    // $imageType = $_FILES["student_profile_image"]["type"];
    // $imageSize = $_FILES["student_profile_image"]["size"];
    // $imageTmp = $_FILES["student_profile_image"]["tmp_name"];


      // Function to generate a random numeric OTP code
      function generateOTP($length = 6) {
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= mt_rand(0, 9); // Generate a random digit (0-9)
        }
        return $otp;
       }
    
    
    $otpCode = generateOTP();
    
    include 'mail_template.php';
    
    $subject="Verification Code.";
    $body="Your verification code is : ".$otpCode;
     sendEmail($_POST['mail'],$_POST['fullName'],$subject,$body);


    $otpName=$_POST['mail']."_otp";
    $_SESSION[$otpName] = $otpCode ;

    $targetDirectory = 'requested_profile_picturers/';
    $uniqueFilename=uniqid()."_" . basename($_FILES["student_profile_image"]["name"]);
    $targetPath=$targetDirectory.$uniqueFilename;

    if(move_uploaded_file($_FILES["student_profile_image"]["tmp_name"],$targetPath))
    {
        $_SESSION['profileImagePath']=$uniqueFilename;
         header("Location: otp_check.php");
        // header("Location: create_student_profile.php");
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Here is the AOS CSS file  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <Link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- JavaScript and Popper.js libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>

    <script>
        function validateForm() {
            // Clear any previous error messages
            clearErrors();

            // Variables for validation
            let isValid = true;

            // Full Name validation
            const fullName = document.getElementById("fullName").value;
            if (fullName.trim() === "") {
                showError("fullName_err", "Full Name is required.");
                isValid = false;
            }

            // Roll validation (must be a number)
            const roll = document.getElementById("roll").value;
            if (roll.trim() === "") {
                showError("roll_err", "Roll is required.");
                isValid = false;
            } else if (isNaN(roll)) {
                showError("roll_err", "Roll must be a number.");
                isValid = false;
            }

            // Registration Number validation (must be a number)
            const reg = document.getElementById("Reg").value;
            if (reg.trim() === "") {
                showError("Reg_err", "Registration Number is required.");
                isValid = false;
            } else if (isNaN(reg)) {
                showError("Reg_err", "Registration Number must be a number.");
                isValid = false;
            }

            // Session validation (e.g., "2020-21")
            const session = document.getElementById("session").value;
            if (session.trim() === "") {
                showError("session_err", "Session is required.");
                isValid = false;
            } else if (!/^\d{4}-\d{2}$/.test(session)) {
                showError("session_err", "Session must be in the format YYYY-YY.");
                isValid = false;
            }

            // Father's Name validation
            const fatherName = document.getElementById("fatherName").value;
            if (fatherName.trim() === "") {
                showError("fatherName_err", "Father's Name is required.");
                isValid = false;
            }

            // Mother's Name validation
            const motherName = document.getElementById("motherName").value;
            if (motherName.trim() === "") {
                showError("motherName_err", "Mother's Name is required.");
                isValid = false;
            }

            // CGPA validation (must be a number between 0 and 4)
            const cgpa = document.getElementById("cgpa").value;
            if (cgpa.trim() === "") {
                showError("cgpa_err", "CGPA is required.");
                isValid = false;
            } else if (isNaN(cgpa) || cgpa < 0 || cgpa > 4) {
                showError("cgpa_err", "CGPA must be a number between 0 and 4.");
                isValid = false;
            }

            // Department validation
            const dept = document.getElementById("dept").value;
            if (dept.trim() === "") {
                showError("dept_err", "Department is required.");
                isValid = false;
            }

            // Hall Name validation
            const hallName = document.getElementById("hallName").value;
            if (hallName.trim() === "") {
                showError("hallName_err", "Hall Name is required.");
                isValid = false;
            }

            // Phone Number validation (must be a valid phone number)
            const phn = document.getElementById("phn").value;
            if (phn.trim() === "") {
                showError("phn_err", "Phone Number is required.");
                isValid = false;
            } else if (!/^\d{10,15}$/.test(phn)) {
                showError("phn_err", "Phone Number must be a valid number.");
                isValid = false;
            }

            // Email validation (must be a valid email format)
            const mail = document.getElementById("mail").value;
            if (mail.trim() === "") {
                showError("mail_err", "Email is required.");
                isValid = false;
            } else if (!/^\S+@\S+\.\S+$/.test(mail)) {
                showError("mail_err", "Email must be a valid email address.");
                isValid = false;
            }

            // Password validation (must match the confirm password field)
            const password = document.getElementById("password").value;
            const confpass = document.getElementById("confpass").value;
            if (password.trim() === "") {
                showError("password_err", "Password is required.");
                isValid = false;
            } else if (password !== confpass) {
                showError("confpass_err", "Passwords do not match.");
                isValid = false;
            }

            // Profile Image validation (ensure a file is selected)
            const profileImage = document.getElementById("student_profile_image").value;
            if (profileImage.trim() === "") {
                showError("profileImage_err", "Profile image is required.");
                isValid = false;
            }

            return isValid;
        }

        function showError(elementId, message) {
            document.getElementById(elementId).innerText = message;
        }

        function clearErrors() {
            const errorElements = document.getElementsByClassName('text-danger');
            for (let i = 0; i < errorElements.length; i++) {
                errorElements[i].innerText = "";
            }
        }
    </script>
    
</head>
<body>
<header>    
        <?php include_once('entry_page_header.php') ?>
</header>
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="" enctype="multipart/form-data">
                <h3 class="text-center">Sign  Up</h3>

              <div class="mb-3">
                    <label for="fullName">Full Name</label>
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter Your Full Name" onkeyup="" required />
                    <span id="fullName_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="roll">Roll</label>
                    <input type="text" class="form-control" name="roll" id="roll" placeholder="Enter Your Roll" onkeyup="" required />
                    <span id="roll_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="Reg">Registration Number</label>
                    <input type="text" class="form-control" name="Reg" id="Reg" placeholder="Enter Your Reg. No." onkeyup="" required />
                    <span id="Reg_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="session">Session</label>
                    <input type="text" class="form-control" name="session" id="session" placeholder="Enter Your Sessioin" onkeyup="" required />
                    <span id="session_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="fatherName">Father's Name</label>
                    <input type="text" class="form-control" name="fatherName" id="fatherName" placeholder="Enter Your Father's Name" onkeyup="" required />
                    <span id="fatherName_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="motherName">Mother's Name</label>
                    <input type="text" class="form-control" name="motherName" id="motherName" placeholder="Enter Your Mother's Name" onkeyup="" required />
                    <span id="motherName_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="cgpa">Aquired CGPA</label>
                    <input type="text" class="form-control" name="cgpa" id="cgpa" placeholder="Enter Your cgpa" onkeyup="" required />
                    <span id="hallName_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="dept">Department</label>
                    <input type="text" class="form-control" name="dept" id="dept" placeholder="Enter Your Department" onkeyup="" required />
                    <span id="dept_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="hallName">Hall Name</label>
                    <input type="text" class="form-control" name="hallName" id="hallName" placeholder="Enter Your Hall Name" onkeyup="" required />
                    <span id="hallName_err" class="text-danger"></span>
                </div>
                
                <div class="mb-3">
                    <label for="phn">Phone Number</label>
                    <input type="tel" class="form-control" name="phn" id="phn" placeholder="Enter Your Phone Number" onkeyup="" required />
                    <span id="phn_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="Enter Your Email" onkeyup="" required />
                    <span id="mail_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter Your Password" onkeyup="" required />
                    <span id="password_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="confpass">Confirm Password</label>
                    <input type="text" class="form-control" name="confpass" id="confpass" placeholder="Confirm Your Password" onkeyup="" required />
                    <span id="hallName_err" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="student_profile_image" class="form-label">Upload Your Profile Picture</label>
                    <input class="form-control" type="file" id="student_profile_image" name="student_profile_image"  accept="image/*" required>
                </div>  

                <!-- <select class="form-select" name="dropdown"  aria-label="Default select example" required>
                   <option value="" disabled selected hidden>Select an option</option>
                   <option value="Transcript">Transcript Withdraw application</option>
                   <option value="Certificate">Certificate Withdraw application</option>
                   <option value="Marksheet">Marksheet Withdraw application</option>
                </select>     -->

             <br><br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"  name="Sign Up">
                        Sign Up
                    </button>
                </div>
                <br>
                <!-- <p class="forgot-password text-right">
                    Already have an account?
                    <a href="registration.php">sign up?</a>
                </p> -->
            </form>

            
        </div>
    </div>
</div>



<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>

</body>
</html>