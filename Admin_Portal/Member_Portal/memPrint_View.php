<?php
require_once('../db.php');
?><?php include_once "../session.php" ?>
<?php
require_once('db.php');
$upload_dire = '../../User_Portal/user_Profile/uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from user_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
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
							<?php include_once 'toLeftMembers.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member Details</span> </h5>
							</div>
							<div class="row hidden-lg">
								<div class="col-lg-11"> </div>
								<div class="col-lg-1">
									<button type="submit" class="actionButtonIcons-center" style="margin-top: -20px;margin-bottom: -25px;" onclick="printDivSection('print_setion')">Print &nbsp <i class="fa fa-print"></i></button>
								</div>
							</div>
							<div class="row hidden-xs">
								<div class="col-lg-10"> </div>
								<div class="col-lg-2">
									<button type="submit" class="actionButtonIcons-center" style="margin-top: -10px;margin-bottom: -15px;margin-left: -10px;" onclick="printDivSection('print_setion')">Print All &nbsp <i class="fa fa-print"></i></button>
								</div>
							</div>
							<div id="print_setion" class="tableFormat" style=" margin-bottom: 20px;">
								<div class="row">
									<div class="col-lg-12">
<table class="tablePrint hidden-xs"  border="0" width="100%">
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
.tableFormat
{
border:1px solid #1c2833;
background-color: #f5f5f5;
}
 table
 {
 	padding: 10px;
 }
.tablePrint td
{
padding: 5px;
text-align: left;
font-size: 0.7em;
}
.tablePrint th
{
font-size: 0.7em;
}
#print_setion
{
	padding: 5px;
}
@media print {
table {
border:hidden;
font-family: 'Acme';
}}
.memberDetails
{
	padding: 3px;

}
.memberDetails h4
{
	margin: 0px;
	font-size: 1em;
	padding: 10px 5px; 
}
.profileImg img
{
height: 70px;
width: 100%;
border:none;
}
</style>
<div class="memberDetails">
	<h4 >Basic Informtaion</h4>
<table class="tablePrint" border="1" width="100%">
	<tbody>
<!-- 		<tr>
			<td width="100px" rowspan="4">
				<div class="profileImg">
					<?php
                    if ($profile_image=='')
                    {
                    ?>
                    <img src="../image/emp.png" class="img-responsive">
                    <?php
                    }
                    else {
                    ?>
                    <img src="<?php echo $upload_dire.$rowMember['profile_image'] ?>" class="img-responsive">
                    <?php
                    }
                    ?>
				</div>
			</td>

		</tr> -->
		<tr>
			<td>User Id : <?php echo $rowMember['user_id']; ?></td>
			<td>Fullname : <?php echo $rowMember['Fullname']; ?></td>
			<td>Email : <?php echo $rowMember['Email']; ?></td>
			<td>Last updated on : <?php echo $rowMember['profile_upDate']; ?></td>
		</tr>
		<tr>
			<td>Password : <?php echo $rowMember['PASSWORD']; ?></td>
			<td>Contact : <?php echo $rowMember['mobile']; ?></td>
			<td>Sequrity Question : <?php echo $rowMember['Question']; ?></td>
			<td>Answer : <?php echo $rowMember['Answer']; ?></td>
		</tr>
	</tbody>
</table>

	<h4>Company Informtaion</h4>
<table class="tablePrint" border="1" width="100%">
	<tbody>
		<tr>
			<td>Name : <?php echo $rowMember['coy_name']; ?></td>
			<td>Email : <?php echo $rowMember['coy_email']; ?></td>
			<td>Mobile : <?php echo $rowMember['coy_mobile']; ?></td>
		</tr>
		<tr>
			<td>GSTIN : <?php echo $rowMember['coy_gstin']; ?></td>
			<td>Address : <?php echo $rowMember['coy_address_1'];?>, <?php echo $rowMember['coy_address_2']; ?>, <?php echo $rowMember['coy_city']; ?>, <?php echo $rowMember['coy_state']; ?>-<?php echo $rowMember['coy_pin']; ?></td>
			<td>Fax : <?php echo $rowMember['coy_fax']; ?></td>
		</tr>

	</tbody>
</table>
	<h4>Courier Informtaion</h4>
                      <div class="row">
                <div class="col-lg-12">
                  <table class="tablePrint" border="1" width="100%">
                    <thead >
                      <tr>
                        <th>Dkt. No.</th>
                        <th>Courier Date</th>
                        <th>Invoice Number</th>
                        <th>Invoice Date</th>
                        <th>Pkg. From</th>
                        <th>Pkg. To</th>
                        <th>Total Amt.</th>
                        <th>Weight</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once "db.php";
                      $per_page_record = 8;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM member_add_courier  LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                      <tr>
                        <p hidden=""><?php echo $rowMember['id'] ?></p>
                        <td width="50px;"><?php echo $rowMember['docketNumber'] ?></td>
                        <td width="100px;"><?php echo $rowMember['courierdate'] ?></td>
                        <td width="120px;"><?php echo $rowMember['invoice_no'] ?></td>
                        <td><?php echo $rowMember['invoice_date'] ?></td>
                        <td><?php echo $rowMember['package_from'] ?></td>
                        <td><?php echo $rowMember['package_to'] ?></td>
                        <td>Rs. <?php echo $rowMember['grand_total'] ?>.00</td>
                        <td><?php echo $rowMember['total_weight'] ?>.00 Kg</td>
                      </tr>
                      <?php
                      }
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