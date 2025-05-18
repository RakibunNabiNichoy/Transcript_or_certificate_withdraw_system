<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";

$roll=$_GET['rol'];
$reg=$_GET['rg'];
$ind=$_GET['ind'];
$typ=$_GET['typ'];

$ar=array("administrative_body_message","proctorial_body_message","hall_administration_message","library_body_message","ict_cell_body_message","physical_education_medical_center_body_message","transport_and_finance_body_message","cse_dept_body_message");
$redirect=array("administrative_admin_profile.php","proctor_admin_profile.php","hall_admin_profile.php","library_admin_profile.php","ict_cell_admin.php","physical_education_and_medical_center_admin.php","transport_and_finance_admin.php","cse_dept_admin.php");


$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else 
{

    $sql="SELECT * FROM `student_profile`  WHERE `roll`=$roll and `regNumber`=$reg;";
    if ($result = mysqli_query($conn, $sql))
    { 
        while ($row = mysqli_fetch_row($result)) {

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
        <?php include_once('entry_page_header.php') ?>
</header>
<div class="container my-5 d-flex justify-content-center">
    <div class="col-md-8 col-12">
        <div class="card rounded m-auto py-4 px-5 shadow">
            <form action="" method="post" onsubmit="" enctype="multipart/form-data">
                <h3 class="text-center">Send Message</h3>

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
                    <label for="dept">Department Name</label>
                    <input type="text" class="form-control" name="dept" id="dept"  value="<?php echo $row[7]; ?>" readonly  />
                    <span id="dept_err" class="text-danger"></span>
                </div>


                <div class="input-group" >
                    <span class="input-group-text">Write your message here :</span><textarea name="message" cols="63" rows="5"></textarea>
                </div>




             <br><br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary"  name="send">
                       Send
                    </button>
                </div>
                <br>

            </form>
<?php

        }
    }
?>
            <script src="validate_client_side.js"></script>
        </div>
    </div>
</div>




<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>
</body>
</html>
<?php 

if (isset($_POST['send'])) {


 $message = $_POST['message'];

 
// Prepare the SQL statement with a parameterized query
$sql = "UPDATE `student_status` SET $ar[$ind] = ? WHERE `roll` = ? AND `regNumber` = ? AND `type`=?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    // Bind the parameters to the statement
    mysqli_stmt_bind_param($stmt, 'ssss', $message, $roll, $reg,$typ);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "<script>window.location.href = '" . $redirect[$ind] . "';</script>";
        exit();
        // The query executed successfully
        // echo "cole";
        // updated the status table 
    } else {
        // Error handling if the query fails to execute
        echo "Error: " . mysqli_stmt_error($stmt);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
    // header("Location: ".$redirect[$ind]);
} else {
    // Error handling if the statement preparation fails
    echo "Error: " . mysqli_error($conn);
}


    // echo $message;
    
}


    //  header("Location:".$redirect[$ind]);
}
?>