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
                      <img src="../image/gatePass.png" alt="" class="img-responsive">
                    </div>
                    <div class="col-lg-9">
                      <h4>Gate Pass</h4>
                    </div>
                  </div>
                </div>
              </div>
               <div class="claimSidePan" style="margin-top: -50px;">
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
          <div class="col-lg-9">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Gate Pass</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="profileDisplayComponent">
                  <div class="well">
                    <div class="formSection">
                      <form class="" name ="register" onsubmit="return myvalidate();" action="process_gatePass.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="request_id" name="request_id" hidden="" >
                        <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                        <input type="text" id="raised_on" name="raised_on" hidden="" >
                        <input type="text" id="raised_on" name="updated_on" hidden="" >
                        <input type="text" id="raised_on" name="remarks" hidden="" >
                        <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                        <h5>Material Details</h5>
                        <div class="row">
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Raised By</label>
                              <input type="text" id="raised_by" name="raised_by" class="form-control" placeholder="Raised By" value="<?php echo $row['employees_id'] ?>">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Material Movement Between</label>
                              <select name="move_btwn" class="form-control" id="">
                                <option value="Select Any">Select Any</option>
                                <option value="ACM-others">ACM-others</option>
                                <option value="ACM-ACM">ACM-ACM</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Pass Type</label>
                              <select name="pass_type" class="form-control" id="">
                                <option value="Select Any">Select Any</option>
                                <option value="Returnable">Returnable</option>
                                <option value="Non-Returnable">Non-Returnable</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Carried out Date</label>
                              <input type="date" id="location" name="out_date" class="form-control" placeholder="End Date">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Carried Out By</label>
                              <input type="text" id="location" name="out_by" class="form-control" placeholder="Carried Out By">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Material Type</label>
                              <input type="text" id="location" name="mat_type" class="form-control" placeholder="Material Type">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" id="location" name="quantity" class="form-control" placeholder="Quantity">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Total Weight</label>
                              <input type="text" id="location" name="total_weight" class="form-control" placeholder="Total Weight">
                            </div>
                          </div>
                        </div>
                        <div class="row">
 
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Material Description</label>
                              <input type="text" id="location" name="mat_descp" class="form-control" placeholder="Material Description">
                            </div>
                          </div>
                        </div> <hr/>
                        <h5>Sender Details</h5>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Sender Name</label>
                              <input type="text" id="guest_name" name="sender_name" class="form-control" placeholder="Sender's Name">
                            </div>
                            
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Contact No.</label>
                              <input type="text" id="contact" name="contact" class="form-control" placeholder="Contact Number">
                            </div>
                           
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Email Id.</label>
                              <input type="email" id="quantity" name="email" class="form-control" placeholder="Email Id.">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Organization</label>
                              <input type="text" id="quantity" name="organisation" class="form-control" placeholder="Organization">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label for="">Location</label>
                              <input type="text" id="contact" name="sender_location" class="form-control" placeholder="Location">
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