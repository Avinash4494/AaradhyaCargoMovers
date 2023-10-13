<?php
require_once('../db.php');
$upload_dir = '../../Admin_Portal/uploads/emp-claims-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_foodclaim where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowClaim = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from raise_foodclaim where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_foodclaim where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="claims_index.php"; }, 1000);
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
                <?php include_once 'topLeftClaims.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
               <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="claims_index.php" data-toggle="tooltip" title="My Claims!" data-placement="top">My Claims</a> / <span class="activePage">Food Claim Details</span></h5>
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
                              $foodTime = $rowFood["raised_on"];
                              $foodTime1 = strtotime($foodTime);
                              $foodTime2 = strtotime(date('Y-m-d'));
                              $foodSecs = $foodTime2 - $foodTime1;// == <seconds between the two times>
                              $foodDays = $foodSecs / 86400;
                              $foodFin = round($foodDays,0);
                              ?>
                            
                                  <?php
                              $deskstatus = $rowFood['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5>Your Food Claim  request is active since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5>Your Food Claim  request is pending since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5>Your Food Claim  request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5>Your Food Claim  request is rejected.</h5>
                              <?php
                              }
                              ?>
                            <div class="row">
                              <div class="col-lg-4">
                                <p>Claim Id. - <?php echo $rowClaim['claim_id'] ?></p>
                                <p>Raised By - <?php echo $rowClaim['raised_by'] ?></p>
                                <p>Expence Type - <?php echo $rowClaim['expenceType'] ?></p>
                              </div>
                              <div class="col-lg-4">
                                <p>Claimed Amount - &nbsp <i class="fa fa-inr"></i> <?php echo $rowClaim['claim_amount'] ?>.00</p>
                                <p>Total Amount - &nbsp <i class="fa fa-inr"></i> <?php echo $rowClaim['total_claimed'] ?>.00</p>
                                 
                                
                              </div>
                              <div class="col-lg-4">
                                <p>Raised On. - <?php echo $rowClaim['raised_on'] ?></p>
                                <p>Bill Date - <?php echo $rowClaim['bill_date'] ?></p>
                                
                              </div>
                            </div><hr/>
                            <h5>Supporting Document</h5>
                            <div class="row">
                               
                              <div class="col-lg-6">
                                <img src="<?php echo $upload_dir.$rowClaim['food_image'] ?>" class="img-responsive">
                              </div>
                              <div class="col-lg-6"></div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonClaim"><h4><?php echo $rowClaim['req_status'] ?></h4></div>
                          </div>
                          <div class="col-lg-1">
                            <div class="iconDel">
                               
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
    </div>
  </body>
</html>