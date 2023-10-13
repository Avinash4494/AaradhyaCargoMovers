<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_stat where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowStat = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from raise_stat where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowStat = mysqli_fetch_assoc($result);
$sql = "delete from raise_stat where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Stationery Summary</span></h5>
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
                              $statTime = $rowStat["raised_on"];
                              $statTime1 = strtotime($statTime);
                              $statTime2 = strtotime(date('Y-m-d'));
                              $statSecs = $statTime2 - $statTime1;// == <seconds between the two times>
                              $statDays = $statSecs / 86400;
                              $statFin = round($statDays,0);
                              ?>
                              <?php
                              $Statstatus = $rowStat['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
                              $Rejected = "Rejected";
                              if ($Statstatus==$active) {
                              ?>
                              <h5>Your Stationery request is active since <?php echo $statFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Statstatus == $pending)
                              {
                              ?>
                              <h5>Your Stationery request is pending since <?php echo $statFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Statstatus == $approved)
                              {
                              ?>
                              <h5>Your Stationery request is approved.</h5>
                              <?php
                              }
                              else if($Statstatus==$Rejected)
                              {
                              ?>
                              <h5>Your Stationery request is rejected.</h5>
                              <?php
                              }
                              ?>
                            <div class="row">
                              <div class="col-lg-4">
                                <p>Raised By - <?php echo $rowStat['raised_by'] ?></p>
                                <p>Request Id. - <?php echo $rowStat['request_id'] ?></p>
                              </div>
                              <div class="col-lg-4">
                                <p>Requested On. - <?php echo $rowStat['raised_on'] ?></p>
                                <p>Stationery Item - <?php echo $rowStat['sta_item'] ?></p>
                              </div>
                              <div class="col-lg-4">
                                <p>Qnty. - <?php echo $rowStat['quantity'] ?> Nos</p>
                                <p>Office Location - <?php echo $rowStat['location'] ?></p>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <p>Comments - <?php echo $rowStat['comments'] ?></p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest"><h4><?php echo $rowStat['req_status'] ?></h4></div>
                          </div>
                          <div class="col-lg-1">
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