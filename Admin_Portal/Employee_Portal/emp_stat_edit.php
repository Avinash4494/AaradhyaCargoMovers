<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_stat where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowEdit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$request_id = $_POST['request_id'];
$sta_item = $_POST['sta_item'];
$req_status = $_POST['req_status'];
$remarks = $_POST['remarks'];
$updatedDate = date("Y-m-d");
if(!isset($errorMsg)){
$sql = "update raise_stat
set request_id = '".$request_id."',
sta_item = '".$sta_item."',
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
                  <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Update Gate Pass</span></h5>
                </div>
                <div id="print_setion">
                  <div class="bodyComponent">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <h4>Stationery Summary (<?php echo $rowEdit['request_id'] ?>)</h4>
                        <div id="ConvDetails" >
                           
                          <div class="row">
                            <div class="col-lg-3">
                              <h5>Raised By :  <?php echo $rowEdit['raised_by'] ?></h5>
                              <h5>Raised On: <?php echo $rowEdit['raised_on'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5>Items : <?php echo $rowEdit['sta_item'] ?></h5>
                              <h5>Quantity : <?php echo $rowEdit['quantity'] ?> Nos</h5>
                            </div>
                            <div class="col-lg-6">
                              <h5>Status : <?php echo $rowEdit['req_status'] ?></h5>
                              <h5>Remarks : <?php echo $rowEdit['remarks'] ?></h5>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                               <h5>Comments : <?php echo $rowEdit['comments'] ?> Nos</h5>
                             
                            </div>
                          </div>
                        </div>
                        <div class="formPannel">
                          <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                            <input type="date" id="updatedDate" name="updated_on"  hidden="">
                            <div class="row">
                              <div class="col-lg-3 col-xs-12">
                                <div class="form-group">
                                  <label for="">Request Id<span>*</span></label>
                                  <input type="text" id="claim_id" name="request_id" class="form-control" value="<?php echo $rowEdit['request_id']?>" >
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-12">
                                <div class="form-group">
                                  <label for="">Items<span>*</span></label>
                                  <input type="text" id="sta_item" name="sta_item" class="form-control"
                                  value="<?php echo $rowEdit['sta_item']?>"  >
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