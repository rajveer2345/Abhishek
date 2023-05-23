<?php
session_start();
if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

include 'partials/_dbconnect.php';

$pnr = $_GET["pnr"];


$sql = "select * from fdetail WHERE pnr='$pnr'";
$sql1 = "select * from passenger where pnr='$pnr'";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
if ($result) {

  $row = mysqli_fetch_assoc($result);
  $stop = $row['stop'];
  $flight = $row['flight'];
  $fno = $row['fno'];
  $class = $row['class'];
  $status = $row['status'];
  $ttype = $row['ttype'];
  $froms = $row['froms'];
  $from_date = $row['from_date'];
  $from_time = $row['from_time'];
  $tos = $row['tos'];
  $to_date = $row['to_date'];
  $to_time = $row['to_time'];
  $ctc = $row['ctc'];
  $bcharge = $row['bcharge'];
  $tax = $row['tax'];
  $comment = $row['comment'];
  $nopgr = $row['nopgr'];
  $date = $row['bdate'];
  $id = $row['id'];
  $cname = $row['cname'];
  $address = $row['address'];
  $contact = $row['contact'];
  $gst = $row['gst'];
  $prefix = array();
  $pname = array();
  $category = array();
  //header("location: print.php");
} else {
  $error = true;
}
if ($result1) {
  $i = 0;
  while ($row = mysqli_fetch_assoc($result1)) {
    $prefix[$i] = $row['prefix'];
    $pname[$i] = $row['pname'];
    $category[$i] = $row['category'];
    $i++;
  }
} else {
  $error = true;
}
/*for($p=0; $p<$nopgr; $p++){
echo $prefix[$p];
echo $pname[$p];
echo $category[$p];
}
*/

?>
<!DOCTYPE html>
<html lan="en">

<head>
  <title>Ticket booking</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </haed>

