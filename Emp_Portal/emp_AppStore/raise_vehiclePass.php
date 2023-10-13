<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from employee_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>myRequest</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <div class="mainHeadDesc">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-3">
                      <img src="../image/vechPass.png" alt="" style="margin-top: 15px;" class="img-responsive">
                    </div>
                    <div class="col-lg-9">
                      <h4>Vehicle Pass</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Vehicle Pass</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="profileDisplayComponent">
                  <div class="well">
                    <div class="formSection">
                      <form class="" name ="register" onsubmit="return myvalidate();" action="process_vechPass.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="request_id" name="request_id" hidden="" >
                        <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                        <input type="text" id="raised_on" name="raised_on" hidden="" >
                        <input type="text" id="updated_on" name="updated_on" hidden="" >
                        <input type="text" id="remarks" name="remarks" hidden="" >
                        <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                        <div class="row">
                          <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">Riased By</label>
                              <input type="text" id="username" name="raised_by" class="form-control" placeholder="Raised By">
                            </div>
                          </div>
                          <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">Office Location</label>
                              <input type="text" id="location" name="location" class="form-control" placeholder="Location">
                            </div>
                          </div>
                          
                        </div>
                        <h5>Vehicle Details</h5>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Vehcile Regis. No</label>
                              <input type="text" id="quantity" name="veh_regis" class="form-control" placeholder="Registration Number">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Vehicle Type</label>
                              <select name="veh_type" class="form-control" id="">
                                <option value="Select Any">Select Any</option>
                                <option value="2 Wheeler">2 Wheeler</option>
                                <option value="4 Wheeler">4 Wheeler</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Vehicle No.</label>
                              <input type="text" id="quantity" name="veh_num" class="form-control" placeholder="Vehicle Number">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Vehcile Model</label>
                              <input type="text" id="quantity" name="veh_model" class="form-control" placeholder="Vehcile Model">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Vehcile Name</label>
                              <input type="text" id="quantity" name="veh_name" class="form-control" placeholder="Vehcile Name">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">location for Vehicle Pass</label>
                              <input type="text" id="quantity" name="veh_location" class="form-control" placeholder="location for Vehicle Pass">
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">DL Number</label>
                              <input type="text" id="comments" name="dl_num" class="form-control" placeholder="Driving Licence Number">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Comments</label>
                              <input type="text" id="comments" name="comments" class="form-control" placeholder="Comments">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"></div>
                          <div class="col-lg-4 col-xs-12">
                            <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                          </div>
                          <div class="col-lg-4"></div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3">
            <div class="aboutPannel">
              <div class="well">
                <h4>About this App</h4>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation.</p>
              </div>
            </div>
            <div class="otherPannel">
              <a href="raise_feedback.php">
                <div class="well">
                  <h4>Share Feedback</h4>
                </div>
              </a>
            </div>
            <div class="otherPannel">
              <a href="helpDesk.php">
                <div class="well">
                  <h4>Help Desk</h4>
                </div>
              </a>
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