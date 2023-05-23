<?php
session_start();
if(isset($_SESSION["username"])){
  header("location: welcome.php");
  exit;
}
$success=false;
$exist=false;
$error=false;
$perror=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
include 'partials/_dbconnect.php';
$user=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST["password"];
$cpass=$_POST["cpassword"];
$sql="select * from user where email='$email'";
$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0 || ($pass!=$cpass)){
    if(mysqli_num_rows($result)>0){
      $exist=true;
    }
    if($pass!=$cpass){
      $perror=true;
    }
}else{
    $sql1 = "INSERT INTO user values('$email','$user','$pass')";
    $result1=mysqli_query($conn,$sql1);
    if($result){
       $success=true;
    }else{
      $error=true;
    }
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
if($error){

echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Alert!</strong> Technical error.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';}
if($success){

  echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account has been created and you can login now.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';}
  if($exist){

    echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Alert!</strong> E-mail already registered.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';}

    if($perror){

      echo    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Alert!</strong> Passwords do not match.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';}  

?>

<div class="container mt-3">
<form action="signup.php" method="POST"> 
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="username" required>
  </div>
  <div class="mb-3">
    <label for="exampleemail" class="form-label">E-mail</label>
    <input type="email" class="form-control" id="exampleemail" name="email" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword2" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="cpassword" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>