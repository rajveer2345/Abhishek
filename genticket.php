<?php
//session check
session_start();
if (!isset($_SESSION["username"])) {
    header("location: login.php");
    exit;
}
$error = false;
$errorpnr = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include 'partials/_dbconnect.php';
    $pnr = $_POST["pnr"];
    $pnr = strtoupper($pnr);
    $stop = $_POST["stop"];
    $class = $_POST["class"];
    $status = $_POST["status"];
    $flight = $_POST["flight"];
    $fno = $_POST["fno"];
    $fno = strtoupper($fno);
    $ttype = $_POST["ttype"];
    $from = $_POST["from"];
    $from_date = $_POST["from_date"];
    $from_time = $_POST["from_time"];
    $to = $_POST["to"];
    $to_date = $_POST["to_date"];
    $to_time = $_POST["to_time"];
    $payment = $_POST["payment"];
    $cashback = $_POST["cashback"];
    $ctb = $_POST["ctb"];
    $ctc = $_POST["ctc"];
    $bcharge = $_POST["bcharge"];
    $tax = $_POST["tax"];
    $earning = $_POST["earning"];
    $via = $_POST["via"];
    $via = strtoupper($via);
    $pmode = $_POST["pmode"];
    $pmode = strtoupper($pmode);
    $comment = $_POST["comment"];
    $pass_count = $_POST["pass_count"];
    $cname = $_POST["cname"];
    $cname = ucwords($cname);
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $address = ucwords($address);
    $gst = $_POST["gst"];
    $gst = strtoupper($gst);
    $members = array();
    $prefix = array();
    $category = array();
    $sql1 = array();
    $result1 = array();
    for ($i = 0; $i < $pass_count; $i++) {
        $members[$i] = $_POST["member" . $i];
        $members[$i] = ucwords($members[$i]);
        $prefix[$i] = $_POST["prefix" . $i];
        $category[$i] = $_POST["category" . $i];
    }
    //-------------------------------------------------------------------------------- 
    $sqlcheck = "select * from fdetail where pnr='$pnr'";
    $resultcheck = mysqli_query($conn, $sqlcheck);
    if (mysqli_num_rows($resultcheck) > 0) {

        $errorpnr = true;
    } else {
        for ($i = 0; $i < $pass_count; $i++) {
            $sql1[$i] = "insert into passenger values('$pnr','$prefix[$i]','$members[$i]','$category[$i]')";
            $result1[$i] = mysqli_query($conn, $sql1[$i]);
        }
        $sql = "insert into fdetail (email,pnr,stop,class,status,flight,fno,ttype,froms,from_date,from_time,tos,to_date,to_time,payment,cashback,ctb,ctc,bcharge,tax,earning,via,pmode,comment,nopgr,cname,contact,address,gst,bdate) 
        values('{$_SESSION['email']}','$pnr',$stop,'$class','$status','$flight','$fno','$ttype','$from','$from_date','$from_time','$to','$to_date','$to_time',$payment,$cashback,$ctb,$ctc,$bcharge,$tax,$earning,'$via','$pmode','$comment',$pass_count,'$cname','$contact','$address','$gst',current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: ticket.php?pnr=$pnr");
        } else {
            $error = true;
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
    <script type='text/javascript'>
        function addFields() {
            // Generate a dynamic number of inputs
            var number = document.getElementById("member").value;
            // Get the element where the inputs will be added to
            var container = document.getElementById("container");
            // Remove every children it had before
            while (container.hasChildNodes()) {
                container.removeChild(container.lastChild);
            }
            for (i = 0; i < number; i++) {

                var secrow = document.createElement("div");
                secrow.className = "row g-3 mx-2";
                container.appendChild(secrow);

                var sec1 = document.createElement("div");
                sec1.className = "col-auto";
                sec1.appendChild(document.createTextNode((i + 1) + ". "));
                secrow.appendChild(sec1);

                var sec2 = document.createElement("div");
                sec2.className = "col-auto";
                secrow.appendChild(sec2);
                var selectpre = document.createElement("select");
                selectpre.name = "prefix" + i;
                selectpre.className = "form-select";
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
                input1.placeholder = "NAME";
                input1.style = "text-transform: capitalize;";
                input1.className = "form-control";
                input1.name = "member" + i;
                input1.id = "member" + i;
                input1.required = true;
                sec3.appendChild(input1);
                sec3.appendChild(document.createElement("br"));

                var sec4 = document.createElement("div");
                sec4.className = "col-auto";
                secrow.appendChild(sec4);
                var selectList = document.createElement("select");
                selectList.name = "category" + i;
                selectList.className = "form-select";
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
            }
        }

        function addfdblock() {
            var fd = document.getElementById("fd");
            var stp = document.getElementById("stop").value;
            var fillvalue = document.getElementById("fill").value;
            while (fd.hasChildNodes()) {
                fd.removeChild(fd.lastChild);
            }
            for (i = 0; i <= stp; i++) {
                var fdblock = document.createElement("div");
                fdblock.className = "border border-secondary mb-1 py-2";
                fd.appendChild(fdblock);

                var rowone = document.createElement("div");
                rowone.className = "row g-3 mx-2";
                rowone.id = "rowone" + i;
                fdblock.appendChild(rowone);


                var flightname = document.createElement("div");
                flightname.className = "col-auto";
                flightname.id = "fnamediv" + i;
                rowone.appendChild(flightname);

                var flightnum = document.createElement("div");
                flightnum.className = "col-auto";
                flightnum.id = "fnumdiv" + i;
                rowone.appendChild(flightnum);
                /* var fill = document.createElement("div");
                 fill.className = "col-auto";
                 rowone.appendChild(fill);
                 var labelfill = document.createElement("label");
                 labelfill.setAttribute("for", "fill" + i);
                 labelfill.innerHTML = "FILL";
                 fill.appendChild(labelfill);
                 fill.appendChild(document.createElement("br"));
                 var selectfill = document.createElement("select");
                 selectfill.name = "fill" + i;
                 selectfill.id = "fill" + i;
                 selectfill.className = "form-select";
                 var optionf1 = document.createElement("option");
                 optionf1.value = "auto";
                 optionf1.text = "AUTO";
                 optionf1.selected = true;
                 var optionf2 = document.createElement("option");
                 optionf2.value = "manual";
                 optionf2.text = "MANUAL";
                 selectfill.appendChild(optionf1);
                 selectfill.appendChild(optionf2);
                 fill.appendChild(selectfill);*/



                var rowtwo = document.createElement("div");
                rowtwo.className = "row g-3 mx-2";
                fdblock.appendChild(rowtwo);

                var fromdiv = document.createElement("div");
                fromdiv.className = "col-auto";
                fromdiv.id = "fromdiv" + i;
                rowtwo.appendChild(fromdiv);

                var flightfromdate = document.createElement("div");
                flightfromdate.className = "col-auto";
                rowtwo.appendChild(flightfromdate);
                var labelfd = document.createElement("label");
                labelfd.setAttribute("for", "from_date" + i);
                labelfd.innerHTML = "DATE";
                flightfromdate.appendChild(labelfd);
                flightfromdate.appendChild(document.createElement("br"));
                var inputdate = document.createElement("input");
                inputdate.id = "from_date" + i;
                inputdate.name = "from_date" + i;
                inputdate.type = "date";
                inputdate.className = "form-control";
                flightfromdate.appendChild(inputdate);

                var flightfromtime = document.createElement("div");
                flightfromtime.className = "col-auto";
                rowtwo.appendChild(flightfromtime);
                var labelft = document.createElement("label");
                labelft.setAttribute("for", "from_time" + i);
                labelft.innerHTML = "TIME";
                flightfromtime.appendChild(labelft);
                flightfromtime.appendChild(document.createElement("br"));
                var inputtime = document.createElement("input");
                inputtime.id = "from_time" + i;
                inputtime.name = "from_time" + i;
                inputtime.type = "time";
                inputtime.className = "form-control";
                flightfromtime.appendChild(inputtime);



                var rowthree = document.createElement("div");
                rowthree.className = "row g-3 mx-2";
                fdblock.appendChild(rowthree);

                var todiv = document.createElement("div");
                todiv.className = "col-auto";
                todiv.id = "todiv" + i;
                rowthree.appendChild(todiv);

                var flighttodate = document.createElement("div");
                flighttodate.className = "col-auto";
                rowthree.appendChild(flighttodate);
                var labelfdt = document.createElement("label");
                labelfdt.setAttribute("for", "to_date" + i);
                labelfdt.innerHTML = "DATE";
                flighttodate.appendChild(labelfdt);
                flighttodate.appendChild(document.createElement("br"));
                var inputdateto = document.createElement("input");
                inputdateto.id = "to_date" + i;
                inputdateto.name = "to_date" + i;
                inputdateto.type = "date";
                inputdateto.className = "form-control";
                flighttodate.appendChild(inputdateto);

                var flighttotime = document.createElement("div");
                flighttotime.className = "col-auto";
                rowthree.appendChild(flighttotime);
                var labelftt = document.createElement("label");
                labelftt.setAttribute("for", "to_time" + i);
                labelftt.innerHTML = "TIME";
                flighttotime.appendChild(labelftt);
                flighttotime.appendChild(document.createElement("br"));
                var inputtimeto = document.createElement("input");
                inputtimeto.id = "to_time" + i;
                inputtimeto.name = "to_time" + i;
                inputtimeto.type = "time";
                inputtimeto.className = "form-control";
                flighttotime.appendChild(inputtimeto);

                /*---------------------------------------------------------------------*/
                if (fillvalue == "auto") {

                    while (flightname.hasChildNodes()) {
                        flightname.removeChild(flightname.lastChild);
                    }
                    var labelfn = document.createElement("label");
                    labelfn.setAttribute("for", "flight" + i);
                    labelfn.innerHTML = "FLIGHT";
                    flightname.appendChild(labelfn);
                    flightname.appendChild(document.createElement("br"));

                    var selectflight = document.createElement("select");
                    selectflight.name = "flight" + i;
                    selectflight.id = "flight" + i;
                    selectflight.className = "form-select";
                    var optionfl1 = document.createElement("option");
                    optionfl1.value = "auto";
                    optionfl1.text = "AUTO";
                    var optionfl2 = document.createElement("option");
                    optionfl2.value = "manual";
                    optionfl2.text = "MANUAL";
                    var optionfl3 = document.createElement("option");
                    optionfl3.value = "manual";
                    optionfl3.text = "MANUAL";
                    var optionfl4 = document.createElement("option");
                    optionfl4.value = "manual";
                    optionfl4.text = "MANUAL";
                    var optionfl5 = document.createElement("option");
                    optionfl5.value = "manual";
                    optionfl5.text = "MANUAL";
                    var optionfl6 = document.createElement("option");
                    optionfl6.value = "manual";
                    optionfl6.text = "MANUAL";
                    var optionfl7 = document.createElement("option");
                    optionfl7.value = "manual";
                    optionfl7.text = "MANUAL";
                    var optionfl8 = document.createElement("option");
                    optionfl8.value = "manual";
                    optionfl8.text = "MANUAL";
                    var optionfl9 = document.createElement("option");
                    optionfl9.value = "manual";
                    optionfl9.text = "MANUAL";
                    var optionfl10 = document.createElement("option");
                    optionfl10.value = "manual";
                    optionfl10.text = "MANUAL";
                    var optionfl11 = document.createElement("option");
                    optionfl11.value = "manual";
                    optionfl11.text = "MANUAL";
                    var optionfl12 = document.createElement("option");
                    optionfl12.value = "manual";
                    optionfl12.text = "MANUAL";
                    var optionfl13 = document.createElement("option");
                    optionfl13.value = "manual";
                    optionfl13.text = "MANUAL";

                    selectflight.appendChild(optionfl1);
                    selectflight.appendChild(optionfl2);
                    selectflight.appendChild(optionfl3);
                    selectflight.appendChild(optionfl4);
                    selectflight.appendChild(optionfl5);
                    selectflight.appendChild(optionfl6);
                    selectflight.appendChild(optionfl7);
                    selectflight.appendChild(optionfl8);
                    selectflight.appendChild(optionfl9);
                    selectflight.appendChild(optionfl10);
                    selectflight.appendChild(optionfl11);
                    selectflight.appendChild(optionfl12);
                    selectflight.appendChild(optionfl13);

                    flightname.appendChild(selectflight);


                    while (flightnum.hasChildNodes()) {
                        flightnum.removeChild(flightnum.lastChild);
                    }

                    var labelfnum = document.createElement("label");
                    labelfnum.setAttribute("for", "fnum" + i);
                    labelfnum.innerHTML = "FLIGHT NO.";
                    flightnum.appendChild(labelfnum);
                    flightnum.appendChild(document.createElement("br"));
                    var fnum = document.createElement("input");
                    fnum.className = "form-control";
                    fnum.type = "text";
                    fnum.id = "fnum" + i;
                    fnum.name = "fno";
                    flightnum.appendChild(fnum);

                    while (fromdiv.hasChildNodes()) {
                        fromdiv.removeChild(fromdiv.lastChild);
                    }

                    var labelfrom = document.createElement("label");
                    labelfrom.setAttribute("for", "froms" + i);
                    labelfrom.innerHTML = "FROM";
                    fromdiv.appendChild(labelfrom);
                    fromdiv.appendChild(document.createElement("br"));
                    var froms = document.createElement("select");
                    froms.name = "froms" + i;
                    froms.id = "froms" + i;
                    froms.className = "form-select";
                    var optionfrom1 = document.createElement("option");
                    optionfrom1.value = "Delhi (DEL)";
                    optionfrom1.text = "Delhi (DEL)";
                    var optionfrom2 = document.createElement("option");
                    optionfrom2.value = "Mumbai (BOM)";
                    optionfrom2.text = "Mumbai (BOM)";
                    var optionfrom3 = document.createElement("option");
                    optionfrom3.value = "Pune (PNQ)";
                    optionfrom3.text = "Pune (PNQ)";
                    var optionfrom4 = document.createElement("option");
                    optionfrom4.value = "North Goa (GOX)";
                    optionfrom4.text = "North Goa (GOX)";
                    var optionfrom5 = document.createElement("option");
                    optionfrom5.value = "Banglore (BLR)";
                    optionfrom5.text = "Banglore (BLR)";
                    var optionfrom6 = document.createElement("option");
                    optionfrom6.value = "Kolkata (CCU)";
                    optionfrom6.text = "Kolkata (CCU)";
                    var optionfrom7 = document.createElement("option");
                    optionfrom7.value = "Vishakhapatanam (VTZ)";
                    optionfrom7.text = "Vishakhapatanam (VTZ)";
                    var optionfrom8 = document.createElement("option");
                    optionfrom8.value = "Jammu (IXJ)";
                    optionfrom8.text = "Jammu (IXJ)";
                    var optionfrom9 = document.createElement("option");
                    optionfrom9.value = "Ahamadabad (AMD)";
                    optionfrom9.text = "Ahamadabad (AMD)";
                    var optionfrom10 = document.createElement("option");
                    optionfrom10.value = "Goa In (GOA)";
                    optionfrom10.text = "Goa In (GOA)";
                    var optionfrom11 = document.createElement("option");
                    optionfrom11.value = "Shirdi (SAG)";
                    optionfrom11.text = "Shirdi (SAG)";
                    var optionfrom12 = document.createElement("option");
                    optionfrom12.value = "Srinagar (SXR)";
                    optionfrom12.text = "Srinagar (SXR)";
                    var optionfrom13 = document.createElement("option");
                    optionfrom13.value = "Surat (STV)";
                    optionfrom13.text = "Surat (STV)";
                    var optionfrom14 = document.createElement("option");
                    optionfrom14.value = "Tirupati (TIR)";
                    optionfrom14.text = "Tirupati (TIR)";
                    var optionfrom15 = document.createElement("option");
                    optionfrom15.value = "Udaipur (UDR)";
                    optionfrom15.text = "Udaipur (UDR)";
                    var optionfrom16 = document.createElement("option");
                    optionfrom16.value = "Varanasi (VNS)";
                    optionfrom16.text = "Varanasi (VNS)";
                    var optionfrom17 = document.createElement("option");
                    optionfrom17.value = "Jharsuguda (JRG)";
                    optionfrom17.text = "Jharsuguda (JRG)";
                    var optionfrom18 = document.createElement("option");
                    optionfrom18.value = "Jodhpur (JDH)";
                    optionfrom18.text = "Jodhpur (JDH)";
                    var optionfrom19 = document.createElement("option");
                    optionfrom19.value = "Kochi (COK)";
                    optionfrom19.text = "Kochi (COK)";
                    var optionfrom20 = document.createElement("option");
                    optionfrom20.value = "Leh IN (IXL)";
                    optionfrom20.text = "Leh IN (IXL)";
                    var optionfrom21 = document.createElement("option");
                    optionfrom21.value = "Patna (PAT)";
                    optionfrom21.text = "Patna (PAT)";
                    var optionfrom22 = document.createElement("option");
                    optionfrom22.value = "Phuket (HKT)";
                    optionfrom22.text = "Phuket (HKT)";
                    var optionfrom23 = document.createElement("option");
                    optionfrom23.value = "Port Blair (IXZ)";
                    optionfrom23.text = "Port Blair (IXZ)";
                    var optionfrom24 = document.createElement("option");
                    optionfrom24.value = "Rajkot (RAJ)";
                    optionfrom24.text = "Rajkot (RAJ)";
                    var optionfrom25 = document.createElement("option");
                    optionfrom25.value = "Ranchi (IXR)";
                    optionfrom25.text = "Ranchi (IXR)";
                    var optionfrom26 = document.createElement("option");
                    optionfrom26.value = "Bagdogra (IXB)";
                    optionfrom26.text = "Bagdogra (IXB)";
                    var optionfrom27 = document.createElement("option");
                    optionfrom27.value = "Bangkok (BKK)";
                    optionfrom27.text = "Bangkok (BKK)";
                    var optionfrom28 = document.createElement("option");
                    optionfrom28.value = "Chennai (MAA)";
                    optionfrom28.text = "Chennai (MAA)";
                    var optionfrom29 = document.createElement("option");
                    optionfrom29.value = "Darbhanga (DBR)";
                    optionfrom29.text = "Darbhanga (DBR)";
                    var optionfrom30 = document.createElement("option");
                    optionfrom30.value = "Durgapur (RDP)";
                    optionfrom30.text = "Durgapur (RDP)";
                    var optionfrom31 = document.createElement("option");
                    optionfrom31.value = "Gorakhpur (GOP)";
                    optionfrom31.text = "Gorakhpur (GOP)";
                    var optionfrom32 = document.createElement("option");
                    optionfrom32.value = "Guwahati (GAU)";
                    optionfrom32.text = "Guwahati (GAU)";
                    var optionfrom33 = document.createElement("option");
                    optionfrom33.value = "Gwalior (GWL)";
                    optionfrom33.text = "Gwalior (GWL)";
                    var optionfrom34 = document.createElement("option");
                    optionfrom34.value = "Hyderabad (HYD)";
                    optionfrom34.text = "Hyderabad (HYD)";
                    var optionfrom35 = document.createElement("option");
                    optionfrom35.value = "Jaipur (JAI)";
                    optionfrom35.text = "Jaipur (JAI)";
                    var optionfrom36 = document.createElement("option");
                    optionfrom36.value = "Jaisalmer (JSA)";
                    optionfrom36.text = "Jaisalmer (JSA)";
                    froms.appendChild(optionfrom1);
                    froms.appendChild(optionfrom2);
                    froms.appendChild(optionfrom3);
                    froms.appendChild(optionfrom4);
                    froms.appendChild(optionfrom5);
                    froms.appendChild(optionfrom6);
                    froms.appendChild(optionfrom7);
                    froms.appendChild(optionfrom8);
                    froms.appendChild(optionfrom9);
                    froms.appendChild(optionfrom10);
                    froms.appendChild(optionfrom11);
                    froms.appendChild(optionfrom12);
                    froms.appendChild(optionfrom13);
                    froms.appendChild(optionfrom14);
                    froms.appendChild(optionfrom15);
                    froms.appendChild(optionfrom16);
                    froms.appendChild(optionfrom17);
                    froms.appendChild(optionfrom18);
                    froms.appendChild(optionfrom19);
                    froms.appendChild(optionfrom20);
                    froms.appendChild(optionfrom21);
                    froms.appendChild(optionfrom22);
                    froms.appendChild(optionfrom23);
                    froms.appendChild(optionfrom24);
                    froms.appendChild(optionfrom25);
                    froms.appendChild(optionfrom26);
                    froms.appendChild(optionfrom27);
                    froms.appendChild(optionfrom28);
                    froms.appendChild(optionfrom29);
                    froms.appendChild(optionfrom30);
                    froms.appendChild(optionfrom31);
                    froms.appendChild(optionfrom32);
                    froms.appendChild(optionfrom33);
                    froms.appendChild(optionfrom34);
                    froms.appendChild(optionfrom35);
                    froms.appendChild(optionfrom36);

                    fromdiv.appendChild(froms);

                    while (todiv.hasChildNodes()) {
                        todiv.removeChild(todiv.lastChild);
                    }
                    var labelto = document.createElement("label");
                    labelto.setAttribute("for", "tos" + i);
                    labelto.innerHTML = "FROM";
                    todiv.appendChild(labelto);
                    todiv.appendChild(document.createElement("br"));
                    var tos = document.createElement("select");
                    tos.name = "tos" + i;
                    tos.id = "tos" + i;
                    tos.className = "form-select";
                    var optionto1 = document.createElement("option");
                    optionto1.value = "Delhi (DEL)";
                    optionto1.text = "Delhi (DEL)";
                    var optionto2 = document.createElement("option");
                    optionto2.value = "Mumbai (BOM)";
                    optionto2.text = "Mumbai (BOM)";
                    var optionto3 = document.createElement("option");
                    optionto3.value = "Pune (PNQ)";
                    optionto3.text = "Pune (PNQ)";
                    var optionto4 = document.createElement("option");
                    optionto4.value = "North Goa (GOX)";
                    optionto4.text = "North Goa (GOX)";
                    var optionto5 = document.createElement("option");
                    optionto5.value = "Banglore (BLR)";
                    optionto5.text = "Banglore (BLR)";
                    var optionto6 = document.createElement("option");
                    optionto6.value = "Kolkata (CCU)";
                    optionto6.text = "Kolkata (CCU)";
                    var optionto7 = document.createElement("option");
                    optionto7.value = "Vishakhapatanam (VTZ)";
                    optionto7.text = "Vishakhapatanam (VTZ)";
                    var optionto8 = document.createElement("option");
                    optionto8.value = "Jammu (IXJ)";
                    optionto8.text = "Jammu (IXJ)";
                    var optionto9 = document.createElement("option");
                    optionto9.value = "Ahamadabad (AMD)";
                    optionto9.text = "Ahamadabad (AMD)";
                    var optionto10 = document.createElement("option");
                    optionto10.value = "Goa In (GOA)";
                    optionto10.text = "Goa In (GOA)";
                    var optionto11 = document.createElement("option");
                    optionto11.value = "Shirdi (SAG)";
                    optionto11.text = "Shirdi (SAG)";
                    var optionto12 = document.createElement("option");
                    optionto12.value = "Srinagar (SXR)";
                    optionto12.text = "Srinagar (SXR)";
                    var optionto13 = document.createElement("option");
                    optionto13.value = "Surat (STV)";
                    optionto13.text = "Surat (STV)";
                    var optionto14 = document.createElement("option");
                    optionto14.value = "Tirupati (TIR)";
                    optionto14.text = "Tirupati (TIR)";
                    var optionto15 = document.createElement("option");
                    optionto15.value = "Udaipur (UDR)";
                    optionto15.text = "Udaipur (UDR)";
                    var optionto16 = document.createElement("option");
                    optionto16.value = "Varanasi (VNS)";
                    optionto16.text = "Varanasi (VNS)";
                    var optionto17 = document.createElement("option");
                    optionto17.value = "Jharsuguda (JRG)";
                    optionto17.text = "Jharsuguda (JRG)";
                    var optionto18 = document.createElement("option");
                    optionto18.value = "Jodhpur (JDH)";
                    optionto18.text = "Jodhpur (JDH)";
                    var optionto19 = document.createElement("option");
                    optionto19.value = "Kochi (COK)";
                    optionto19.text = "Kochi (COK)";
                    var optionto20 = document.createElement("option");
                    optionto20.value = "Leh IN (IXL)";
                    optionto20.text = "Leh IN (IXL)";
                    var optionto21 = document.createElement("option");
                    optionto21.value = "Patna (PAT)";
                    optionto21.text = "Patna (PAT)";
                    var optionto22 = document.createElement("option");
                    optionto22.value = "Phuket (HKT)";
                    optionto22.text = "Phuket (HKT)";
                    var optionto23 = document.createElement("option");
                    optionto23.value = "Port Blair (IXZ)";
                    optionto23.text = "Port Blair (IXZ)";
                    var optionto24 = document.createElement("option");
                    optionto24.value = "Rajkot (RAJ)";
                    optionto24.text = "Rajkot (RAJ)";
                    var optionto25 = document.createElement("option");
                    optionto25.value = "Ranchi (IXR)";
                    optionto25.text = "Ranchi (IXR)";
                    var optionto26 = document.createElement("option");
                    optionto26.value = "Bagdogra (IXB)";
                    optionto26.text = "Bagdogra (IXB)";
                    var optionto27 = document.createElement("option");
                    optionto27.value = "Bangkok (BKK)";
                    optionto27.text = "Bangkok (BKK)";
                    var optionto28 = document.createElement("option");
                    optionto28.value = "Chennai (MAA)";
                    optionto28.text = "Chennai (MAA)";
                    var optionto29 = document.createElement("option");
                    optionto29.value = "Darbhanga (DBR)";
                    optionto29.text = "Darbhanga (DBR)";
                    var optionto30 = document.createElement("option");
                    optionto30.value = "Durgapur (RDP)";
                    optionto30.text = "Durgapur (RDP)";
                    var optionto31 = document.createElement("option");
                    optionto31.value = "Gorakhpur (GOP)";
                    optionto31.text = "Gorakhpur (GOP)";
                    var optionto32 = document.createElement("option");
                    optionto32.value = "Guwahati (GAU)";
                    optionto32.text = "Guwahati (GAU)";
                    var optionto33 = document.createElement("option");
                    optionto33.value = "Gwalior (GWL)";
                    optionto33.text = "Gwalior (GWL)";
                    var optionto34 = document.createElement("option");
                    optionto34.value = "Hyderabad (HYD)";
                    optionto34.text = "Hyderabad (HYD)";
                    var optionto35 = document.createElement("option");
                    optionto35.value = "Jaipur (JAI)";
                    optionto35.text = "Jaipur (JAI)";
                    var optionto36 = document.createElement("option");
                    optionto36.value = "Jaisalmer (JSA)";
                    optionto36.text = "Jaisalmer (JSA)";
                    tos.appendChild(optionto1);
                    tos.appendChild(optionto2);
                    tos.appendChild(optionto3);
                    tos.appendChild(optionto4);
                    tos.appendChild(optionto5);
                    tos.appendChild(optionto6);
                    tos.appendChild(optionto7);
                    tos.appendChild(optionto8);
                    tos.appendChild(optionto9);
                    tos.appendChild(optionto10);
                    tos.appendChild(optionto11);
                    tos.appendChild(optionto12);
                    tos.appendChild(optionto13);
                    tos.appendChild(optionto14);
                    tos.appendChild(optionto15);
                    tos.appendChild(optionto16);
                    tos.appendChild(optionto17);
                    tos.appendChild(optionto18);
                    tos.appendChild(optionto19);
                    tos.appendChild(optionto20);
                    tos.appendChild(optionto21);
                    tos.appendChild(optionto22);
                    tos.appendChild(optionto23);
                    tos.appendChild(optionto24);
                    tos.appendChild(optionto25);
                    tos.appendChild(optionto26);
                    tos.appendChild(optionto27);
                    tos.appendChild(optionto28);
                    tos.appendChild(optionto29);
                    tos.appendChild(optionto30);
                    tos.appendChild(optionto31);
                    tos.appendChild(optionto32);
                    tos.appendChild(optionto33);
                    tos.appendChild(optionto34);
                    tos.appendChild(optionto35);
                    tos.appendChild(optionto36);

                    todiv.appendChild(tos);
                }
                else{



                    
                }

            }

        }


        function autofd() {
            var stp = document.getElementById("stop").value;
            for (i = 0; i <= stp; i++) {
                var rowoneedit = document.getElementById("rowone" + i);
                var fillvalue = document.getElementById("fill" + i).value;
                if (fillvalue == "auto") {

                    var flightname = document.createElement("div");
                    flightname.className = "col-auto";
                    rowoneedit.appendChild(flightname);
                    var labelfn = document.createElement("label");
                    labelfn.setAttribute("for", "flight" + i);
                    labelfn.innerHTML = "FLIGHT";
                    flightname.appendChild(labelfn);
                    flightname.appendChild(document.createElement("br"));

                    var selectflight = document.createElement("select");
                    selectflight.name = "flight" + i;
                    selectflight.id = "flight" + i;
                    selectflight.className = "form-select";
                    var optionfl1 = document.createElement("option");
                    optionfl1.value = "auto";
                    optionfl1.text = "AUTO";
                    var optionfl2 = document.createElement("option");
                    optionfl2.value = "manual";
                    optionfl2.text = "MANUAL";
                    var optionfl3 = document.createElement("option");
                    optionfl3.value = "manual";
                    optionfl3.text = "MANUAL";
                    var optionfl4 = document.createElement("option");
                    optionfl4.value = "manual";
                    optionfl4.text = "MANUAL";
                    var optionfl5 = document.createElement("option");
                    optionfl5.value = "manual";
                    optionfl5.text = "MANUAL";
                    var optionfl6 = document.createElement("option");
                    optionfl6.value = "manual";
                    optionfl6.text = "MANUAL";
                    var optionfl7 = document.createElement("option");
                    optionfl7.value = "manual";
                    optionfl7.text = "MANUAL";
                    var optionfl8 = document.createElement("option");
                    optionfl8.value = "manual";
                    optionfl8.text = "MANUAL";
                    var optionfl9 = document.createElement("option");
                    optionfl9.value = "manual";
                    optionfl9.text = "MANUAL";
                    var optionfl10 = document.createElement("option");
                    optionfl10.value = "manual";
                    optionfl10.text = "MANUAL";
                    var optionfl11 = document.createElement("option");
                    optionfl11.value = "manual";
                    optionfl11.text = "MANUAL";
                    var optionfl12 = document.createElement("option");
                    optionfl12.value = "manual";
                    optionfl12.text = "MANUAL";
                    var optionfl13 = document.createElement("option");
                    optionfl13.value = "manual";
                    optionfl13.text = "MANUAL";

                    selectflight.appendChild(optionfl1);
                    selectflight.appendChild(optionfl2);
                    selectflight.appendChild(optionfl3);
                    selectflight.appendChild(optionfl4);
                    selectflight.appendChild(optionfl5);
                    selectflight.appendChild(optionfl6);
                    selectflight.appendChild(optionfl7);
                    selectflight.appendChild(optionfl8);
                    selectflight.appendChild(optionfl9);
                    selectflight.appendChild(optionfl10);
                    selectflight.appendChild(optionfl11);
                    selectflight.appendChild(optionfl12);
                    selectflight.appendChild(optionfl13);

                    flightname.appendChild(selectflight);


                } else {
                    var flightname = document.createElement("div");
                    flightname.className = "col-auto";
                    rowoneedit.appendChild(flightname);
                    var labelfn = document.createElement("label");
                    labelfn.setAttribute("for", "flight" + i);
                    labelfn.innerHTML = "FLIGHT";
                    flightname.appendChild(labelfn);
                    flightname.appendChild(document.createElement("br"));

                    var flightinput = document.createElement("input");
                    flightinput.name = "flight" + i;
                    flightinput.id = "flight" + i;
                    flightinput.type = "text";
                    flightinput.className = "form-control";
                    flightname.appendChild(flightinput);
                }

            }

        }
    </script>
</head>

<body onload="addfdblock()">
    <?php require "partials/_nav.php";
    if ($error) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong>Alert!</strong> Technical error.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    if ($errorpnr) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Alert!</strong> PNR already exists.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
    <form action="genticket.php" method="POST">

        <fieldset class="border border-danger border-2 m-2 p-2">
            <legend class="float-none w-auto p-2">TICKET DETAILS</legend>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="pnr" class="form-label">PNR</label>
                    <input type="text" class="form-control" name="pnr" id="pnr" style="text-transform:uppercase" required>
                </div>
                <div class="col-auto">
                    <label for="stop" class="form-label">STOPS</label>
                    <input type="number" onchange="addfdblock();" class="form-control" name="stop" id="stop" value="0" min="0" max="5" required>
                </div>
                <div class="col-auto">
                    <label for="class" class="form-label">CLASS</label>
                    <select class="form-select" name="class" id="class">
                        <option value="ECONOMY" selected>ECONOMY</option>
                        <option value="BUSINESS">BUSINESS</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="status" class="form-label">STATUS</label>
                    <select class="form-select" name="status" id="status">
                        <option value="CONFIRMED" selected>CONFIRMED</option>
                        <option value="CANCELLED">CANCELLED</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="ttype" class="form-label">TICKET TYPE</label>
                    <select class="form-select" id="ttype" name="ttype">
                        <option value="Refundable">REFUNDABLE</option>
                        <option value="Non-Refundable" selected>NON-REFUNDABLE</option>
                    </select>
                </div>
                <div class="col-auto">
                    <label for="rtype" class="form-label">RETURN TYPE</label>
                    <select class="form-select" id="rtype" name="rtype">
                        <option value="One Way" selected>ONE WAY</option>
                        <option value="Round Trip">ROUND TRIP</option>
                    </select>
                </div>
            </div>
        </fieldset>
        <!----------------------------------------------------------------------------------------------->
        <fieldset class="border border-danger border-2 m-2 p-2">
            <legend class="float-none w-auto p-2">FLIGHT DETAILS</legend>
            <div class="mb-2">
                <label for="fill" class="form-label">FILL</label>
                <select class="form-select" id="fill" name="fill">
                    <option value="auto" selected>AUTO</option>
                    <option value="manual">MANUAL</option>
                </select>
            </div>
            <div id="fd">

            </div>
        </fieldset>

        <!----------------------------------------------------------------------------------------------->
        <fieldset class="border border-danger border-2 m-2 p-2">
            <legend class="float-none w-auto p-2">MONETARY DETAILS</legend>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="ctc" class="form-label">CTC</label>
                    <input type="number" onchange="calculatetax();calculatebtc()" class="form-control" id="ctc" name="ctc" required>
                </div>
                <div class="col-auto">
                    <label for="bcharge" class="form-label">BASE CHARGES</label>
                    <input type="number" onchange="calculatetax()" class="form-control" id="bcharge" name="bcharge" required>
                </div>
                <div class="col-auto">
                    <label for="tax" class="form-label">TAXES AND FEES</label>
                    <input type="number" class="form-control" id="tax" name="tax" readonly>
                </div>


            </div>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="payment" class="form-label">PAYMENT</label>
                    <input type="number" onchange="calculatebtc()" class="form-control" id="payment" name="payment" required>
                </div>
                <div class="col-auto">
                    <label for="cashback" class="form-label">CASHBACK</label>
                    <input type="number" onchange="calculatebtc()" class="form-control" id="cashback" name="cashback" required>
                </div>
                <div class="col-auto">
                    <label for="ctb" class="form-label">CTB</label>
                    <input type="number" class="form-control" id="ctb" name="ctb" readonly>
                </div>
                <div class="col-auto">
                    <label for="earning" class="form-label">EARNING</label>
                    <input type="number" class="form-control" id="earning" name="earning" readonly>
                </div>
            </div>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="via" class="form-label">VIA</label>
                    <input type="text" class="form-control" id="via" name="via" style="text-transform:uppercase" required>
                </div>
                <div class="col-auto">
                    <label for="pmode" class="form-label">PAYMENT MODE</label>
                    <input type="text" class="form-control" id="pmode" name="pmode" style="text-transform:uppercase" required>
                </div>


            </div>
            <div class="col-auto mx-3">
                <label for="comment" class="form-label">COMMENT</label>
                <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
            </div>


        </fieldset>
        <fieldset class="border border-danger border-2 m-2 p-2">
            <legend class="float-none w-auto p-2">PASSENGER DETAILS</legend>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="member" class="form-label">NUMBER OF PASSANGERS</label>
                    <input type="number" id="member" name="pass_count" class="form-control" required>
                </div>
                <div class="col-auto">
                    <label for="btn" class="form-label invisible"> hhh </label><br>
                    <button type="button" class="btn btn-danger" onclick="addFields()">ADD</button>
                </div>
                <div id="container">

                </div>
            </div>
        </fieldset>
        <fieldset class="border border-danger border-2 m-2 p-2">
            <legend class="float-none w-auto p-2">CUSTOMER DETAILS</legend>
            <div class="row g-3 mx-2">
                <div class="col-auto">
                    <label for="cname" class="form-label">COMPANY NAME</label>
                    <input type="text" class="form-control" id="cname" name="cname" style="text-transform:capitalize" required>
                </div>
                <div class="col-auto">
                    <label for="btn" class="form-label invisible"> hhh </label><br>
                    <button type="button" class="btn btn-danger" onclick="autoname()">AUTO</button>
                </div>
                <div class="col-auto">
                    <label for="contact" class="form-label">CONTACT NUMBER</label>
                    <input type="tel" class="form-control" id="contact" name="contact" pattern="[0-9]{10}">
                </div>
                <div class="col-auto">
                    <label for="gst" class="form-label">GST NUMBER</label>
                    <input type="text" class="form-control" id="gst" name="gst" style="text-transform: uppercase;">
                </div>
            </div>
            <div class="col-auto mx-3">
                <label for="address" class="form-label">ADDRESS</label>
                <textarea class="form-control" id="address" rows="3" name="address"></textarea>
            </div>
        </fieldset>


        <div class="row g-3 mx-2 my-2">
            <div class="col-auto">
                <input class="btn btn-danger" type="submit" value="Submit">
            </div>
            <div class="col-auto">
                <input class="btn btn-danger" type="reset" value="Reset">
            </div>
        </div>
    </form>
    <script>
        function calculatetax() {
            let price = document.getElementById("ctc").value;
            let basecharge = document.getElementById("bcharge").value;
            let taxes = price - basecharge;
            document.getElementById("tax").value = taxes;
        }

        function calculatebtc() {
            let price = document.getElementById("ctc").value;
            let cback = document.getElementById("cashback").value;
            let pment = document.getElementById("payment").value;
            let cost = pment - cback;
            let earn = price - cost;
            document.getElementById("ctb").value = cost;
            document.getElementById("earning").value = earn;
        }

        function autoname() {
            let cusname = document.getElementById("member0").value;
            document.getElementById("cname").value = cusname;
        }
    </script>

</body>

</html>