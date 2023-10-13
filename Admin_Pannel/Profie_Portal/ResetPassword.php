<?php
session_start();
if(isset($_SESSION['reset']))
{
  
} else
  header("location: Forgot Password.php");
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
  
  <body onload="showtime(),kFormatter(),kWeightFormat()" >
    <div class="sectionHiddens"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 hidden-xs">
          <div class="leftPannel">
            <div class="shortProfile">
              <div class="well">
                <div class="profilePic">
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
                  <img src="<?php echo $upload_dir.$row['image'] ?>"  class="img-responsive">
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
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Reset Password</h3>
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
            <div class="container-fluid">
	<div class="row">
		<div class="col-lg-11">
			<h4>Reset Password</h4><br>
		</div>
		<div class="col-lg-1">
			<!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
		</div>
	</div>
	<div class="profileDisplayComponent">
		<div class="well">
			<div class="row">
				<div class="col-lg-4">
					
				</div>
				<div class="col-lg-4">
					<div class="formSection">
						<form action="rs1.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
							<div class="form-group">
								<label for="">Username <span>*</span></label>
								<input type="text" id="username" name="USN" class="form-control" placeholder="Username" >
							</div>
							<div class="form-group">
								<label for="">New Password <span>*</span></label>
								<input type="password" id="password" name="PASSWORD" class="form-control" placeholder="New Password" >
							</div>
							<div class="form-group">
								<label for="">Confirm Password <span>*</span></label>	<input type="password" id="repassword" name="repassword" class="form-control" placeholder="Confirm Password" >
							</div>
							<p id="AllFields"></p>
							<p id="OkFields"></p>
							<div class="form-group">
								<button type="submit" class="signButton">Reset Password</button>
							</div>
							
						</form>
					</div>
				</div>
				<div class="col-lg-4"></div>
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
