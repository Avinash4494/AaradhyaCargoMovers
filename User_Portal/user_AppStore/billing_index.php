<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body > 
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Billing</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                  <a href="raise_shipment.php"><button style="margin-top: -40px;margin-bottom: 5px;" class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                </div>
              </div>
         <div class="rectLongContent">
              <div class="row">
                <div class="col-lg-12">
                  <?php
                  $per_page_record = 10;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM member_add_courier Where user_id = '$user_id'  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  ?>
 
                    <div class="pannelWidget">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-12 col-xs-9">
                     
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  <?php
                  }
                  }
                  else{
                  ?>
                  <div class="emptyBox">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                          <img src="../image/empty-box-01.png" class="img-responsive" alt="">
                        </div>
                        <div class="col-lg-4"></div>
                      </div>
                      <h4>No records found!</h4>
                      <h5>You haven't created any orders yet.</h5><br>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div> <!-- rectLongContent -->
                
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
</body>
</html>