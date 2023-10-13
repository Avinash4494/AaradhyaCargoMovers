<?php
session_start();
if($_SESSION["admin_id"]){
}
else {
header("location: ../Auth/index.php");
}
?>
<?php
include_once 'db.php';
$upload_dir = '../uploads/admin-doc/';
$admin_id = $_SESSION['admin_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query);
?>
<?php

error_reporting(0);

$query = mysqli_query($connect,"SELECT * FROM admin_upload_doc WHERE admin_id='$admin_id'");
$rowDoc = mysqli_fetch_assoc($query);
?>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">My Documents</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-10">
                      <h4>My Documents</h4>
                    </div>
                    <div class="col-lg-2">
                      <?php
                      $image1 = $rowDoc['image1'];
                      if ($image1=='')
                      {
                      ?>
                      
                      <?php
                      }
                      else {
                      ?>
                      <a href="doc_upload.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                        <button class="actionButtonIcons-center">Upload &nbsp
                        <i class="fa fa-upload"></i>
                        </button>
                      </a>
                      <?php
                      }
                      ?>
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