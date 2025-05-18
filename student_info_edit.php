<?php
session_start();

$mail=$_COOKIE["userMail"];
$pass=$_COOKIE["userPass"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";


// $ind=$_GET['ind'];


// echo $pass;

$ar=array("administrative_body","proctorial_body","hall_administration");
$redirect=array("administrative_admin_profile.php","proctor_admin_profile.php","hall_admin_profile.php");
$conn = mysqli_connect($servername, $username, $password, $database);





if (isset($_POST['edit'])) {
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $reg = $_POST['Reg'];
    $session = $_POST['session'];
    $fatherName = $_POST['fathernam'];
    $motherName = $_POST['mothernam'];
    $cgpa = $_POST['cgpa'];
    $department = $_POST['dept'];
    $hall = $_POST['hall'];
    $phone = $_POST['phone'];
    // $email = $_POST['mail'];
    $password = $_POST['pass'];
    $_COOKIE["userPass"]=$password;
    $pass=$password;
    $sql = "UPDATE `student_profile` SET `fullName`='$name', `roll`='$roll', `regNumber`='$reg', `session`='$session', `fatherName`='$fatherName', `motherName`='$motherName', `cgpa`='$cgpa', `department`='$department', `hallName`='$hall', `phoneNumber`='$phone', `password`='$pass' WHERE `email`='$mail';";
     if ( $result =mysqli_query($conn, $sql))
     { 
        // done updating;  
     }
   
}





if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else 
{
    $sql="SELECT * FROM `student_profile` WHERE `email`='$mail'  and `password`='$pass';";
    //  $sql="SELECT * FROM `student_status` WHERE `roll`=19102019 and `regNumber`=7738;";
    if ($result = mysqli_query($conn, $sql))
    { 
        while ($row = mysqli_fetch_row($result)) {
        $roll=$row[1];
        $reg=$row[2];

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

</head>
<body>

<header>    
     <?php include_once('student_profile_header.php') ?>
</header>

<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-7 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
<form action="" method="post" onsubmit="" enctype="multipart/form-data">
                <h3 class="text-center">Profile Information</h3>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $row[0]; ?>"  />
                    <span id="name_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="roll">Roll</label>
                    <input type="text" class="form-control" name="roll" id="roll" value="<?php echo $row[1]; ?>"  />
                    <span id="roll_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="Reg">Registration Number</label>
                    <input type="text" class="form-control" name="Reg" id="Reg"  value="<?php echo $row[2]; ?>"   />
                    <span id="Reg_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="session">Session</label>
                    <input type="text" class="form-control" name="session" id="session"  value="<?php echo $row[3]; ?>"   />
                    <span id="sess_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="fathernam">Father Name</label>
                    <input type="text" class="form-control" name="fathernam" id="fathernam"  value="<?php echo $row[4]; ?>"   />
                    <span id="fathernam_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="mothernam">Mother Name</label>
                    <input type="text" class="form-control" name="mothernam" id="mothernam"  value="<?php echo $row[5]; ?>"   />
                    <span id="mothernam_err" class="text-danger"></span>
                </div>



                <div class="mb-3">
                    <label for="cgpa">CGPA</label>
                    <input type="text" class="form-control" name="cgpa" id="cgpa"  value="<?php echo $row[6]; ?>"   />
                    <span id="Reg_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="dept">Department </label>
                    <input type="text" class="form-control" name="dept" id="dept"  value="<?php echo $row[7]; ?>"   />
                    <span id="dept_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="hall">Hall Name</label>
                    <input type="text" class="form-control" name="hall" id="hall"  value="<?php echo $row[8]; ?>"   />
                    <span id="hall_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $row[9]; ?>"   />
                    <span id="phone_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="text" class="form-control" name="mail" id="mail"  value="<?php echo $row[10]; ?>"  readonly />
                    <span id="mail_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="pass">Password</label>
                    <input type="text" class="form-control" name="pass" id="pass"  value="<?php echo $row[11]; ?>"   />
                    <span id="mail_err" class="text-danger"></span>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="edit">
                        Update
                    </button>
                </div>



<?php 
        }
    }
?>

             <br><br>

                <!-- <div class="text-center">
                    <button type="submit" class="btn btn-primary"  name="send">
                       Send
                    </button>
                </div>
                <br> -->

            </form>
            </div>
    </div>
</div>
<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>

</body>
</html>

<?php 
        }
    
?>