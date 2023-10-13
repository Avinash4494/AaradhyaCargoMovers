<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addUser_feedback where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from addUser_feedback where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="feedback_index.php"; }, 100);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Finder Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftFinder.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Finder Portal</span></h5>
              </div>
               <h4 style="text-align: center;padding-bottom: 20px;margin: 0px;">Frequently used finders.</h4>
                <div class="requestIndexPannel" style="padding-left: 330px;">

                  <a href="trace_quote.php">
                    <div class="reqestTabGuest">
                      <h4>Quotes</h4>
                    </div>
                  </a>
                  <a href="trace_courier.php">
                    <div class="reqestTabEntry">
                    <h4> Couriers</h4>
                  </div>
                  </a>
                  <a href="trace_employee.php">
                    <div class="reqestTabVeh">
                      <h4>Employees</h4>
                    </div>
                  </a>
                  <a href="trace_vehicle.php">
                    <div class="reqestTabGate">
                      <h4>Vehicles</h4>
                    </div>
                  </a>
                  <a href="trace_feedback.php">
                    <div class="reqestTabVendor">
                      <h4>Feebacks</h4>
                    </div>
                  </a>
                   <a href="trace_admin.php">
                    <div class="reqestTabName">
                      <h4>Admin Accounts</h4>
                    </div>
                  </a>
                     <a href="trace_careers.php">
                    <div class="reqestTabIdCard">
                      <h4>Applicants</h4>
                    </div>
                  </a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>