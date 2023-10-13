<?php
session_start();
error_reporting(0);
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
  <title>Courier Report - <?php echo $row["Fullname"]; ?></title>
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
                <div class="col-lg-4 col-xs-10">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Courier Report</h3>
                </div>
                <div class="col-xs-2 hidden-lg">
                  <a href="addCourierPannel.php">
                    <button class="universalButtonAdd"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                  </a>
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
                  <div class="col-lg-12"><?php
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
                    
                    $query = "SELECT * FROM addcourier order by courierdate desc LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($row = mysqli_fetch_array($rs_result)) {
                    // Display each field of the records.
                    ?>
                    
                    <div class="quoteComponent">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-6 col-xs-6">
                            <h5 class="hidden-xs"><b>Docket Number : </b> <?php echo $row["docketNumber"]; ?></h5>
                             <h5 class="hidden-lg"><b>D. Number : </b> <?php echo $row["docketNumber"]; ?></h5>
                          </div>
                          <div class="col-lg-6 col-xs-6">
                            <h5 style="float: right;"><b>Date : </b><?php echo $row["added_date"]; ?></h5>
                          </div>
                        </div>
                        <div class="courierDescription" >
                          <div class="row"> 
                          <div class="col-lg-6">
                            <h5 style="font-weight: bold;margin-top: 0px;margin-bottom: 0px;">Consigner Details</h5>
                            <div class="row">
                              <div class="col-lg-6 col-xs-6">
                                <h5><b>Name : </b><?php echo $row["sname"]; ?></h5>
                                <h5><b>Phone :</b> <?php echo $row["smobile"]; ?></h5>
                                <h5><b>Courier Date : </b><?php echo $row["courierdate"]; ?></h5>
                                <h5><b>No.of Pkts : </b><?php echo $row["nofpkts"]; ?></h5>
                              </div>
                              <div class="col-lg-6 col-xs-6">
                                <h5><b>Email : </b><?php echo $row["semail"]; ?></h5>
                                 <h5><b>Pick Up: </b><?php echo $row["saddress"]; ?></h5>
                                 <h5><b>Frieght Type: </b><?php echo $row["tofpkts"]; ?></h5>
                                 <h5><b>Cost : </b><?php echo $row["cost"]; ?>.00 Rs</h5>
                              </div>
                            </div>
                          </div>
                           <div class="col-lg-6">
                              <h5 style="font-weight: bold;margin-top: 0px;margin-bottom: 0px;">Consignee Details</h5>
                              <div class="row">
                              <div class="col-lg-6 col-xs-6">
                                <h5><b>Name : </b><?php echo $row["rname"]; ?></h5>
                                <h5><b>Phone :</b> <?php echo $row["rmobile"]; ?></h5>
                                <h5><b>Charge Weight : </b><?php echo $row["chargewt"]; ?>.00 Rs</h5>
                              </div>
                              <div class="col-lg-6 col-xs-6">
                                <h5><b>Email : </b><?php echo $row["remail"]; ?></h5>
                                <h5><b>Departure: </b><?php echo $row["raddress"]; ?></h5>
                                <h5><b>Actual Weight: </b><?php echo $row["actualwt"]; ?>.00 Kg</h5>
                              </div>
                            </div>
                           
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-10 col-xs-8">
                             <h5><b>Description : </b><?php echo $row["descri"]; ?></h5>
                          </div>
                          <div class="col-lg-1 col-xs-2">
                            <a href="courierEdit.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to edit this record?')">
                              <button class="universalButtonDelete"> <i class="fa fa-pencil"></i></button></a>
                          </div>
                          <div class="col-lg-1 col-xs-2">
                            <a href="index.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
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
                        <div class="col-lg-8 col-xs-8"  >
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
                        <div class="col-lg-4 col-xs-4" >
                          <div class="pagination" style="float: right;">
                            <h4 class="hidden-xs">Total Pages : <?php echo $page." / ".$total_pages; ?></h4>
                            <h4 class="hidden-lg">Pages : <?php echo $page." / ".$total_pages; ?></h4>
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
  </div>
</div>
</body>
</html>