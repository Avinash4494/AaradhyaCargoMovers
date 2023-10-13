<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowAllStud = mysqli_fetch_assoc($result);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="Courier_Portal/deleteSuccess.php"; }, 1000);
</script>';
}
}
}
?>
<?php
include_once 'db.php';
$resultName = mysqli_query($connect,"SELECT * FROM  admin_login");
?>
 
<?php
include_once 'db.php';
$resultAllCouriers = mysqli_query($connect,"SELECT * FROM addcourier");
?>
<?php
require_once('db.php');
$upload_dir = 'Profile_Portal/uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from contact where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
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
  <div><?php include_once 'adminNavTop.php' ?></div>
  
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
                  $upload_dir = 'Profie_Portal/uploads/';
                  $username = $_SESSION['username'];
                  $query_profile = mysqli_query($connect,
                  "SELECT a.USN,a.Fullname,a.Email,u.image
                  From admin_login as a
                  join admin_info as u
                  on a.USN = u.USN_id
                  WHERE USN='$username'");
                  $row_profile = mysqli_fetch_assoc($query_profile)
                  ?>
                  <img src="<?php echo $upload_dir.$row_profile['image'] ?>"  class="img-responsive">
                  <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div id="status"></div>
                    </div>
                  </div>
                  <h4><?php echo $row_profile["Fullname"]; ?></h4>
                  <h6><?php echo $row_profile["Email"]; ?></h6>
                </div>
              </div>
            </div>
            <?php include_once 'sideNavAdmin.php' ?>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="dashIntro" style="padding-top: 20px;">
            <div class="row">
              <div class="col-lg-12">
                <h4><span id="greetings"></span> <?php echo $row["Fullname"]; ?> </h4>
                <span id="show_time"></span>
              </div>
            </div>
          </div>
          <div class="rightPannel" >
             <div class="row">
    <div class="col-lg-12">
      <?php
      
      // Import the file where we defined the connection to Database.
      require_once "../db.php";
      
      $per_page_record = 3;  // Number of entries to show in a page.
      // Look for a GET variable page if not found default is 1.
      if (isset($_GET["page"])) {
      $page  = $_GET["page"];
      }
      else {
      $page=1;
      }
      
      $start_from = ($page-1) * $per_page_record;
      
      
      $query =  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
      From admin_login as a
      join admin_info as u
      on a.USN = u.USN_id
      WHERE USN='$username' LIMIT $start_from, $per_page_record";
      $rs_result = mysqli_query ($connect, $query);
      ?>
      <?php
      if(mysqli_num_rows($rs_result)){
      while ($row = mysqli_fetch_array($rs_result)) {
      // Display each field of the records.
      ?>
      
      <div class="col-lg-12">
        <div class="profileDisplayComponent">
          <div class="well">
            <div class="row">
              <div class="col-lg-3">
                <p hidden=""><?php echo $row['id'] ?></p>
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive"><br>
              </div>
              <div class="col-lg-4">
                <h4><b>Name : </b><?php echo $row['Fullname'] ?></h4>
                <h4><b>Mobile Number : </b><?php echo $row['mobile'] ?>
                <h4><b>Date Of Birth : </b><?php echo $row['dob'] ?></h4>
                <h4><b>Username : </b><?php echo $row['USN'] ?></h4>
                <h4><b>Present Address</b></h4>
                <h4><?php echo $row['present_address'] ?>, <?php echo $row['present_state'] ?>,<?php echo $row['present_pincode'] ?></h4>
              </div>
              <div class="col-lg-4">
                <h4><b>Email : </b><?php echo $row['Email'] ?></h4>
                <h4><b>Alternate Number : </b><?php echo $row['alternate_phone'] ?></h4>
                <h4><b>Gender : </b><?php echo $row['gender'] ?></h4>
                <h4><b>Permanent Address</b></h4>
                <h4><?php echo $row['permanent_address'] ?>,<?php echo $row['permanent_state'] ?><?php echo $row['permanent_pincode'] ?></h4>
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
      
      
      
      <script>
      function go2Page()
      {
      var page = document.getElementById("page").value;
      page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
      window.location.href = 'index.php?page='+page;
      }
      </script>
    </div>
    <div class="container-fluid">
      <div class="row" >
        <div class="col-lg-7 col-xs-7"  >
          <div class="pagination">
            <?php
            // error_reporting(0);
            $query = "SELECT COUNT(*) FROM admin_login";
            $rs_result = mysqli_query($connect, $query);
            $row = mysqli_fetch_row($rs_result);
            $total_records = $row[0];
            // Number of pages required.
            $total_pages = ceil($total_records / $per_page_record);
            $pagLink = "";
            
            if($page>=2){
            echo "<a style='border:none;' href='index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
            }
            
            for ($i=1; $i<=$total_pages; $i++) {
            if ($i == $page) {
            $pagLink .= "<a class = 'active' href='index.php?page="
            .$i."'>".$i." </a>";
            }
            else  {
            $pagLink .= "<a href='index.php?page=".$i."'>
            ".$i." </a>";
            }
            };
            echo $pagLink;
            
            if($page<$total_pages){
            echo "<a style='border:none;' href='index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
            }
            
            ?>
          </div>
          
        </div>
        <div class="col-lg-3" >
          <div class="pagination" >
            <h4>Total Pages : <?php echo $page." / ".$total_pages; ?></h4>
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