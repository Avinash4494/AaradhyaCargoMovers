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
                    <img src="../image/stat.png" alt="" class="img-responsive">
                  </div>
                  <div class="col-lg-9">
                    <h4>Request Stationery</h4>
                  </div>
                </div>
               </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Request Stationery</span></h5>
              </div>
              
             
                <div class="bodyComponent">
                  <div class="profileDisplayComponent">
                    <div class="well">
                      <div class="formSection">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="createJobProcess.php" method="post" enctype="multipart/form-data">
                          <input type="text" id="user_id" name="job_id" hidden="">
                          <div class="row">
                            <div class="col-lg-4 col-xs-12">
                              <div class="form-group">
                                <label for="">Job Title</label>
                                <input type="text" id="username" name="job_title" class="form-control" placeholder="Job Title">
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                              <div class="form-group">
                                <label for="">Skills</label>
                                <input type="text" id="" name="skills" class="form-control" placeholder="Skills">
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12">
                              <div class="form-group">
                                <label for="">Job Location</label>
                                <input type="text" id="gender" name="job_location" class="form-control" placeholder="Job Location" >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Job Ends On</label>
                                <input type="date" id="" name="ends_on" class="form-control" >
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Vacancies</label>
                                <input type="text" id="" name="total_post" class="form-control" placeholder="Total Vacancies" >
                              </div>
                            </div>
                            
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Salary (Optional)</label>
                                <input type="text" id="gender" name="salary" class="form-control" placeholder="Salary">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 col-xs-12">
                              <button type="submit" name="Submit" class="actionButtonProfile">Submit</button>
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