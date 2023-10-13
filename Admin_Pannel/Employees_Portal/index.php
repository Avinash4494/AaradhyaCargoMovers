<?php
      include('db.php');
      if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "select * from create_job where id = ".$id;
      $result = mysqli_query($connect, $sql);
      if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from create_job where id=".$id;
      if(mysqli_query($connect, $sql)){
      echo '<script>
      setTimeout(function(){ window.location.href="deleteSuccess.php"; }, 500);
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
  <title>Careers Portal - <?php echo $row["Fullname"]; ?></title>
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
          <?php include_once 'sideNavCarreerPortal.php' ?>
        </div>
      </div>
      
      <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro" >
             <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Careers Portal</h3>
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
          <div class="smallTab hidden-lg">
            <div class="row ">
            <div class="col-lg-4 col-xs-4">
              <a href="createJob.php"><button class="universalButtonCareer">Create Job</button></a>
            </div>
            <div class="col-lg-4 col-xs-4">
               <a href="index.php"><button class="universalButtonCareer">All Jobs</button></a>
            </div>
            <div class="col-lg-4 col-xs-4">
               <a href="allApplicants.php"><button class="universalButtonCareer">Applicants</button></a>
            </div>
          </div>
          </div>
          <div class="reportDisplayComponent">
            
            <?php
            // Import the file where we defined the connection to Database.
            require_once "db.php";
            $per_page_record = 20;  // Number of entries to show in a page.
            // Look for a GET variable page if not found default is 1.
            if (isset($_GET["page"])) {
            $page  = $_GET["page"];
            }
            else {
            $page=1;
            }
            $start_from = ($page-1) * $per_page_record;
            
            $query = "SELECT * FROM create_job order by starts_on desc LIMIT $start_from, $per_page_record";
            $rs_result = mysqli_query ($connect, $query);
            ?>
            
            <?php
            if(mysqli_num_rows($rs_result)){
            while ($row = mysqli_fetch_array($rs_result)) {
            // Display each field of the records.
            ?>
            
            <div class="quoteComponent">
                <div class="well">
                  <div class="smallSubHead">
                    <div class="row">
                    <div class="col-lg-2 col-xs-5">
                      <h5><b>Job Id: </b> <?php echo $row["job_id"]; ?></h5>
                    </div>
                    <div class="col-lg-8 col-xs-8">
                      <h5 ><b><?php echo $row["job_title"]; ?></b></h5>
                    </div>
                    <div class="col-lg-1 col-xs-2">
                      <a href="jobEdit.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to edit this record?')">
                      <button class="universalButtonCareer"> <i class="fa fa-pencil"></i></button></a>
                    </div>
                    <div class="col-lg-1 col-xs-2">
                      <a href="index.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                      <button class="universalButtonCareer"> <i class="fa fa-trash"></i></button></a>
                    </div>
                  </div>
                  </div>
                  <div class="courierDescription" >
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-4">
                            <h5><b>Experience (in Years) </b><?php echo $row["experience"]; ?> Yrs</h5>
                            <h5><b>Total Vacancies - </b><?php echo $row["total_post"]; ?></h5>
                            <h5><b>Starts On - </b><?php echo $row["starts_on"]; ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5><b>Location - </b><?php echo $row["job_location"]; ?></h5>
                            <h5><b>Salary - </b><?php echo $row["salary"]; ?></h5>
                            <h5><b>Ends On - </b><?php echo $row["ends_on"]; ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5><b>Education - </b><?php echo $row["education"]; ?></h5>
                            <h5><b>Timings - </b> <?php echo $row["timings"]; ?></h5>
                            <h5><b>Posted On - </b><?php echo $row["published_on"]; ?></h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-8">
                            <h5><b>Skills </b><?php echo $row["skills"]; ?></h5>
                            <h5><b>Requirments - </b><?php echo $row["requirments"]; ?></h5>
                            <h5><b>Role & Responsbilities - </b><?php echo $row["role_resp"]; ?></h5>
                            <h5><?php echo $row["speical_info"]; ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5 style="line-height: 18px;"><b>Reach Out </b><br>Dushyant Singh <br> <i class="fa fa-phone"></i>&nbsp  9113855664/9743866386<br><i class="fa fa-envelope"></i>&nbsp    aaradhyacargomovers@gmail.com</h5>
                          </div>
                        </div>
                      </div>
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
                  $query = "SELECT COUNT(*) FROM addcourier";
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
</body>
</html>