<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_vend_pass where id=".$id;
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
$sql = "select * from raise_vend_pass where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_vend_pass where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Vendor Pass Summary</span></h5>
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
                              $vendGuest = $rowVend["raised_on"];
                              $vendTime1 = strtotime($vendGuest);
                              $vendTime2 = strtotime(date('Y-m-d'));
                              $vendSecs = $vendTime2 - $vendTime1;// == <seconds between the two times>
                              $vendDays = $vendSecs / 86400;
                              $vendFin = round($vendDays,0);
                              ?>
                            <div class="requestContent">
                                    <?php
                              $vendstatus = $rowVend['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($vendstatus==$active) {
                              ?>
                              <h5>Your Vendor pass request is active since <?php echo $vendFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vendstatus == $pending)
                              {
                              ?>
                              <h5>Your Vendor pass request is pending since <?php echo $vendFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vendstatus == $approved)
                              {
                              ?>
                              <h5>Your Vendor pass request is approved.</h5>
                              <?php
                              }
                              else if($vendstatus==$Rejected)
                              {
                              ?>
                              <h5>Your Vendor pass request is rejected.</h5>
                              <?php
                              }
                              ?><hr/>
                        <div id="ConvDetails" >
                          <h5>Visit Details</h5>
                          <div class="row">
                            <div class="col-lg-3">
                              <h5>Raised By :  <?php echo $rowGuest['raised_by'] ?></h5>
                              <h5>Raised On: <?php echo $rowGuest['raised_on'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5>Place Visit : <?php echo $rowGuest['place_visit'] ?></h5>
                               <h5>No. Of Person : <?php echo $rowGuest['place_visit'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5>Start Date : <?php echo $rowGuest['start_date'] ?></h5>
                              <h5>End Date : <?php echo $rowGuest['end_date'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5>Item Carried : <?php echo $rowGuest['item_carried'] ?></h5>
                            </div>
                          </div><hr/>
                          <h5>Vendor Details</h5>
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Vendor Name: <?php echo $rowGuest['vendor_name'] ?></h5>
                              <h5>Id Type : <?php echo $rowGuest['id_type'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Contact : <?php echo $rowGuest['contact'] ?></h5>
                              <h5>Email : <?php echo $rowGuest['email'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>ID Number : <?php echo $rowGuest['proff_num'] ?></h5>
                              <h5>Remarks : <?php echo $rowGuest['remarks'] ?></h5>
                            </div>
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