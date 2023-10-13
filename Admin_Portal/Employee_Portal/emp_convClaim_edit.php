<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_convclaim where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowEdit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$claim_id = $_POST['claim_id'];
$total_claimed = $_POST['total_claimed'];
$req_status = $_POST['req_status'];
$remarks = $_POST['remarks'];
$updatedDate = date("Y-m-d");
if(!isset($errorMsg)){
$sql = "update raise_convclaim
set claim_id = '".$claim_id."',
total_claimed = '".$total_claimed."',
req_status = '".$req_status."',
updated_on = '".$updatedDate."',
remarks = '".$remarks."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="all_request.php"; }, 100);
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Conveyance Claim Request</span></h5>
              </div>
              <div id="print_setion">
                <div class="bodyComponent">
                  <div class="profileDisplayComponent">
                    <div class="well">
                         <div class="row">
                          <div class="col-lg-10">
                             <h4>Conveyance Claim Details (<?php echo $rowEdit['claim_id'] ?>)</h4>
                          </div>
                          <div class="col-lg-2">
                            <div class="actionButtonRequest" style="margin-top: 10px;padding: 8px 0px;"><h4 style="color: #1c2833;"><?php echo $rowEdit['req_status'] ?></h4></div>
                          </div>
                        </div>
                      <div id="ConvDetails" >
                        <div class="row">
                          <div class="col-lg-3">
                            <h5>Expence Type : <?php echo $rowEdit['expenceType'] ?></h5>
                            <h5>Total Distance :  <?php echo $rowEdit['distance'] ?> Km</h5>
                          </div>
                          <div class="col-lg-3">
                            <h5>Permit Limit : <i class="fa fa-inr"></i> <?php echo $rowEdit['perm_limit'] ?>.00</h5>
                            <h5>Total Amount : <i class="fa fa-inr"></i>  <?php echo $rowEdit['total_claimed'] ?>.00</h5>
                          </div>
                          <div class="col-lg-3">
                            <h5>From Location : <?php echo $rowEdit['from_location'] ?></h5>
                            <h5>To Location : <?php echo $rowEdit['to_location'] ?></h5>
                          </div>
                          <div class="col-lg-3">
                            <div class="fullImage">
                              <h5>Supporing Document &nbsp <i class="fa fa-download"></i></h5>
                              <a href="<?php echo $upload_dir.$rowEdit['travel_image'] ?>" target="blank">
                                <?php echo $rowEdit['travel_image'] ?>
                              </a>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <h5>Claim Reason: <?php echo $rowEdit['reason'] ?></h5>
                          </div>
                          <div class="col-lg-6">
                            <h5>Remarks : <?php echo $rowEdit['remarks'] ?></h5>
                          </div>
                        </div>
                      </div><hr/>
                      <div class="formPannel">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                          <input type="date" id="updatedDate" name="updated_on"  hidden="">
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Claim Id<span>*</span></label>
                                <input type="text" id="claim_id" name="claim_id" class="form-control" value="<?php echo $rowEdit['claim_id']?>" >
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Claim Amount<span>*</span></label>
                                <input type="text" id="total_claimed" name="total_claimed" class="form-control"
                                value="<?php echo $rowEdit['total_claimed']?>"  >
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Status<span>*</span></label>
                                <select name="req_status" id="req_status" class="form-control">
                                  <option value="Null">Select Any</option>
                                  <option value="Approved">Approved</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Rejected">Rejected</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Remarks<span>*</span></label>
                                <input type="text" id="remarks" name="remarks" class="form-control"
                                value="<?php echo $rowEdit['remarks']?>"  >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-10"></div>
                            <div class="col-lg-2">
                              <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                            </div>
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