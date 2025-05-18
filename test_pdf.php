<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";


$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



$rll=$_GET['rl'];
$rg=$_GET['reg'];
$typ=$_GET['typ'];
// $rll='11';
// $rg='11';

require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF {
    function Header(){
        $imagePath = 'varsity.png';
        
        // Set the width of the logo
        $logoWidth = 20; 
        
       
        list($width, $height) = getimagesize($imagePath);
        $aspectRatio = $height / $width;
        $logoHeight = $logoWidth * $aspectRatio;
       
        
        $this->Image($imagePath, 10, 3, $logoWidth, $logoHeight);
        
        $this->Ln(5);
        
        $this->SetFont('times', 'B', 16);
        $this->Cell(0, 0, 'Jatiya Kabi Kazi Nazrul Islam University', 0, 1, 'C');
        $this->SetFont('times', 'B', 10);
        $this->Cell(0, 0, 'Trishal,Mymensingh', 0, 0, 'C');
    }
    function one($conn,$rll,$rg,$typ) {


        // echo "yes";
        $sql="SELECT * FROM `approved_profiles` WHERE `roll`=$rll and `regNumber`=$rg and `type`='$typ';";
        if ($result = mysqli_query($conn, $sql))
        {  
        while ($row = mysqli_fetch_row($result))
        {
        // Logo
 
        $url = $row[0].'<br>'.$row[10]; 
        $this->write2DBarcode($url, 'QRCODE,H', 180, 4, 30, 30, null, 'N');

        $this->Ln(10); 



        $this->SetLineWidth(0.5);
        $this->Rect(10, $this->GetY(), 190, 10); 
        $this->SetFont('times', 'B', 17);
        $this->SetTextColor(0, 0, 0);
        $this->SetX(80);
        $this->Cell(30, 10, $row[14].' Withdraw Paper', 0, 0, 'C'); 

        $this->Ln(10);
        $this->SetLineWidth(0.5);
        $this->Rect(10, $this->GetY(), 190, 100); 
        
       
        
        $this->SetFont('times', 'B', 12);
        $this->SetTextColor(0, 0, 0); 

        $this->SetX(15);
        $this->Cell(30, 10, 'Student Name:', 0, 0, 'L');
        $this->Cell(10, 10, $row[0], 0, 0, 'L');
        $imagePath = 'admin/'.$row[12]; 
        $this->Image($imagePath, $this->GetX() + 100, $this->GetY()+3, 20,20);
        $this->Ln(10);

        $this->SetX(15);
        $this->Cell(30, 10, 'Roll Number:', 0, 0, 'L');
        $this->Cell(10, 10,$row[1], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'Registration Number:', 0, 0, 'L');
        $this->Cell(10, 10, $row[2], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'Session:', 0, 0, 'L');
        $this->Cell(10, 10, $row[3], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'Father Name:', 0, 0, 'L');
        $this->Cell(10, 10, $row[4], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'Mother Name:', 0, 0, 'L'); 
        $this->Cell(10, 10, $row[5], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'Hall Name:', 0, 0, 'L'); 
        $this->Cell(10, 10, $row[8], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(40, 10, 'CGPA:', 0, 0, 'L'); 
        $this->Cell(10, 10, $row[6], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(30, 10, 'Phone Number:', 0, 0, 'L'); 
        $this->Cell(10, 10, $row[9], 0, 1, 'L'); 

        $this->SetX(15);
        $this->Cell(20, 10, 'Email:', 0, 0, 'L'); 
        $this->Cell(10, 10, $row[10], 0, 1, 'L'); 
      }
    }
  }
  function Footer() {

    $this->Image('digital_signature.png', 10, 280, 50, 15, 'PNG', '', '', false, 300, '', false, false, 0);

}
}



$pdf = new PDF();
$pdf->AddPage();
$pdf->one($conn,$rll,$rg,$typ);


$pdf->Output($typ.' Withdraw Paper.pdf', 'I'); // 'I' will force download the PDF
?>
