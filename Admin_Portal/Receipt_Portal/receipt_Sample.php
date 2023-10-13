<?php
require_once('db.php');
$upload_dir = 'uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$packAmt=$rowMember['packgeAmount'];$amtPaid=$rowMember['amountPaid'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Member Portal</title>
	<body style="border:2px solid black;">
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper">
			<?php include_once 'rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index-comTop"></div>
						   <?php include_once 'toLeftMembers.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top">Members Portal</a> / <span class="activePage">Member Receipt</span></h5>
							</div>
							<div class="row">
								<div class="col-lg-11"> </div>
								<div class="col-lg-1">
									<button type="submit" class="actionButtonIcons-center" onclick="printDivSection('print_setion')"><i class="fa fa-print"></i></button>
								</div>
							</div>
							<div id="print_setion" style="padding: 15px;margin-top: 5px;margin-bottom: 20px;">
								<div class="row">
									<div class="col-lg-12">
										<table class="tablePrint" border="0" width="100%">
											<tbody>
												<tr>
													<td>
														<h4 style="text-align: center;padding-top: 15px;">Member Receipt</h4>
													</td>
												</tr>
											</tbody>
										</table>
										<table class="tablePrint" border="0" width="100%">
											<tbody>
												<tr>
													<td>
														<img src="../image/logoBlack.png" alt="" height="50px" width="50px">
													</td>
													<td>
														<h2>Fit Freak</h2>
													</td>
													<td>
														<p style="text-align: right;"><b>Registered Office: </b> <br>FitFreak,Kahsipur New Colony,Near Kadam Chauraha,Ballia<br>Uttar Pradesh - 277001</p>
													</td>
												</tr>
											</tbody>
										</table>
										
										
										<style type="text/css">
										.tablePrint th
										{
										text-align: left;
										padding: 5px;
										}
										.tablePrint td
										{
										padding: 5px;
										}
										@media print {
										table {
										border:hidden;
										}
										</style>
										<h4 style="text-align: center;text-decoration: underline;margin-bottom: -20px;margin-top: -10px;">Receipt Summary</h4>
										<table class="tablePrint"  style="padding-bottom: 20px; padding-top: 20px;" border="0" width="100%">
											<tbody>
												<tr><?php
														require_once "db.php";
														$query_profile = mysqli_query($connect,
														"SELECT a.present_address,a.state,a.present_pincode,a.medicalHistory,a.remarks
														From add_member as a
														join fees_member as u
														on a.membership_id = u.membership_id");
														
														$row_profile = mysqli_fetch_assoc($query_profile)
													?>
													<td><p><b>Member Address </b><br>C/o,<?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?>,<?php echo $row_profile['present_address'] ?><br><?php echo $row_profile['state'] ?>,<?php echo $row_profile['present_pincode'] ?></p>
												</td>
												<td>
													<p style="float: right;"><?php $todaysDate= date("d-m-Y") ?>
													Date: <?php echo $todaysDate; ?></p>
												</td>
											</tr>
										</tbody>
									</table>
									<table class="tablePrint" border="1" width="100%">
										<thead>
											<tr>
												<th>Name</th>
												<th>Phone</th>
												<th>Receipt Id</th>
												<th style="text-align: right;">Aadhar Number</th>
											</tr>
										</thead>
										<tbody>
											<tr><?php $receiptNumber =$rowMember['firstName'].' '.$rowMember['lastName']. '/'.$rowMember['membership_id'];
												?>
												<td><?php echo $rowMember['phone'] ?></td>
												<td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
												<td><?php echo $receiptNumber; ?></td>
												<td style="text-align: right;"><?php echo $rowMember['aadharNo'];?></td>
											</tr>
										</tbody>
									</table>
									<br>
									<table class="tablePrint" border="1" width="100%">
										<thead>
											<tr>
												<th>Membership Id</th>
												<th>Email</th>
												<th>Alternate No.</th>
												<th>Date of Birth</th>
												<th>Gender</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $rowMember['membership_id'] ?></td>
												<td><?php echo $rowMember['email'] ?></td>
												<td><?php echo $rowMember['alternate_phone'] ?></td>
												<td><?php echo $rowMember['dob'] ?></td>
												<td><?php echo $rowMember['gender'] ?></td>
											</tr>
										</tbody>
									</table><br>

									<table class="tablePrint" border="1" width="100%">
										<thead>
											<th>Membership Type</th>
											<th>Shift Timing</th>
											<th>Medical history</th>
											<th>Mode</th>
											<th>Joining Date</th>
											<th>Expiry Date</th>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $rowMember['membershipType'] ?></td>
												<td><?php echo $rowMember['shiftTiming'] ?></td>
												<td><?php echo $row_profile['medicalHistory'] ?></td>
												<td><?php echo $rowMember['paymentMode'] ?></td>
												<td><?php echo $rowMember['joiningDate'] ?></td>
												<td><?php echo $rowMember['expiryDate'] ?></td>
											</tr>
										</tbody>
									</table><br>
									<table class="tablePrint" border="1" width="100%">
										<thead>
										
											<th>Package Amount</th>
											<th>Discount</th>
											<th>Amount Paid</th>
											<th>Date Of Payment</th>
											<th>Mode Of Payment</th>
										</thead>
										<tbody>
											<tr>
												<td>Rs. <?php echo $rowMember['packgeAmount'] ?> /-</td>
												<td>Rs. <?php echo $rowMember['discountAmount'] ?> /-</td>
												<td>Rs. <?php echo $rowMember['amountPaid'] ?> /-</td>
												<td><?php echo $rowMember['paymentMode'] ?></td>
												<td><?php echo $rowMember['receiptDate'] ?></td>
											</tr>
										</tbody>
									</table><br>
									<table class="tablePrint" style="padding-top: 40px;" border="0" width="100%">
										<h5></h5>
										<thead>
											<th>Remarks</th>
											<th style="text-align: center;">Created By</th>
											<th style="text-align: right;">Receiver Sign</th>
										</thead>
										<tbody>
											<tr>
												<td><?php echo $rowMember['remarks'] ?></td>
												<td style="text-align: center;">Vimal Singh</td>
												<td style="text-align: right;"><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
											</tr>
										</tbody>
									</table>
									<table class="tablePrint" border="0" width="100%">
										<tbody>
											<tr>
												<td>
													<p style="text-align: center; padding-top: 100px;padding-bottom: 0px;">No Refund, No Transfer, No Extend</p>
												</td>
											</tr>
										</tbody>
									</table>
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