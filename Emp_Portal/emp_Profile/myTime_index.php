<?php
require_once('db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body >
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> My Time </span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <?php
                      $query_run = mysqli_query($connect,"SELECT * FROM apply_leave WHERE employees_id='$employees_id'");
                      $totalLeaves= 25;
                      $noOfDays = 0;
                      $availedLeaves = 0;
                      $Leaveremaining = 0;
                      while ($num = mysqli_fetch_array($query_run)) {
                      $noOfDays +=(int)$num['noOfDays'];
                      $leaveStatus = $num["status"];
                      $LeaveApproved = "Approved";
                      $Leaveremaining = $totalLeaves-$noOfDays;
                      $availedLeaves = $totalLeaves-$Leaveremaining;
   }
                      ?>
                      <!-- <?php echo $remaining; ?> -->
                      <div class="row">
                        <div class="col-lg-10">
                          <h5 >Leave Summary</h5>
                        </div>
                        <div class="col-lg-2">
                          <span id="noLeavesDisplay">
                            <a href="leave_apply.php">
                              <button class="actionButtonIcons-center" type="submit">
                              <i class="fa fa-calendar"></i>&nbsp Apply
                              </button>
                            </a>
                          </span>
                        </div>
                      </div>
                      <div class="leaveDetailsPannel">
                        <div class="row">
                          <div class="col-lg-4">
                            <div class="widgetsLeave">
                              <div class="well">
                                <div class="expireContent" >
                                  <div class="row">
                                    <div class="col-lg-8">
                                      <h5> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp Total Leaves</h5>
                                    </div>
                                    <div class="col-lg-4">
                                      <h3><?php echo $totalLeaves; ?> <span>Days</span></h3>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-6">
                            <div class="widgetsLeave">
                              <div class="well">
                                <div class="expireContent">
                                  <div class="row">
                                    <div class="col-lg-8">
                                      <h5> <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp Leaves Availed</h5>
                                    </div>
                                    <div class="col-lg-4">
                                      <h3 style="color: green"><?php echo $availedLeaves; ?> <span>Days</span></h3>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="widgetsLeave">
                              <div class="well">
                                <div class="expireContent" >
                                  <div class="row">
                                    <div class="col-lg-8">
                                      <h5><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp Leaves Remaining</h5>
                                    </div>
                                    <div class="col-lg-4">
                                      <h3 style="color: orange"><?php echo $Leaveremaining; ?>  <span>Days</span></h3>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h5 style="margin-bottom: 22px;">Leave History</h5>
                  <div class="row">
                    <div class="col-lg-9">
                      
                      <?php
                      $per_page_record = 3;
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
                          <div class="requestStat">
                            
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
                                  <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your <?php echo $rowLeave['leaveType'] ?> request is <?php echo $Leavestatus; ?> </h5>
                                  <?php
                                  }
                                  ?>
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <p>Leave Type - <?php echo $rowLeave['leaveType'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>Raised On. - <?php echo $rowLeave['appliedDate'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>No. of Days - <?php echo $rowLeave['noOfDays'] ?> Days</p>
                                    </div>
                                    
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div id="changeColor" class="actionButtonRequest"><h4 id="Status"><?php echo $rowLeave['status'] ?></h4></div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          
                        </div>
                      </div><br>
                      <?php
                      }
                      }
                      ?>
                      <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                          <a href="leave_history.php">
                            <button class="actionButtonIcons-center" type="submit">View All</button>
                          </a>
                        </div>
                        <div class="col-lg-5"></div>
                      </div>
                    </div>
                    <div class="col-lg-3">
                      <div class="claimSidePan" style="margin-top: -50px;">
                        <div class="aboutPannel">
                          <div class="well">
                            <h4>Holidays Calendar</h4>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="dayFormat">
                                  <p>New year</p>
                                  <p>Pongal</p>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="dateFormat">
                                  <p>01 Jan 2022</p>
                                  <p>20 Jan 2022</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="otherPannel">
                          <a href="../emp_AppStore/raise_feedback.php">
                            <div class="well">
                              <h4>Share Feedback</h4>
                            </div>
                          </a>
                        </div>
                        <div class="otherPannel">
                          <a href="../emp_AppStore/helpDesk.php">
                            <div class="well">
                              <h4>Help Desk</h4>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>