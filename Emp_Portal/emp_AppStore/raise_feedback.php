<?php
include('../db.php');
$upload_dir = 'uploads/employees-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_employees where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_employees where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="employees_index.php"; }, 1000);
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
                    <img src="../image/feedback.png" alt="" class="img-responsive">
                  </div>
                  <div class="col-lg-9">
                    <h4>Feedback</h4>
                  </div>
                </div>
               </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Feedback</span></h5>
              </div>
              
             
                <div class="bodyComponent">
                  <div class="profileDisplayComponent">
                    <div class="well">
                      <div class="formSection">
                      <form class="" name ="register" onsubmit="return myvalidate();" action="process_byod.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="request_id" name="request_id" hidden="" >
                        <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                        <input type="text" id="raised_on" name="raised_on" hidden="" >
                        <input type="text" id="raised_on" name="updated_on" hidden="" >
                        <input type="text" id="raised_on" name="remarks" hidden="" >
                        <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Raised By</label>
                              <input type="text" id="raised_by" name="raised_by" class="form-control" placeholder="Raised By">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Office Location</label>
                              <input type="text" id="offc_location" name="offc_location" class="form-control" placeholder="Office Location">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Primary Owner</label>
                              <input type="text" id="prim_owner" name="prim_owner" class="form-control" placeholder="Primary Owner">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Device Type</label>
                              <input type="text" id="username" name="dev_type" class="form-control" placeholder="Device Type">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Device Name</label>
                              <input type="text" id="username" name="dev_name" class="form-control" placeholder="Device Name">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Device Model No.</label>
                              <input type="text" id="location" name="dev_modelNo" class="form-control" placeholder="Device Model Number">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">From Date</label>
                              <input type="date" id="username" name="fromDate" class="form-control" placeholder="">
                            </div>
                          </div>
                          <div class="col-lg-6 col-xs-12">
                            <div class="form-group">
                              <label for="">To Date</label>
                              <input type="date" id="username" name="toDate" class="form-control" placeholder="">
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