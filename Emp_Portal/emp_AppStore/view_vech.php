<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_vehicle_pass where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowGuest = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from raise_vehicle_pass where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_vehicle_pass where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="request_status.php"; }, 1000);
</script>';
}
}
}
?>
<?php
require_once('../db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>myRequest</title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftRequest.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Vehicle Pass Summary</span></h5>
              </div>
              <div class="bodyComponentReq">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="requestStat">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-1">
                            <div class="iconCal">
                              <i class="fa fa-calendar"></i>
                            </div>
                          </div>
                          <div class="col-lg-8">
                              <?php
                              $vehTime = $rowGuest["raised_on"];
                              $vehTime1 = strtotime($vehTime);
                              $vehTime2 = strtotime(date('Y-m-d'));
                              $vehSecs = $vehTime2 - $vehTime1;// == <seconds between the two times>
                              $vehDays = $vehSecs / 86400;
                              $vehFin = round($vehDays,0);
                              ?>
                            <div class="requestContent">
                                        <?php
                              $vechstatus = $rowGuest['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($vechstatus==$active) {
                              ?>
                              <h5>Your Vehicle pass request is active since <?php echo $vehFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vechstatus == $pending)
                              {
                              ?>
                              <h5>Your Vehicle pass request is pending since <?php echo $vehFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vechstatus == $approved)
                              {
                              ?>
                              <h5>Your Vehicle pass request is approved.</h5>
                              <?php
                              }
                              else if($vechstatus==$Rejected)
                              {
                              ?>
                              <h5>Your Vehicle pass request is rejected.</h5>
                              <?php
                              }
                              ?><hr/>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Request No. - <?php echo $rowGuest['request_id'] ?></p>
                                  <p>Raised On. - <?php echo $rowGuest['raised_on'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Vehicle Number - <?php echo $rowGuest['veh_num'] ?></p>
                                  <p>Vehicle Name - <?php echo $rowGuest['veh_name'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Raise by - <?php echo $rowGuest['raised_by'] ?></p>
                                  <p>Registration No. - <?php echo $rowGuest['veh_regis'] ?></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Raised Location - <?php echo $rowGuest['location'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                 
                                </div>
                                <div class="col-lg-4">
                                  <p>DL No. - <?php echo $rowGuest['dl_num'] ?></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-5">
                                   <p>location for Vehicle Pass - <?php echo $rowGuest['veh_location'] ?></p>
                                </div>
                                <div class="col-lg-7">
                                   <p>Comments - <?php echo $rowGuest['comments'] ?></p>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest"><h4><?php echo $rowGuest['req_status'] ?></h4></div>
                          </div>
                          <div class="col-lg-1">
                          <!--   <div class="iconDel">
                              <a href="">
                                <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-print"></i></button>
                              </a>
                            </div> -->
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="print_Section">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>