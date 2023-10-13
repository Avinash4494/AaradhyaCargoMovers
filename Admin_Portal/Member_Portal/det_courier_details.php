<div class="widgetShipmentComp" style="padding: 0px;">
    <?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from user_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMembers = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
  <?php
  $per_page_record = 10;
  if (isset($_GET["page"])) {
  $page  = $_GET["page"];
  }
  else {
  $page=1;
  }
  $getUser_id  = $rowMember['user_id'];
  $start_from = ($page-1) * $per_page_record;
  $query = "SELECT * FROM member_add_courier LIMIT $start_from, $per_page_record";
  $rs_result = mysqli_query ($connect, $query);
  ?>
  <?php
  if(mysqli_num_rows($rs_result)){
  while ($rowMember = mysqli_fetch_array($rs_result)) {
  $setUser_id = $rowMember['user_id'];
  if ($getUser_id==$setUser_id) {
  ?>
  <div class="basicInfo" >
    <div class="rectLongContent">
      <div class="pannelWidget">
        <div class="well">
          <div class="row">
            <div class="col-lg-2">
              <p>Docket No. : <?php echo $rowMember['docketNumber'] ?>
              </p>
              <p>Dkt. Date : <?php echo $rowMember['courierdate'] ?>
              </p>
            </div>
            <div class="col-lg-3">
              <p>Invoice No. : <?php echo $rowMember['invoice_no'] ?></p>
              <p>Invoice Date : <?php echo $rowMember['invoice_date'] ?></p>
            </div>
            <div class="col-lg-2">
              <p>Loading From : <?php echo $rowMember['package_from'] ?></p>
              <p>Delivery To : <?php echo $rowMember['package_to'] ?></p>
            </div>
            <div class="col-lg-2">
              <p>Pkg : <?php echo $rowMember['nofpkts'] ?> Pcs</p>
              <p>Weight : <?php echo $rowMember['total_weight'] ?> Kg</p>
            </div>
            <div class="col-lg-2">
              <p>Ft. Amt. : <i class="fa fa-inr"></i> <?php echo round($rowMember['frieght_charge']) ?>.00</p>
              <p>Amount : <i class="fa fa-inr"></i> <?php echo round($rowMember['grand_total']) ?>.00</p>
            </div>
            
            <div class="col-lg-1">
              <a id="printButton" href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
              <button class="actionButtonCreate" type="submit"><i class="fa fa-download"></i>&nbsp</button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <?php
  }
  }
  if ($getUser_id==$setUser_id) {
  ?>
  <div class="row">
    <div class="col-lg-5"></div>
    <div class="col-lg-2">
      <a  href="all_couriers.php?id=<?php echo $rowMembers['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
      <button style="margin-top: -10px;" class="actionButtonCreate" type="submit">View All</button></a>
    </div>
    <div class="col-lg-5"></div>
  </div>
  <?php
  }
  else
  {
  ?>
  <div class="noRecord">
    <h5>No Record Found</h5>
  </div>
  <?php
  }
  ?>
  <?php
  }
  else
  {
  echo "No record found";
  }
  ?>
</div>