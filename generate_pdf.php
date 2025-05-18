<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rll=$_GET['rl'];
$rg=$_GET['reg'];

$sql="SELECT * FROM `approved_profiles` WHERE `roll`=$rll and `regNumber`=$rg;";
if ($result = mysqli_query($conn, $sql))
{  
    while ($row = mysqli_fetch_row($result)){
        $imgnm=$row[12];
        $userInfo = array(
            "Name" => $row[0],
            "Roll" => $row[1],
            "Registration Number" => $row[2],
            "Session" => $row[3],
            "FatherName" => $row[4],
            "MotherName" => $row[5],
            "CGPA" => $row[6],
            "Department" => $row[7],
            "Hall Name" => $row[8],
            "Phone Number" => $row[9],
            "Email" => $row[10],
            "Transaction Id" => $row[13]
        );
    }
}


require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF {
    function TextAndImageRow($line1, $line2, $imagePath) {
        $this->SetFont('times', '', 20);

        // Cell for line 1 (adjust width as needed)
        $this->Cell(20, 10, $line1, 0, 0, 'L');

        // Cell for line 2 (adjust width as needed)
        

        // Cell for image (adjust width as needed)
        $this->Image($imagePath, $this->GetX() + 126, $this->GetY(), 50, 0, '', '', '', false, 300, '', false, false, 0);

        $this->Ln(); // Move to the next line
        $this->SetFont('times', '', 10);
        $this->Cell(40, 10, $line2, 0, 0, 'L');
        $this->Cell(40, 10, '', 0); // Empty cell for spacing
        $this->Ln();
        $this->Ln(); // Move to the next line
        $this->SetFont('times', '', 19);
        $this->Cell(0, 5, '                       Granted withdraw paper', 0, 1, 'L');
    }

    // Custom method to add a table row
    function Row($key, $value) {
        $this->SetFont('times', '', 12);
        $this->SetFillColor(255, 255, 255); // Set fill color to white
        $this->SetDrawColor(0, 0, 0); // Set border color to black
    
        // Adjust cell width as needed
        $this->Cell(45, 15, $key, 1, 0, 'C', true);
        $this->Cell(140, 15, $value, 1, 0, 'C', true);
    
        $this->Ln(); // Move to the next line
    }
}

$pdf = new PDF();
$pdf->SetMargins(10, 10, 10); // Optional: Set margins if needed
$pdf->AddPage();

$pdf->SetDrawColor(255, 255, 255);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(0, 0, '', 1, 1, 'C');

$line1 = "Jatiya Kabi Kazi Nazrul Islam University";
$line2 = "Trishal, Mymensingh";
$imagePath = 'admin/'.$imgnm; // Replace with the actual path to your image file

$pdf->TextAndImageRow($line1, $line2, $imagePath);



$pdf->SetFont('');

foreach ($userInfo as $key => $value) {
    $pdf->Row($key, $value);
}

$pdf->Output('text_and_image.pdf', 'I');

?>
