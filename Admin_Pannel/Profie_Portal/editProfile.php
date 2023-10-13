<?php
require_once('db.php');
error_reporting(0);
$upload_dir = 'uploads/';
$sql = "select * from admin_info";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
if(isset($_POST['Submit'])){
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$alternate_phone = $_POST['alternate_phone'];
$present_address = $_POST['present_address'];
$present_state = $_POST['present_state'];
$present_pincode = $_POST['present_pincode'];
$permanent_address = $_POST['permanent_address'];
$permanent_state = $_POST['permanent_state'];
$permanent_pincode = $_POST['permanent_pincode'];
$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
if(in_array($imgExt, $allowExt)){
if($imgSize < 5000000){
unlink($upload_dir.$row['image']);
move_uploaded_file($imgTmp ,$upload_dir.$userPic);
}else{
$errorMsg = 'Image too large';
}
}else{
$errorMsg = 'Please select a valid image';
}
}else{
$userPic = $row['image'];
}
if(!isset($errorMsg)){
$sql = "update admin_info
set dob = '".$dob."',
gender = '".$gender."',
alternate_phone = '".$alternate_phone."',
present_address = '".$present_address."',
present_state = '".$present_state."',
present_pincode = '".$present_pincode."',
permanent_address = '".$permanent_address."',
permanent_state = '".$permanent_state."',
permanent_pincode = '".$permanent_pincode."',
image = '".$userPic."'";
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 500);
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
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Update Profile</h3>
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
                  <h4>Update Your Profile</h4><br>
                </div>
                <div class="col-lg-1">
                  <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
                </div>
              </div>
              <div class="profileDisplayComponent">
                <div class="well">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                    <input type="text" id="user_id" name="random_user_id" hidden="">
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Username<span>*</span></label>
                          <input type="text" id="dob" name="USN" class="form-control"value="<?php echo $row['USN']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Date of Birth<span>*</span></label>
                          <input type="text" id="dob" name="dob" class="form-control"value="<?php echo $row['dob']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Gender<span>*</span></label>
                          <input type="text" id="gender" name="gender" class="form-control" value="<?php echo $row['gender']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Alternate Phone (Optional)</label>
                          <input type="text" id="" name="alternate_phone" class="form-control" value="<?php echo $row['alternate_phone']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-xs-12">
                        <div class="row">
                          <div class="col-lg-12">
                            <h5>Present Address</h5>
                            <div class="row">
                              <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                  <label for="">Address<span>*</span></label>
                                  <input type="text" id="present_address" name="present_address" class="form-control" value="<?php echo $row['present_address']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">State<span>*</span></label>
                                  <input type="text" id="present_address" name="present_state" class="form-control" value="<?php echo $row['present_state']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Pincode<span>*</span></label>
                                  <input type="text" id="present_pincode" name="present_pincode" class="form-control" value="<?php echo $row['present_pincode']?>">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-xs-12">
                            <h5>Permanent Address</h5>
                            <div class="row">
                              <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                  <label for="">Address<span>*</span></label>
                                  <input type="text" id="permanent_address" name="permanent_address" class="form-control" placeholder="Your Address Here" value="<?php echo $row['permanent_address']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">State<span>*</span></label>
                                  <input type="text" id="present_address" name="permanent_state" class="form-control" placeholder="Your Address Here" value="<?php echo $row['permanent_state']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Pincode<span>*</span></label>
                                  <input type="text" id="permanent_pincode" name="permanent_pincode" class="form-control" placeholder="Pincode" value="<?php echo $row['permanent_pincode']?>">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4">
                        <div class="updateProfilePic">
                          
                          <img src="<?php echo $upload_dir.$row['image'] ?>" width="100">
                          <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                          </div>
                          
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <button type="submit" name="Submit" class="signButton">Submit</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
