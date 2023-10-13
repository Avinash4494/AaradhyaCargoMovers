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
					  <?php include_once 'toLeftVehicle.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								 
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top" >Vehicles Portal</a> / <span class="activePage"> All Vehicle Details</span> </h5>
							</div>
							<div class="row">
								<div class="col-lg-11"> </div>
								<div class="col-lg-1">
									<button type="submit" class="actionButtonIcons-center" onclick="printDivSection('print_setion')"><i class="fa fa-print"></i></button>
								</div>
							</div>
							<div id="print_setion" style=" margin-bottom: 20px;">
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
                             
                            <th>Vehicle Id.</th>
                            <th>Registration No.</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No.</th>
                            <th>Type</th>
                            <th>Joining Date</th>
                            <th>Driver Id.</th>
                             
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
											$query = "SELECT * FROM add_vehicle  LIMIT $start_from, $per_page_record ";
											$rs_result = mysqli_query ($connect, $query);
											?>
											<?php
											if(mysqli_num_rows($rs_result)){
											while ($rowMember = mysqli_fetch_array($rs_result)) {
											
											?>
											
											
											<tr>
												<td><b> <?php echo $rowMember['vehicle_id'] ?></b></td>
                            <td><?php echo $rowMember['regis_num'] ?></td>
                            <td><?php echo $rowMember['veh_name'] ?></td>
                            <td><?php echo $rowMember['veh_num'] ?></td>
                            <td><?php echo $rowMember['veh_type'] ?></td>
                            <td><?php echo $rowMember['veh_joinDt'] ?></td>
                            <td><?php echo $rowMember['driver_id'] ?></td>
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