<?php
include_once 'add_courier_database.php';
$result = mysqli_query($conn,"SELECT * FROM  usercoment");
?>

<?php
$uname="admin";
$pwd="admin";
session_start();
if(isset($_SESSION['uname'])){

  include_once 'comment_report.php';

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
<title>User Comment Reoport</title>
<?php include_once 'headerLinks.html' ?>
<link rel="stylesheet" type="text/css" href="report.css">
 
<body onload="myFunction()" style="margin:0;counter-reset: my-sec-counter;" id="tothetop">      
  
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

<?php include_once 'headerAdmin.php' ?>

<div class="sectionHead">
   
 </div>
        <div class="reportWell" class="container-fluid">
            <h2>Comment Report</h2>
            <h3>Details for Requested Quick Comment</h3>
           
             
<?php
while($row = mysqli_fetch_array($result)) {
?>
<div class="container">
   <div class="row hidden-xs" >
   <div class="col-lg-12">
     <div class="well" >
     <table class="table table-hover" width="100%">
    <thead>
    <tr>
      <h5><i class="fa fa-list-alt" style="color: #2C37A0;"></i></h5>
    </tr>
      </thead>
       <tbody>
        <tr>
          <td><h4>Name</h4></td>
           <td><h4><?php echo $row["names"]; ?></h4></td>
        </tr>
        <tr>
          <td><h4>Email</h4></td>
           <td><h4><?php echo $row["email"]; ?></h4></td>
        </tr>
        <tr>
          <td><h4>Phone</h4></td>
           <td><h4><?php echo $row["cphone"]; ?></h4></td>
        </tr>
        <tr>
          <td><h4>Message</h4></td>
           <td><h4><?php echo $row["ccoment"]; ?></h4></td>
        </tr>
        </tbody>
    </table>
    </div>
   </div>
 </div>
 <div class="row hidden-lg" >
   <div class="col-lg-12">
     <div class="well">
   
      <h5><i class="fa fa-list-alt" style="color: #2C37A0;"></i></h5>
            <h4><b>Name :</b> <?php echo $row["names"]; ?></h4>
           <h4><b>Email :</b> <?php echo $row["email"]; ?></h4>
            <h4><b>Phone :</b> <?php echo $row["cphone"]; ?></h4>
            <h4><b>Message :</b> </h4>
           <h4><?php echo $row["ccoment"]; ?></h4>

    </div>
   </div>
 </div>
</div>

 
<?php
 
}
?>
      
           

                
            
        </div>

 
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

</div><!-- for loader-->
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
