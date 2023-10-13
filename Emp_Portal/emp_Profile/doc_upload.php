<?php
include('upload_doc_process.php')
?>
<?php
include('db.php');
$upload_dir = 'uploads/emp_doc/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from emp_upload_doc where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image1'];
unlink($upload_dir.$image);
$sql = "delete from emp_upload_doc where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="doc_delete.php"; }, 100);
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
	<title>Dashboard-Documents</title>
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
								<h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> /<a href="index.php" data-toggle="tooltip" title="Profile Portal" data-placement="top"> Profile Portal</a> / <span class="activePage">Upload Documents</span></h5>
							</div>
							<div class="bodyComponent">
								<h4>Upload Documents</h4>
								<div class="formPannel">
									<form class="" name ="register" onsubmit="return myvalidate();" action="upload_doc_Process.php" method="post" enctype="multipart/form-data">
										<input type="text" id="document_id" name="document_id"  hidden="">
										<input type="date" id="uploadDate" name="uploadDate"  hidden="">
										<input type="text" id="employees_id" name="employees_id"  value="<?php echo $row['employees_id'] ?>"  hidden="">
										<div class="row">
											
											<div class="col-lg-3 col-xs-12">
												<div class="form-group">
													<label for="">Document Type<span>*</span></label>
													<select name="fullname" id="fullname" class="form-control">
														<option value="Null">Select Any</option>
														<option value="High School Marksheet">High School</option>
														<option value="Aadhar Card">Aadhar Card</option>
														<option value="PAN Card">PAN Card</option>
														<option value="Driving Licence">Driving Licence</option>
													</select>
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
									<h5>My Documents</h5>
									<?php
									$query = "SELECT * FROM emp_upload_doc WHERE employees_id='$employees_id'";
									$rs_result = mysqli_query ($connect, $query);
									if(mysqli_num_rows($rs_result)){
									while ($rowMember = mysqli_fetch_array($rs_result)) {
									$docName = $rowMember['fullname'];
									$employees_id = $rowMember['employees_id'];
									if ($employees_id==$employees_id) {
									?>
									<div class="col-lg-3">
										
										<div class="showDocumentEmp">
											<div class="well">
												<img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive">
											</div>
											
											<p><?php echo $rowMember["fullname"]; ?></p>
										</div>
										
										<a href="doc_upload.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
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