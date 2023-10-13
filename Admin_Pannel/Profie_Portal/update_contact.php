<?php
  require_once('db.php');
    $sql = "select * from admin_login";
    $result = mysqli_query($connect, $sql);

  if(isset($_POST['Submit'])){
      $mobile = $_POST['mobile'];

    if(!isset($errorMsg)){
      $sql = "update admin_login
                  set mobile = '".$mobile."'";
      $result = mysqli_query($connect, $sql);
      if($result){
        $successMsg = 'New record updated successfully';
        echo '<script>
        
        setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 1000);

</script>';
      }else{
        $errorMsg = 'Error '.mysqli_error($connect);
      }
    }

  }

?> 
<?php
session_start();
if($_SESSION["username"]){
}
else {
header("location: index.php");
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
        <div class="col-lg-10 col-xs-12">
          <div class="rightPannelProfile" >
            <div class="dashIntro">
              <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Update Contact</h3>
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
									<h4>Update Contact</h4><br>
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
												<form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
													<div class="form-group">
														<label for="">New Contact Number <span>*</span></label>	<input type="text" id="repassword" name="mobile" class="form-control"  value="<?php echo $row['mobile']?>" >
													</div>
													<p id="AllFields"></p>
													<p id="OkFields"></p>
													<div class="form-group">
														<button type="submit" name="Submit" class="signButton">Update</button>
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
 








 