<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_asset where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowEdit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$asset_name = $_POST['asset_name'];
$asset_no = $_POST['asset_no'];
$asset_provider = $_POST['asset_provider'];
$asset_status = $_POST['asset_status'];
$asset_hostName = $_POST['asset_hostName'];
$asset_serial = $_POST['asset_serial'];
$asset_desc = $_POST['asset_desc'];
$asset_location = $_POST['asset_location'];
$asset_alloc_date = $_POST['asset_alloc_date'];
$asset_end_date = $_POST['asset_end_date'];
$req_status = $_POST['req_status'];
$updatedDate = date("Y-m-d");
if(!isset($errorMsg)){
$sql = "update raise_asset
set
asset_name = '".$asset_name."',
asset_no = '".$asset_no."',
asset_provider = '".$asset_provider."',
asset_status = '".$asset_status."',
asset_hostName = '".$asset_hostName."',
asset_serial = '".$asset_serial."',
asset_desc = '".$asset_desc."',
asset_location = '".$asset_location."',
asset_alloc_date = '".$asset_alloc_date."',
asset_end_date = '".$asset_end_date."',
req_status = '".$req_status."',
updated_on = '".$updatedDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="all_request.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}

?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Employees Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <div class="left-compTop">
                <a href="all_request.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>
                  <div class="actionBox"></div></a>
                  <a href="emp_assetReturn.php?id=<?php echo $rowEdit['id'] ?>" ><button class="actionButtonIcons" type="submit"><i class="fa fa-desktop"></i> &nbsp Return</button>
                  <div class="actionBox"></div></a>
                </div>
              </div>
            </div>
            <div class="col-lg-10">
              <div class="rightPannel">
                <div class="paggignation">
                  <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Asset Request</span></h5>
                </div>
                <div id="print_setion">
                  <div class="bodyComponent">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-10">
                            <h4>Request Details (<?php echo $rowEdit['request_id'] ?>)</h4>
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest" style="margin-top: 10px;padding: 8px 0px;"><h4 style="color: #1c2833;"><?php echo $rowEdit['req_status'] ?></h4></div>
                          </div>
                        </div>
                        <div id="ConvDetails" >
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Employee ID : <?php echo $rowEdit['employees_id'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Primary Owner : <?php echo $rowEdit['prim_owner'] ?></h5>
                              <h5>Office Location : <?php echo $rowEdit['offc_location'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Raised By :  <?php echo $rowEdit['raised_by'] ?></h5>
                              <h5>Raised On: <?php echo $rowEdit['raised_on'] ?></h5>
                              
                            </div>
                          </div> <hr/>
                          <h4>Asset Summary</h4>
                          <div class="row">
                            <div class="col-lg-4">
                              <h5>Asset Type: <?php echo $rowEdit['asset_type'] ?></h5>
                              <h5>Asset Name : <?php echo $rowEdit['asset_name'] ?></h5>
                              <h5>Asset Provider : <?php echo $rowEdit['asset_provider'] ?></h5>
                              <h5>Asset Serial Number : <?php echo $rowEdit['asset_serial'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Asset Number : <?php echo $rowEdit['asset_no'] ?></h5>
                              <h5>Host Number : <?php echo $rowEdit['asset_hostName'] ?></h5>
                              <h5>Asset Status : <?php echo $rowEdit['asset_status'] ?></h5>
                              <h5>Asset Location : <?php echo $rowEdit['asset_location'] ?></h5>
                            </div>
                            <div class="col-lg-4">
                              <h5>Allocation Date : <?php echo $rowEdit['asset_alloc_date'] ?></h5>
                              <h5>End of Eligibility Date : <?php echo $rowEdit['asset_end_date'] ?></h5>
                              <h5>Asset State : <?php echo $rowEdit['asset_return'] ?></h5>
                              <h5>Asset Description : <?php echo $rowEdit['asset_desc'] ?></h5>
                               
                            </div>
                          </div>
                        </div>
                        <?php 
                         $getAssetState = $rowEdit["req_status"];
                         if ($getAssetState != "Rejected") {
                            # code...
                          
                          ?>
                        <hr/>
                        <h4>Add Asset </h4>
                        <div class="formPannel">
                          <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Employee ID <span>*</span></label>
                                  <input type="text" id="dob" name="employees_id" class="form-control" value="<?php echo $rowEdit['employees_id']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Name<span>*</span></label>
                                  <input type="text" id="dob" name="asset_name" placeholder="Asset Name" class="form-control" value="<?php echo $rowEdit['asset_name']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Number <span>*</span></label>
                                  <input type="text" id="dob" name="asset_no" class="form-control" placeholder="Asset Number" value="<?php echo $rowEdit['asset_no']?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Provider<span>*</span></label>
                                  <input type="text" id="" name="asset_provider" class="form-control" placeholder ="Asset Provider" value="<?php echo $rowEdit['asset_provider']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Serial No. <span>*</span></label>
                                  <input type="text" id="dob" name="asset_serial" placeholder="Asset Serial No." class="form-control" value="<?php echo $rowEdit['asset_serial']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Status <span>*</span></label>
                                  <select name="asset_status" class="form-control" id="">
                                    <option value="Select Any">Select Any</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                  </select>
                                </div>
                              </div>
                              
                            </div>
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Location <span>*</span></label>
                                  <input type="text" id="" name="asset_location" class="form-control" placeholder ="Asset Location" value="<?php echo $rowEdit['asset_location']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Host Name <span>*</span></label>
                                  <input type="text" id="dob" name="asset_hostName" placeholder="Host Name" class="form-control" value="<?php echo $rowEdit['asset_hostName']?>">
                                </div>
                              </div>
                               <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Description <span>*</span></label>
                                  <input type="text" id="" name="asset_desc" class="form-control" placeholder ="Asset Description" value="<?php echo $rowEdit['asset_desc']?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                             
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Allocation Date (dd-mm-yyyy)<span>*</span></label>
                                  <input type="text" id="dob" name="asset_alloc_date" placeholder="Allocation Date" class="form-control" value="<?php echo $rowEdit['asset_alloc_date']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">End Date (dd-mm-yyyy)<span>*</span></label>
                                  <input type="text" id="dob" name="asset_end_date" placeholder="End of Eligibilit Date" class="form-control" value="<?php echo $rowEdit['asset_end_date']?>">
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Request Status <span>*</span></label>
                                 <select name="req_status" id="req_status" class="form-control" >
                                    <option value="Null">Select Any</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Rejected">Rejected</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-5"></div>
                              <div class="col-lg-2">
                                <button type="submit" style="margin-top: 5px;" name="Submit" class="actionButtonProfile-center">Submit</button>
                              </div>
                              <div class="col-lg-5"></div>
                            </div>
                          </form>
                        </div><br>
                        <?php  } ?>
                        <hr/>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>