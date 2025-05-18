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

echo "Connected successfully!";

// Your SQL query
$sql = "INSERT INTO `student_registration`(`fullName`, `roll`, `regNumber`, `session`, `fatherName`, `motherName`, `cgpa`, `department`, `hallName`, `phoneNumber`, `email`, `password`, `profileImagePath`, `transaction_Id`) VALUES ('dfjglkdf','dkfjg','djjfg','dfjg','klfgjd','dkfjgl','dlkgjfd','kdfdfg','sdfs','sdf','dfgdf','dfgfdg','dfgd','dfjkgkdf');";

// Execute query
if (mysqli_query($conn, $sql)) {
    echo "Record inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
<!-- <?php
require_once('TCPDF-main/tcpdf.php');

class PDF extends TCPDF {
    // Custom method to add a table row
    function Row($key,$value) {
        $this->SetFont('times', '', 12);
        $this->SetFillColor(255, 255, 255); // Set fill color to white

        // Adjust cell width as needed
        $this->Cell(45, 15, $key, 1, 0, 'C', true);
        $this->Cell(140, 15, $value, 1, 0, 'C', true);

        $this->Ln(); // Move to the next line
    }
}

$pdf = new PDF(); 
$pdf->AddPage();

$pdf->SetFont('times', '', 5);



// Table rows
$userInfo = array(
    "Name" => "John Doe",
    "Roll" => "12345",
    "Registration Number" => "R123456",
    "Session" => "2022-2023",
    "FatherName" => "John Doe Sr.",
    "MotherName" => "Jane Doe",
    "CGPA" => 3.75,
    "Department" => "Computer Science",
    "Hall Name" => "ABC Hall",
    "Phone Number" => "123-456-7890",
    "Email" => "john.doe@example.com",
    "Transaction Id" => "T123456789"
);

$pdf->SetFont('');

foreach ($userInfo as $key => $value) {
    // echo "$key: $value\n";
    $pdf->Row($key,$value);
}

foreach ($rows as $row) {
    $pdf->Row($row);
}

$pdf->Output('test.pdf', 'I');
?> -->