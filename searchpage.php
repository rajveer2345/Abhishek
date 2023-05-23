<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}
if(isset($_GET['dpnr'])){

 $dpnr=$_GET['dpnr'];
 include 'partials/_dbconnect.php';
 $sqldelete1="delete from fdetail where pnr='$dpnr'";
 $sqldelete2="delete from passenger where pnr='$dpnr'";
 if(mysqli_query($conn,$sqldelete1) && mysqli_query($conn,$sqldelete2)){
  header("location: searchpage.php?search=$skey");
 }

}
?>
<!DOCTYPE html>
<html lan="en">
<head>
<title>Ticket booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <?php
  require "partials/_nav.php";
  ?>
<div class="container  m-5" >
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <td>PNR</td>
      <td>FLIGHT</td>
      <td>FLIGHT NO.</td>
      <td>FROM</td>
      <td>TO</td>
      <td>BOOKING DATE</td>
      <td>COST</td>
      <td>PRICE</td>
      <td></td>
    </tr>
</thead>
<tbody>
<?php

include 'partials/_dbconnect.php';
$skey = $_GET['search'];
$qry=" SELECT * FROM fdetail WHERE email='{$_SESSION['email']}' AND (CONCAT(pnr,contact,cname,bdate,id) LIKE '%$skey%')";
$result=mysqli_query($conn,$qry);
if(mysqli_num_rows($result)>0){
while($row=mysqli_fetch_assoc($result)){
  ?>
  <tr >
    <td><?php echo $row['pnr']; ?></td>
    <td><?php echo $row['flight']; ?></td>
    <td><?php echo $row['fno']; ?></td>
    <td><?php echo $row['froms']; ?></td>
    <td><?php echo $row['tos']; ?></td>
    <td><?php echo date('d-m-y H:i:s',strtotime($row['bdate'])); ?></td>
    <td><?php echo $row['ctb']; ?></td>
    <td><?php echo $row['ctc']; ?></td>
    <td> <button type="button" class="btn btn-success" onclick="window.location='ticket.php?pnr=<?php echo $row['pnr']; ?>';"> View </button>

    </td>
    <td>  <form method="get" onsubmit="return confirmdelete();">
          <input type="hidden" name="dpnr" value="<?php echo $row['pnr']; ?>">
          <input type="hidden" name="search" value="<?php echo $skey; ?>">
          <input class="btn btn-danger" type="submit" value="Delete" >
          </form>

    </td>
</tr>
  <?php
}
}
else{
  ?>
  <p class="text-danger"><?php echo "NO RECORD FOUND!"; ?></p>
  <?php
}
?>
<script>
  function confirmdelete(){ return confirm("Are you sure?");}
  </script>

</tbody>
</table>
</div>

</body>
</html>