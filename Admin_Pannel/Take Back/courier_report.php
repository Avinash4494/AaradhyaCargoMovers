<?php
include_once 'add_courier_database.php';
$result = mysqli_query($conn,"SELECT * FROM myusers");
?>

<?php
$uname="admin";
$pwd="admin";
session_start();
if(isset($_SESSION['uname'])){

  include_once 'courier_report.php';

}
else
{
  if($_POST['uname']==$uname && $_POST['pwd']==$pwd){
    $_SESSION['uname']=$uname;
    echo "<script> location.href='admin_dashboard.php'</script>";
  }
  else {
    echo "<script> alert('Username or Password is incorrect')</script>";
    echo "<script> location.href='index.html'</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<title>Courier Report Details</title>
<?php include_once 'headerLinks.html' ?>
<link rel="stylesheet" type="text/css" href="report.css">

 
<body onload="myFunction()" style="margin:0; counter-reset: my-sec-counter;" id="tothetop">    
  <div id="loader">
    <div class="container">
          <div class="row">
            <div class="col-lg-4 col-xs-2"></div>
            <div class="col-lg-4 col-xs-8">
              <div class="loader_logo" style="margin-top: 150px;">
                 <img class="loaderlogoimg" src="image/aa logo.jpg" width="100%" ><br><br>
               </div>
            </div>
            <div class="col-lg-4 col-xs-2"></div>
          </div>
          <div class="row hidden-lg">
            <div class="col-lg-4 col-xs-4"></div>
            <div class="col-lg-4  col-xs-4">
                <img class="loadergif" src="image/51.gif">
              </div>
            <div class="col-lg-4 col-xs-4"></div>
          </div>
          <div class="row hidden-xs">
            <div class="col-lg-5 col-xs-4"></div>
            <div class="col-lg-2  col-xs-4">
                <img class="loadergif" src="image/51.gif" style="margin-left: 40px;">
              </div>
            <div class="col-lg-5 col-xs-4"></div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h2 style="text-align: center;font-family: acme; color: #2C37A0;font-size: 20px;">Loading...Please Wait</h2>
            </div>
          </div>
          </div>
        </div>
<div style="display:none;" id="myDiv" class="animate-bottom">
<?php include_once 'headerAdmin.php'; ?>  

 
<div class="sectionHead">
   
 </div>
  <div class="reportWell" class="container-fluid">
       <h3>Courier Report</h3>
   
 <?php
          while($row = mysqli_fetch_array($result)) {
          
          ?>
          <div class="container">
             <div class="row hidden-xs">
               <div class="col-lg-12">
                 <div class="well" >
                    <table class="table table-hover" width="100%">
    <thead>
      <tr>
        <th><h3 style="color:#2C37A0;text-align: center;font-size: 20px;"><i class="fa fa-list-alt" style="color: #2C37A0;"></i></h3></th>
        <th><h2 style="font-size: 18px; color: #2C37A0;">Consignee Details</h2></th>
        <th><h2 style="font-size: 18px; color: #2C37A0;">Consigner Details</h2></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><h4>Docket No. / Date</h4></td>
         <td><h4><?php echo $row["captcha"]; ?></h4></td>
         <td><h4><?php echo $row["date"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Name</h4></td>
        <td> <h4><?php echo $row["sname"]; ?></h4></td>
        <td><h4><?php echo $row["rname"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Email</h4></td>
        <td><h4><?php echo $row["semail"]; ?></h4></td>
        <td><h4><?php echo $row["remail"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Mobile</h4></td>
        <td><h4><?php echo $row["smobile"]; ?></h4></td>
        <td><h4><?php echo $row["rmobile"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>From / To</h4></td>
        <td><h4><?php echo $row["saddress"]; ?></h4></td>
        <td><h4><?php echo $row["raddress"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Actual Wt. / Chargeable Weight</h4></td>
        <td><h4><?php echo $row["actualwt"]; ?></h4></td>
        <td><h4><?php echo $row["chargewt"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Types of Packets / No. of Pkts.</h4></td>
        <td><h4><?php echo $row["tofpkts"]; ?></h4></td>
        <td><h4><?php echo $row["nofpkts"]; ?></h4></td>
      </tr>
      <tr>
        <td><h4>Total Cost</h4></td>
        <td></td>
        <td><h4><?php echo $row["cost"]; ?></h4></td>
      </tr>
     
       
    </tbody>
  </table>

        <div class="row">
          <div class="col-lg-12 col-lg-12">
                <h4>Description : <?php echo $row["descri"]; ?></h4>
          </div>
        </div> 

                 </div>
               </div>
              </div>
               
              <div class="row hidden-lg">
               <div class="col-lg-12">

                 <div class="well" >
                 <h5><i class="fa fa-list-alt" style="color: #2C37A0;"></i></h5>
                 <h3>Consignee Details</h3>
                   <h4>Docket No. : <?php echo $row["captcha"]; ?></h4>
                   <h4>Date : <?php echo $row["date"]; ?></h4>
                   <h4>Name : <?php echo $row["sname"]; ?></h4>
                  <h4>Email : <?php echo $row["semail"]; ?></h4>
                  <h4>Phone : <?php echo $row["smobile"]; ?></h4>
                  <h4>Address : <?php echo $row["saddress"]; ?></h4>
                  <h4>Actual Wt. : <?php echo $row["actualwt"]; ?></h4>
                  <h4>N.O.P. : <?php echo $row["tofpkts"]; ?></h4>
                   

                   <hr />
                    <h3>Consigner Details</h3>
                    <h4>Name : <?php echo $row["rname"]; ?></h4>
                    <h4>Mail : <?php echo $row["remail"]; ?></h4>
                    <h4>Phone :<?php echo $row["rmobile"]; ?></h4>
                    <h4>Address : <?php echo $row["raddress"]; ?></h4>
                    <h4>Chargeable Wt. : <?php echo $row["chargewt"]; ?></h4>
                    <h4>N.o.P. : <?php echo $row["nofpkts"]; ?></h4>
                    <h4>Total Cost : Rs <?php echo $row["cost"]; ?> </h4>
                    <h4>Description : <?php echo $row["descri"]; ?></h4>
                 </div>
               </div>
              </div>
          </div>
         <?php  
              }
              ?>
  </div>



<!--section7-->

 

 
<div id="section10" class="container-fluid" style="margin-top: -10px;">

      <div class="row">
          <div class="footer">
            <div class="col-lg-1 " style="background-color:;"></div>
              <div class="col-lg-7 col-xs-12" style="background-color:;">
                  <h5><i class="fa fa-copyright"></i> Copyright 2017. "Aaradhya Cargo Movers" All rights reserved.</h5>

              </div>
              <div class="col-lg-4 col-xs-12" style="background-color:;">
                <h5 style="color: white;border: none;"><b>Developed by Avinash Singh</b></h5>
              </div>
          </div>
      </div>
    
  
</div>

<!--</div> -->
   <script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>                     
</body>
</html>
