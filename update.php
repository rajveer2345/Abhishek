
<?php
session_start();
if(!isset($_SESSION["username"])){
  header("location: login.php");
  exit;
}       
        $error=false;
        include 'partials/_dbconnect.php';
        $pnr = $_GET["pnr"];
        $sql="select * from fdetail WHERE pnr='$pnr'";
        $sql1="select * from passenger where pnr='$pnr'";
        $result=mysqli_query($conn,$sql);
        $result1=mysqli_query($conn,$sql1);
        if($result){

          $row = mysqli_fetch_assoc($result);
          $flight = $row['flight'];
          $fno = $row['fno'];
          $ttype = $row['ttype'];
          $froms = $row['froms'];
          $from_date = $row['from_date'];
          $from_time = $row['from_time'];
          $tos = $row['tos'];
          $to_date = $row['to_date'];
          $to_time = $row['to_time'];
          $cost = $row['cost'];
          $price = $row['price'];
          $comment = $row['comment'];
          $nopgr = $row['nopgr'];
          $date = $row['bdate'];
          $prefix=array();
          $pname=array();
          $category=array();
          //header("location: print.php");
        }else{
            $error=true;
        }
        if($result1){
           $i=0;
          while($row = mysqli_fetch_assoc($result1))
          {
            $prefix[$i] = $row['prefix'];
            $pname[$i] = $row['pname'];
            $category[$i] = $row['category'];
            $i++;
          }
        }else{
            $error=true;
        }
       
       //------------------------------------------------------------------------- 
       if($_SERVER["REQUEST_METHOD"] == "POST") {

        include 'partials/_dbconnect.php';
        $uerror=false;
        $upnr = $_POST["pnr"];
        $uflight = $_POST["flight"];
        $ufno = $_POST["fno"];
        $uttype=$_POST["ttype"];
        $ufrom = $_POST["from"];
        $ufrom_date = $_POST["from_date"];
        $ufrom_time = $_POST["from_time"];
        $uto = $_POST["to"];
        $uto_date = $_POST["to_date"];
        $uto_time = $_POST["to_time"];
        $ucost = $_POST["cost"];
        $uprice = $_POST["price"];
        $ucomment = $_POST["comment"];
        $upass_count = $_POST["pass_count"];  
        $umembers = array();
        $uprefix = array();
        $ucategory = array();
        $usql1 = array();
        $result1 = array();
  
        $sqldelete="delete from passenger where pnr='$upnr'";
        if(mysqli_query($conn,$sqldelete)){
            for($i=0; $i<$upass_count; $i++){
                $umembers[$i]=$_POST["member".$i];
                $uprefix[$i]=$_POST["prefix".$i];
                $ucategory[$i]=$_POST["category".$i];
                $sql1update[$i]="insert into passenger values('$upnr','$uprefix[$i]','$umembers[$i]','$ucategory[$i]')";
                $result1update[$i]=mysqli_query($conn,$sql1update[$i]);
            }  
        }
        

        $sqlupdate="update fdetail set flight='$uflight', fno='$ufno', ttype='$uttype',froms='$ufrom',from_date='$ufrom_date',from_time='$ufrom_time',tos='$uto',to_date='$uto_date',to_time='$uto_time',cost=$ucost,price=$uprice,comment='$ucomment',nopgr=$upass_count where pnr='$upnr'";
        $resultupdate=mysqli_query($conn,$sqlupdate);
        if($resultupdate){
          header("location: ticket.php?pnr=$upnr");
        }else{
            $uerror=true;
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
  <script type='text/javascript'>
                var pnamearr = <?php echo json_encode($pname); ?>;
                var prefixarr = <?php echo json_encode($prefix); ?>;
                var categoryarr = <?php echo json_encode($category); ?>;
        function addFields(){
            // Generate a dynamic number of inputs
            var number = document.getElementById("member").value;
            // Get the element where the inputs will be added to
            var container = document.getElementById("container");
            // Remove every children it had before
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }  
                       
            for (var i=0;i<number;i++){

                var secrow = document.createElement("div");
                secrow.className = "row g-3 mx-2";
                container.appendChild(secrow);
                var sec1 = document.createElement("div");
                sec1.className = "col-auto";
                sec1.appendChild(document.createTextNode((i+1)+". "));
                secrow.appendChild(sec1);
                var sec2 = document.createElement("div");
                sec2.className = "col-auto";
                secrow.appendChild(sec2);
                var selectpre = document.createElement("select");
                selectpre.name = "prefix"+i;
                selectpre.id = "prefix"+i;
                selectpre.className="form-select";
                var optionp1 = document.createElement("option");
                optionp1.value = "Mr.";
                optionp1.text = "Mr.";
                var optionp2 = document.createElement("option");
                optionp2.value = "Ms.";
                optionp2.text = "Ms.";
                var optionp3 = document.createElement("option");
                optionp3.value = "Mrs.";
                optionp3.text = "Mrs.";
                var optionp4 = document.createElement("option");
                optionp4.value = "Master";
                optionp4.text = "Master";
                var optionp5 = document.createElement("option");
                optionp5.value = "Miss";
                optionp5.text = "Miss";
                selectpre.appendChild(optionp1);
                selectpre.appendChild(optionp2);
                selectpre.appendChild(optionp3);
                selectpre.appendChild(optionp4);
                selectpre.appendChild(optionp5);
                sec2.appendChild(selectpre);
                sec2.appendChild(document.createElement("br"));

                var sec3 = document.createElement("div");
                sec3.className = "col-auto";
                secrow.appendChild(sec3);
                var input1 = document.createElement("input");
                input1.type = "text";
                input1.placeholder= "NAME";
                input1.className="form-control";
                input1.name = "member"+i;
                input1.id = "member"+i;
                input1.required=true;
                sec3.appendChild(input1);
                sec3.appendChild(document.createElement("br"));
                var sec4 = document.createElement("div");
                sec4.className = "col-auto";
                secrow.appendChild(sec4);
                var selectList = document.createElement("select");
                selectList.name = "category"+i;
                selectList.id = "category"+i;
                selectList.className="form-select";
                var option1 = document.createElement("option");
                option1.value = "ADULT";
                option1.text = "ADULT";
                var option2 = document.createElement("option");
                option2.value = "CHILD";
                option2.text = "CHILD";
                var option3 = document.createElement("option");
                option3.value = "INFANT";
                option3.text = "INFANT";
                selectList.appendChild(option1);
                selectList.appendChild(option2);
                selectList.appendChild(option3);
                sec4.appendChild(selectList);
                sec4.appendChild(document.createElement("br"));
                //document.getElementById('category'+i).value= categoryarr[i];
                //document.getElementById('prefix'+i).value= prefixarr[i];
            }
               
               /*for(var i=0;i<number;i++){
                document.getElementById('category'+i).value= categoryarr[i];
                document.getElementById('prefix'+i).value= prefixarr[i];
               }*/
        }
        function pdetails(){
             var number = document.getElementById("member").value;
             for(var i=0;i<number;i++){
                document.getElementById('category'+i).value= categoryarr[i];
                document.getElementById('prefix'+i).value= prefixarr[i];
                document.getElementById('member'+i).value= pnamearr[i];
                
               }
        }
    </script>
</head>
<body onload="addFields();
document.getElementById('to').value='<?php echo $tos; ?>';
document.getElementById('flight').value='<?php echo $flight; ?>';
document.getElementById('from').value='<?php echo $froms; ?>';
document.getElementById('ttype').value='<?php echo $ttype; ?>'; pdetails()">
<?php require "partials/_nav.php";
if($error){
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Alert!</strong> Technical error.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
<form method="POST">
  <div class="col-auto mx-3" >
    <label for="pnr" class="form-label">PNR</label>
    <input type="text" class="form-control" name="pnr" id="pnr" value="<?php echo $pnr; ?>" readonly required>
</div>
<div class="row g-3 mx-2">
<div class="col-auto">
    <label for="flight" class="form-label">FLIGHT</label>
    <select class="form-select" id="flight" name="flight">
    <option value="AIR INDIA">AIR INDIA</option>
    <option value="AIR INDIA EXPRESS">AIR INDIA EXPRESS</option>
    <option value="AIX CONNECT">AIX CONNECT</option>
    <option value="AKASA AIR">AKASA AIR</option>
    <option value="GO FIRST">GO FIRST</option>
    <option value="INDIGO">INDIGO</option>
    <option value="JET AIRWAYS">JET AIRWAYS</option>
    <option value="SPICE JET">SPICE JET</option>
    <option value="VISTARA">VISTARA</option>
    <option value="ALLIANCE AIR">ALLIANCE AIR</option>
    <option value="FLYBIG">FLYBIG</option>
    <option value="INDIAONE AIR">INDIAONE AIR</option>
    <option value="STAR AIR">STAR AIR</option>
    </select>
</div>
<div class="col-auto">
<label for="fno" class="form-label">FLIGHT NUMBER</label>
<input type="text" class="form-control" id="fno" name="fno" value="<?php echo $fno; ?>" required>
</div>
<div class="col-auto">
<label for="ttype" class="form-label">TICKET TYPE</label>
<select class="form-select" id="ttype" name="ttype" value="<?php echo $ttype; ?>">
    <option value="Refundable">REFUNDABLE</option>
    <option value="Non-Refundable">NON-REFUNDABLE</option>
</select>
</div>
</div>

<div class="row g-3 mx-2">
<div class="col-auto">
    <label for="from" class="form-label">FROM</label>
    <select class="form-select" id="from" name="from" selected="<?php echo $froms; ?>">
    <option value="Delhi DEL">Delhi DEL</option>
    <option value="Mumbai BOM">Mumbai BOM</option>
    <option value="Pune PNQ">Pune PNQ</option>
    <option value="North Goa GOX">North Goa GOX</option>
    <option value="Banglore BLR">Banglore BLR</option>
    <option value="Kolkata CCU">Kolkata CCU</option>
    <option value="Vishakhapatanam VTZ">Vishakhapatanam VTZ</option>
    <option value="Jammu IXJ">Jammu IXJ</option>
    <option value="Ahamadabad AMD">Ahamadabad AMD</option>
    <option value="Goa In GOA">Goa In GOA</option>
    <option value="Shirdi SAG">Shirdi SAG</option>
    <option value="Srinagar SXR">Srinagar SXR</option>
    <option value="Surat STV">Surat STV</option>
    <option value="Tirupati TIR">Tirupati TIR</option>
    <option value="Udaipur UDR">Udaipur UDR</option>
    <option value="Varanasi VNS">Varanasi VNS</option>
    <option value="Jharsuguda JRG">Jharsuguda JRG</option>
    <option value="Jodhpur JDH">Jodhpur JDH</option>
    <option value="Kochi COK">Kochi COK</option>
    <option value="Leh IN IXL">Leh IN IXL</option>
    <option value="Patna PAT">Patna PAT</option>
    <option value="Phuket HKT">Phuket HKT</option>
    <option value="Port Blair IXZ">Port Blair IXZ</option>
    <option value="Rajkot RAJ">Rajkot RAJ</option>
    <option value="Ranchi IXR">Ranchi IXR</option>
    <option value="Bagdogra IXB">Bagdogra IXB</option>
    <option value="Bangkok BKK">Bangkok BKK</option>
    <option value="Chennai MAA">Chennai MAA</option>
    <option value="Darbhanga DBR">Darbhanga DBR</option>
    <option value="Durgapur RDP">Durgapur RDP</option>
    <option value="Gorakhpur GOP">Gorakhpur GOP</option>
    <option value="Guwahati GAU">Guwahati GAU</option>
    <option value="Gwalior GWL">Gwalior GWL</option>
    <option value="Hyderabad HYD">Hyderabad HYD</option>
    <option value="Jaipur JAI">Jaipur JAI</option>
    <option value="Jaisalmer JSA">Jaisalmer JSA</option>
    </select>
</div>

<div class="col-auto">
    <label for="dtf" class="form-label">DATE</label>
    <input type="date" class="form-control" id="dtf" name="from_date" value="<?php echo $from_date; ?>" required>
</div>

<div class="col-auto">
    <label for="tmf" class="form-label">TIME</label>
    <input type="time" class="form-control" id="tmf" name="from_time" value="<?php echo $from_time; ?>" required>
</div>
</div>

<div class="row g-3 mx-2">
<div class="col-auto">
    <label for="to" class="form-label">TO</label>
    <select class="form-select" id="to" name="to" >
    <option value="Delhi DEL">Delhi DEL</option>
    <option value="Mumbai BOM">Mumbai BOM</option>
    <option value="Pune PNQ">Pune PNQ</option>
    <option value="North Goa GOX">North Goa GOX</option>
    <option value="Banglore BLR">Banglore BLR</option>
    <option value="Kolkata CCU">Kolkata CCU</option>
    <option value="Vishakhapatanam VTZ">Vishakhapatanam VTZ</option>
    <option value="Jammu IXJ">Jammu IXJ</option>
    <option value="Ahamadabad AMD">Ahamadabad AMD</option>
    <option value="Goa In GOA">Goa In GOA</option>
    <option value="Shirdi SAG">Shirdi SAG</option>
    <option value="Srinagar SXR">Srinagar SXR</option>
    <option value="Surat STV">Surat STV</option>
    <option value="Tirupati TIR">Tirupati TIR</option>
    <option value="Udaipur UDR">Udaipur UDR</option>
    <option value="Varanasi VNS">Varanasi VNS</option>
    <option value="Jharsuguda JRG">Jharsuguda JRG</option>
    <option value="Jodhpur JDH">Jodhpur JDH</option>
    <option value="Kochi COK">Kochi COK</option>
    <option value="Leh IN IXL">Leh IN IXL</option>
    <option value="Patna PAT">Patna PAT</option>
    <option value="Phuket HKT">Phuket HKT</option>
    <option value="Port Blair IXZ">Port Blair IXZ</option>
    <option value="Rajkot RAJ">Rajkot RAJ</option>
    <option value="Ranchi IXR">Ranchi IXR</option>
    <option value="Bagdogra IXB">Bagdogra IXB</option>
    <option value="Bangkok BKK">Bangkok BKK</option>
    <option value="Chennai MAA">Chennai MAA</option>
    <option value="Darbhanga DBR">Darbhanga DBR</option>
    <option value="Durgapur RDP">Durgapur RDP</option>
    <option value="Gorakhpur GOP">Gorakhpur GOP</option>
    <option value="Guwahati GAU">Guwahati GAU</option>
    <option value="Gwalior GWL">Gwalior GWL</option>
    <option value="Hyderabad HYD">Hyderabad HYD</option>
    <option value="Jaipur JAI">Jaipur JAI</option>
    <option value="Jaisalmer JSA">Jaisalmer JSA</option>
    </select>
</div>

<div class="col-auto">
    <label for="dtt" class="form-label">DATE</label>
    <input type="date" class="form-control" id="dtt" name="to_date" value="<?php echo $to_date; ?>" required>
</div>

<div class="col-auto">
    <label for="tmt" class="form-label">TIME</label>
    <input type="time" class="form-control" id="tmt" name="to_time" value="<?php echo $to_time; ?>" required>
</div>
</div>

<div class="col-auto mx-3">
    <label for="cst" class="form-label">COST</label>
    <input type="text" class="form-control" id="cst" name="cost" value="<?php echo $cost; ?>" required>
</div>

<div class="col-auto mx-3">
    <label for="price" class="form-label">PRICE</label>
    <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
</div>
<div class="col-auto mx-3">
    <label for="comment" class="form-label">COMMENT</label>
    <textarea class="form-control" id="comment" rows="3" name="comment" value="<?php echo $comment; ?>"><?php echo $comment; ?></textarea>
</div>
<div class="row g-3 mx-2">
<div class="col-auto">
<label for="member" class="form-label">NUMBER OF PASSANGERS</label>   
 <input type="number" id="member" name="pass_count" class="form-control" value="<?php echo $nopgr; ?>" required>
</div>
<div class="col-auto">
<label for="btn" class="form-label invisible">   hhh  </label><br>
 <button type="button" class="btn btn-danger" onclick="addFields()">ADD</button>
</div>
</div>
    <div id="container" class="col-auto mx-3 my-3">
    

    </div>

<div class="row g-3 mx-2">
    <div class="col-auto">
    <input class="btn btn-danger" type="submit" value="Update">
    </div>

</div>


</form>

</body>
</html>
