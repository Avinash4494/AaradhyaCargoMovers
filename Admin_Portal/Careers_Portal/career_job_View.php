 
<?php
require_once('../db.php');
$upload_emp = 'uploads/job-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from create_job where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?><?php include_once "../session.php" ?>
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
            <?php include_once 'toLeftCareers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
               <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="career_index.php" data-toggle="tooltip" title="Careers Portal!" data-placement="top">Careers Portal</a> / <span class="activePage">Job Description</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-11" >
                  <h5>Job Description</h5>
                </div>
                <div class="buttonTop">
                  <div class="col-lg-1" >
                  <!--   <a href="receipt_JobDesc.php?id=<?php echo $rowMember['id'] ?>" >
                      <button class="actionButtonIcons-center" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </a> -->
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-12">
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Job ID : </b><?php echo $rowMember['job_id'] ?> </li>
                              <li class="list-group-item"><b>Skills : </b><?php echo $rowMember['skills'] ?></li>
                              <li class="list-group-item"><b>Location : </b><?php echo $rowMember['job_location'] ?></li>
                              <li class="list-group-item"><b>Shif Timing : </b><?php echo $rowMember['timings'] ?></li>
                              <li class="list-group-item"><b>Published On : </b><?php echo $rowMember['starts_on'] ?> Yrs</li>
                              <li class="list-group-item"><b>Last Date : </b><?php echo $rowMember['ends_on'] ?></li>
                              <li class="list-group-item"><b>Total Post : </b><?php echo $rowMember['total_post'] ?></li>
                              <li class="list-group-item">  <b>Salary : </b><?php echo $rowMember['salary'] ?></li>
                              
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">  <b>Degree : </b><?php echo $rowMember['education'] ?></li>
                              <li class="list-group-item">  <b>Experienced : </b><?php echo $rowMember['experience'] ?> Yrs</li>
                              <li class="list-group-item"><b>Note : </b><?php echo $rowMember['speical_info'] ?></li>
                              <li class="list-group-item"><b>Requirments : </b><?php echo $rowMember['requirments'] ?></li>
                               
                            </ul>
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