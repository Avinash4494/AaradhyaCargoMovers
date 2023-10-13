<?php
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: ../index.php");
}
?>
<?php
include_once 'db.php';
$upload_direct = 'uploads/';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body >
    <?php include_once '../../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        
       
        <?php
 $profileData = $row['dob'];
        if ($profileData=='Null') {
        ?>
         <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="createProfile">
              <div class="well">
                <h5>Create your profile.</h5>
            <a href="addProfile.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
              <button class="actionButtonIcons" style="text-align: center;">Create profile
              &nbsp <i class="fa fa-user-plus"></i>
              </button>
            </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>

<?php
}
else{
?>
<div class="row">
  <div class="col-lg-2">
    <?php include_once 'topLeftPannel.php' ?>
  </div>
  <div class="col-lg-10">
    <div class="rightPannel">
      <div class="paggignation">
        <h5><a href="../../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Personal Details</span> </h5>
      </div>
      <div id="print_setion">
        <!-- Your Code Here -->
        <div class="row">
          <div class="col-lg-11">
            <h4>Personal Details</h4>
            <div class="personalData">
              <?php  include_once 'accountInfo.php'; ?>
               
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 
<?php

}

?>
        
      </div>
    </div>
  </body>
</html>