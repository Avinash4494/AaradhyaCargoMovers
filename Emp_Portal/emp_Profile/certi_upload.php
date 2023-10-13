<?php
include('upload_certi_process.php')
?>
<?php
include('db.php');
$upload_dir = 'uploads/emp_certi/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from emp_upload_certi where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image1'];
unlink($upload_dir.$image);
$sql = "delete from emp_upload_certi where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="certi_upload.php"; }, 100);
</script>';
}
}
}
?>
<?php
require_once('db.php');
include_once '../session.php' ?>

<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Upload Certificates</title>
	<body>
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
								<h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> /<a href="index.php" data-toggle="tooltip" title="Profile Portal" data-placement="top"> Profile Portal</a> / <span class="activePage">Certificate Details</span></h5>
							</div>
							<div class="bodyComponent">
								<h4>Upload Certificate</h4>
								<div class="formPannel">
									<form class="" name ="register" onsubmit="return myvalidate();" action="upload_certi_process.php" method="post" enctype="multipart/form-data">
										<input type="text" id="document_id" name="document_id"  hidden="">
										<input type="date" id="uploadDate" name="uploadDate"  hidden="">
										<input type="text" id="employees_id" name="employees_id"  value="<?php echo $row['employees_id'] ?>"  hidden="">
										<div class="row">
											
											<div class="col-lg-3 col-xs-12">
												<div class="form-group">
													<label for="">Certificate Number<span>*</span></label>
													 <input type="text" name="certi_num" class="form-control" placeholder="Certificate Number">
												</div>
											</div>
											<div class="col-lg-3 col-xs-12">
												<div class="form-group">
													<label for="">Completition Date<span>*</span></label>
													 <input type="date" name="comp_date" class="form-control" placeholder="Completition Date">
												</div>
											</div>
											<div class="col-lg-3 col-xs-12">
												<div class="form-group">
													<label for="">Course Name<span>*</span></label>
													 <input type="text" name="certi_name" class="form-control" placeholder="Course Name">
												</div>
											</div>
											<div class="col-lg-3 col-xs-12">
												<div class="updateProfilePic">
													<div class="form-group">
														<label for="image">Upload </label>
														<input type="file" class="form-control" name="image1" id="image">
													</div>
												</div>
											</div>
											<div class="col-lg-3 col-xs-12">
												
												
											</div>
											<style type="text/css">
												.actionButton{
													margin-top: 25px;
												}
											</style>
											<div class="col-lg-3 col-xs-12">
												<button type="submit" name="Submit" class="actionButton">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<h5>My Certificates</h5>
									<?php
									  $upload_direct = 'uploads/emp_certi/';
									$query = "SELECT * FROM emp_upload_certi WHERE employees_id='$employees_id'";
									$rs_result = mysqli_query ($connect, $query);
									$upload_dir = 'uploads/emp_certi/';
									if(mysqli_num_rows($rs_result)){
									while ($rowMember = mysqli_fetch_array($rs_result)) {
									$docName = $rowMember['certi_name'];
									$employees_id = $rowMember['employees_id'];
									if ($employees_id==$employees_id) {
									?>
									<div class="col-lg-3">
										
										<div class="showDocumentEmp">
											<div class="well">
												<img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive">
											</div>
											
											<p><?php echo $rowMember["certi_name"]; ?></p>
										</div>
										
										<a href="certi_upload.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
											<button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
										</a>
										
									</div>
									<?php
									}}
									}
									else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
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