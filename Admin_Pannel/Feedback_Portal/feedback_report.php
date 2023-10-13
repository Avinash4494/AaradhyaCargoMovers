<?php
include('db.php');
$upload_dir = 'uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from usercoment where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from usercoment where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="deleteFeed.php"; }, 1000);
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
  <title>Feedback Report - <?php echo $row["Fullname"]; ?></title>
  <?php include_once '../navAdminLinks.php'?>
  <div><?php include_once 'adminNavOthers.php' ?></div>
<section id="sectionHide" style="padding-top: 20px;"></section>
<body onload="showtime()" >
  <div class="sectionHiddenHome"></div>
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
          <?php include_once 'sideNavFeedback.php' ?>
        </div>
      </div><br class="hidden-lg">
      <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro">
            <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Feedback Report</h3>
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
            <div class="col-lg-12">
              <div class="reportDisplayComponent">
                
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Feedback Report</h4> <br>
                  </div>
                  <div class="col-lg-1">
                    <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12"><?php
                    // Import the file where we defined the connection to Database.
                    require_once "db.php";
                    $per_page_record = 5;  // Number of entries to show in a page.
                    // Look for a GET variable page if not found default is 1.
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    
                    $query = "SELECT * FROM usercoment order by cdate desc LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($row = mysqli_fetch_array($rs_result)) {
                    // Display each field of the records.
                    ?>
                    
                    <div class="quoteComponent"><p hidden=""><?php echo $row['id'] ?></p>
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-6 col-xs-5">
                            <h5><b>Feedback Id : </b> <?php echo $row["feedback_id"]; ?></h5>
                          </div>
                          <div class="col-lg-6 col-xs-7">
                            <h5 style="float: right;"><b>Date : </b><?php echo $row["cdate"]; ?></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-3">
                            <h5><b>Name : </b><?php echo $row["names"]; ?></h5>                     
                          </div>
                          <div class="col-lg-4">
                            <h5><b>Email : </b><?php echo $row["email"]; ?></h5>
                          </div>
                          <div class="col-lg-3">
                            <h5><b>Phone :</b> <?php echo $row["cphone"]; ?></h5>
                          </div>
                          <div class="col-lg-2">
                             
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-11">
                            <h5 style="line-height: 25px;"><b>Feedback : </b><?php echo $row["ccoment"]; ?></h5>
                          </div>
                          <div class="col-lg-1" >
                            <a href="feedback_report.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <button class="universalButtonDelete"> <i class="fa fa-trash"></i></button></a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                    }
                    else{echo '<h3 style="color:red;font-family: Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                    ?>
                         <div class="row" >
                  <div class="col-lg-8"  >
                    <div class="pagination" >
                      <?php
                      $query = "SELECT COUNT(*) FROM usercoment";
                      $rs_result = mysqli_query($connect, $query);
                      $row = mysqli_fetch_row($rs_result);
                      $total_records = $row[0];
                      // Number of pages required.
                      $total_pages = ceil($total_records / $per_page_record);
                      $pagLink = "";
                      
                      if($page>=2){
                      echo "<a style='border:none;' href='feedback_report.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='feedback_report.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='feedback_report.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='feedback_report.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                      }
                      
                      ?>
                    </div>
                    
                  </div>
                  <div class="col-lg-4" >
                    <div class="pagination" style="float: right;">
                      <h4>Total Pages : <?php echo $page." / ".$total_pages; ?></h4>
                    </div>
                  </div>
                  
                  
                </div>
                    
                    <script>
                    function go2Page()
                    {
                    var page = document.getElementById("page").value;
                    page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
                    window.location.href = 'feedbackReport.php?page='+page;
                    }
                    </script>
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
