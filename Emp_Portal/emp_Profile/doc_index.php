
<?php
include_once 'db.php';
error_reporting(0);
 $upload_dir = 'uploads/emp_doc/';
$query = mysqli_query($connect,"SELECT * FROM emp_upload_doc WHERE employees_id='$employees_id'");
$rowDoc = mysqli_fetch_assoc($query);
?>
  <?php 
 
 include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftPannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">MyDocuments</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-10">
                      <h4>Documents Details</h4>
                    </div>
                    <div class="col-lg-2">
                     
                      <a href="doc_upload.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                        <button class="actionButtonIcons-center">Upload &nbsp
                        <i class="fa fa-upload"></i>
                        </button>
                      </a>
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <div class="personalData">
                        <?php  include_once 'docDetails.php'; ?>
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