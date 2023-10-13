<?php
include('db.php');
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
?>
<!DOCTYPE html>
<html>
 </title>
  <head>
  </head>
    <title>Careers Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
    <?php include_once 'rightTopPannel.php' ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2">
          <div class="leftPannel">
            <div class="empty-left-Index-comTop"></div>
<?php include_once 'toLeftCareers.php' ?>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="rightPannel">
            <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="career_index.php" data-toggle="tooltip" title="Careers Portal!" data-placement="top">Carrers Portal</a> / <span class="activePage">Create Job</span></h5>
            </div>
 
               <div id="print_setion">
                <h4>Create Job</h4>
                          <div class="profileDisplayComponent">
                <div class="well">
                 <div class="formSection">
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
                          </div><br>
                          <div class="col-lg-4 col-xs-12">
                            <button type="submit" name="Submit" class="actionButton">Submit</button>
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
