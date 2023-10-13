<?php
include('leave_process.php')
?>
<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from apply_leave where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from apply_leave where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="leave_apply.php"; }, 100);
</script>';
}
}
}
?>
<?php

include_once '../session.php' ?>
<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Dashboard-<?php echo $row["Fullname"]; ?></title>
	<body >
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper" onmouseover ="getTotalDate()">
			<?php include_once '../rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index"></div>
							<?php include_once 'topLeftTime.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Apply Leave</span></h5>
							</div>
							<div class="bodyComponent">
                   <h4>Apply Leave</h4>
                  <div class="row">
                    <div class="col-lg-9">
                      <div class="profileDisplayComponent">
                        <div class="well">
                          <div class="formSection">
                            <form class="" name ="register" onsubmit="return myvalidate();" action="leave_process.php" method="post" enctype="multipart/form-data">
                              <input type="text" id="leave_id" name="leave_id"  hidden="">
                              <input type="text" id="status" name="status"  value="Pending" hidden="">
                              <input type="date" id="appliedDate" name="appliedDate"  hidden="">
                              <input type="date" id="updatedDate" name="updatedDate"  hidden="" >
                              <input type="text" id="remarks" name="remarks"  value="" hidden="">
                              <div class="row">
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Employee Id. <span>*</span></label>
                                    <input type="text" id="dob" name="employees_id" class="form-control" value="<?php echo $row['employees_id']?>">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Raised By <span>*</span></label>
                                    <input type="text" id="raised_by" name="raised_by" placeholder="Name as per records" class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Leave Type <span>*</span></label>
                                    <select name="leaveType" id="" class="form-control">
                                      <option value="Select Any">Select Any</option>
                                      <option value="Annual leave">Annual leave</option>
                                      <option value="Sick Leave">Sick Leave</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Leave From <span>*</span></label>
                                    <input type="date" id="leaveFrom" name="leaveFrom" class="form-control">
                                  </div>
                                </div>
                                
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Leave To <span>*</span></label>
                                    <input type="date" id="leaveTo" name="leaveTo" class="form-control">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <div class="form-group">
                                    <label for="">No. Of Days <span id="dis"></span></label>
                                    <input type="text" id="" name="noOfdays" class="form-control" >
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label for="">Remarks/Reason <span>*</span></label>
                                    <input type="text" id="message" name="message" class="form-control" >
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
                    <div class="col-lg-3">
                      <div class="claimSidePan" style="margin-top: -35px;">
                        <div class="aboutPannel">
                          <div class="well">
                            <h4>About this App</h4>
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation.</p>
                          </div>
                        </div>
                        <div class="otherPannel">
                          <a href="../emp_AppStore/raise_feedback.php">
                            <div class="well">
                              <h4>Share Feedback</h4>
                            </div>
                          </a>
                        </div>
                        <div class="otherPannel">
                          <a href="../emp_AppStore/helpDesk.php">
                            <div class="well">
                              <h4>Help Desk</h4>
                            </div>
                          </a>
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
	function getTotalDate()
	{
		var date1=new Date( document.getElementById("leaveFrom").value);
		var date2=new Date(document.getElementById("leaveTo").value);
		var rest = date2.getTime()-date1.getTime();
		var restOut = rest/(1000*60*60*24);
		
		document.getElementById("dis").innerHTML= restOut;
	}

function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>