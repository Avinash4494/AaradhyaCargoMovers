<?php
include_once 'add_courier_database.php';
$result = mysqli_query($conn,"SELECT * FROM admin_profile");
?>
<?php
include_once 'add_courier_database.php';
$result_courier = mysqli_query($conn,"SELECT COUNT(id) FROM myusers");
?>
<?php
include_once 'add_courier_database.php';
$result_quote = mysqli_query($conn,"SELECT COUNT(id) FROM quote");
?>
<?php
include_once 'add_courier_database.php';
$result_coment = mysqli_query($conn,"SELECT COUNT(id) FROM usercoment");
?>
<?php
include_once 'add_courier_database.php';
$result_driver = mysqli_query($conn,"SELECT COUNT(id) FROM contacts");
?>


<?php
$uname="Dushyant Singh";
$pwd="Dushyant";
session_start();
if(isset($_SESSION['uname'])){

  include_once 'admin_dashboard.php';

}
else
{
  if($_POST['uname']==$uname && $_POST['pwd']==$pwd){
    $_SESSION['uname']=$uname;
    echo "<script> location.href='admin_dashboard.php'</script>";
  }
  else {
    echo "<script> alert('Username or Password is incorrect')</script>";
    echo "<script> location.href='admin_login.php'</script>";
  }
}
?>
<!DOCTYPE html>
<html>
<title>Admin Dashboard</title>
  <link rel="icon" href="image/logo_A.png" height="10px">
<body onload="myFunction();" id="tothetop" onmouseover="showtime();">
    
  <?php include_once 'headerLinks.html' ?>
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
 
