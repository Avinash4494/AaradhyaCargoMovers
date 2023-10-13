<?php
require_once('db.php');
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Member Portal</title>
  <head>
  </head>
  
  <body>
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
              <div class="row">
                <div class="col-lg-10">
                  <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Scheduled Shipments </span> </h5>
              </div>
                </div>
                <div class="col-lg-2">
                  <!-- <a href="memPrint_All.php">
                      <button class="actionButtonIcons-center" style="margin-top: 5px;" type="submit">View All</button>
                    </a> -->
                </div>
              </div>
<div class="bodyComponent" >
  <div class="tableData">
   <?php
  $per_page_record = 10;
  if (isset($_GET["page"])) {
  $page  = $_GET["page"];
  }
  else {
  $page=1;
  }
  
  $start_from = ($page-1) * $per_page_record;
  $query = "SELECT * FROM schedule_pickup LIMIT $start_from, $per_page_record";
  $rs_result = mysqli_query ($connect, $query);
  ?>
  <?php
  if(mysqli_num_rows($rs_result)){
  while ($rowMember = mysqli_fetch_array($rs_result)) {
  $setUser_id = $rowMember['user_id'];
  if ($setUser_id==$setUser_id) {
  ?>
  <style>
    .pannelWidget .well
    {
      padding: 5px 5px;
      margin-bottom: 0px;
      background-color: white;
      border: 1px solid #1c2833;
    }
        .pannelWidget .well p
    {
      padding: 3px;
 
    }
  </style>
  <div class="basicInfo" >
    <div class="rectLongContent" >
      <div class="pannelWidget" style="margin-top: 20px;">
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
                    <button style="margin-top: 7px;" class="actionButtonCreate" type="submit">View </button>
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
  }}
  ?>
  <?php
  }
  else
  {
  echo "No record found";
  }
  ?>
</div>
          <div class="row" >
                  <div class="col-lg-8 col-xs-12"  >
                    <div class="pagination" >
                      <?php
                      $query = "SELECT COUNT(*) FROM user_login";
                      $rs_result = mysqli_query($connect, $query);
                      $row = mysqli_fetch_row($rs_result);
                      $total_records = $row[0];
                      // Number of pages required.
                      $total_pages = ceil($total_records / $per_page_record);
                      $pagLink = "";
                      if($page>=2){
                      echo "<a style='border:none;' href='all_scheduled.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='all_scheduled.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='all_scheduled.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='all_scheduled.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                      }
                      ?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-12" >
                    <div class="pagination" style="float: right;">
                      <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>