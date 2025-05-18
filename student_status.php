<?php
session_start();

$mail=$_COOKIE["userMail"];
$pass=$_COOKIE["userPass"];

// echo $pass;

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

    
</head>
<body class="">
<header>    
     <?php include_once('student_profile_header.php') ?>
</header>
<?php
$sql="SELECT * FROM `student_status` WHERE `roll`='$roll' and `regNumber`='$reg' and  `type`='Transcript';";
if ($result = mysqli_query($conn, $sql))
{ 
   while ($row = mysqli_fetch_row($result)) {
?>
<div class="card" style="width: 35rem;margin-left:15rem; margin-top:2rem;">
      <div class="card-body">
        <h5 class="card-title text-center" >Status For Transcript</h5>



        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

        
        <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
            Administrative Admin
        </button>
        <div class="collapse" id="collapseExample1">
            <div class="card card-body">
                <?php echo $row[6]; ?>
            </div>
        </div>

        <br><br>

        <button class="btn btn-primary"   style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
            Proctor Admin
        </button>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <?php echo $row[7]; ?>
            </div>
        </div>
        
        <br><br>


        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
            Hall Admin
        </button>
        <div class="collapse" id="collapseExample3">
            <div class="card card-body">
                <?php echo $row[8]; ?>
            </div>
        </div>
        <br><br>



        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
            Library Admin
        </button>
        <div class="collapse" id="collapseExample4">
            <div class="card card-body">
                <?php echo $row[12]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
            ICT Cell Admin
        </button>
        <div class="collapse" id="collapseExample5">
            <div class="card card-body">
                <?php echo $row[14]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6">
            Physical Education And Medical Center Admin
        </button>
        <div class="collapse" id="collapseExample6">
            <div class="card card-body">
                <?php echo $row[16]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample7">
            Transport And Finance Admin
        </button>
        <div class="collapse" id="collapseExample7">
            <div class="card card-body">
                <?php echo $row[18]; ?>
            </div>
        </div>
        <br><br>


        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample8" aria-expanded="false" aria-controls="collapseExample8">
            CSE Department Admin
        </button>
        <div class="collapse" id="collapseExample8">
            <div class="card card-body">
                <?php echo $row[20]; ?>
            </div>
        </div>
        <br><br>


      </div>
    </div>
<?php
   }
}

$sql="SELECT * FROM `student_status` WHERE `roll`='$roll' and `regNumber`='$reg' and `type`='Certificate';";
if ($result = mysqli_query($conn, $sql))
{ 
    while ($row = mysqli_fetch_row($result)) {
?>


<div class="card" style="width: 35rem;margin-left:15rem; margin-top:2rem;">
      <div class="card-body">
        <h5 class="card-title">Status For Certificate</h5>



        <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->

        
        <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
            Administrative Admin
        </button>
        <div class="collapse" id="collapseExample1">
            <div class="card card-body">
                <?php echo $row[6]; ?>
            </div>
        </div>

        <br><br>

        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
            Proctor Admin
        </button>
        <div class="collapse" id="collapseExample2">
            <div class="card card-body">
                <?php echo $row[7]; ?>
            </div>
        </div>
        
        <br><br>


        <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false" aria-controls="collapseExample3">
            Hall Admin
        </button>
        <div class="collapse" id="collapseExample3">
            <div class="card card-body">
                <?php echo $row[8]; ?>
            </div>
        </div>
        <br><br>



        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample4" aria-expanded="false" aria-controls="collapseExample4">
            Library Admin
        </button>
        <div class="collapse" id="collapseExample4">
            <div class="card card-body">
                <?php echo $row[12]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample5" aria-expanded="false" aria-controls="collapseExample5">
            ICT Cell Admin
        </button>
        <div class="collapse" id="collapseExample5">
            <div class="card card-body">
                <?php echo $row[14]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary"  style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample6" aria-expanded="false" aria-controls="collapseExample6">
            Physical Education And Medical Center Admin
        </button>
        <div class="collapse" id="collapseExample6">
            <div class="card card-body">
                <?php echo $row[16]; ?>
            </div>
        </div>
        <br><br>

        <button class="btn btn-primary" style="width: 100%;"  type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample7" aria-expanded="false" aria-controls="collapseExample7">
            Transport And Finance Admin
        </button>
        <div class="collapse" id="collapseExample7">
            <div class="card card-body">
                <?php echo $row[18]; ?>
            </div>
        </div>
        <br><br>


        <button class="btn btn-primary" style="width: 100%;" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample8" aria-expanded="false" aria-controls="collapseExample8">
            CSE Department Admin
        </button>
        <div class="collapse" id="collapseExample8">
            <div class="card card-body">
                <?php echo $row[20]; ?>
            </div>
        </div>
        <br><br>


      </div>
    </div>
<?php
    }
} 
?>

<header>    
        <?php include_once('entry_page_footer.php') ?>
</header>
</body>
</html>