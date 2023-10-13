
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> Couriers</span></h5>
              </div>
              <div class="widgetShipmentComp">
                <div class="well">
                  <?php
                  $per_page_record =20;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $Email = $_SESSION['Email'];
                  $query = "SELECT * FROM addcourier WHERE Email='$Email'";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  // Display each field of the records.
                  
                  ?>
                  <div class="rectLongContent hidden-lg" style="margin-top: 5px;">
                    <div class="rectWidge" >
                      <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                        <div class="row">
                          <div class="col-xs-7">
                            <b><h6 style="margin:0px;font-size: 1em;"><a style="color: black;" href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"> Docket Number : <?php echo $rowMember['docketNumber'] ?></a></h6></b>
                          </div>
                          <div class="col-xs-4">
                            <?php
                            $courStatus = $rowMember['order_status'];
                            $ordered = "Ordered";
                            $dispatched  = "Dispatched";
                            $shipping = "Shipping";
                            $delivered  = "Delivered";
                            if ($courStatus==$ordered) {
                            ?><i class="fa fa-circle" style="color: yellow;"></i>
                            <h6  style="margin:0px;">Confirmed</h6>
                            <?php
                            }
                            else if($courStatus == $dispatched)
                            {
                            ?><i class="fa fa-circle" style="color: orange;"></i>
                            <h6 style="margin:0px;">Dispatched</h6>
                            <?php
                            }
                            else if($courStatus == $shipping)
                            {
                            ?><i class="fa fa-circle" style="color: #0CFDA9;"></i>
                            <h6 style="margin:0px;">Shipping</h6>
                            <?php
                            }
                            else if($courStatus==$delivered)
                            {
                            ?>
                            <h6 style="margin:0px;"> <i class="fa fa-circle" style="color: green;"></i>&nbsp Delivered</h6>
                            <?php
                            }
                            ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h5><b>Invoice Number</b> - <?php echo $rowMember['invoice_no'] ?></h5>
                            <h5><b>Docket Date</b> - <?php echo $rowMember['invoice_date'] ?></h5>
                            <h5><b>Amount</b> - Rs. <?php echo $rowMember['grand_total'] ?>.00</h5>
                            <h5 ><b>Payment Status</b> - <?php echo $rowMember['payment_process'] ?></h5>
                            <h5><b>Order Status</b> - <?php echo $rowMember['order_status'] ?></h5>
                            <h5><b>Transport Details</b> - <?php echo $rowMember['transport_number'] ?></h5>
                            <h5><b>Updated On</b> - <?php echo $rowMember['order_date'] ?></h5>
                          </div>
                        </div>
                        <div class="buttonComp" style="margin-top: 10px;">
                          <div class="row">
                            <div class="col-xs-4">
                              <a href="downloadCourier.php?id=<?php echo $rowMember['id'] ?>">
                                <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-download"></i></button>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="courierEdit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                              </a>
                            </div>
                            <div class="col-xs-4">
                              <a href="All_Couriers_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                              </a>
                            </div>
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