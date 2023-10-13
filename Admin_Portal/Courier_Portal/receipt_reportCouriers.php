<?php
require_once('../db.php');
$upload_dir = 'uploads/';
$sql = "select * from add_member";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$packAmt=$rowMember['packgeAmount'];$amtPaid=$rowMember['amountPaid'];
}else {
$errorMsg = 'Could not Find Any Record';
}

?>
<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Couriers Portal</title>
	<body style="border:2px solid black;">
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper">
			<?php include_once '../rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index-comTop"></div>
						   <?php include_once 'toLeftCouriers.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top" >Couriers Portal</a> / <span class="activePage"> Couriers Receipts</span> </h5>
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
														<h4 style="text-align: center;padding-top: 15px;">Members Receipt</h4>
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
										<table class="tablePrint" border="1" width="100%" style="margin: 15px 0px;">
											<thead>
												<tr>
													<th>Name</th>
													<th>Mobile No</th>
													<th>Member Id</th>
													<th>Joining Date</th>
													<th>Expiry Date</th>
													<th>Membership Type</th>
													<th>Package Amount</th>
													
												</tr>
											</thead>
										<?php
										require_once "db.php";
										$per_page_record = 5;
										if (isset($_GET["page"])) {
										$page  = $_GET["page"];
										}
										else {
										$page=1;
										}
										$start_from = ($page-1) * $per_page_record;
										$query = "SELECT * FROM add_member  LIMIT $start_from, $per_page_record ";
										$rs_result = mysqli_query ($connect, $query);
										?>
										<?php
										if(mysqli_num_rows($rs_result)){
										while ($rowMember = mysqli_fetch_array($rs_result)) {
										// Display each field of the records.
										$packAmt=$rowMember['packgeAmount'];
										$amtPaid=$rowMember['amountPaid'];
										?>
										
											 
												<tr>
													<td width="150px;"><?php echo $rowMember['firstName'] ?> 
													<?php echo $rowMember['lastName'] ?></td>
													<td width="100px;"><?php echo $rowMember['phone'] ?></td>
													<td width="100px;"><?php echo $rowMember['membership_id'];?></td>
													<td width="100px;"><?php echo $rowMember['joiningDate'];?></td>
													<td width="100px;"><?php echo $rowMember['expiryDate'];?></td>
													<td width="150px;"><?php echo $rowMember['membershipType'];?></td>
													<td width="150px;">Rs. <?php echo $rowMember['packgeAmount'];?>.00/-</td>
												</tr>
											 
										
										 <?php
												}
												}
												else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
												?>
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