
<?php
require_once('db.php');
$upload_emp = 'uploads/employees-uploads/';
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
?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
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
                              <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowMember['job_location'] ?></li>
                              <li class="list-group-item"><b>Gender : </b><?php echo $rowMember['timings'] ?></li>
                              <li class="list-group-item"><b>Age : </b><?php echo $rowMember['starts_on'] ?> Yrs</li>
                              <li class="list-group-item"><b>Date of Birth : </b><?php echo $rowMember['ends_on'] ?></li>
                              <li class="list-group-item"><b>Aadhar Number : </b><?php echo $rowMember['total_post'] ?></li>
                              <li class="list-group-item">  <b>College/University : </b><?php echo $rowMember['salary'] ?></li>
                              <li class="list-group-item">  <b>Highest Qualification : </b><?php echo $rowMember['requirments'] ?></li>
                              <li class="list-group-item">  <b>Degree : </b><?php echo $rowMember['education'] ?></li>
                              <li class="list-group-item">  <b>Date of Completition : </b><?php echo $rowMember['experience'] ?></li>
                              <li class="list-group-item"><b>Profile last Updated On : </b><?php echo $rowMember['speical_info'] ?></li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Employee Id : </b><?php echo $rowMember['role_resp'] ?></li>
                              <li class="list-group-item"><b>Date of Joining : </b><?php echo $rowMember['published_on'] ?></li>
                               
                            </ul>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                              <div class="row">
                <div class="col-lg-12">
                  <h5><b>Uploaded Documents</b></h5>
                  <?php
                  $upload_dir = '../User_Portal/uploads/emp-doc-upload/';
                  $employees_id = $rowMember['employees_id'];
                  $query = 'SELECT * FROM upload_doc where employees_id = "'.$employees_id.'"' ;
                  $rs_result = mysqli_query ($connect, $query);
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  ?>
                  <div class="col-lg-3">
                    <div class="widgetsDoc">
                      <h5><?php echo $rowMember["fullname"]; ?></h5>
                      <div class="well">
                        <img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive">
                      </div>
                      
                    </div>
                  </div>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                  ?>
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