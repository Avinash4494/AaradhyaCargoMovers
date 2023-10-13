
 
 <?php
session_start();
error_reporting(0);
if($_SESSION["username"]){
}
else {
header("location: ../index.php");
}
?>
<?php
include_once 'db.php';
$username = $_SESSION['username'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='$username'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Create Jobs - <?php echo $row["Fullname"]; ?></title>
  <?php include_once '../navAdminLinks.php'?>
  <div><?php include_once 'adminNavOthers.php' ?></div>
<section id="sectionHide" style="padding-top: 20px;"></section>
<body onload="showtime()" >
  <div class="sectionHiddens"></div>
  <?php
  require_once "db.php";
  $upload_dir = '../Profie_Portal/uploads/';
  $username = $_SESSION['username'];
  $query = mysqli_query($connect,
  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
  From admin_login as a
  join admin_info as u
  on a.USN = u.USN_id
  WHERE USN='$username'");
  $row = mysqli_fetch_assoc($query)
  ?>
  <div class="container-fluid">
    <div class="row">
     <div class="col-lg-2 hidden-xs">
        <div class="leftPannel">
          <div class="shortProfile">
            <div class="well">
              <div class="profilePic">
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <div id="status"></div>
                  </div>
                </div>
                <h4><?php echo $row["Fullname"]; ?></h4>
                <h6><?php echo $row["Email"]; ?></h6>
              </div>
            </div>
          </div>
          <?php include_once 'sideNavCarreerPortal.php' ?>
        </div>
      </div>
      <?php
      include('db.php');
      if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "select * from create_job where id = ".$id;
      $result = mysqli_query($connect, $sql);
      if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from create_job where id=".$id;
      if(mysqli_query($connect, $sql)){
      echo '<script>
      setTimeout(function(){ window.location.href="deleteQuote.php"; }, 500);
      </script>';
      }
      }
      }
      ?>
      <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro" >
             <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Careers Portal </a>/ Create Job</h3>
                </div>
                <div class="timeName">
                  <div class="col-lg-3 col-xs-5">
                    <h3 id="show_time"></h3>
                  </div>
                  <div class="col-lg-5 col-xs-7">
                    <h3 style="float: right;"><span id="greetings"></span> <?php echo $row["Fullname"]; ?> </h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="smallTab hidden-lg">
            <div class="row ">
            <div class="col-lg-4 col-xs-4">
              <a href="createJob.php"><button class="universalButtonCareer">Create Job</button></a>
            </div>
            <div class="col-lg-4 col-xs-4">
               <a href="index.php"><button class="universalButtonCareer">All Jobs</button></a>
            </div>
            <div class="col-lg-4 col-xs-4">
               <a href="allApplicants.php"><button class="universalButtonCareer">Applicants</button></a>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="profileDisplayComponent">
                <div class="row hidden-xs">
                  <div class="col-lg-11">
                    <h4>Create Jobs</h4><br class="hidden-lg">
                  </div>
                  <div class="col-lg-1">
                    <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
                  </div>
                </div>
                <div class="profileDisplayComponent">
                <div class="well">
                <form class="" name ="register" onsubmit="return myvalidate();" action="createJobProcess.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="user_id" name="job_id" hidden="">
                        <div class="row">
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Job Title</label>
                              <input type="text" id="username" name="job_title" class="form-control" placeholder="Job Title">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Skills</label>
                              <input type="text" id="" name="skills" class="form-control" placeholder="Skills">
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Job Location</label>
                              <input type="text" id="gender" name="job_location" class="form-control" placeholder="Job Location" >
                            </div>
                          </div>
                           <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Timings</label>
                              <input type="text" id="username" name="timings" class="form-control" placeholder="Shift Timings" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Job Starts From</label>
                              <input type="date" id="dob" name="starts_on" class="form-control" >
                            </div>
                          </div>
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
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Requirments</label>
                              <input type="text" id="username" name="requirments" class="form-control" placeholder="Requirments" >
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Preferred Education</label>
                              <input type="text" id="dob" name="education" class="form-control" placeholder="Preferred Education" >
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Requierd Experience</label>
                              <input type="text" id="gender" name="experience" class="form-control" placeholder="Requierd Experience" >
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Speical Info.</label>
                              <input type="text" id="gender" name="speical_info" class="form-control" placeholder="Any Other Information">
                            </div>
                          </div>
                           <div class="col-lg-4 col-xs-12">
                            <div class="form-group">
                              <label for="">Roles & Responsiblities</label>
                              <input type="text" id="dob" name="role_resp" class="form-control" placeholder="Roles & Responsiblities">
                            </div>
                          </div>
                          <div class="col-lg-4 col-xs-12">
                            <button type="submit" name="Submit" class="universalButtonApplyNow">Submit</button>
                          </div>
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
</div>
</div>
</body>
</html>