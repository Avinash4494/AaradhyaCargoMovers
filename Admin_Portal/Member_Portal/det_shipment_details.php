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
  error_reporting(0);
  $start_from = ($page-1) * $per_page_record;
  $query = "SELECT * FROM schedule_pickup LIMIT $start_from, $per_page_record";
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
            <div class="col-lg-12 col-xs-9">
              <div class="row">
                <div class="col-lg-3">
                  <p class="quote_id">Pickup Id - <?php echo $rowMember['pickup_id'] ?>
                  </p>
                  <p>Raised On - <?php echo $rowMember['pick_request_date'] ?></p>
                </div>
                <!--  <div class="col-lg-2">
                  <p>Name - <?php echo $rowMember['pick_personal_names'] ?></p>
                  <p>Contact - <?php echo $rowMember['pick_personal_phone'] ?></p>
                </div> -->
                <div class="col-lg-3">
                  <p>Pick On - <?php echo $rowMember['pick_date'] ?></p>
                  <p>Pick Time - <?php echo $rowMember['pick_time'] ?></p>
                </div>
                <div class="col-lg-3">
                  <p>Pickup From - <?php echo $rowMember['pick_state'] ?></p>
                  <p>Delivery To - <?php echo $rowMember['pick_deliState'] ?></p>
                </div>
                <div class="col-lg-2">
                  <p>Status <br>
                    <?php
                    $courStatus = $rowMember['pick_status'];
                    $Active = "Active";
                    $inProg  = "In Progress";
                    $Resolved = "Resolved";
                    if ($courStatus==$Active) {
                    ?>
                    <h6  style="margin:0px;"><i class="fa fa-circle" style="color: #FF940B ;"></i>&nbsp Active</h6>
                    <?php
                    }
                    else if($courStatus == $inProg)
                    {
                    ?>
                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0BFFCB ;"></i> &nbsp In Progress</h6>
                    <?php
                    }
                    else if($courStatus == $Resolved)
                    {
                    ?>
                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0CFDA9;"></i> &nbsp Resolved</h6>
                    <?php
                    }
                    else if($courStatus == "")
                    {
                    ?>
                    <h6><i class="fa fa-circle" style="color: #D2F707 ;"></i> &nbsp Pending</h6>
                    <?php
                    }else{}
                    ?>
                  </p>
                </div>
                <div class="col-lg-1">
                  <a style="color: black;" href="pickup_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
                    <button style="margin-top: 5px;" class="actionButtonCreate" type="submit">View </button>
                  </a>
                </div>
              </div>
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
      <a  href="all_scheduled.php?id=<?php echo $rowMembers['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
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