
<?php
session_start();
if($_SESSION["username"]){
}
else {
header("location:../index.php");
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
  <title>Dashboard - <?php echo $row["Fullname"]; ?> </title>
  <head>
    <?php include_once 'navAdminLinks.php'?>
  </head>
  <div><?php include_once 'adminNavOthers.php' ?></div>
  <div class="sectionHiddens"></div>
                                       <?php
  require_once "db.php";
  $upload_dir = 'uploads/';
  $username = $_SESSION['username'];
  $query = mysqli_query($connect,
  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
  From admin_login as a
  join admin_info as u
  on a.USN = u.USN_id
  WHERE USN='$username'");
  $row = mysqli_fetch_assoc($query)
  ?>
  <body onload="showtime(),kFormatter(),kWeightFormat()" >
    
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 hidden-xs">
        <div class="leftPannel">
          <div class="shortProfile">
            <div class="well">
              <div class="profilePic">
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
                <div class="row">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-4">
                    <div id="status"></div>
                  </div>
                </div>
                <h4><?php echo $row["Fullname"]; ?></h4>
                <h6><?php echo $row["Email"]; ?></h6>
              </div>
            </div>
          </div>
          <?php include_once 'sideNavProfile.php' ?>
        </div>
      </div><br class="hidden-lg">
        <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro">
             <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Admin Accounts</h3>
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
          <div class="row">
                <div class="col-lg-11">
                  <h4>Admin Accounts</h4> <br>
                </div>
                <div class="col-lg-1">
                  <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
                </div>
              </div>
                      <div class="row">
    <div class="col-lg-12">
      <?php
      
      // Import the file where we defined the connection to Database.
      require_once "db.php";
      $upload_dir = 'uploads/';

      
      $query =  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
      From admin_login as a
      join admin_info as u
      on a.USN = u.USN_id
       ";
      $rs_result = mysqli_query ($connect, $query);
      ?>
      <?php
      if(mysqli_num_rows($rs_result)){
      while ($row = mysqli_fetch_array($rs_result)) {
      // Display each field of the records.
      ?>
      
      <div class="col-lg-12">
        <div class="reportDisplayComponent">
          <div class="well">
            <div class="row">
              <div class="col-lg-2 col-xs-12 hidden-xs">
                <p hidden=""><?php echo $row['id'] ?></p>
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive"><br>
              </div>
              <div class="smallProfileImg">
                <div class="row hidden-lg">
                <div class="col-xs-4"></div>
                <div class="col-xs-4">
                   <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
                </div>
                <div class="col-xs-4"></div>
              </div>
              </div>
              <div class="col-lg-4 col-xs-12">
                <h6><b>Name : </b><?php echo $row['Fullname'] ?></h6>
                <h6><b>Mobile Number : </b><?php echo $row['mobile'] ?>
                <h6><b>Date Of Birth : </b><?php echo $row['dob'] ?></h6>
                <h6><b>Username : </b><?php echo $row['USN'] ?></h6>
                <h6><b>Present Address</b></h6>
                <h6><?php echo $row['present_address'] ?>, <?php echo $row['present_state'] ?>,<?php echo $row['present_pincode'] ?></h6>
              </div>
              <div class="col-lg-4 col-xs-12">
                <h6><b>Email : </b><?php echo $row['Email'] ?></h6>
                <h6><b>Alternate Number : </b><?php echo $row['alternate_phone'] ?></h6>
                <h6><b>Gender : </b><?php echo $row['gender'] ?></h6>
                <h6><b>Permanent Address</b></h6>
                <h6><?php echo $row['permanent_address'] ?>,<?php echo $row['permanent_state'] ?><?php echo $row['permanent_pincode'] ?></h6>
              </div>
              <div class="col-lg-1">
                  
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      }
      else{echo '<h3 style="color:red;font-family: Athiti;text-align:center;font-size:1.2em;">No Record Found</h3>';}
      ?>
      
      
 
    </div>
     
  </div>
        </div>
      </div>
 
      </div>
    </div>
  </body>
  </html>