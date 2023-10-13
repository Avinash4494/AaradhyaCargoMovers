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
setTimeout(function(){ window.location.href="employee_leave.php"; }, 100);
</script>';
}
}
}
?>

<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Employee Portal</title>
	<body >
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper" onmouseover ="getTotalDate()">
			<?php include_once 'rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index-comTop"></div>
							<?php include_once 'employee_left_pannel.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employees_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Requests</span></h5>
							</div>
							<div class="row">
								<div class="col-lg-11">
									<h4>Request Pannel</h4>
								</div>
								<div class="col-lg-1">
									 
								</div>
							</div>
							<table class="css-serial table table-hover" width="100%">
								<style>
								.css-serial {
								counter-reset: serial-number;  /* Set the serial number counter to 0 */
								}
								.css-serial td:first-child:before {
								counter-increment: serial-number;  /* Increment the serial number counter */
								content: counter(serial-number);  /* Display the counter */
								}
								</style>
								<thead >
									<tr>
										<th>Sr. No.</th>
										<th>Request Id</th>
										<th>Employee Id</th>
										<th>Full Name</th>
										<th>Request Type</th>
										<th>Priority</th>
										<th>Assign Dept</th>
										<th>Applied On</th>
										<th>Reason</th>
										<th>Status</th>
										<th>Remarks</th>
										<th>Updated On</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$per_page_record = 10;
									if (isset($_GET["page"])) {
									$page  = $_GET["page"];
									}
									else {
									$page=1;
									}
									$start_from = ($page-1) * $per_page_record;
									$query = "SELECT * FROM apply_request";
									$rs_result = mysqli_query ($connect, $query);
									?>
									<?php
									if(mysqli_num_rows($rs_result)){
									while ($rowMember = mysqli_fetch_array($rs_result)) {
									
									$employees_id = $rowMember['employees_id'];
									if ($employees_id==$employees_id) {
									?>
									<tr>
										<p hidden=""><?php echo $rowMember['id'] ?></p>
										<td ></td>
										<td><?php echo $rowMember['request_id'] ?></td>
										<td><?php echo $rowMember['employees_id'] ?></td>
										<td><?php echo $rowMember['fullname'] ?></td>
										<td><?php echo $rowMember['requestType'] ?></td>
										<td><?php echo $rowMember['priority'] ?></td>
										<td><?php echo $rowMember['assignDept'] ?> days</td>
										<td><?php echo $rowMember['appliedDate'] ?></td>
										<td><?php echo $rowMember['reason'] ?></td>
										
										
										<td><?php echo $rowMember['status'] ?></td>
										<td width="130px"><?php echo $rowMember['remarks'] ?></td>
										<td><?php echo $rowMember['updatedDate'] ?></td>
										<td >
                          <a href="employees_req_update.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                            <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>                            
                          </a>
                        </td>
									</tr>
									<?php
									}}
									}
									else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
									?>
								</tbody>
							</table>
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