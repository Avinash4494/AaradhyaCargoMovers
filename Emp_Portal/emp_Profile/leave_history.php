<?php
require_once('db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body onmouseover ="getTotalDate()">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftTime.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top" >Profile Portal</a> / <span class="activePage"> Leaves Summary </span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <h4 style="margin-bottom: 22px;">Leave Summary</h4>
                  <?php
                  
                  
                  $query = mysqli_query($connect,"SELECT * FROM apply_leave WHERE employees_id='$employees_id'");
                  $row = mysqli_fetch_assoc($query);
                  error_reporting(0);
                  $leaveType = $row['leaveType'];
                  $appliedDate = $row['appliedDate'];
                  $leaveFrom = $row['leaveFrom'];
                  $noOfDays = $row['noOfDays'];
                  $leaveTo = $row['leaveTo'];
                  
                  if ($leaveType==''||$appliedDate==''||$leaveFrom==''||$noOfDays==''||$leaveTo=='')
                  {
                  ?>
                  <div class="row">
                    <div class="col-lg-10">
                      <div class="nullAddress" style="text-align:
                        center;padding-bottom: 10px;">
                        <p>Oops!! No leaves found. Click on "Apply" to avail leaves.</p>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <h4>  <a href="leave_apply.php">
                        <button class="actionButtonIcons-center">
                        <i class="fa fa-calendar"></i> &nbsp Apply
                        </button>
                      </a></h4>
                    </div>
                  </div>
                  <style>
                  .actionButtonIcons-center
                  {
                  font-size: 0.8em;
                  }
                  </style>
                  <?php
                  }
                  else {
                  ?>
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <?php
                      $per_page_record = 5;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM apply_leave  WHERE employees_id='$employees_id'";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowLeave = mysqli_fetch_array($rs_result)) {
                      ?>
                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="requestStat" style="margin-bottom: 20px;">
                            
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-1">
                                  <div class="iconCal">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                </div>
                                <div class="col-lg-9">
                                  <?php
                                  $getDate = $rowLeave["appliedDate"];
                                  
                                  $datetime1 = strtotime($getDate);
                                  $datetime2 = strtotime(date('Y-m-d'));
                                  $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                                  $days = $secs / 86400;
                                  ?>
                                  <?php
                                  $Leavestatus = $rowLeave['status'];
                                  $active= "Active";
                                  $pending  = "Pending";
                                  $approved="Approved";
                                  $Rejected = "Rejected";
                                  if ($Leavestatus==$active) {
                                  ?>
                                  <h5> <i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?>request is <?php echo $Leavestatus; ?> since <?php echo $days; ?> days and waiting for approval.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus == $pending)
                                  {
                                  ?>
                                  <h5> <i class="fa fa-circle" style="color: orange;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $Leavestatus; ?> since <?php echo $days; ?> days and waiting for approval.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus == $approved)
                                  {
                                  ?>
                                  <h5> <i class="fa fa-circle" style="color: green;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $Leavestatus;?>.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus==$Rejected)
                                  {
                                  ?>
                                  <h5> <i class="fa fa-circle" style="color: red;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $rowLeave['status'] ?> <?php echo $days; ?></h5>
                                  <?php
                                  }
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <p>Leave Type - <?php echo $rowLeave['leaveType'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>Requested On. - <?php echo $rowLeave['appliedDate'] ?></p>
                                      <p>Leave From - <?php echo $rowLeave['leaveFrom'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>No. of Days - <?php echo $rowLeave['noOfDays'] ?> Days</p>
                                      <p>Leave To - <?php echo $rowLeave['leaveTo'] ?></p>
                                    </div>
                                    
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div id="changeColor" class="actionButtonRequest" style="margin-top: 30px;"><h4 id="Status"><?php echo $rowLeave['status'] ?></h4></div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                      <?php
                      }
                      }
                      ?>
                    </div>
                  </div>
                  <h4 style="margin-bottom: 22px;">Leave History</h4>
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <?php
                      $per_page_record = 5;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM apply_leave  WHERE employees_id='$employees_id'";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowLeave = mysqli_fetch_array($rs_result)) {
                      ?>
                      
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="requestStat" style="margin-bottom: 20px;">
                            
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-1">
                                  <div class="iconCal">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                </div>
                                <div class="col-lg-9">
                                  <?php
                                  $getDate = $rowLeave["appliedDate"];
                                  
                                  $datetime1 = strtotime($getDate);
                                  $datetime2 = strtotime(date('Y-m-d'));
                                  $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                                  $days = $secs / 86400;
                                  ?>
                                  <?php
                                  $Leavestatus = $rowLeave['status'];
                                  $active= "Active";
                                  $pending  = "Pending";
                                  $approved="Approved";
                                  $Rejected = "Rejected";
                                  if ($Leavestatus==$active) {
                                  ?>
                                  <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?>request is <?php echo $Leavestatus; ?> since <?php echo $days; ?> days and waiting for approval.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus == $pending)
                                  {
                                  ?>
                                  <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $Leavestatus; ?> since <?php echo $days; ?> days and waiting for approval.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus == $approved)
                                  {
                                  ?>
                                  <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $Leavestatus;?>.</h5>
                                  <?php
                                  }
                                  else if($Leavestatus==$Rejected)
                                  {
                                  ?>
                                  <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $rowLeave['status'] ?> <?php echo $days; ?></h5>
                                  <?php
                                  }
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <p>Leave Type - <?php echo $rowLeave['leaveType'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>Requested On. - <?php echo $rowLeave['appliedDate'] ?></p>
                                      <p>Leave From - <?php echo $rowLeave['leaveFrom'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>No. of Days - <?php echo $rowLeave['noOfDays'] ?> Days</p>
                                      <p>Leave To - <?php echo $rowLeave['leaveTo'] ?></p>
                                    </div>
                                    
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div id="changeColor" class="actionButtonRequest" style="margin-top: 30px;"><h4 id="Status"><?php echo $rowLeave['status'] ?></h4></div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          
                        </div>
                      </div>
                      <?php
                      }
                      }
                      ?>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
<script>
function getTotalDate()
{
var date1=new Date( document.getElementById("leaveFrom").value);
var date2=new Date(document.getElementById("leaveTo").value);
var rest = date2.getTime()-date1.getTime();
var restOut = rest/(1000*60*60*24);
document.getElementById("dis").innerHTML= restOut;
}
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>