<?php
include('upload_doc_process.php')
?>

<?php
require_once('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_vehicle where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$flagCheck = $rowMember['vehicle_id'];
}else {
$errorMsg = 'Could not Find Any Record';
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
	<title>Vehicle - Documents</title>
	<body>
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper">
			<?php include_once '../rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index-comTop"></div>
							<?php include_once 'toLeftVehicle.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top">Vehicles Portal</a> / <span class="activePage">Upload Documents</span></h5>
							</div>
							<div class="bodyComponent">
								
								<div class="formPannel">
									<form class="" name ="register" onsubmit="return myvalidate();" action="upload_doc_Process.php" method="post" enctype="multipart/form-data">
										<input type="text" id="document_id" name="document_id"  hidden="">
										<input type="date" id="uploadDate" name="uploadDate"  hidden="">
										
										<div class="row">
											<div class="col-lg-3">
												<div class="form-group">
													<label for="">Vehicle Id.</label>
													<input type="text" class="form-control" id="vehicle_id" name="vehicle_id"  value="<?php echo $rowMember['vehicle_id'] ?>">
												</div>
											</div>
											<div class="col-lg-3 col-xs-12">
												<div class="form-group">
													<label for="">Document Type<span>*</span></label>
													<select name="fullname" id="fullname" class="form-control">
														<option value="Null">Select Any</option>
														<option value="Vehcile Registration">Vehicle Registration</option>
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
									<div class="row">
										<div class="col-lg-10">
											<h5>Vehicle Documents</h5>
										</div>
										<div class="col-lg-2">
											 
										</div>
									</div>
									<?php
									require_once "db.php";
									$upload_dire = '../uploads/vehicle-upload/';
									$query_profile = mysqli_query($connect,
									"SELECT a.vehicle_id,a.fullname,a.image1,a.document_id
									From veh_upload_doc as a
									inner join add_vehicle as u
									on a.vehicle_id = u.vehicle_id");
									while ($row_profile = mysqli_fetch_assoc($query_profile)) {
										$flag = $row_profile['vehicle_id'];
										if($flag==$flagCheck){
									?>
									<div class="col-lg-3">
										<div class="showDocument">
											<div class="well">
												<img src="<?php echo $upload_dire.$row_profile['image1'] ?>" class="img-responsive">
											</div>
											<h5 style="text-align: center;"><?php echo $row_profile["fullname"]; ?></h5>
										</div>
										<a href="doc_upload.php?delete=<?php echo $rowDel['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
											<button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
										</a>
										<?php
include('db.php');

if(isset($_GET['delete'])){
$ids = $_GET['delete'];
$sql = "select * from veh_upload_doc where id = ".$ids;   
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowDel = mysqli_fetch_assoc($result);
$image = $row['image1'];
unlink($upload_dir.$image);
$sql = "delete from veh_upload_doc where id=".$ids; 
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="doc_delete.php"; }, 100);
</script>';
}
}
}
?>
										
									</div>
									<?php
									}}
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