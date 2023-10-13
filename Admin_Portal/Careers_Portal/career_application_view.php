 
<?php
require_once('../db.php');
$upload_applicant = '../uploads/job-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from application_form where id=".$id;
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
  <title>Careers Portal</title>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="career_index.php" data-toggle="tooltip" title="Careers Portal!" data-placement="top">Careers Portal</a> / <span class="activePage">Applicant Details</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-11" >
                  <h5><b>Applicant Details</b></h5>
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
                             
                              <li class="list-group-item"><b>Registration Id : </b><?php echo $rowMember['registration_id'] ?></li>

                              <li class="list-group-item"><b>Name : </b><?php echo $rowMember['fname'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowMember['email'] ?></li>
                              <li class="list-group-item"><b>Contact : </b><?php echo $rowMember['contact'] ?></li>
                              <li class="list-group-item"><b>Highest Qualification : </b><?php echo $rowMember['highestQualification'] ?> </li>
                              <li class="list-group-item"><b>College : </b><?php echo $rowMember['college'] ?></li>
                              <li class="list-group-item">  <b>Experienced : </b><?php echo $rowMember['exp'] ?></li>
                              
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">  <b>Present CTC  : </b><?php echo $rowMember['present_ctc'] ?></li>
                              <li class="list-group-item"><b>Ecpected CTC  : </b><?php echo $rowMember['expected_ctc'] ?></li>
                              <li class="list-group-item">  <b>Department  : </b>
                              <?php echo $rowMember['department'] ?></li>
                              
                              <li class="list-group-item"><b>About : </b><?php echo $rowMember['about'] ?></li>
                              <li class="list-group-item"><b>Applied On : </b><?php echo $rowMember['applied_time'] ?></li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <h5><b>Documents</b></h5>
                </div>
                <div class="col-lg-6">
                  <h5><a href="<?php echo $upload_applicant.$rowMember['image']; ?>" target="blank">
                   
                <b><i class="fa fa-download"></i>&nbsp &nbsp Download Resume</b></a></h5>
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