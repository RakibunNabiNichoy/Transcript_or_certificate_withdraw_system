<?php
 session_start();

 $servername = "localhost";
 $username = "root";
 $password = "";
 $database = "transript_certificate_related_information";


$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else 
{
  
$fullName = $_SESSION['page1_data']['name'];
$roll = $_SESSION['page1_data']['roll'];
$regNumber = $_SESSION['page1_data']['Reg'];
$ss = $_SESSION['page1_data']['session'];
$fatherName = $_SESSION['page1_data']['fatherName'];
$motherName = $_SESSION['page1_data']['motherName'];
$cgpa = $_SESSION['page1_data']['cgpa'];
$department = $_SESSION['page1_data']['dept'];
$hallName = $_SESSION['page1_data']['hallName'];
$phoneNumber = $_SESSION['page1_data']['phn'];
$email = $_SESSION['page1_data']['mail'];
$password = $_SESSION['page1_data']['password'];
// $profileImagePath = $_SESSION['profileImagePath'];
$tid=$_SESSION["trnsId"];
$typ=$_SESSION['page1_data']['dropdown'];
$currentDate = date("Y-m-d");

// include 'move_or_delete.php';
//  $des="admin/";
//  $src="requested_profile_picturers/";
//  moveFile($src,$des,$profileImagePath);

unset($_SESSION['page1_data']);
// unset($_SESSION['profileImagePath']);
unset($_SESSION["trnsId"]);
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

<style>

        .mt-4-custom {
            margin-top: 1rem !important; 
        }
    </style>

    
</head>
<body>
<header>    
        <?php include_once('student_profile_header.php') ?>
</header>
<div class="container   d-flex justify-content-center" style="margin-top: 120px;" >
    <div class="col-md-7 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" >
                <!-- <h2 class="text-center">Verify Your Mail</h2><br><br> -->
                <p>
                    <?php
                       $sql2="INSERT INTO `student_status`(`roll`, `regNumber`, `type`, `administrative_body`, `proctorial_body`, `hall_administration`, `administrative_body_message`, `proctorial_body_message`, `hall_administration_message`, `trans_id`, `application_date`, `library_body`, `library_body_message`, `ict_cell_body`, `ict_cell_body_message`,`physical_education_medical_center_body`, `physical_education_medical_center_body_message`,`transport_and_finance_body`, `transport_and_finance_body_message`, `cse_dept_body`, `cse_dept_body_message`, `fullName`, `session`, `department`, `email`) VALUES ('$roll','$regNumber','$typ','No','No','No','','','','$tid','$currentDate','No','','No','','No','','No','','No','','$fullName','$ss','$department','$email');";
                            // echo "yes";
                       if(mysqli_query($conn, $sql2))
                       {
                         echo "<br>Your payment is received successfully. Your request has been sent to the Admin.<br>";
                       }
                      else 
                      {
                        echo "<br> Some error occured during process!Please try again! <br>"  ;
                      }        
                                       
                 }
                    ?>
                </p>
                

            
            </form>

        </div>
    </div>
</div>
</body>
</html>

<?php
// $sql = "INSERT INTO `student_registration`(`fullName`, `roll`, `regNumber`, `session`, `fatherName`, `motherName`, `cgpa`, `department`, `hallName`, `phoneNumber`, `email`, `password`, `profileImagePath`, `transaction_Id`, `type`, `administrative_body`, `proctorial_body`, `hall_administration`) VALUES ('$fullName','$roll','$regNumber','$ss','$fatherName','$motherName','$cgpa','$department','$hallName','$phoneNumber','$email','$password','$profileImagePath','$tid','$typ','No','No','No');";

// if (mysqli_query($conn, $sql)) {                


 ?>