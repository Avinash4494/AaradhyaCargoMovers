<?php
include('db.php');
$upload_dir = 'uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from admin_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from admin_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="deleteSuccess.php"; }, 1000);
</script>';
}
}
}
?>
<?php
session_start();
error_reporting(0);
if($_SESSION["username"]){
}
else {
header("location: ../index.php");
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
  <title>Profile - <?php echo $row["Fullname"]; ?></title>
  <?php include_once 'navAdminLinks.php'?>
  <div><?php include_once 'adminNavOthers.php' ?></div>
<section id="sectionHide" style="padding-top: 20px;"></section>
<body onload="showtime()" >
  <div class="sectionHiddenHome"></div>
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
                <div class="col-lg-4 col-xs-10">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Manage Account</h3>
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
          <?php include_once "accountInfo.php" ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