<body>
  <?php require "partials/_nav.php";
  ?>
  <div class="container border border-2 border-white p-0">
    <div class="row">
      <div class=" col p-0 m-2">
        <img src="logo.jpeg" height="90">
      </div>
      <div class="col p-0 m-auto">
        <p class="m-0 p-0 float-right"><strong>AIRLINE PNR: </strong>
          <?php echo " " . $pnr." "; ?><span style="font-size: 12px" <?php 
          if($status=='CONFIRMED'){echo 'class="border border-success rounded bg-success text-white px-1">';}
          else {echo 'class="border border-danger rounded bg-danger text-white px-1">';} ?><?php echo $status; ?></span><br>
          <strong>BOOKING ID: </strong>IN<?php echo $id; ?><br>
          <strong>BOOKING DATE: </strong><?php echo date('d M Y', strtotime($date)); ?>
        </p>
      </div>
    </div>
  </div>
  <div class="d-grid gap-0">
    <div class="container  border border-2 border-danger p-0">
      <div class="row  bg-danger text-white m-0 p-0">
        <div class="col">
          <p>Your flight from
            <?php echo $froms . " to " . $tos; ?>
          </p>
        </div>
        <div class="col">
          <p style="font-size:12px;float:right">*Please varify flight times with the airlines prior to departure
          </p>
        </div>
      </div>
      <div class="container p-0 m-0">
        <table class="table m-0">
          <thead class="table-secondary">
            <tr>
              <th scope="col">Flight Details</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Stops</th>
              <th scope="col">Class</th>
            </tr>
          </thead>
          <tbody>
            <td>

              <div class="container col m-0 p-0">
                <img style="float: left;" src="logo2.png" width=60 height=60>
                <p style="text-align:center; margin:5px; padding:0px; float:left"><b><small><?php echo $fno; ?></small></b><br>
                  <?php echo $flight; ?>
                </p>
              </div>

            </td>

            <td>
              <div>
                <p style="margin:0px;">
                  <?php echo $froms; ?><br>
                  <?php echo date('D, d M Y', strtotime($from_date)) . "<br>" . date('H:i', strtotime($from_time)); ?>
                </p>
              </div>
            </td>
            <td>
              <div>
                <p style="margin:0px;">
                  <?php echo $tos; ?><br>
                  <?php echo date('D, d M Y', strtotime($to_date)) . "<br>" . date('H:i', strtotime($to_time)); ?>
                </p>
              </div>
            </td>
            <td>
              <div>
                <p><?php echo $stop; ?></p>
              </div>
            </td>
            <td>
              <div>
                <p><?php echo $class; ?></p>
              </div>
            </td>
          </tbody>
          
        </table>
      </div>
    </div>
    <!---------------------------------------------------------------------------------------------------------->

    <div class="container  border border-2 border-danger p-0">
      <div class="row  bg-danger text-white m-0 p-0">
        <div class="col float-left">
          <p>Passenger Details</Details>
          </p>
        </div>
      </div>
      <div class="container p-0 m-0">
        <table class="table m-0">
          <thead class="table-secondary">
            <tr>
              <th scope="col">S. No.</th>
              <th scope="col">Passenger Name</th>
              <th scope="col">Category</th>
              <th scope="col">PNR</th>
            </tr>
          </thead>
          <tbody>

            <?php for ($i = 0; $i < $nopgr; $i++) {
              $j = $i + 1;

              echo "<tr><td>" . $j . "</td><td>" . $pname[$i] . "</td><td>".$category[$i]."</td><td>" . $pnr . "</td></tr>";
            } ?>

          </tbody>
        </table>
      </div>
    </div>
    <div class="container  border border-2 border-danger p-0">
      <div class="row  bg-danger text-white m-0 p-0">
        <div class="col">
          <p>Payment Information (INR)</p>
        </div>
        <div class="col">
          <p style="float:right"><?php echo $ttype; ?></p>
        </div>
      </div>
      <div class="container p-0 m-0">
        <table class="table m-0">
          <thead class="table-secondary">
            <tr>
              <th scope="col">Base Charges</th>
              <th scope="col">Other Taxes and Fees</th>
              <th scope="col">Total Amount Paid</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $bcharge; ?></td>
              <td><?php echo $tax; ?></td>
              <td><?php echo $ctc; ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container  border border-2 border-danger p-0">
      <div class="row  bg-danger text-white m-0 p-0">
        <div class="col">
          <p>Customer Details</p>
        </div>
      </div>
      <div class="container p-0 m-0">
        <table class="table m-0">
          <thead class="table-secondary">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">GST No.</th>
              <th scope="col">Contact</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $cname; ?></td>
              <td><?php echo $address; ?></td>
              <td><?php echo $gst; ?></td>
              <td><?php echo $contact; ?> </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="container  border border-2 border-danger p-0">
      <div class="row  bg-danger text-white m-0 p-0">
        <div class="col float-left">
          <p>Important Information</Details>
          </p>
        </div>
      </div>
      <div class="container">
        <p style="font-size:11.5px">
          &#x2022; You must web check-in on the airline website and obtain a boarding pass.<br>
          &#x2022; You must download & register on the Aarogya Setu App and carry a valid ID.<br>
          &#x2022; It is mandatory to wear a mask and carry other protective gear.<br>
          &#x2022; Reach the terminal at least 2 hours prior to the departure for domestic flight and 4 hours prior to the
          departure of international flight.<br>
          &#x2022; For departure terminal please check with the airline first.<br>
          &#x2022; Date & Time is calculated based on the local time of the city/destination.<br>
          &#x2022; Use the Airline PNR for all Correspondence directly with the Airline.<br>
          &#x2022; For rescheduling/cancellation within 4 hours of the departure time contact the airline directly.<br>
          &#x2022; Your ability to travel is at the sole discretion of the airport authorities and we shall not be held
          responsible.
        </p>
      </div>
    </div>


    <div class="mx-auto my-auto p-2" style="width: 200px;" id="buttons">
      <button type="button" onclick="pformathide();dprint();pformatshow()">Print</button>
      <button type="button" onclick="window.location='update.php?pnr=<?php echo $pnr ?>'">Update</button>
    </div>
  </div>
  <script>
    function pformathide() {
      document.getElementById("buttons").style.display = "none";
      document.getElementById("headers").style.display = "none";
    }

    function pformatshow() {
      document.getElementById("buttons").style.display = "block";
      document.getElementById("headers").style.display = "block";
    }

    function dprint() {
      document.title = 'IN<?php echo $id; ?>';
      window.print();
      return false;
    }
  </script>
</body>

</html>