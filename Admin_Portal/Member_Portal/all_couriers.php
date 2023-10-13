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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> All Couriers </span> </h5>
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
  $query = "SELECT * FROM member_add_courier LIMIT $start_from, $per_page_record";
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
    <div class="rectLongContent">
      <div class="pannelWidget" style="margin-top: 20px;">
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
                      echo "<a style='border:none;' href='all_couriers.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='all_couriers.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='all_couriers.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='all_couriers.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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