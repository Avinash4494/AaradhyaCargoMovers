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
                      <img style="margin-top: 5px;" src="../image/guestPass.png" alt="" class="img-responsive">
                    </div>
                    <div class="col-lg-9">
                      <h4>Guest Pass</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Guest Pass</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="profileDisplayComponent">
                  <div class="well">
                    <div class="formSection">
                      <form class="" name ="register" onsubmit="return myvalidate();" action="process_guestPass.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="request_id" name="request_id" hidden="" >
                        <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                        <input type="text" id="raised_on" name="raised_on" hidden="" >
                         <input type="text" id="raised_on" name="updated_on" hidden="" >
                          <input type="text" id="raised_on" name="remarks" hidden="" >
                        <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                        <h5>Visit Details</h5>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Raised By</label>
                              <input type="text" id="raised_by" name="raised_by" class="form-control" placeholder="Raised By" value="<?php echo $row['employees_id'] ?>">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Place of Visit</label>
                              <input type="text" id="username" name="place_visit" class="form-control" placeholder="Place of Visit">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Pass Type</label>
                              <input type="text" id="passType" name="pass_type" class="form-control" placeholder="Pass Type">
                            </div>
                          </div>
                         
                        </div>
                        <div class="row">
                           <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Photography</label>
                              <select name="photography" id="" class="form-control">
                                <option value="Null">Select Any</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                               
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Start Date</label>
                              <input type="date" id="username" name="start_date" class="form-control" placeholder="Raised By">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">End Date</label>
                              <input type="date" id="location" name="end_date" class="form-control" placeholder="End Date">
                            </div>
                          </div>
                        </div>
                        <h5>Guest Details</h5>
                        <div class="row">
                         <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">Guest Name</label>
                              <input type="text" id="guest_name" name="guest_name" class="form-control" placeholder="Guest Name">
                            </div>
                            <div class="form-group">
                              <label for="">Organization</label>
                              <input type="text" id="quantity" name="organisation" class="form-control" placeholder="Organization">
                            </div>
                          </div>
                          <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">Contact No.</label>
                              <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact Number">
                            </div>
                            <div class="form-group">
                              <label for="">Email Id.</label>
                              <input type="email" id="quantity" name="email" class="form-control" placeholder="Email Id.">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"></div>
                          <div class="col-lg-4 col-xs-12">
                            <button type="submit" name="Submit" class="actionButtonProfile-center">Create</button>
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