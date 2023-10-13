<?php
require_once('../db.php');
?><?php include_once "../session.php" ?>
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
							<div class="row hidden-lg">
								<div class="col-lg-11"> </div>
								<div class="col-lg-1">
									<button type="submit" class="actionButtonIcons-center" style="margin-top: -20px;margin-bottom: -25px;" onclick="printDivSection('print_setion')">Print All &nbsp <i class="fa fa-print"></i></button>
								</div>
							</div>
							<div class="row hidden-xs">
								<div class="col-lg-10"> </div>
								<div class="col-lg-2">
									<button type="submit" class="actionButtonIcons-center" style="margin-top: -20px;margin-bottom: -25px;" onclick="printDivSection('print_setion')">Print All &nbsp <i class="fa fa-print"></i></button>
								</div>
							</div>
							
							<?php
							require_once "db.php";
							$per_page_record = 100;
							if (isset($_GET["page"])) {
							$page  = $_GET["page"];
							}
							else {
							$page=1;
							}
							$start_from = ($page-1) * $per_page_record;
							$query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
							$rs_result = mysqli_query ($connect, $query);
							?>
							<?php
							if(mysqli_num_rows($rs_result)){
							while ($rowMember = mysqli_fetch_array($rs_result)) {
							
							?>
							<div class="rectLongContent hidden-lg" style="margin-top: -20px;margin-bottom: 30px;">
								<div class="rectWidge" >
									
									<div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
										
										<div class="row">
											<div class="col-xs-12">
												<h5><b>Invoice Number</b> - <?php echo $rowMember['invoice_no'] ?></h5>
												<h5><b>Docket Date</b> - <?php echo $rowMember['invoice_date'] ?></h5>
												<h5><b>Amount</b> - Rs. <?php echo round($rowMember['grand_total']) ?>.00</h5>
												<h5 ><b>Payment Status</b> - <?php echo $rowMember['payment_process'] ?></h5>
												<h5><b>Order Status</b> - <?php echo $rowMember['order_status'] ?></h5>
												<h5><b>Transport Details</b> - <?php echo $rowMember['transport_number'] ?></h5>
												<h5><b>Updated On</b> - <?php echo $rowMember['order_date'] ?></h5>
											</div>
											
										</div>
									</div>
								</div>
								
							</div>
							<?php
							}
							}
							else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
							?>
							<div id="print_setion" class="hidden-xs" style=" margin-bottom: 20px;">
								<div class="row">
									<div class="col-lg-12">
										<table class="tablePrint hidden-xs" border="0" width="100%">
											<tbody>
												<tr>
													<td width="300px">
														<img src="../image/mainLogo.png" alt="" height="50px" width="200px">
														<h4 style="margin-left: 20px;">GSTIN : 29DJIPS6581L2Z5</h4>
													</td>
													<td width="300px">
														<img src="../image/Picture1.png" alt="" class="img-responsive" style="height: 70px;margin-left: 100px;margin-top: -30px;">
													</td>
													<td width="400px">
														<p style="text-align: left; margin: 0px;padding-bottom:15px;"><b>Registred Office:</b><br>
															+91 9113855664 | +91 9743866386 <br>
															aaradhyacargomovers@gmail.com <br>
															#26, 1st Floor, Yeshwantpur 1st Main Road Mathikere,
														<br>Land Mark : Opp. Coffe Santhe Hotel, Banglore, 560054</p>
													</td>
												</tr>
											</tbody>
										</table>
										
										
										<style type="text/css">
										.tablePrint th
										{
										text-align: center;
										padding: 5px;
										font-size: 0.8em;
										}
										.tablePrint td
										{
										padding: 5px;
										text-align: center;
										font-size: 0.8em;
										}
										@media print {
										table {
										border:hidden;
										}
										</style>
										<table class="tablePrint" border="1" width="100%" style="margin: 15px 0px;">
											<thead>
												<tr>
													<th>Dkt. No.</th>
													<th>Date</th>
													<th>Pkg.</th>
													<th>Mode</th>
													<th>From</th>
													<th>To</th>
													<th>Weight</th>
													<th>Rate</th>
													<th>Frieght Amount</th>
													<th>Docket Amount</th>
													<th>Pick-up Amount</th>
													<th>Total Amount</th>
												</tr>
											</thead>
											<?php
											require_once "db.php";
											$per_page_record = 100;
											if (isset($_GET["page"])) {
											$page  = $_GET["page"];
											}
											else {
											$page=1;
											}
											$start_from = ($page-1) * $per_page_record;
											$query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
											$rs_result = mysqli_query ($connect, $query);
											?>
											<?php
											if(mysqli_num_rows($rs_result)){
											while ($rowMember = mysqli_fetch_array($rs_result)) {
											
											?>
											
											
											<tr>
												<td><?php echo $rowMember['docketNumber'] ?></td>
												<td><?php echo $rowMember['courierdate'] ?></td>
												<td><?php echo $rowMember['nofpkts'] ?></td>
												<td><?php echo $rowMember['mode'] ?></td>
												<td><?php echo $rowMember['package_from'] ?></td>
												<td><?php echo $rowMember['package_to'] ?></td>
												<td><?php echo $rowMember['total_weight'] ?> Kg</td>
												<td><?php echo $rowMember['rate'] ?>.00</td>
												<td>Rs. <?php echo $rowMember['frieght_charge'] ?>.00</td>
												<td>Rs. <?php echo $rowMember['docket_charge'] ?>.00</td>
												<td>Rs. <?php echo $rowMember['pickup_charge'] ?>.00</td>
												<td>Rs. <?php echo round($rowMember['grand_total']) ?>.00</td>
											</tr>
											
											
											<?php
													}
													}
													else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
											?>
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