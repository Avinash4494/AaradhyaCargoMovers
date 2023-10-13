 
<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_asset where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$raise_asset = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$asset_return = $_POST['asset_return'];
$returnRaised_on = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update raise_asset
set
asset_return = '".$asset_return."',
returnRaised_on = '".$returnRaised_on."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="../emp_Profile/asset_index.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Asset Summary</span></h5>
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
                              $assetTime = $raise_asset["raised_on"];
                              $assetTime1 = strtotime($assetTime);
                              $assetTime2 = strtotime(date('Y-m-d'));
                              $assetSecs = $assetTime2 - $assetTime1;// == <seconds between the two times>
                              $assetDays = $assetSecs / 86400;
                              $assetFin = round($assetDays,0);
                              ?>
                                        <?php
                              $status = $raise_asset['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
                              $Rejected = "Rejected";
                              if ($status==$active) {
                              ?>
                              <h5>Your Asset request is active since <?php echo $assetFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $pending)
                              {
                              ?>
                              <h5>Your Asset request is pending since <?php echo $assetFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $approved)
                              {
                              ?>
                              <h5>Your Asset request is approved.</h5>
                              <?php
                              }
                              else if($status==$Rejected)
                              {
                              ?>
                              <h5>Your Asset request is rejected.</h5>
                              <?php
                              }
                              ?>
                        <div id="ConvDetails" >
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Employee ID : <?php echo $raise_asset['employees_id'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Primary Owner : <?php echo $raise_asset['prim_owner'] ?></h5>
                              <h5>Office Location : <?php echo $raise_asset['offc_location'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Raised By :  <?php echo $raise_asset['raised_by'] ?></h5>
                              <h5>Raised On: <?php echo $raise_asset['raised_on'] ?></h5>
                              
                            </div>
                          </div> <hr/>
                          <h4>Asset Summary</h4>
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Asset Type: <?php echo $raise_asset['asset_type'] ?></h5>
                              <h5>Asset Name : <?php echo $raise_asset['asset_name'] ?></h5>
                              <h5>Asset Provider : <?php echo $raise_asset['asset_provider'] ?></h5>
                              <h5>Asset Serial Number : <?php echo $raise_asset['asset_serial'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Asset Number : <?php echo $raise_asset['asset_no'] ?></h5>
                              <h5>Host Number : <?php echo $raise_asset['asset_hostName'] ?></h5>
                              <h5>Asset Status : <?php echo $raise_asset['asset_status'] ?></h5>
                              <h5>Asset Location : <?php echo $raise_asset['asset_location'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Allocation Date : <?php echo $raise_asset['asset_alloc_date'] ?></h5>
                              <h5>End of Eligibility Date : <?php echo $raise_asset['asset_end_date'] ?></h5>
                              <h5>Asset Description : <?php echo $raise_asset['asset_desc'] ?></h5>
                            </div>
                          </div>
                        </div>
                          </div>
                          <div class="col-lg-2">
                             <div class="actionButtonRequest"><h4><?php echo $raise_asset['req_status'] ?></h4></div>
                          </div>
                          <div class="col-lg-1">
                          </div>
                        </div>
                      </div>
                    </div><br><br>
                  <?php 
                        $getActiveState = $raise_asset["asset_status"];
                        $setActiveState = "Inactive";
                        if ($getActiveState==$setActiveState) {
                          ?>
                           <h3 style="text-align: left;">Return Asset</h3>
          <div class="container-fluid">

                          <div class="formPannel">
                          <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Employee ID <span>*</span></label>
                                  <input type="text" id="dob" name="employees_id" class="form-control" value="<?php echo $raise_asset['employees_id']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Name<span>*</span></label>
                                  <input type="text" id="dob" name="asset_name" placeholder="Asset Name" class="form-control" value="<?php echo $raise_asset['asset_name']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Number <span>*</span></label>
                                  <input type="text" id="dob" name="asset_no" class="form-control" placeholder="Asset Number" value="<?php echo $raise_asset['asset_no']?>" disabled>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Provider<span>*</span></label>
                                  <input type="text" id="" name="asset_provider" class="form-control" placeholder ="Asset Provider" value="<?php echo $raise_asset['asset_provider']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Serial No. <span>*</span></label>
                                  <input type="text" id="dob" name="asset_serial" placeholder="Asset Serial No." class="form-control" value="<?php echo $raise_asset['asset_serial']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Status <span>*</span></label>
                                  <input type="text" id="" name="asset_status" class="form-control" value="<?php echo $raise_asset['asset_status']?>" disabled>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Location <span>*</span></label>
                                  <input type="text" id="" name="asset_location" class="form-control" placeholder ="Asset Location" value="<?php echo $raise_asset['asset_location']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Host Name <span>*</span></label>
                                  <input type="text" id="dob" name="asset_hostName" placeholder="Host Name" class="form-control" value="<?php echo $raise_asset['asset_hostName']?>" disabled>
                                </div>
                              </div>
                               <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Description <span>*</span></label>
                                  <input type="text" id="" name="asset_desc" class="form-control" placeholder ="Asset Description" value="<?php echo $raise_asset['asset_desc']?>" disabled>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                             
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Allocation Date (dd-mm-yyyy)<span>*</span></label>
                                  <input type="text" id="dob" name="asset_alloc_date" placeholder="Allocation Date" class="form-control" value="<?php echo $raise_asset['asset_alloc_date']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">End Date (dd-mm-yyyy)<span>*</span></label>
                                  <input type="text" id="dob" name="asset_end_date" placeholder="End of Eligibilit Date" class="form-control" value="<?php echo $raise_asset['asset_end_date']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Request Status <span>*</span></label>
                                 <select name="asset_return" id="asset_return" class="form-control" >
                                    <option value="Null">Select Any</option>
                                    <option value="Return">Return Asset</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-5"></div>
                              <div class="col-lg-2">
                                <button type="submit" style="margin-top: 5px;" name="Submit" class="actionButton">Submit</button>
                              </div>
                              <div class="col-lg-5"></div>
                            </div>
                          </form>
                        </div>
          </div>
                          <?php
                        }
                         ?>
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