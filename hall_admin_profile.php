<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "transript_certificate_related_information";


$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
}
else 
{
    $sql="SELECT * FROM `student_status` WHERE `hall_administration`='No';";
    if (isset($_GET['search']))
    {
      $search = $_GET['search'];
      $sql = "SELECT * FROM `student_status` WHERE `hall_administration`='No' AND (`fullName` LIKE '%$search%' OR `department` LIKE '%$search%' OR `session` LIKE '%$search%' OR `email` LIKE '%$search%');";
    }
    if ($result = mysqli_query($conn, $sql))
    {    
        $srl=0;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hall Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<style>
        .table th,
        .table td {
            text-align: center;
        }
    </style>

</head>
<body>
  <h2 class="d-flex p-2 text-bg-primary justify-content-center ">Hall Admin Profile</h2>


<div class="d-flex justify-content-center">



<div class="col-md-10 ">
<form method="GET" action="">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search by Name, Department, Session, or Email" name="search">
        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
    </div>
</form>
<table class="mt-3 table table-responsive table-striped table-hover table-bordered border-secondary" style="border: 5px solid rgba(0, 128, 255, 0.9) !important;">
<thead>  
<tr>
    <th  >#</th>
    <th>Name</th>
    <th class="align-middle">Summission Date</th>
    <th>View</th>
    </tr></thead>
    <tbody class="table-group-divider">
<?php
    while ($row = mysqli_fetch_row($result)) {
        $srl=$srl+1;
      //  echo $srl;
        $sql2="SELECT * FROM `student_profile` WHERE `roll`='$row[0]' AND `regNumber`='$row[1]';";
        if($result2=mysqli_query($conn, $sql2)){
          while($row2=mysqli_fetch_row($result2)){

          // echo $srl.") ".$row[0]."                  ".$row[10]."           ";
    ?>

  

  
          <tr>
              <td><?php echo $srl; ?></td>
              <td><?php echo $row[21]; ?></td>
              <td><?php echo $row[10]; ?></td>
              <td>  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target=<?php echo "#s".$srl; ?>>
   View
  </button>
          




 



<div class="modal fade" id=<?php echo "s".$srl; ?> tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" >  <img style="margin-left:150%;" src="<?php echo "admin/".$row2[12];?>"   width="110" height="110"> </h1>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">
      <?php echo "Name : ".$row2[0]."<br>";?>
      <?php echo "Application Type : ".$row[2]."<br>";?>
      <?php echo "Roll : ".$row2[1]."<br>";?>
      <?php echo "Registration Number : ".$row2[2]."<br>";?>
      <?php echo "Session : ".$row2[3]."<br>";?>
      <?php echo "Father's Name : ".$row2[4]."<br>";?>
      <?php echo "Mother's Name : ".$row2[5]."<br>";?>
      <?php echo "CGPA : ".$row2[6]."<br>";?>
      <?php echo "Department : ".$row2[7]."<br>";?>
      <?php echo "Hall Name : ".$row2[8]."<br>";?>
      <?php echo "Phone Number : ".$row2[9]."<br>";?>
      <?php echo "Email : ".$row2[10]."<br>";?>
      <?php echo "Payment Transaction Id : ".$row[9]."<br>";?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="aprrovable.php?rg=<?php echo $row2[2];?>&rol=<?php echo $row2[1];?>&ind=<?php echo 2;?>&typ=<?php echo $row[2]; ?>"><button type="button" class="btn btn-primary">  accept</button></a>
        <a href="msgtest.php?rg=<?php echo $row2[2];?>&rol=<?php echo $row2[1];?>&ind=<?php echo 2;?>&typ=<?php echo $row[2]; ?>"><button type="button" class="btn btn-primary">  send message</button></a>
        <!-- <a href="test.php"><button type="button" class="btn btn-primary">  reject</button></a> -->
        </div>
    </div>
  </div>
</div>
  
</td>
</tr>
  <?php
            }
          }
    }
  ?>


  <?php
    }
  ?>
  </tbody>
</table>
  </div>
  </div>
  </div>
</body>
</html>



<?php
}
?>