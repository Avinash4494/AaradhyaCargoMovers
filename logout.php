<?php
session_start();
if(isset($_SESSION['uname'])){
  session_destroy();
  echo "<script> location.href='index.php'</script>";
}
else
{
  echo "<script> location.href='index.php'</script>";
}
?>

<!DOCTYPE html>
<html>
<title>LogOut</title>
   <?php include_once 'headerLinks.html' ?>
<body onload="myFunction()" style="margin:0;" id="tothetop">      

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

<nav class="navbar navbar-default navbar-fixed">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar" style="background-color: orange"></span>
        <span class="icon-bar" style="background-color: orange"></span>
        <span class="icon-bar" style="background-color: orange"></span>                        
      </button>
      <a class="navbar-brand" href="#section1" style="margin-left: -10px;margin-top: -20px;"><b><span style="color:orange;font-family: 'Acme';"><img src="image/aa logo.jpg"  width="250px;" height="80px;"></span></a>   </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
       <li><a href="admin_dashboard.php">Home</a></li>
              
       
      </ul>
    </div>
  </div>
</nav>



<div class="wave">
   <img src="image/0257.png" alt="" width="100%" style="margin-top: 60px;">
 </div> 

  <div class="section_add">
      <div class="container">
        <div class="add_courier_well">
          <div id="add_courier" class="container-fluid">
            <h2>You Are Successfully Logout.</h2>
           <div class="well" style="background-color: white;border-radius: 0px;border:1px solid orange;">
              <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4">
                <img src="image/logout.gif" width="100%">
              </div>
              <div class="col-lg-4"></div>
            </div> 
           </div>
          </div>
        </div>
      </div>
    </div>



     <div class="wave">
   <img src="image/0256.png" alt="" width="100%">
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
