<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
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
<div class="container mt-3 mx-5">
<button type="button" class="btn btn-danger"><a class="nav-link" href="genticket.php">GENERATE TICKET</a></button>
</div>

</body>
</html>