<?php
require_once('db.php');
$upload_dir = 'uploads/employees-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_employees where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$employees_id = $rowMember['employees_id'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
 
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
<?php include_once 'employee_left_pannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employees_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Leave Details </span> </h5>
              </div>
              <div class="row">
                <div class="col-lg-12" >
                  <h4>Leave Details</h4>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12">
                  <div id="print_setion">
                    <div class="row">
                      
                      <div class="col-lg-12">

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
                                <th>Action</th>
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
                              $query = "SELECT * FROM apply_leave  LIMIT $start_from, $per_page_record ";
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
                                <td>
                            <a href="employee_leave_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                              <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                            </a>
                          </td>
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
                             
                              $query = 'SELECT * FROM apply_leave';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Pending";
                              $approved = $rowMember["status"];
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
                              }}
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
                              $query = 'SELECT * FROM apply_leave';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Approved";
                              $approved = $rowMember["status"];
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
                              }}
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
                             $query = 'SELECT * FROM apply_leave';
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Rejected";
                              $approved = $rowMember["status"];
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
                              }}
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