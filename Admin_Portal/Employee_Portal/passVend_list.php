<?php
require_once('db.php');
$upload_dir = 'uploads/employees-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from apply_leave where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$employees_id = $rowMember['employees_id'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Vendor Pass Summary </span> </h5>
              </div>
              
              <div class="bodyComponent">
                <div id="print_setion">
                  <div class="row">
                    <div class="col-lg-9">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#vendorPassList">Vendor Pass </a></li>
                        <li><a data-toggle="tab" href="#vendorPending">Pending</a></li>
                        <li><a data-toggle="tab" href="#vendorApproved">Approved</a></li>
                        <li><a data-toggle="tab" href="#vendorRejected">Rejected</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <div class="searchBar">
                        <form action="" method="post">
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" style="margin-left: 30px;" id="word"  name="request_id"  autocomplete="off" placeholder="Enter Request ID"  required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <button style="text-align: center;padding: 10px;border-radius: 0px;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <style>
                  .searchBar input
                  {
                  border-radius: 0px;
                  border:1px solid #1c2833;
                  }
                  .css-serial {
                  
                  margin-top: -25px;
                  }
                  </style>
                  <div class="tab-content">
                    <div id="vendorPassList" class="tab-pane fade in active">
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
                                <th>Request Id</th>
                                <th>Employee Id</th>
                                <th>Raised By</th>
                                <th>Place Visit</th>
                                <th>Item</th>
                                <th>ID Type</th>
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Update On</th>
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
                              $query = "SELECT * FROM raise_vend_pass LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              
                              $employees_id = $rowMember['employees_id'];
                              if ($employees_id==$employees_id) {
                              
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['raised_by'] ?></td>
                                <td><?php echo $rowMember['place_visit'] ?></td>
                                <td><?php echo $rowMember['item_carried'] ?></td>
                                <td><?php echo $rowMember['id_type'] ?></td>
                                
                                <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                                <td ><?php echo $rowMember['raised_on'] ?></td>
                                <td ><?php echo $rowMember['updated_on'] ?></td>
                                <td>
                                  <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                          <div class="row" >
                            <div class="col-lg-8 col-xs-12"  >
                              <div class="pagination" >
                                <?php
                                $query = "SELECT COUNT(*) FROM raise_vend_pass";
                                $rs_result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";
                                if($page>=2){
                                echo "<a style='border:none;' href='passVend_list.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                                }
                                for ($i=1; $i<=$total_pages; $i++) {
                                if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='passVend_list.php?page="
                                .$i."'>".$i." </a>";
                                }
                                else  {
                                $pagLink .= "<a href='passVend_list.php?page=".$i."'>
                                ".$i." </a>";
                                }
                                };
                                echo $pagLink;
                                if($page<$total_pages){
                                echo "<a style='border:none;' href='passVend_list.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <div class="pagination" style="float: right;">
                                <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <?php
                              
                              include('db.php');
                              if(isset($_POST['click'])){
                              $dock_num = $_POST['request_id'];
                              $q = "SELECT * FROM raise_vend_pass where (request_id = '$dock_num')";
                              $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                              if(mysqli_num_rows($result)>=1){
                              while($rowSearch = mysqli_fetch_assoc($result)){
                              ?>
                              <div class="profileDisplayComponent" style="margin-top: 20px;">
                                <div class="well">
 
                                  <div id="ConvDetails" >
                                     
                                    <h4 style="margin-top: 0px;">Request Id : <?php echo $rowSearch['request_id'] ?></h4>
                                    <h5>Visit Details</h5>
                                    <div class="row">
                                      <div class="col-lg-3">
                                        <h5>Raised By :  <?php echo $rowSearch['raised_by'] ?></h5>
                                        <h5>Raised On: <?php echo $rowSearch['raised_on'] ?></h5>
                                      </div>
                                      <div class="col-lg-3">
                                        <h5>Place Visit : <?php echo $rowSearch['place_visit'] ?></h5>
                                        <h5>No. Of Person : <?php echo $rowSearch['place_visit'] ?></h5>
                                      </div>
                                      <div class="col-lg-3">
                                        <h5>Start Date : <?php echo $rowSearch['start_date'] ?></h5>
                                        <h5>End Date : <?php echo $rowSearch['end_date'] ?></h5>
                                      </div>
                                      <div class="col-lg-3">
                                        <h5>Item Carried : <?php echo $rowSearch['item_carried'] ?></h5>
                                      </div>
                                    </div><hr/>
                                    <h5>Vendor Details</h5>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <h5>Vendor Name: <?php echo $rowSearch['vendor_name'] ?></h5>
                                        <h5>Id Type : <?php echo $rowSearch['id_type'] ?></h5>
                                      </div>
                                      <div class="col-lg-4">
                                        <h5>Contact : <?php echo $rowSearch['contact'] ?></h5>
                                        <h5>Email : <?php echo $rowSearch['email'] ?></h5>
                                      </div>
                                      <div class="col-lg-4">
                                        <h5>ID Number : <?php echo $rowSearch['proff_num'] ?></h5>
                                        <h5>Remarks : <?php echo $rowSearch['remarks'] ?></h5>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                              }
                              }
                              }
                              ?>
                              
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="vendorPending" class="tab-pane fade">
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
                                <th>Request Id</th>
                                <th>Employee Id</th>
                                <th>Raised By</th>
                                <th>Place Visit</th>
                                <th>Item</th>
                                <th>ID Type</th>
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Update On</th>
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
                              $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Pending";
                              $approved = $rowMember["req_status"];
                              if ($approved==$flag) {
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['raised_by'] ?></td>
                                <td><?php echo $rowMember['place_visit'] ?></td>
                                <td><?php echo $rowMember['item_carried'] ?></td>
                                <td><?php echo $rowMember['id_type'] ?></td>
                                
                                <td style="color: orange;"><b><?php echo $rowMember['req_status'] ?></b></td>
                                <td ><?php echo $rowMember['raised_on'] ?></td>
                                <td ><?php echo $rowMember['updated_on'] ?></td>
                                <td>
                                  <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                    <div id="vendorApproved" class="tab-pane fade">
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
                                <th>Request Id</th>
                                <th>Employee Id</th>
                                <th>Raised By</th>
                                <th>Place Visit</th>
                                <th>Item</th>
                                <th>ID Type</th>
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Update On</th>
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
                              $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Approved";
                              $approved = $rowMember["req_status"];
                              if ($approved==$flag) {
                              # code...
                              ?>
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['raised_by'] ?></td>
                                <td><?php echo $rowMember['place_visit'] ?></td>
                                <td><?php echo $rowMember['item_carried'] ?></td>
                                <td><?php echo $rowMember['id_type'] ?></td>
                                
                                <td style="color: green;"><b><?php echo $rowMember['req_status'] ?></b></td>
                                <td ><?php echo $rowMember['raised_on'] ?></td>
                                <td ><?php echo $rowMember['updated_on'] ?></td>
                                <td>
                                  <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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
                    <div id="vendorRejected" class="tab-pane fade">
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
                                <th>Request Id</th>
                                <th>Employee Id</th>
                                <th>Raised By</th>
                                <th>Place Visit</th>
                                <th>Item</th>
                                <th>ID Type</th>
                                <th>Status</th>
                                <th>Applied On</th>
                                <th>Update On</th>
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
                              $query = "SELECT * FROM raise_vend_pass  LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $employees_id = $rowMember['employees_id'];
                              $flag="Rejected";
                              $approved = $rowMember["req_status"];
                              if ($approved==$flag) {
                              # code...
                              ?>
                              
                              <tr>
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><b><a style="color: black;" href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                                <td><?php echo $rowMember['employees_id'] ?></td>
                                <td><?php echo $rowMember['raised_by'] ?></td>
                                <td><?php echo $rowMember['place_visit'] ?></td>
                                <td><?php echo $rowMember['item_carried'] ?></td>
                                <td><?php echo $rowMember['id_type'] ?></td>
                                
                                <td style="color: red"><b><?php echo $rowMember['req_status'] ?></b></td>
                                <td ><?php echo $rowMember['raised_on'] ?></td>
                                <td ><?php echo $rowMember['updated_on'] ?></td>
                                <td>
                                  <a href="emp_vendorPass_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
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