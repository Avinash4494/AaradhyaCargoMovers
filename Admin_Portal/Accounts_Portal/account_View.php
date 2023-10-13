<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from admin_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Account Report</title>
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
              <?php include_once 'toLeftAccounts.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="admin_index.php" data-toggle="tooltip" title="Account Portal!" data-placement="top">Account Portal</a> / <span class="activePage">Admin Account Details</span></h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent viewComp">
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      <div class="accountComponent">
                        <h4>Admin Account Details</h4>
                        <div class="profileData">
                          <div class="row">
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <div class="col-lg-3">
                              <?php
                              $profile_image = $rowMember['profile_image'];
                              
                              if ($profile_image=='Null')
                              {
                              ?>
                              <div class="nullImage">
                                <img src="../image/empWhite.png" class="img-responsive">
                              </div>
                              <?php
                              }
                              else {
                              ?>
                              <div class="fullImage">
                                <img src="<?php echo $upload_direct.$rowMember['profile_image']; ?>" class="img-responsive">
                              </div>
                              <h4 style="text-align: center;padding-top: 5px;letter-spacing: 1.5px;"><?php echo $rowMember['Fullname'] ?></h4>
                              <?php
                              }
                              ?>
                            </div>
                            <div class="col-lg-3">
                              <h6><b>Name : </b><?php echo $rowMember['Fullname'] ?></h6>
                              
                              <h6><b>Date Of Birth : </b><?php echo $rowMember['dob'] ?></h6>
                              <h6><b>Gender : </b><?php echo $rowMember['gender'] ?></h6>
                              <h6><b>Aadhar Number : </b><?php echo $rowMember['aadhar_num'] ?></h6>
                              <h6><b>Name on Aadhar : </b><?php echo $rowMember['aadhar_name'] ?></h6>
                              <h6><b>Pan Number : </b><?php echo $rowMember['pan_num'] ?></h6>
                              <h6><b>Blood Group : </b><?php echo $rowMember['blood_grp'] ?></h6>
                              <h6><b>Country : </b><?php echo $rowMember['country_birth'] ?></h6>
                            </div>
                            <div class="col-lg-4">
                              <h6><b>Username : </b><?php echo $rowMember['admin_id'] ?></h6>
                              <h6><b>Alternate Number : </b><?php echo $rowMember['alternate_phone'] ?></h6>
                              <h6><b>Martial Status : </b><?php echo $rowMember['martial_status'] ?></h6>
                              <h6><b>Birth Place : </b><?php echo $rowMember['birth_place'] ?></h6>
                              <h6><b>Nationality : </b><?php echo $rowMember['nationality'] ?></h6>
                              <h6><b>Mobile Number : </b><?php echo $rowMember['mobile'] ?></h6>
                              <h6><b>Email : </b><?php echo $rowMember['Email'] ?></h6>
                              
                            </div>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                  
                  
                  
                  <!--                 <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      <h4>Account Status</h4>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a  href="approval_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                        <button class="actionButtonIcons-center"> <i class="fa fa-pencil-square"></i></button>
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <p><b>Last Logged In -</b> <?php echo $rowMember['last_follow'] ?></p>
                      <p><b>Approved On -</b> <?php echo $rowMember['next_follow'] ?></p>
                    </div>
                    <div class="col-lg-3">
                      <p><b>Account Priority -</b> <?php echo $rowMember['status_priority'] ?></p>
                      <p><b>Update By - </b><?php echo $rowMember['update_by'] ?></p>
                    </div>
                    <div class="col-lg-6">
                      <p><b>Current Status -</b> <?php echo $rowMember['status'] ?></p>
                      <p><b>Status Message -</b> <?php echo $rowMember['status_msg'] ?></p>
                    </div>
                  </div> -->
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