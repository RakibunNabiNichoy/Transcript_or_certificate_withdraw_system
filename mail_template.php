<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


function sendEmail($recipientMail, $recipientName, $subject, $body) {

$mail = new PHPMailer(true); 


    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'irteja500@gmail.com';
    $mail->Password = 'nfsk iwcb ohjv erdd'; 
    $mail->setFrom('irteja500@gmail.com', 'Irteja');

    $mail->addAddress($recipientMail, $recipientName);
    $mail->Subject = $subject;
    $mail->Body = $body;

    if ($mail->send()) {
      echo 'Email sent successfully';
  } else {
      echo 'Error: ' . $mail->ErrorInfo;
  }
}


// session_start();
//   $ar=array();
//   $ar["fp"]=$_POST['fname'];
//   $ar["lp"]=$_POST['lname'];
//   $_SESSION["tmp_array"]=$ar;
?>
