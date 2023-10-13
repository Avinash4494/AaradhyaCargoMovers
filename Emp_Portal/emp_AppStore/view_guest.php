<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_guest where id=".$id;
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
$sql = "select * from raise_guest where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_guest where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Guest Pass Summary</span></h5>
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
                          <div class="col-lg-9">
                           <?php
                              $getDateGuest = $rowGuest["raised_on"];
                              $guestTime1 = strtotime($getDateGuest);
                              $guestTime2 = strtotime(date('Y-m-d'));
                              $guestSecs = $guestTime2 - $guestTime1;// == <seconds between the two times>
                              $guestDays = $guestSecs / 86400;
                               $guestFin = round($guestDays,0);
                              ?>
                            <div class="requestContent">
                                      <?php
                              $Gueststatus = $rowGuest['req_status'];
                              $active2= "Active";
                              $pending2 = "Pending";
                              $approved2="Apporved";
                              $Rejected2 = "Rejected";
                              if ($Gueststatus==$active2) {
                              ?>
                              <h5>Your Guest Pass request is active since <?php echo $guestFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Gueststatus == $pending2)
                              {
                              ?>
                              <h5>Your Guest Pass request is pending since <?php echo $guestFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Gueststatus == $approved2)
                              {
                              ?>
                              <h5>Your Guest Pass request is approved.</h5>
                              <?php
                              }
                              else if($Gueststatus==$Rejected2)
                              {
                              ?>
                              <h5>Your Guest Pass request is rejected.</h5>
                              <?php
                              }
                              ?><hr/>
                              <h4>Visit Details</h4>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Request No. - <?php echo $rowGuest['request_id'] ?></p>
                                  <p>Raised On. - <?php echo $rowGuest['raised_on'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Start Dt. - <?php echo $rowGuest['start_date'] ?></p>
                                  <p>End Dt. - <?php echo $rowGuest['end_date'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Raise by - <?php echo $rowGuest['raised_by'] ?></p>
                                  <p>Photography - <?php echo $rowGuest['photography'] ?></p>
                                </div>
                              </div><hr/>
                              <h4>Guest Details</h4>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Guest Name - <?php echo $rowGuest['guest_name'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Organization - <?php echo $rowGuest['organisation'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Contact No - <?php echo $rowGuest['contact'] ?></p>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Email - <?php echo $rowGuest['email'] ?></p>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest"><h4><?php echo $rowGuest['req_status'] ?></h4></div>
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