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

$sql="SELECT * FROM `student_profile` WHERE `email`='$mail'  and `password`='$pass';";
$result = mysqli_query($conn, $sql);
if($x = mysqli_fetch_row($result))
{
    $roll=$x[1];
    $reg=$x[2];
}


if (isset($_POST['Apply'])) {
     $_SESSION['page1_data'] = $_POST;
    // echo $_POST['roll'];
    // $imageName = $_FILES["student_profile_image"]["name"];
    // $imageType = $_FILES["student_profile_image"]["type"];
    // $imageSize = $_FILES["student_profile_image"]["size"];
    // $imageTmp = $_FILES["student_profile_image"]["tmp_name"];

        // header("Location: payment_clearance.php");
        echo '<script>window.open("payment_clearance.php", "_blank");</script>';
    
    
}




if (isset($_POST['downloadTranscript'])) {
    


       // header("Location: payment_clearance.php");
       $sql = "SELECT * FROM `approved_profiles` WHERE `roll`=$roll and `regNumber`=$reg;";
       $result = mysqli_query($conn, $sql);
       
       if ($row = mysqli_fetch_row($result)) {
           // Transcript is ready, redirect to the PDF generation page
           header("Location: generate_pdf.php?reg=$reg&rl=$roll");
           // Make sure to exit after redirection
       } else {
           // Transcript is not ready, display a modal dialog box
        //    echo "<script>
        //    alert('Your transcript is not readt yet!');
        //    </script>";
        echo <<<HTML
        <div class="modal fade" id="transcriptNotReadyModal" tabindex="-1" aria-labelledby="modalTranscript" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalTranscript">Transcript Not Ready</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Your transcript is not ready yet!
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = new bootstrap.Modal(document.getElementById('transcriptNotReadyModal'));
                modal.show();
            });
        </script>
    HTML;
       }

   
   
}


if (isset($_POST['downloadCertificate'])) {
    


    // header("Location: payment_clearance.php");
    $sql = "SELECT * FROM `approved_profiles` WHERE `roll`=$roll and `regNumber`=$reg;";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_row($result)) {
        // Transcript is ready, redirect to the PDF generation page
        header("Location: generate_pdf.php?reg=$reg&rl=$roll");
        // Make sure to exit after redirection
    } else {
        // Transcript is not ready, display a modal dialog box
     //    echo "<script>
     //    alert('Your transcript is not readt yet!');
     //    </script>";
     echo <<<HTML
     <div class="modal fade" id="certificateNotReadyModal" tabindex="-1" aria-labelledby="modalTranscript" aria-hidden="true">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title" id="modalCertificate">Certificate Not Ready</h5>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
             Your certificate is not ready yet!
           </div>
           <div class="modal-footer">
             <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </div>
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             var modal = new bootstrap.Modal(document.getElementById('certificateNotReadyModal'));
             modal.show();
         });
     </script>
 HTML;
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

    <div class="card" style="width: 35rem;margin-left:15rem; margin-top:2rem;">
      <div class="card-body">
        <h5 class="card-title"></h5>
        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
       
        <!-- here starts the form   -->

        <form action="" method="post" onsubmit="" enctype="multipart/form-data">
                <h3 class="text-center">Profile Information</h3>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?php echo $row[0]; ?>" readonly />
                    <span id="name_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="roll">Roll</label>
                    <input type="text" class="form-control" name="roll" id="roll" value="<?php echo $row[1]; ?>" readonly />
                    <span id="roll_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="Reg">Registration Number</label>
                    <input type="text" class="form-control" name="Reg" id="Reg"  value="<?php echo $row[2]; ?>" readonly  />
                    <span id="Reg_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="session">Session</label>
                    <input type="text" class="form-control" name="session" id="session"  value="<?php echo $row[3]; ?>" readonly  />
                    <span id="sess_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="fathernam">Father Name</label>
                    <input type="text" class="form-control" name="fathernam" id="fathernam"  value="<?php echo $row[4]; ?>" readonly  />
                    <span id="fathernam_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="mothernam">Mother Name</label>
                    <input type="text" class="form-control" name="mothernam" id="mothernam"  value="<?php echo $row[5]; ?>" readonly  />
                    <span id="mothernam_err" class="text-danger"></span>
                </div>



                <div class="mb-3">
                    <label for="cgpa">CGPA</label>
                    <input type="text" class="form-control" name="cgpa" id="cgpa"  value="<?php echo $row[6]; ?>" readonly  />
                    <span id="Reg_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="dept">Department Name</label>
                    <input type="text" class="form-control" name="dept" id="dept"  value="<?php echo $row[7]; ?>" readonly  />
                    <span id="dept_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="hall">Hall Name</label>
                    <input type="text" class="form-control" name="hall" id="hall"  value="<?php echo $row[8]; ?>" readonly  />
                    <span id="hall_err" class="text-danger"></span>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" name="phone" id="phone"  value="<?php echo $row[9]; ?>" readonly  />
                    <span id="phone_err" class="text-danger"></span>
                </div>


                <div class="mb-3">
                    <label for="mail">Email</label>
                    <input type="text" class="form-control" name="mail" id="mail"  value="<?php echo $row[10]; ?>" readonly  />
                    <span id="mail_err" class="text-danger"></span>
                </div>

                <button class="btn btn-primary text-center" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExamplep" aria-expanded="false" aria-controls="collapseExamplep">
                    Apply for Transcript or Certificate
                </button>
                <div class="collapse" id="collapseExamplep">
                    <div class="card card-body">
                <select class="form-select" name="dropdown"  aria-label="Default select example" required>
                   <option value="" disabled selected hidden>Select an option</option>
                   <option value="Transcript">Transcript Withdraw application</option>
                   <option value="Certificate">Certificate Withdraw application</option>
                   <!-- <option value="Marksheet">Marksheet Withdraw application</option> -->
                </select> 
                <br>
                <div class="text-center" style="width: 100%;">
                    <button type="submit" class="btn btn-primary"  name="Apply">
                       Apply
                    </button>
                </div>
                </div> 
             </div>





             <br><br>

                <!-- <div class="text-center">
                    <button type="submit" class="btn btn-primary"  name="send">
                       Send
                    </button>
                </div>
                <br> -->

            </form>




        <?php
        }
      }
        ?>
      </div>
    </div>


  



    <br><br>






    <?php
 }
 ?>











<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>
</body>
</html>