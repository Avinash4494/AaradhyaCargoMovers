<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_desktop where id=".$id;
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
$sql = "select * from raise_desktop where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_desktop where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Desktop Summary</span></h5>
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
                              $deskTime = $rowStat["raised_on"];
                              $deskTime1 = strtotime($deskTime);
                              $deskTime2 = strtotime(date('Y-m-d'));
                              $deskSecs = $deskTime2 - $deskTime1;// == <seconds between the two times>
                              $deskDays = $deskSecs / 86400;
                              $deskFin = round($deskDays,0);
                              ?>
                         <?php
                              $deskstatus = $rowStat['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5>Your Desktop request is active since <?php echo $deskFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5>Your Desktop request is pending since <?php echo $deskFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5>Your Desktop request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5>Your Desktop request is rejected.</h5>
                              <?php
                              }
                              ?>
                        <div id="ConvDetails" >
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Raised By :  <?php echo $rowStat['raised_by'] ?></h5>
                              <h5>Raised On: <?php echo $rowStat['raised_on'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Primary Owner : <?php echo $rowStat['prim_owner'] ?></h5>
                              <h5>Office Location : <?php echo $rowStat['offc_location'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>State : <?php echo $rowStat['state'] ?></h5>
                              <h5>City : <?php echo $rowStat['city'] ?></h5>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Company code: <?php echo $rowStat['com_code'] ?></h5>
                              <h5>Cubicle : <?php echo $rowStat['cubicle'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Wing : <?php echo $rowStat['wing'] ?></h5>
                              <h5>Floor : <?php echo $rowStat['floor_num'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Remarks : <?php echo $rowStat['remarks'] ?></h5>
                            </div>
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