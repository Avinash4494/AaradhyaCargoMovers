 
<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from apply_leave where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from apply_leave where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="employee_leave.php"; }, 100);
</script>';
}
}
}
?>
<?php
session_start();
error_reporting(0);
if($_SESSION["employees_id"]){
  // echo "Session";
}
else {
header("location: index.php");
}
?>
<?php
include_once '../db.php';
$upload_dir = 'uploads/employees-uploads/';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM apply_leave WHERE employees_id='$employees_id'");
$rowM = mysqli_fetch_assoc($query);
$flag = $rowM["employees_id"];
 
?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Dashboard</title>
  <body onload= "noLeaves()">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'employee_side_pannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="employee_Dashboard.php">Dashboard</a> / <span class="activePage">Leave Planner</span></h5>
              </div>
              <?php
              $query_run = mysqli_query($connect,"SELECT * FROM apply_leave WHERE employees_id='$employees_id'");
              $totalLeaves= 25;
              $noOfDays = 0;
              $remaining=1;
              while ($num = mysqli_fetch_array($query_run)) {
              $noOfDays +=(int)$num['noOfDays'];
              $statusLv = $num['status'];
              $rejectedLv = "Rejected";
              $approvedLv = "Approved";
              if ($statusLv==$rejectedLv) {
                 $remaining = $totalLeaves-$noOfDays;
                 $remainingLv= $remaining+$noOfDays;
              }
               elseif ($statusLv==$approvedLv) {
              $remainingLv = $totalLeaves-$noOfDays;
              } 
              if ($statusLv==$approvedLv) {
            
              echo "Approved ".$approvedRs;
              }

            }
              ?>
              <div class="row">
                <div class="col-lg-10">
                  <h4>Applied Leave</h4>
                </div>
                <div class="col-lg-2">
                  <span id="noLeavesDisplay">
                    <a href="apply_Now.php">
                      <button class="actionButtonIcons-center" type="submit">
                      <i class="fa fa-calendar"></i>&nbsp Apply
                      </button>
                    </a>
                  </span>
                </div>
              </div>
              <script>
              function noLeaves()
              {
              var remainingLeaves = '<?php echo $remaining; ?>';
              var flag=0;
              if (remainingLeaves<=flag) {
              document.getElementById("noLeavesDisplay").style.display="none";
              }
              else
              {
              document.getElementById("noLeavesDisplay").style.display="block";
              }
              }
              </script>
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
                              <h3 style="color: green"><?php echo $noOfDays; ?> <span>Days</span></h3>
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
                              <h3 style="color: orange"> <?php echo $remainingLv; ?> <span>Days</span></h3>
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#allLeaves">All Leaves</a></li>
                    <li><a data-toggle="tab" href="#Pending">Pending</a></li>
                    <li><a data-toggle="tab" href="#Approved">Approved</a></li>
                    <li><a data-toggle="tab" href="#rejected">Rejected</a></li>
                  </ul>
                  <div class="tab-content">
                    <div id="allLeaves" class="tab-pane fade in active">
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="css-serial table table-hover" width="100%">
                            <style>
                            .css-serial {
                            counter-reset: serial-number;  /* Set the serial number counter to 0 */
                            }
                            .css-serial td:first-child:before {
                            counter-increment: serial-number;  /* Increment the serial number counter */
                            content: counter(serial-number);  /* Display the counter */
                            }
                            </style>
                            <thead >
                              <tr>
                                <th>Sr. No.</th>
                                <th>Leave Id</th>
                                <th>Employee Id</th>
                                <th>Full Name</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Applied On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $per_page_record = 10;
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
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              
                              $employees_id = $rowMember['employees_id'];
                              if ($employees_id==$employees_id) {
                              
                              # code...
                              
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><?php echo $rowMember['leave_id'] ?></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['fullname'] ?></td>
                                <td><?php echo $rowMember['leaveType'] ?></td>
                                <td><?php echo $rowMember['leaveFrom'] ?></td>
                                <td><?php echo $rowMember['leaveTo'] ?></td>
                                <td><?php echo $rowMember['noOfDays'] ?> days</td>
                                <td><?php echo $rowMember['message'] ?></td>
                                <td><?php echo $rowMember['status'] ?></td>
                                <td><?php echo $rowMember['remarks'] ?></td>
                                <td><?php echo $rowMember['appliedDate'] ?></td>
                              </tr>
                              <?php
                              }}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div id="Pending" class="tab-pane fade">
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="css-serial table table-hover" width="100%">
                            <style>
                            .css-serial {
                            counter-reset: serial-number;  /* Set the serial number counter to 0 */
                            }
                            .css-serial td:first-child:before {
                            counter-increment: serial-number;  /* Increment the serial number counter */
                            content: counter(serial-number);  /* Display the counter */
                            }
                            </style>
                            <thead >
                              <tr>
                                <th>Sr. No.</th>
                                <th>Leave Id</th>
                                <th>Employee Id</th>
                                <th>Full Name</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Applied On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                             
                              $query = 'SELECT * FROM apply_leave where employees_id = "'.$employees_id.'"';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Pending";
                              $approved = $rowMember["status"];
                              if ($employees_id==$employees_id) {
                              if ($approved==$flag) {
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><?php echo $rowMember['leave_id'] ?></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['fullname'] ?></td>
                                <td><?php echo $rowMember['leaveType'] ?></td>
                                <td><?php echo $rowMember['leaveFrom'] ?></td>
                                <td><?php echo $rowMember['leaveTo'] ?></td>
                                <td><?php echo $rowMember['noOfDays'] ?> days</td>
                                <td><?php echo $rowMember['message'] ?></td>
                                <td style="color: orange;"><b><?php echo $rowMember['status'] ?></b></td>
                                <td><?php echo $rowMember['remarks'] ?></td>
                                <td><?php echo $rowMember['appliedDate'] ?></td>
                              </tr>
                              <?php
                              }}}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div id="Approved" class="tab-pane fade">
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="css-serial table table-hover" width="100%">
                            <style>
                            .css-serial {
                            counter-reset: serial-number;  /* Set the serial number counter to 0 */
                            }
                            .css-serial td:first-child:before {
                            counter-increment: serial-number;  /* Increment the serial number counter */
                            content: counter(serial-number);  /* Display the counter */
                            }
                            </style>
                            <thead >
                              <tr>
                                <th>Sr. No.</th>
                                <th>Leave Id</th>
                                <th>Employee Id</th>
                                <th>Full Name</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Applied On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $query = 'SELECT * FROM apply_leave where employees_id = "'.$employees_id.'"';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Approved";
                              $approved = $rowMember["status"];
                              if ($employees_id==$employees_id) {
                              if ($approved==$flag) {
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><?php echo $rowMember['leave_id'] ?></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['fullname'] ?></td>
                                <td><?php echo $rowMember['leaveType'] ?></td>
                                <td><?php echo $rowMember['leaveFrom'] ?></td>
                                <td><?php echo $rowMember['leaveTo'] ?></td>
                                <td><?php echo $rowMember['noOfDays'] ?> days</td>
                                <td><?php echo $rowMember['message'] ?></td>
                                <td style="color: green;"><b><?php echo $rowMember['status'] ?></b></td>
                                <td><?php echo $rowMember['remarks'] ?></td>
                                <td><?php echo $rowMember['appliedDate'] ?></td>
                              </tr>
                              <?php
                              }}}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div id="rejected" class="tab-pane fade">
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="css-serial table table-hover" width="100%">
                            <style>
                            .css-serial {
                            counter-reset: serial-number;  /* Set the serial number counter to 0 */
                            }
                            .css-serial td:first-child:before {
                            counter-increment: serial-number;  /* Increment the serial number counter */
                            content: counter(serial-number);  /* Display the counter */
                            }
                            </style>
                            <thead >
                              <tr>
                                <th>Sr. No.</th>
                                <th>Leave Id</th>
                                <th>Employee Id</th>
                                <th>Full Name</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Days</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Message</th>
                                <th>Applied On</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                             $query = 'SELECT * FROM apply_leave where employees_id = "'.$employees_id.'"';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Rejected";
                              $approved = $rowMember["status"];
                              if ($employees_id==$employees_id) {
                              if ($approved==$flag) {
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><?php echo $rowMember['leave_id'] ?></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['fullname'] ?></td>
                                <td><?php echo $rowMember['leaveType'] ?></td>
                                <td><?php echo $rowMember['leaveFrom'] ?></td>
                                <td><?php echo $rowMember['leaveTo'] ?></td>
                                <td><?php echo $rowMember['noOfDays'] ?> days</td>
                                <td><?php echo $rowMember['message'] ?></td>
                                <td style="color: red;"><b><?php echo $rowMember['status'] ?></b></td>
                                <td><?php echo $rowMember['remarks'] ?></td>
                                <td><?php echo $rowMember['appliedDate'] ?></td>
                              </tr>
                              <?php
                              }}}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>