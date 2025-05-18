<?php

session_start();

$mail=$_COOKIE["userMail"];
$pass=$_COOKIE["userPass"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";
$conn = mysqli_connect($servername, $username, $password, $database);

$sql="SELECT * FROM `student_profile` WHERE `email`='$mail'  and `password`='$pass';";
$result = mysqli_query($conn, $sql);
if($x = mysqli_fetch_row($result))
{
    $roll=$x[1];
    $reg=$x[2];
}


if (isset($_POST['downloadTranscript'])) {
    


    // header("Location: payment_clearance.php");
    $sql = "SELECT * FROM `approved_profiles` WHERE `roll`=$roll and `regNumber`=$reg and `type`='Transcript';";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_row($result)) {
        // Transcript is ready, redirect to the PDF generation page
        header("Location: test_pdf.php?reg=$reg&rl=$roll&typ=$row[14]");
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
 $sql = "SELECT * FROM `approved_profiles` WHERE `roll`=$roll and `regNumber`=$reg and `type`='Certificate';";
 $result = mysqli_query($conn, $sql);
 
 if ($row = mysqli_fetch_row($result)) {
     // Transcript is ready, redirect to the PDF generation page
     header("Location: test_pdf.php?reg=$reg&rl=$roll&typ=$row[14]");
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
      <form action="" method="post" onsubmit="" >
                <div class="text-center" >
                    <button type="submit" style="width: 100%;" class="btn btn-primary"  name="downloadTranscript">
                      Download Transcript Approval Paper
                    </button>
                </div>
                <br><br>
                <div class="text-center" >
                    <button type="submit" class="btn btn-primary" style="width: 100%;" name="downloadCertificate">
                      Download Certificate Approval Paper
                    </button>
                </div>
      </form>
      
      </div>
 </div>
 <header>    
        <?php include_once('entry_page_footer.php') ?>
</header>

</body>
</html>