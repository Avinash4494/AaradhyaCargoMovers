<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = '../user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["coy_name"]; ?></title>
  </head>
  <body>
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Couriers</span></h5>
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
                  require_once "db.php";
                  $per_page_record = 10;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $user_id = $row['user_id'];
                  $query = "SELECT * FROM member_add_courier Where user_id = '$user_id'  LIMIT $start_from, $per_page_record";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  ?>
                  <style>
                    .rectLongContent {
    padding: 0px 15px;
    height: 440px;
 
    overflow-y: scroll;
}
                  </style>
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
                   <script type="text/javascript">
                        function getOrderStatus()
                        {
                          var delivered = "Delivered";
                          var orderStatus = '<?php echo $rowMember['order_status']; ?>';
                            if (orderStatus==delivered)
                          {
                          document.getElementById("printButton").style.display ="block";
                          
                          }
                          else{
                          document.getElementById("printButton").style.display ="none";
                          }
                        }
                      </script>
                  <?php
                  }
                  ?>

                  <?php
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
                      <h5>You haven't created any orders yet.</h5>
                    </div>
                  </div>
                  <?php
                  }
                  ?>

                </div>
              </div>
              </div>
              <div class="row" >
                <div class="col-lg-10 col-xs-12"  >
                  <div class="pagination" >
                    <?php
                    $query = "SELECT COUNT(*) FROM member_add_courier Where user_id = '$user_id'";
                    $rs_result = mysqli_query($connect, $query);
                    $row = mysqli_fetch_row($rs_result);
                    $total_records = $row[0];
                    // Number of pages required.
                    $total_pages = ceil($total_records / $per_page_record);
                    $pagLink = "";
                    if($page>=2){
                    echo "<a style='border:none;' href='index_couriers.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                    }
                    for ($i=1; $i<=$total_pages; $i++) {
                    if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='index_couriers.php?page="
                    .$i."'>".$i." </a>";
                    }
                    else  {
                    $pagLink .= "<a href='index_couriers.php?page=".$i."'>
                    ".$i." </a>";
                    }
                    };
                    echo $pagLink;
                    if($page<$total_pages){
                    echo "<a style='border:none;' href='index_couriers.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-2 col-xs-12" >
                  <div class="pagination">
                    <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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
</body>
</html>