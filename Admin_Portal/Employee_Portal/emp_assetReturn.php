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
$asset_return = $_POST['asset_return'];
if(!isset($errorMsg)){
$sql = "update raise_asset
set
asset_return = '".$asset_return."'
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
                </div>
              </div>
            </div>
            <div class="col-lg-10">
              <div class="rightPannel">
                <div class="paggignation">
                  <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Asset Return</span></h5>
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
  <hr/>
  <h4>Return Asset</h4>
             <div class="formPannel">
                          <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset Type<span>*</span></label>
                                  <input type="text" id="dob" name="asset_type"  class="form-control" value="<?php echo $rowEdit['asset_type']?>" disabled>
                                </div>
                              </div>
                               <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Host Name<span>*</span></label>
                                  <input type="text" id="dob" name="asset_hostName"  class="form-control" value="<?php echo $rowEdit['asset_hostName']?>" disabled>
                                </div>
                              </div>
                              <div class="col-lg-4 col-xs-12">
                                <div class="form-group">
                                  <label for="">Asset State <span>*</span></label>
                                 <select name="asset_return" id="asset_return" class="form-control" >
                                    <option value="Null">Select Any</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Submitted">Submitted</option>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>