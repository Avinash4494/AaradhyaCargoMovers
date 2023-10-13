<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_business_card where id=".$id;
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
$sql = "select * from raise_business_card where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_business_card where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Business Card Summary</span></h5>
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
                              $buisTime = $rowBuis["raised_on"];
                              $buisTime1 = strtotime($buisTime);
                              $buisTime2 = strtotime(date('Y-m-d'));
                              $buisSecs = $buisTime2 - $buisTime1;// == <seconds between the two times>
                              $buisDays = $buisSecs / 86400;
                              $busiFin = round($buisDays,0);
                              ?>
                              <?php
                              $status = $rowBuis['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
                              $Rejected = "Rejected";
                              if ($status==$active) {
                              ?>
                              <h5>Your Business Card request is active since <?php echo $busiFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $pending)
                              {
                              ?>
                              <h5>Your Business Card request is pending since <?php echo $busiFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $approved)
                              {
                              ?>
                              <h5>Your Business Card request is approved.</h5>
                              <?php
                              }
                              else if($status==$Rejected)
                              {
                              ?>
                              <h5>Your Business Card request is rejected.</h5>
                              <?php
                              }
                              ?><hr/>
                              <div class="row">
                                <div class="col-lg-4">
                                  <h5>Raised By :  <?php echo $rowGuest['raised_by'] ?></h5>
                                  <h5>Raised On: <?php echo $rowGuest['raised_on'] ?></h5>
                                </div>
                                <div class="col-lg-4">
                                  <h5>Name On Card : <?php echo $rowGuest['name'] ?></h5>
                                  <h5>Designation : <?php echo $rowGuest['designation'] ?></h5>
                                  <h5>Contact : <?php echo $rowGuest['contact'] ?></h5>
                                </div>
                                <div class="col-lg-4">
                                  <h5>Office Location : <?php echo $rowGuest['offc_location'] ?></h5>
                                  <h5>No. Of Cards : <?php echo $rowGuest['noOfCards'] ?></h5>
                                  <h5>Email : <?php echo $rowGuest['email'] ?></h5>
                                </div>
                              </div>
                            </div>                            
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest"><h4><?php echo $rowGuest['req_status'] ?></h4></div>
                          </div>
                          <div class="col-lg-1">
                             
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