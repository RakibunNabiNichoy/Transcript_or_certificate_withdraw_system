<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";

$roll=$_GET['rol'];
$reg=$_GET['rg'];
$ind=$_GET['ind'];
$typ=$_GET['typ'];

$ar=array("administrative_body","proctorial_body","hall_administration","library_body","ict_cell_body","physical_education_medical_center_body","transport_and_finance_body","cse_dept_body");
$redirect=array("administrative_admin_profile.php","proctor_admin_profile.php","hall_admin_profile.php","library_admin_profile.php","ict_cell_admin.php","physical_education_and_medical_center_admin.php","transport_and_finance_admin.php","cse_dept_admin.php");

$conn = mysqli_connect($servername, $username, $password, $database);
echo "kjdlkfg";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else 
{
    $sql="UPDATE `student_status` SET `$ar[$ind]`='Yes' WHERE `roll`=$roll and `regNumber`=$reg and `type`='$typ';";
    if ($result = mysqli_query($conn, $sql))
    {    
        // echo $typ;
        $sql2="SELECT * FROM `student_status`  WHERE `roll`=$roll and `regNumber`=$reg and `type`='$typ';";
        
        if ($result = mysqli_query($conn, $sql2))
        {    
            $cnt=0;
            while ($row2 = mysqli_fetch_row($result))
            {
                if($row2[3]=='Yes') $cnt++;
                if($row2[4]=='Yes') $cnt++;
                if($row2[5]=='Yes') $cnt++;
                if($row2[11]=='Yes') $cnt++;
                if($row2[13]=='Yes') $cnt++;
                if($row2[15]=='Yes') $cnt++;
                if($row2[17]=='Yes') $cnt++;
                if($row2[19]=='Yes') $cnt++;
                // have to change the last column
                
                if($cnt==8)
                {
                    $sql5="SELECT * FROM `student_profile` WHERE `roll`=$roll and `regNumber`=$reg;";
                    $result2= mysqli_query($conn, $sql5);
                    $row= mysqli_fetch_row($result2);
                    $sql3="INSERT INTO `approved_profiles`(`fullName`, `roll`, `regNumber`, `session`, `fatherName`, `motherName`, `cgpa`, `department`, `hallName`, `phoneNumber`, `email`, `password`, `profileImagePath`, `transaction_Id`, `type`) VALUES ('$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$row[10]','$row[11]','$row[12]','$row2[9]','$row2[2]');";
                  

                    include 'mail_template.php';
    
                    $subject="Your ".$typ." Withdraw Paper is ready!";
                    $body="Your application has got approval from all the admins.Please login to your account and download your ".$typ." Withdraw Paper!";
                    sendEmail($row[10],$row[0],$subject,$body);


                    // echo " ".$row[1];
                   // print_r($row2);
                    $sql4="DELETE FROM `student_status` WHERE `roll`=$roll and `regNumber`=$reg and `type`='$typ';";
                    if (mysqli_query($conn, $sql3) && mysqli_query($conn, $sql4))
                    {                
                    echo "asche";
                    echo "<br>changed applied<br>";
                    }
                 
                }
            }
        }
    }
      
       
      
      
      header("Location:".$redirect[$ind]);
}

?>