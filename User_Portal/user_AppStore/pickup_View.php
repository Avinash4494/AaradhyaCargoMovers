<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from schedule_pickup where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row_profile = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body onload="getOrderStatus(),showtime(),checkStatus();">
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Shipment View</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                  <a href="raise_shipment.php"><button style="margin-top: -40px;margin-bottom: 15px;" class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                </div>
              </div>
              <style>
              .bodyComponent p{text-align: left;color: #1c2833;}
              </style>
              <div class="bodyComponent" style="border:1px solid #1c2833;margin-top: 10px;padding: 10px;">
                <div class="row">
                  <div class="col-lg-11"></div>
                  <div class="col-lg-1">
                    <a href="shipment_index.php" >
                      <button style="margin-top: -27px;margin-bottom: 5px;" class="actionButtonCreate" type="submit">Back</button>
                    </a>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-10 col-xs-9">
                    <h4>Requested Pickup</h4>
                  </div>
                  <div class="col-lg-2 col-xs-3">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-2">
                    <p><b>Pickup Id -</b> <?php echo $row_profile['pickup_id'] ?></p>
                    <p><b>Raised On -</b> <?php echo $row_profile['pick_request_date'] ?></p>
                  </div>
                  <div class="col-lg-3">
                    <p><b>Name -</b> <?php echo $row_profile['pick_personal_names'] ?></p>
                    <p><b>Email -</b> <?php echo $row_profile['pick_personal_email'] ?></p>
                    
                  </div>
                  <div class="col-lg-2">
                    <p><b>Contact -</b> <?php echo $row_profile['pick_personal_phone'] ?></p>
                    <p><b>Mode By -</b> <?php echo $row_profile['pick_freight_type'] ?></p>
                  </div>
                  <div class="col-lg-3">
                    <p><b>Pickup From -</b> <?php echo $row_profile['pick_state'] ?></p>
                    <p><b>Delivery To -</b> <?php echo $row_profile['pick_deliState'] ?></p>
                  </div>
                  <div class="col-lg-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <p><b>Message -</b> <?php echo $row_profile['pick_message'] ?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-11 col-xs-9">
                    <h4>Pickup Status</h4>
                  </div>
                </div>
                <?php
                $per_page_record = 8;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $pickup_id = $row_profile['pickup_id'];
                $query = 'SELECT * FROM schedule_pickup where pickup_id = "'.$pickup_id.'" ' ;
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowFollow = mysqli_fetch_array($rs_result)) {
                // Display each field of the records.
                $pickup_id = $rowFollow['pickup_id'];
                if ($pickup_id==$pickup_id) {
                ?>
                <div class="row">
                  <div class="col-lg-3 col-xs-12" >
                    <p><b>Raised On : </b><?php echo $rowFollow['pick_request_date'] ?></p>
                    <p><b>Raised By : </b><?php echo $rowFollow['pick_personal_names'] ?></p>
                  </div>
                  <div class="col-lg-3 col-xs-12" >
                    <p><b>Current Status :</b> <?php echo $rowFollow['pick_status'] ?></p>
                    <p><b>Last Updated By : </b><?php echo $rowFollow['update_by'] ?></p>
                  </div>
                  <div class="col-lg-6 col-xs-12" >
                    <p><b>Remarks -</b> <?php echo $row_profile['status_msg'] ?></p>
                  </div>
                </div>
                <script>
                  function checkStatus()
                  {
                    var pickStatus = '<?php echo $row_profile['pick_status']; ?>';
                    if (pickStatus == "Resolved") 
                    {
                      document.getElementById("courierContainer").style.display = "block";
                    }
                    else
                    {
                       document.getElementById("courierContainer").style.display = "none";
                    }
                  }
                </script>
                <?php
                }}
                }
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                ?>

                                <?php
                $per_page_record = 8;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $pickup_id = $row_profile['pickup_id'];
                $query = 'SELECT * FROM member_add_courier where pickup_id = "'.$pickup_id.'" ' ;
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowCourier = mysqli_fetch_array($rs_result)) {
                // Display each field of the records.

                $pickup_id = $rowCourier['pickup_id'];
                if ($pickup_id==$pickup_id) {
                ?>
                                <div class="courierContainer" id="courierContainer">
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      <h4>Courier Details <span style="font-size: 0.8em;font-weight: bold;color: red;">(Docket No. <?php echo $rowCourier['docketNumber'] ?>)</span></h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4 col-xs-12" >
                      <p><b>Company Name : </b><?php echo $rowCourier['cus_name'] ?></p>
                      <p><b>GSTIN :</b> <?php echo $rowCourier['cus_gstin'] ?></p>
                    </div>
                    <div class="col-lg-3 col-xs-12" >
                      <p><b>Grand Total : </b>Rs. <?php echo $rowCourier['grand_total'] ?>.00</p>
                      <p><b>Payment Status -</b> <?php echo $rowCourier['payment_process'] ?></p>
                    </div>
                    <div class="col-lg-3 col-xs-12" >
                      <p><b>Courier Status -</b> <?php echo $rowCourier['order_status'] ?></p>
                    </div>
                    
                    <div class="col-lg-2">
                      
                      <button data-toggle="collapse" data-target="#demo" class="actionButtonCreate" type="submit">Status <i class="fa fa-chevron-down"></i></button>
                      
                    </div>
                  </div>
                  <div id="demo" class="collapse">
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <script>
                      function getOrderStatus()
                      
                      {
                      var ordered = "Ordered";
                      var dispatched = "Dispatched";
                      var shipping = "Shipping";
                      var delivered = "Delivered";
                      var pending = "Pending";
                      var fullpaid ="Full Paid";
                      var orderStatus = '<?php echo $rowCourier['order_status']; ?>';
                      var paymentStatus = '<?php echo $rowCourier['payment_process']; ?>';
                      if (orderStatus==ordered)
                      {
                      let orderedArr = document.querySelectorAll("#orderedItem");
                      for (let h = 0; h < orderedArr.length; h++) {
                      orderedArr[h].style.backgroundColor = "red";
                      }
                      let orderedText = document.querySelectorAll("#orderedH5");
                      for (let h = 0; h < orderedText.length; h++) {
                      orderedText[h].style.color = "red";
                      }
                      }
                      else if(orderStatus==dispatched)
                      {
                      
                      let dispatchedArr = document.querySelectorAll("#orderedItem,#dispatched,#orderedLine");
                      for (let i = 0; i < dispatchedArr.length; i++) {
                      dispatchedArr[i].style.backgroundColor = "red";
                      }
                      let dispatchedText = document.querySelectorAll("#orderedH5,#dispatchedH5,#orderedAro");
                      for (let i = 0; i < dispatchedText.length; i++) {
                      dispatchedText[i].style.color = "red";
                      }
                      }
                      else if(orderStatus==shipping)
                      {
                      let shippingArr = document.querySelectorAll("#orderedItem,#dispatched,#shipping,#dispatchLine,#orderedLine");
                      for (let j = 0; j < shippingArr.length; j++) {
                      shippingArr[j].style.backgroundColor = "red";
                      }
                      let shippingText = document.querySelectorAll("#orderedH5,#dispatchedH5,#shippingH5,#dispatchArrow");
                      for (let j = 0; j < shippingText.length; j++) {
                      shippingText[j].style.color = "red";
                      }
                      }
                      else if(orderStatus==delivered)
                      {
                      let deliverdArr = document.querySelectorAll("#orderedItem,#dispatched,#shipping,#delivered,#orderedLine,#dispatchLine,#shippingLine");
                      for (let k = 0; k < deliverdArr.length; k++) {
                      deliverdArr[k].style.backgroundColor = "red";
                      }
                      let deliveredText = document.querySelectorAll("#orderedH5,#dispatchedH5,#shippingH5,#deliveredH5,#shippingArrow");
                      for (let k = 0; k < deliveredText.length; k++) {
                      deliveredText[k].style.color = "red";
                      }
                      }
                      
                      if (orderStatus==delivered)
                      {
                      document.getElementById("invoiceButton").style.display ="block";
                      
                      }
                      else{
                      document.getElementById("invoiceButton").style.display ="none";
                      }
                      if (paymentStatus==pending)
                      {
                      document.getElementById("paymenStatus").style.color ="red";
                      }
                      else if (paymentStatus==fullpaid)
                      {
                      document.getElementById("paymenStatus").style.color ="green";
                      document.getElementById("paymentStatus").style.display ="none";
                      }
                      }
                      
                      </script>
                      
                      
                      <div class="col-lg-2">
                        <div class="orderPannel">
                          <div id="orderedLine">
                            <i id="orderedAro" class="fa fa-arrow-right"></i>
                          </div>
                          <div class="ordered" id="orderedItem">
                            <i class="fa fa-archive"></i>
                            <h5 id="orderedH5">Ordered</h5>
                            
                          </div>
                          <span> Last Updated On : <br><?php echo $rowCourier['order_date']; ?></span>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="orderPannel">
                          <div id="dispatchLine">
                            <i id="dispatchArrow" class="fa fa-arrow-right"></i>
                          </div>
                          <div class="ordered" id="dispatched">
                            <i class="fa fa-archive"></i>
                            <h5 id="dispatchedH5">Dispatched</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="orderPannel">
                          <div id="shippingLine">
                            <i  id="shippingArrow" class="fa fa-arrow-right"></i>
                          </div>
                          <div class="ordered" id="shipping">
                            <i class="fa fa-archive"></i>
                            <h5 id="shippingH5">Shipping</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div class="orderPannel">
                          <div class="ordered" id="delivered">
                            <i class="fa fa-archive"></i>
                            <h5 id="deliveredH5">Delivered</h5>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <div id="invoiceButton">
                           

                          <a href="courier_View.php?id=<?php echo $rowCourier['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"> 
                            <button class="actionButtonCreate" type="submit"><i class="fa fa-download"></i>&nbsp Invoice</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-10">
                        <h5 style="font-weight: bold;padding-top: 5px;">Shipment Details</h5>
                        <div class="row">
                          <div class="col-lg-4">
                            <ul class="list-group">
                              <li class="list-group-item">Invoice Number : <?php echo $rowCourier['invoice_no']; ?> </li>
                              <li class="list-group-item">Courier Id. : <?php echo $rowCourier['courier_id']; ?> </li>
                              <li class="list-group-item">Order Status : <?php echo $rowCourier['order_status']; ?> </li>
                              <li class="list-group-item">Picked From : <?php echo $rowCourier['package_from']; ?> </li>
                            </ul>
                          </div>
                          <div class="col-lg-4">
                            <ul class="list-group">
                              <li class="list-group-item">Invoice Date : <?php echo $rowCourier['invoice_date']; ?> </li>
                              <li class="list-group-item">Courier Date : <?php echo $rowCourier['courierdate']; ?> </li>
                              <li class="list-group-item">Docket Number : <?php echo $rowCourier['docketNumber']; ?> </li>
                              <li class="list-group-item">Delivery To : <?php echo $rowCourier['package_to']; ?> </li>
                            </ul>
                          </div>
                          <div class="col-lg-4">
                            <h5 style="margin-top: -25px;font-weight: bold;">Payment Details</h5>
                            <ul class="list-group">
                              <li class="list-group-item">Payment Status : <span id="paymenStatus"><?php echo $rowCourier['payment_process']; ?></span> </li>
                              <li class="list-group-item">Total Amount : Rs. <?php echo $rowCourier['grand_total']; ?>.00 </li>
                            </ul>
                          </div>
                        </div>
                        
                        <div id="paymentStatus">
                          <h5 style="margin-top: 0px;font-weight: bold;">Account Details</h5>
                          <div class="row">
                            <div class="col-lg-4">
                              <ul class="list-group">
                                <li class="list-group-item">Bank Name : AXIS BANK</li>
                                <li class="list-group-item">Account Name : Aaradhya Cargo Movers</li>
                              </ul>
                            </div>
                            <div class="col-lg-4">
                              <ul class="list-group">
                                <li class="list-group-item">Account Type : Current Account</li>
                                <li class="list-group-item">Account No. : 918020089221996</li>
                              </ul>
                            </div>
                            <div class="col-lg-4">
                              <ul class="list-group">
                                <li class="list-group-item">IFSC Code : UTIB0001614</li>
                                <li class="list-group-item">Branch : Yeshwanthpur, Bangalore</li>
                              </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-1"></div>
                    </div>
                  </div>
                </div>
                <?php
                }}
                }
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
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