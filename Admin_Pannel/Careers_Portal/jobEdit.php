 


<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from create_job where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowEdit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$job_title = $_POST['job_title'];
$skills = $_POST['skills'];
$job_location = $_POST['job_location'];
$timings = $_POST['timings'];
$starts_on = $_POST['starts_on'];
$ends_on = $_POST['ends_on'];
$total_post = $_POST['total_post'];
$salary = $_POST['salary'];
$requirments = $_POST['requirments'];
$education = $_POST['education'];
$experience = $_POST['experience'];
$speical_info = $_POST['speical_info'];
$role_resp = $_POST['role_resp'];

if(!isset($errorMsg)){
$sql = "update create_job
set job_title = '".$job_title."',
skills = '".$skills."',
job_location = '".$job_location."',
timings = '".$timings."',
starts_on = '".$starts_on."',
ends_on = '".$ends_on."',
total_post = '".$total_post."',
salary = '".$salary."',
requirments = '".$requirments."',
education = '".$education."',
experience = '".$experience."',
speical_info = '".$speical_info."',
role_resp = '".$role_resp."' where id=".$id;


$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>


<?php
session_start();
if($_SESSION["username"]){
}
else {
header("location: index.php");
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
  <title>Update Job <?php echo $row["Fullname"]; ?>  </title>
  <head>
    <?php include_once '../navAdminLinks.php'?>
  </head>
  <div><?php include_once 'adminNavOthers.php' ?></div>

 
  <body onload="showtime(),kFormatter(),kWeightFormat()" >
    <div class="sectionHiddens" style="margin-bottom: 20px;"></div>
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
  $rowProfile = mysqli_fetch_assoc($query)

  ?>
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-2 hidden-xs">
        <div class="leftPannelProfile"  >
          <div class="shortProfileCareers">
            <div class="well">
              <div class="profilePic">
                <img src="<?php echo $upload_dir.$rowProfile['image'] ?>" class="img-responsive">
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <div id="status"></div>
                  </div>
                </div>
                <h4><?php echo $rowProfile["Fullname"]; ?></h4>
                <h6><?php echo $rowProfile["Email"]; ?></h6>
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
        setTimeout(function(){ window.location.href="deleteCourier.php"; }, 500);
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
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard /</a><a href="index.php"> Careers Portal /</a>  Edit job</h3>
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
           
              
              <div class="profileDisplayComponent">
                <div class="row">
                <div class="col-lg-8">
                  <h4>Update Job</h4>
                </div>
                <div class="col-lg-4">
                 <h4 style="font-size: 1em;color: red;float: right;">Job ID : <?php echo $rowEdit['job_id']?></h4>
                </div>
              </div>  
                <div class="well">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                    <input type="text" id="user_id" name="job_id" hidden="">
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Job Title</label>
                          <input type="text" id="username" name="job_title" class="form-control" placeholder="Job Title" value="<?php echo $rowEdit['job_title']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Skills</label>
                          <input type="text" id="" name="skills" class="form-control" placeholder="Alternate Number" value="<?php echo $rowEdit['skills']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Job Location</label>
                          <input type="text" id="gender" name="job_location" class="form-control" placeholder="Gender" value="<?php echo $rowEdit['job_location']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Timings</label>
                          <input type="text" id="username" name="timings" class="form-control" placeholder="Shift Timings" value="<?php echo $rowEdit['timings']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Job Starts From</label>
                          <input type="date" id="dob" name="starts_on" class="form-control" placeholder="Roles & Responsiblities" value="<?php echo $rowEdit['starts_on']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Job Ends On</label>
                          <input type="date" id="" name="ends_on" class="form-control" placeholder="Alternate Number"value="<?php echo $rowEdit['ends_on']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Vacancies</label>
                          <input type="text" id="" name="total_post" class="form-control" placeholder="Total Vacancies"value="<?php echo $rowEdit['total_post']?>">
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Salary (Optional)</label>
                          <input type="text" id="gender" name="salary" class="form-control" placeholder="Gender" value="<?php echo $rowEdit['salary']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                          <label for="">Requirments</label>
                          <input type="text" id="username" name="requirments" class="form-control" placeholder="Job Title" value="<?php echo $rowEdit['requirments']?>">
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                          <label for="">Preferred Education</label>
                          <input type="text" id="dob" name="education" class="form-control" placeholder="Roles & Responsiblities" value="<?php echo $rowEdit['education']?>">
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                          <label for="">Requierd Experience</label>
                          <input type="text" id="gender" name="experience" class="form-control" placeholder="Gender" value="<?php echo $rowEdit['experience']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                          <label for="">Speical Info.</label>
                          <input type="text" id="gender" name="speical_info" class="form-control" placeholder="Gender" value="<?php echo $rowEdit['speical_info']?>">
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-12">
                        <div class="form-group">
                          <label for="">Roles & Responsiblities</label>
                          <input type="text" id="dob" name="role_resp" class="form-control" placeholder="Roles & Responsiblities" value="<?php echo $rowEdit['role_resp']?>">
                        </div>
                      </div>
                      <div class="col-lg-4">
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
  </body>
</html>