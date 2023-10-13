<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from apply_leave where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowEdit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$leave_id = $_POST['leave_id'];
$leaveType = $_POST['leaveType'];
$status = $_POST['status'];
$remarks = $_POST['remarks'];
$updatedDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update apply_leave
set leave_id = '".$leave_id."',
leaveType = '".$leaveType."',
status = '".$status."',
updatedDate = '".$updatedDate."',
remarks = '".$remarks."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="employee_leave_View.php"; }, 100);
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
  <title>Leave Portal</title>
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
                <a href="leave_index.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button></a>
                <a href="all_Leave_list.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp All Leaves</button></a>
                <!-- <a href="commonCopy.php"><button class="actionButtonIcons" type="submit">Common</button></a> -->
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employee_leave_View.php" data-toggle="tooltip" title="Leave Portal!" data-placement="top">Leave Portal / </a> <span class="activePage">Update Leave</span></h5>
              </div>
              <div id="print_setion">
                <div class="bodyComponent">
                  <div class="profileDisplayComponent">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-10">
                          <h4>Request Summary (<?php echo $rowEdit['leave_id'] ?>)</h4>
                        </div>
                        <div class="col-lg-2">
                          <div class="actionButtonRequest" style="margin-top: 10px;padding: 8px 0px;"><h4 style="color: #1c2833;"><?php echo $rowEdit['status'] ?></h4></div>
                        </div>
                      </div>
                      <div id="ConvDetails" >
                        <div class="row">
                          <div class="col-lg-4">
                            <h5>Raised By :  <?php echo $rowEdit['raised_by'] ?></h5>
                            <h5>Raised On: <?php echo $rowEdit['appliedDate'] ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5>Leave From : <?php echo $rowEdit['leaveFrom'] ?></h5>
                            <h5>Leave To : <?php echo $rowEdit['leaveTo'] ?></h5>
                          </div>
                          <div class="col-lg-4">
                            <h5>No. Of Days : <?php echo $rowEdit['noOfDays'] ?></h5>
                            <h5>Leave Type : <?php echo $rowEdit['leaveType'] ?></h5>
                          </div>                          
                        </div>
                      </div><br>
                      <div class="formPannel">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                          <input type="date" id="updatedDate" name="updatedDate"  hidden="">
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Leave Id<span>*</span></label>
                                <input type="text" id="leave_id" name="leave_id" class="form-control" value="<?php echo $rowEdit['leave_id']?>" >
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Leave Type<span>*</span></label>
                                <input type="text" id="leaveType" name="leaveType" class="form-control"
                                value="<?php echo $rowEdit['leaveType']?>"  >
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Status<span>*</span></label>
                                <select name="status" id="status" class="form-control">
                                  <option value="Null">Select Any</option>
                                  <option value="Approved">Approve</option>
                                   
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