<br><br><br><br><br>
  <div id="dashboard_main" class="container-fluid">
    <div class="container" id="aboutUs">
        <div class="row">
            <div class="col-lg-12 col-xs-12" style="background-color:#2c37a0;"> 
              <h3><?php echo "<p  style='color: white;'>Welcome ".$_SESSION['uname']."</p>"; ?></h3>
            </div>
        </div> 
    </div>    
  </div>
  <style type="text/css">
  #dashboard_main h3{ font-family: Acme;
  color: #2c37a0;letter-spacing: 2px;text-align: center;font-size: 18px;}

  .dashboard_panel_main .widgets01 .well{margin-top: 10px;height: 100% border-radius: 0px;
    background-color: #2c37a0;padding:0px;}
     .dashboard_panel_main .widgets01 .well h3{margin: 0px;padding: 5px;color: white; font-family: Acme;letter-spacing: 2px;text-align: center;font-size: 30px;}

    .dashboard_panel_main .widgets01 .well h5{margin: 0px;padding: 20px;color: white; font-family: Acme;letter-spacing: 2px;text-align: center;}

    .dashboard_panel_main .widgets01 .well i{font-size: 40px; padding: 20px;color: white;text-align: center;}

      .dashboard_panel_main .widgets01 .well p{text-align: center;color: white;font-family:Acme;letter-spacing: 2px;}

  .dashboard_panel_main .well{margin-top: 10px;height:100%;border-radius: 0px;border:1px solid #2c37a0;margin: 15px; background-color: white;}
  .dashboard_panel_main .well .btn-success{background-color: white;color: #2c37a0;}

   .dashboard_panel_main .well h2{text-align:left; font-family: Acme;
  color: #2c37a0;letter-spacing: 2px; font-size: 20px;}

  .details_user h4{font-family: times new roman;letter-spacing: 1px;padding-top: 10px; font-size: 14px;} 
                            .details_user{padding-top: 20px;}

</style>
      <div class="dashboard_panel_main" class="container-fluid">  
        <div class="well">
          <div class="row">
            <div class="col-lg-6 col-xs-4"><h2>Dashboard </h2></div>
             <div class="col-lg-6 col-xs-8"> <h2 style="font-size: 14px;text-align: right;padding-top: 5px;" id="show_time"></h2></div>
          </div>
         
          
          
          <div class="row">
            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-2"></div>
                 <div class="col-lg-8">
                   <div class="profile_img">
                     <img src="image/93.jpg" alt="" width="100%">
                   </div>
                   
                 </div>
                  <div class="col-lg-2"></div>
              </div>
              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <div class="details_user">
                      <div class="row">
                          <div class="col-lg-12 col-xs-12">
                            <h4><b><i class="fa fa-user"></i> Dushyant Singh</b></h4>
                            <h4><b><i class="fa fa-phone-square"></i> 9113855664 / 9743866386</b> </h4>
                            <h4><b><i class="fa fa-envelope"></i> aaradhyacargomovers@gmail.com</b> </h4>
                            <h4><b><i class="fa fa-location-arrow"></i></b> #26, 1st Floor,Yeshwanthpura 1st Main Road, Mathikere <br>
                              Land Mark:Opp. to Coffee Santhe Hotel,
                              Bangalore, 560054</h4>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-2"></div>
              </div>
            </div>
             <div class="col-lg-8" >
                <div class="row" style="padding-top: 10px;">
                  <?php
                   
                    while($row = mysqli_fetch_array($result_coment))  {
                    ?>
              <div class="col-lg-4" >
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-comments"></i></div>
                       <div class="col-lg-8 col-xs-8"><h3><?php echo $row[0]; ?></h3>
                         <p>New Comments</p>
                       </div>
                    </div>
                    <a href="comment_report.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                  <?php
                    
                    }
                  
                    ?>


                    <?php
                    while($row_quote = mysqli_fetch_array($result_quote))  {
                    ?>
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-user"></i></i></div>
                       <div class="col-lg-8 col-xs-8"><h3><?php echo $row_quote[0]; ?></h3>
                         <p>Quote Request</p>
                       </div>
                    </div>
                    <a href="quote_report.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                <?php                   
                    }
                    ?>
                    <?php
                    while($row_courier = mysqli_fetch_array($result_courier))  {
                    ?>
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-user"></i></i></div>
                       <div class="col-lg-8 col-xs-8"><h3><?php echo $row_courier[0]; ?></h3>
                         <p>Courier Report</p>
                       </div>
                    </div>
                    <a href="quote_report.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                <?php                   
                    }
                    ?>
          
           
                </div>
                 <div class="row">

           <?php
          include_once 'add_courier_database.php';
          $query_run = mysqli_query($conn,"SELECT * FROM myusers");
          $qty= 0;$wt=0;
          while ($num = mysqli_fetch_array($query_run)) {
              $qty += $num['cost'];
              $wt +=(int)$num['actualwt'];
              
}

                    ?>
              <div class="col-lg-6">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-2 col-xs-4" ><i class="fa fa-money"></i></div>
                       <div class="col-lg-10 col-xs-8"><h3 style="font-size: 20px;padding-top: 15px;"><?php echo $qty; ?>.00 Rs</h3>
                         <p>Grand Total Amount </p>
                       </div>
                    </div>
                   
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-dropbox"></i></div>
                       <div class="col-lg-8 col-xs-8"><h3 style="font-size: 20px;padding-top: 15px;"><?php echo $wt; ?> Kg</h3>
                         <p>Total Frieght Weight</p>
                       </div>
                    </div>
                     
                  </div>
                </div>
              </div> 
          </div>
          <div class="row">
            <?php
                    while($row_driver = mysqli_fetch_array($result_driver))  {
                    ?>
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-user"></i></i></div>
                       <div class="col-lg-8 col-xs-8"><h3><?php echo $row_driver[0]; ?></h3>
                         <p>Driver Report</p>
                       </div>
                    </div>
                    <a href="Service/index.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                <?php                   
                    }
                    ?>
          </div>
          <!--<div class="row">
            
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-comments"></i></div>
                       <div class="col-lg-8 col-xs-8"><h3></h3>
                         <p>New Comments</p>
                       </div>
                    </div>
                    <a href="comment_report.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-user"></i></div>
                       <div class="col-lg-8 col-xs-8"><h3></h3>
                         <p>Quote Request</p>
                       </div>
                    </div>
                    <a href="quote_report.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                 
              <div class="col-lg-4">
                <div class="widgets01">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4 col-xs-4" ><i class="fa fa-list-alt"></i></div>
                       <div class="col-lg-8 col-xs-8"><h3></h3>
                         <p>Total Courier </p>
                       </div>
                    </div>
                    <a href="courier_report.php.php">
                      <button class="btn btn-success btn-block">View Details </button></a>
                  </div>
                </div>
              </div>
                 
                </div>-->
          </div>
             </div>
          </div>
          
          
 
         
    </div>
<style>
    #section10 h5{text-align:center;}
</style>
                  
 
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
</div></div>
 <script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);     
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
  function showtime() {
     
       
      var today = new Date();
      var slicedate=today.toString().slice(0,16);
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
     
      document.getElementById('show_time').innerHTML =
      slicedate + " " + h + ":" + m + ":" + s;
      var t = setTimeout(showtime, 500);
    }
    function checkTime(i) {
      if (i < 10) {i = "0" + i};  
      return i;
    }
 
</script> 
</body>
</html>