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
header("location: ../AdminDashboard.php");
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
        <div class="col-lg-10">
          <div class="rightPannelProfile" >
            <div class="dashIntro">
                <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Forgot Password</h3>
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
									<h4>Forgot Password</h4><br>
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
												<form action="rs.php" class="templatemo-login-form" method="POST" onsubmit="return myvalidate();" name ="register">
										<div class="container-fluid">
											<div class="row">
											<div class="col-lg-12">
													<label for="">Username <span>*</span></label>
													<div class="form-group">
														<input type="text" id="username" name="USN" class="form-control" placeholder="Username">
													</div>											
													<div class="form-group">
											<label for="">Choose Security Question <span>*</span></label>
												<select type="text" id="securityQuestion" name="Question" class="form-control" placeholder="Security Question">
													<option>Choose Security Question</option>
													<option value="What is your nickname?">What is your nickname?</option>
													<option value="What is your fav spot?">What is your favourite spot?</option>
													<option value="What is your fav dish?">What is your favourite dish?</option>
													<option value="What is your dream land address?">What is your dream land address?</option>
													<option value="What is your first mobile number?">What is your first mobile number?</option>
													<option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know?</option>
													<option value="What is your detained years in life?">What is your detained years in life?</option>
													<option value="What is your pet's name?">What is your pet's name?</option>
												
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
													<input type="text" name="Answer" class="form-control" placeholder="Answer" >
												</div>
											</div>
											 <p id="AllFields"></p>
											<p id="OkFields"></p>
											
											</div>
											<div class="form-group">
												<button type="submit" class="signButton">Send Request</button>
											</div>
										</div>
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
<script>
function showtime() {
var today = new Date();
var slicedate=today.toString().slice(0,16);
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTime(m);
s = checkTime(s);
document.getElementById('show_time').innerHTML =
slicedate + " " + h + ":" + m + ":" + s;
var t = setTimeout(showtime, 500);
if(h>=1 && h<=12)
{
document.getElementById("greetings").innerHTML= 'Good Morning';
}
else if(h>=12 && h<=15)
{
document.getElementById("greetings").innerHTML= 'Good Afternoon';
}
else if(h>=15 && h<=18)
{
document.getElementById("greetings").innerHTML= "Good Evening";
}
else if(h>=18 && h<=24)
{
document.getElementById("greetings").innerHTML= "<i class='fas fa-cloud-moon'></i> Good Night";
}
function checkTime(i) {
if (i < 10) {i = "0" + i};
return i;
}
}
</script>
<script>
function myvalidate()
{
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
var repassword=document.getElementById("repassword").value;
if(username.length==0||password.length==0||repassword.length==0)
{
document.getElementById("AllFields").innerHTML="*All Fields are required";
return false;
}
else
{
document.getElementById("OkFields").innerHTML="Valid name";
return true;
}
}
</script>

