<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_gate_pass where id=".$id;
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
$sql = "select * from raise_gate_pass where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_gate_pass where id=".$id;
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Gate Pass Summary</span></h5>
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
                                $gateTime = $rowGuest["raised_on"];
                                $gateTime1 = strtotime($gateTime);
                                $gateTime2 = strtotime(date('Y-m-d'));
                                $gateSecs = $gateTime2 - $gateTime1;// == <seconds between the two times>
                                $gateDays = $gateSecs / 86400;
                                $gateFin = round($gateDays,0);
                                ?>
                            <div class="requestContent">
                                       <?php
                                $status = $rowGuest['req_status'];
                                $active= "Active";
                                $pending  = "Pending";
                                $approved="Approved";
                                $Rejected = "Rejected";
                                if ($status==$active) {
                                ?>
                                <h5>Your Gate Pass request is active since <?php echo $gateFin; ?> days and waiting for approval.</h5>
                                <?php
                                }
                                else if($status == $pending)
                                {
                                ?>
                                <h5>Your Gate Pass request is pending since <?php echo $gateFin; ?> days and waiting for approval.</h5>
                                <?php
                                }
                                else if($status == $approved)
                                {
                                ?>
                                <h5>Your Gate Pass request is approved.</h5>
                                <?php
                                }
                                else if($status==$Rejected)
                                {
                                ?>
                                <h5>Your Gate Pass request is rejected.</h5>
                                <?php
                                }
                                ?><hr/>
                              <h5>Material Details</h5>
                              <div class="row">
                                <div class="col-lg-4">
                                  <h5>Raised By :  <?php echo $rowGuest['raised_by'] ?></h5>
                                  <h5>Raised On: <?php echo $rowGuest['raised_on'] ?></h5>
                                  <h5>Pass Type: <?php echo $rowGuest['pass_type'] ?></h5>
                                </div>
                                <div class="col-lg-4">
                                  <h5>Move Between : <?php echo $rowGuest['move_btwn'] ?></h5>
                                  <h5>Material Type : <?php echo $rowGuest['mat_type'] ?></h5>
                                  <h5>Quantity : <?php echo $rowGuest['quantity'] ?> Nos</h5>
                                </div>
                                <div class="col-lg-4">
                                  <h5>Carried Out Date : <?php echo $rowGuest['out_date'] ?></h5>
                                  <h5>Carried Out By : <?php echo $rowGuest['out_by'] ?></h5>
                                  <h5>Weight : <?php echo $rowGuest['total_weight'] ?></h5>
                                </div>
                                
                              </div>
                              <div class="row">
                                <div class="col-lg-8">
                                  <h5>Material Description : <?php echo $rowGuest['mat_descp'] ?></h5>
                                </div>
                                <div class="col-lg-4">
                                  <h5>Request Status : <?php echo $rowGuest['req_status'] ?></h5>
                                </div>
                              </div>
                              <hr/>
                            <h5>Sender's Details</h5>
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Guest Name: <?php echo $rowGuest['sender_name'] ?></h5>
                              <h5>Organization : <?php echo $rowGuest['organisation'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Contact : <?php echo $rowGuest['contact'] ?></h5>
                              <h5>Email : <?php echo $rowGuest['email'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Location : <?php echo $rowGuest['sender_location'] ?></h5>
                              <h5>Remarks : <?php echo $rowGuest['remarks'] ?></h5>
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