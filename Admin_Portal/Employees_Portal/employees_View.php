
<?php
require_once('db.php');
$upload_emp = 'uploads/employees-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_employees where id=".$id;
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
              <div class="empty-left-View"></div>
              <?php include_once 'employee_left_pannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employees_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Employee Profile </span> </h5>
              </div>
              <div class="row">
                <div class="col-lg-11" >
                  <h4>Employee Profile</h4>
                </div>
                <div class="buttonTop">
                  <div class="col-lg-1" >
                    <a href="receipt_Employee.php?id=<?php echo $rowMember['id'] ?>" >
                      <button class="actionButtonIcons-center" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </a>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12">
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="profileImage">
                          <img src="<?php echo $upload_emp.$rowMember['image'] ?>" class="img-responsive">
                        </div><br>
                        <a href="addEmployeeReview.php"><button class="actionButton" type="submit"><i class="fa fa-plus"></i> &nbsp Add Review</button></a>
                      </div>
                      <div class="col-lg-10">
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Name : </b><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowMember['email'] ?></li>
                              <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowMember['phone'] ?></li>
                              <li class="list-group-item"><b>Gender : </b><?php echo $rowMember['gender'] ?></li>
                              <li class="list-group-item"><b>Age : </b><?php echo $rowMember['age'] ?> Yrs</li>
                              <li class="list-group-item"><b>Date of Birth : </b><?php echo $rowMember['dob'] ?></li>
                              <li class="list-group-item"><b>Aadhar Number : </b><?php echo $rowMember['aadharNo'] ?></li>
                              <li class="list-group-item">  <b>College/University : </b><?php echo $rowMember['colUniversity'] ?></li>
                              <li class="list-group-item">  <b>Highest Qualification : </b><?php echo $rowMember['highestQual'] ?></li>
                              <li class="list-group-item">  <b>Degree : </b><?php echo $rowMember['degree'] ?></li>
                              <li class="list-group-item">  <b>Date of Completition : </b><?php echo $rowMember['passingDate'] ?></li>
                              <li class="list-group-item"><b>Profile last Updated On : </b><?php echo $rowMember['updatedDate'] ?></li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Employee Id : </b><?php echo $rowMember['employees_id'] ?></li>
                              <li class="list-group-item"><b>Date of Joining : </b><?php echo $rowMember['joiningDate'] ?></li>
                              <li class="list-group-item"><b>Alternate Number : </b><?php echo $rowMember['alternate_phone'] ?></li>
                              <li class="list-group-item"> <b>Department : </b><?php echo $rowMember['department'] ?></li>
                              <li class="list-group-item"> <b>Martial Status : </b><?php echo $rowMember['martialStatus'] ?></li>
                              <li class="list-group-item"><b>Shift Timing : </b><?php echo $rowMember['shiftTiming'] ?></li>
                              <li class="list-group-item"><b>PAN Number : </b><?php echo $rowMember['panNumber'] ?></li>
                              <li class="list-group-item"><b>Medical History : </b><?php echo $rowMember['medicalHistory'] ?></li>
                              <li class="list-group-item"><b>Address :</b> <?php echo $rowMember['present_address'] ?>,<?php echo $rowMember['state'] ?>,<?php echo $rowMember['present_pincode'] ?></li>
                              <li class="list-group-item"><b>Remarks :&nbsp</b><?php echo $rowMember['remarks'] ?></li>
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