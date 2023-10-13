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
  <title>Search Courier - <?php echo $row["Fullname"]; ?></title>
  <?php include_once '../navAdminLinks.php'?>
  <div><?php include_once 'adminNavOthers.php' ?></div>
<section id="sectionHide" style="padding-top: 20px;"></section>
<body onload="showtime()" >
  <div class="sectionHiddens"></div>
  <?php
  require_once "db.php";
  $upload_dir = '../Profie_Portal/uploads/';
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
        <div class="leftPannelProfile" style="position: fixed;">
          <div class="shortProfileCourier">
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
          <?php include_once 'sideNavCourierPortal.php' ?>
        </div>
      </div>
      <?php
      include('db.php');
      if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "select * from addcourier where id = ".$id;
      $result = mysqli_query($connect, $sql);
      if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from addcourier where id=".$id;
      if(mysqli_query($connect, $sql)){
      echo '<script>
      setTimeout(function(){ window.location.href="deleteCourier.php"; }, 500);
      </script>';
      }
      }
      }
      ?>
      <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro" >
            <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-7">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Search Courier</h3>
                </div>
                <div class="col-lg-5">
                  <h3 style="float: right;"><span id="greetings"></span> <?php echo $row["Fullname"]; ?> </h3>
                  <span id="show_time"></span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="profileDisplayComponent">
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Search Courier</h4>
                  </div>
                  <div class="col-lg-1">
                   
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="courierAddComponent">
                     
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
</div>
</div>
</body>
</html>