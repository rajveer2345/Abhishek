<?php
$showerror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'partials/_dbconnect.php';
$email=$_POST["username"];
$pass=$_POST["password"];
$sql="select * from user where email='$email' and password='$pass'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)==1){
    session_start();
    $row=mysqli_fetch_assoc($result);
    $_SESSION['username']=$row['username'];
    $_SESSION['email']=$row['email'];
    header("location: welcome.php");
}else{
    $showerror=true;
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
<?php require "partials/_nav.php" ?>
<?php
if($showerror){

echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> Credentials do not match.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
?>
<div class="container mt-3">
<form action="login.php" method="POST"> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="username" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>