<?php
require_once('db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftPannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> MyAsset</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
<div class="bodyComponent">
  <?php
$getEmpSession = $employees_id."<br>";
$query = "SELECT * FROM raise_asset WHERE employees_id='$employees_id'";
$rs_result = mysqli_query ($connect, $query);
if($rs_result->num_rows >0){
$row = mysqli_fetch_array($rs_result);
$getEmpRaise = $row["employees_id"]."<br>";
$req_status = $row["req_status"];
  if ($getEmpSession==$getEmpRaise) 
  {
      if ($req_status=="Approved") 
      {
 
        $getStatus = $row["asset_status"];
          if($getStatus=="Active")
          {
            include_once 'assetDetails.php'; 
          }
          else
          {
echo '<div class="nullAddress">
  <p>Your asset access has been rejected. Kindly return the below asset to your nearest ACM location. <br> You can raise return request by following the below path.</p>
  <p>My Request / <a href="../emp_AppStore/raise_asset.php">IT Services</a></p>
</div>';
            $asset_retur = $row["asset_return"];
            if($asset_retur == "Return")
            { 

            }
            else if($asset_retur == "Pending")
            { 
               echo '<div class="nullAddress">
              <p>Your asset return request is pending. <br>Soon it will be processed.</a></p>
          </div> ';
            }
            else if($asset_retur == "Submitted")
            { 
    echo '<div class="nullAddress">
              <p>Your asset has been submitted successfully. Kindly raise new asset request. <br> You can raise request by following below path.</p>
              <p>My Request / <a href="../emp_AppStore/raise_asset.php">IT Services</a></p>
          </div> ';
            }
          }
      }
      else if($req_status=="Pending")
      {
       echo '<div class="nullAddress">
              <p>Your asset request is in progress. Soon your request will be approved.</p>
          </div> '; 
      }
       else if($req_status=="Rejected")
      {
       echo '<div class="nullAddress">
              <p>Your asset request is rejected.<br> Kindly raise helpline ticket for more details on your request.</p>
          </div> '; 
      }
  }
}
  else
  {
      echo '<div class="nullAddress">
      <p>Oops!! Asset data is not found. You can raise request by following the below path.</p>
      <p>My Request / <a href="../emp_AppStore/raise_asset.php">IT Services</a></p>
      </div>';
  }
?>
 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>