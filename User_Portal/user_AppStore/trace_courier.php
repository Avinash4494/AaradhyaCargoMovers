<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>ACM - Tax Invoice </title>
  </head>
  <body onload="getOrderStatus(),showtime();">
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Track Docket</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                  <a href="raise_shipment.php"><button style="margin-top: -40px;margin-bottom: -10px;" class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                </div>
              </div>
              
              <?php
              require_once "db.php";
              $user_id = $row['user_id'];
              $query = "SELECT * FROM member_add_courier Where user_id = '$user_id'";
              $rs_result = mysqli_query ($connect, $query);
              ?>
              <?php
              if(mysqli_num_rows($rs_result)){
              while ($rowMember = mysqli_fetch_array($rs_result)) {
              $getId =  $rowMember['id'];
              $flag = 1;
              if ($getId = $flag) {
              ?>
              <div class="widgetShipmentComp" id="widgetShipmentComp">
                <div class="well" style="margin-bottom: 5px;">
                  <form action="trace_courier.php" method="post">
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="col-lg-8">
                        <p>Search by Docket Number or Invoice Number</p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          
                          <input type="text" class="form-control" id="word"  name="dock_number"  autocomplete="off" placeholder="Enter Docket Number or Invoice ID"  required>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <button style="text-align: center;" type="submit" class="actionButtonCreate" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                      </div>
                      <div class="col-lg-2"></div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <?php
                  include('db.php');
                  error_reporting(0);
                  if(isset($_POST['click'])){
                  $dock_num = $_POST['dock_number'];
                  $q = "SELECT * FROM member_add_courier where user_id = '$user_id'and (docketNumber = '$dock_num') or (invoice_no = '$dock_num')";
                  $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                  if(mysqli_num_rows($result)>=1){
                  while($rowMember = mysqli_fetch_assoc($result)){
                  ?>
                  <div class="widgetShipmentComp">
                    <div class="well">
                      <div class="orderStatus">
                        <style>
                        .ordered{
                        height: 50px;
                        width: 50px;
                        background-color:#D5D4D4 ;
                        border-radius: 50%;
                        margin-top: 20px;
                        margin-bottom: 30px;
                        }
                        .ordered i{
                        font-size: 1.5em;
                        padding-top: 15px;
                        color: white;
                        padding-left: 15px;
                        }
                        .ordered h5{
                        padding-top: 15px;
                        text-align: center;
                        color: #D5D4D4;
                         
                        letter-spacing: 1px;
                        }
                        .orderStatus li.list-group-item
                        {
                        font-size: 0.9em;
                        padding: 5px 10px;
                        }
                        #orderedLine, #dispatchLine,  #shippingLine, #deliveredLine
                        {
                          height: 5px;
                          width: 135px;
                          position: absolute;
                          margin-top: 25px;
                          margin-left: 50px;
                          background-color:#D5D4D4; 
                        }
                        #orderedLine i, #dispatchLine i,  #shippingLine i
                        {
                          font-size: 1.7em;
                          position: absolute;
                          margin-top: -10px;
                          margin-left: 113px;
                          color: transparent;
                          
                        }
                        .orderPannel span 
                        {
                          font-size: 0.7em;
                          margin-top: 0px;
                        }
                        /*  #delivered
                        {
                        -webkit-animation: glowing 1s ease-in-out infinite alternate;
                        -moz-animation: glowing 1s ease-in-out infinite alternate;
                        animation: glowing 1s ease-in-out infinite alternate;
                        }
                        @-webkit-keyframes glowing {
                        from {
                        box-shadow: 0 0 10px red, 0 0 20px #fff, 0 0 30px red;
                        }
                        to {
                        box-shadow: 0 0 20px #fff, 0 0 30px red, 0 0 40px red;
                        }
                        }*/
                        </style>
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
                          var orderStatus = '<?php echo $rowMember['order_status']; ?>';
                          var paymentStatus = '<?php echo $rowMember['payment_process']; ?>';
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
                           <?php
                        include_once 'db.php';
                        $query = mysqli_query($connect,"SELECT a.order_date
                        From  member_add_courier  as a
                        inner join  schedule_pickup as u
                        on a.user_id = u.user_id");
                        $rowCheck = mysqli_fetch_assoc($query);
                        ?>
                        
                          <div class="col-lg-2">
                            <div class="orderPannel">
                                <div id="orderedLine">
                                   <i id="orderedAro" class="fa fa-arrow-right"></i>
                                </div>
                              <div class="ordered" id="orderedItem">
                                <i class="fa fa-archive"></i>
                                <h5 id="orderedH5">Ordered</h5>
                                
                              </div>
                            <span> Last Updated On : <br><?php echo $rowCheck['order_date']; ?></span>
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
                              <button class="actionButtonCreate" style="margin-bottom: 10px;margin-top: 10px;" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-download"></i>&nbsp Invoice</button>
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
                                  <li class="list-group-item">Invoice Number : <?php echo $rowMember['invoice_no']; ?> </li>
                                  <li class="list-group-item">Courier Id. : <?php echo $rowMember['courier_id']; ?> </li>
                                  <li class="list-group-item">Order Status : <?php echo $rowMember['order_status']; ?> </li>
                                  <li class="list-group-item">Picked From : <?php echo $rowMember['package_from']; ?> </li>
                                </ul>
                              </div>
                              <div class="col-lg-4">
                                <ul class="list-group">
                                  <li class="list-group-item">Invoice Date : <?php echo $rowMember['invoice_date']; ?> </li>
                                  <li class="list-group-item">Courier Date : <?php echo $rowMember['courierdate']; ?> </li>
                                  <li class="list-group-item">Docket Number : <?php echo $rowMember['docketNumber']; ?> </li>
                                  <li class="list-group-item">Delivery To : <?php echo $rowMember['package_to']; ?> </li>
                                </ul>
                              </div>
                              <div class="col-lg-4">
                                <h5 style="margin-top: -25px;font-weight: bold;">Payment Details</h5>
                                <ul class="list-group">
                                  <li class="list-group-item">Payment Status : <span id="paymenStatus"><?php echo $rowMember['payment_process']; ?></span> </li>
                                  <li class="list-group-item">Total Amount : Rs. <?php echo $rowMember['grand_total']; ?>.00 </li>
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
                      <div id="priint_setion">
                        <div class="rectLongContent hidden-lg" style="margin-top: -20px;margin-bottom: 30px;">
                          <div class="rectWidge" >
                            <h5 style="text-align: center;">Download Invoice</h5>
                            <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                              <div class="row">
                                <div class="col-xs-12">
                                  <h5><b>Invoice Number</b> - <?php echo $rowMember['invoice_no'] ?></h5>
                                  <h5><b>Docket Date</b> - <?php echo $rowMember['invoice_date'] ?></h5>
                                  <h5><b>Amount</b> - Rs. <?php echo round($rowMember['grand_total']) ?>.00</h5>
                                  <h5 ><b>Payment Status</b> - <?php echo $rowMember['payment_process'] ?></h5>
                                  <h5><b>Order Status</b> - <?php echo $rowMember['order_status'] ?></h5>
                                  <h5><b>Transport Details</b> - <?php echo $rowMember['transport_number'] ?></h5>
                                  <h5><b>Updated On</b> - <?php echo $rowMember['order_date'] ?></h5>
                                </div>
                              </div>
                            </div>
                          </div><br>
                          <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                        </div>
                        <div class="row">
                          <div class="col-lg-11">
                            
                          </div>
                          <div class="col-lg-1">
                            
                          </div>
                        </div>
                        <!-- PRINT SECTION -->
                        <?php
                        include_once 'db.php';
                        $query = mysqli_query($connect,"SELECT a.cus_name,a.cus_address,a.cus_contact,a.cus_gstin,a.invoice_no,a.invoice_date,a.gst_range,a.docketNumber,a.package_from,a.package_to,a.nofpkts,a.mode,a.total_weight,a.rate,a.docket_charge,a.gst,a.grand_total,a.courier_id,a.order_status,a.transport_number,a.order_date,a.payment_process,a.frieght_charge,a.pickup_charge,a.courierdate
                        From member_add_courier as a
                        inner join schedule_pickup as u
                        on a.user_id = u.user_id");
                        $rowMember = mysqli_fetch_assoc($query);
                        ?>
                        <style>
                        .pannelWidget .well
                        {
                        background-color: white;
                        }
                        </style>
                        
                        <div id="print_setion" class="hidden-lg hidden-xs" style="border:2px solid black;padding: 5px; margin-bottom: 20px;margin-top: 20px;">
                          <table class="tablePrintOuter"  border="1" width="100%" >
                            <tr >
                              <td style="margin-bottom: 150px;padding: 10px;">
                                <style>
                                
                                </style>
                                <h4 style="text-align: center;margin: 0px;">Tax Invoice</h4><br>
                                <div class="courier_view">
                                  <table class="tablePrint" border="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td width="300px">
                                          <img src="../image/mainLogo.png" alt="" height="50px" width="200px">
                                          <h4 style="margin-left: 20px;font-size: 0.8em;">GSTIN : 29DJIPS6581L2Z5</h4>
                                        </td>
                                        
                                        <td width="470px">
                                          <img src="../image/Picture1.png" alt="" class="img-responsive" style="height: 70px;margin-left: 100px;margin-top: -30px;">
                                        </td>
                                        
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table class="tablePrint" border="0" width="100%">
                                    <tbody>
                                      <tr>
                                        <td width="700px" style="padding-left: 20px;">
                                          <p style="text-align: left; margin: 0px;font-size: 1em;
                                            padding-bottom:20px;line-height: 20px;"><b>Registred Office:</b><br>
                                            #26, 1st Floor, Yeshwantpur 1st Main Road Mathikere,
                                          <br>Land Mark : Opp. Coffe Santhe Hotel, Banglore, 560054</p>
                                        </td>
                                        
                                        <td width="250px">
                                          <p style="text-align: left; margin: 0px;font-size: 0.9em; padding-bottom:15px;line-height: 20px;"><b>Contact</b><br>
                                            aaradhyacargomovers@gmail.com <br>
                                          +91 9113855664 | +91 9743866386</p>
                                        </td>
                                        
                                      </tr>
                                    </tbody>
                                  </table><br><br><br>
                                  <table class="tablePrintCustomer" border="1" style="margin-top: -30px;" width="100%">
                                    <tbody >
                                      <tr>
                                        <td width="400px" style="padding: 10px;line-height: 20px;">
                                          <p style="padding: 0px 10px;"><b>Customer’s Name & Address:</b><br>
                                            <b>Name</b> : <?php echo $rowMember['cus_name'] ?><br>
                                            <b>Address</b> : <?php echo $rowMember['cus_address'] ?><br>
                                            <b>Contact</b> : <?php echo $rowMember['cus_contact'] ?><br>
                                          <b>GSTIN</b> : <?php echo $rowMember['cus_gstin'] ?></p>
                                        </td>
                                        
                                        <td width="270px" >
                                          <p style="padding: 0px 10px;line-height: 20px;"><b>Date</b> : <?php echo $rowMember['invoice_date'] ?><br>
                                          <b>Invoice No.</b> : <?php echo $rowMember['invoice_no'] ?></p>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table> <br>
                                  <table class="tablePrintdetails css-serial " border="1"  style=" text-align: center;" width="100%">
                                    <thead>
                                      <style>
                                      
                                      table td
                                      {
                                      padding: 5px 0px 5px 0px;
                                      }
                                      table th
                                      {
                                      padding: 5px 0px 5px 0px;
                                      }
                                      table.tablePrintdetails td
                                      {
                                      text-align: center;
                                      
                                      }
                                      table.tablePrintdetails th
                                      {
                                      text-align: center;
                                      
                                      }
                                      
                                      table.tablePrint span
                                      {
                                      
                                      }
                                      </style>
                                      <tr style="font-size: 0.8em;">
                                        <th>Dkt. No.</th>
                                        <th>Pkg.</th>
                                        <th>Mode</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Weight</th>
                                        <th>Rate</th>
                                        <th>Frieght Amt.</th>
                                        <th>Docket Amt.</th>
                                        <th>Pick-up Amt.</th>
                                        <th>GST <?php echo $rowMember['gst_range'] ?>%</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr style="font-size: 0.8em;">
                                        <td><?php echo $rowMember['docketNumber'] ?></td>
                                        <td><?php echo $rowMember['nofpkts'] ?></td>
                                        <td><?php echo $rowMember['mode'] ?></td>
                                        <td><?php echo $rowMember['package_from'] ?></td>
                                        <td><?php echo $rowMember['package_to'] ?></td>
                                        <td><?php echo $rowMember['total_weight'] ?> Kg</td>
                                        <td><?php echo $rowMember['rate'] ?></td>
                                        <td><?php echo $rowMember['frieght_charge'] ?>.00</td>
                                        <td><?php echo $rowMember['docket_charge'] ?>.00</td>
                                        <td><?php echo $rowMember['pickup_charge'] ?>.00</td>
                                        <td><?php echo round($rowMember['gst']) ?>.00</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table class="tablePrintdetails" border="0" width="100%" style="margin-top: 10px;">
                                    <tbody>
                                      <?php
                                      $number = round($rowMember['grand_total']);
                                      $no = floor($number);
                                      $point = round($number - $no, 2) * 100;
                                      $hundred = null;
                                      $digits_1 = strlen($no);
                                      $i = 0;
                                      $str = array();
                                      $words = array('0' => '', '1' => 'one', '2' => 'two',
                                      '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six','7' => 'seven', '8' => 'eight', '9' => 'nine',
                                      '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
                                      '13' => 'thirteen', '14' => 'fourteen',
                                      '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
                                      '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
                                      '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
                                      '60' => 'sixty', '70' => 'seventy',
                                      '80' => 'eighty', '90' => 'ninety');
                                      $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
                                      while ($i < $digits_1) {
                                      $divider = ($i == 2) ? 10 : 100;
                                      $number = floor($no % $divider);
                                      $no = floor($no / $divider);
                                      $i += ($divider == 10) ? 1 : 2;
                                      if ($number) {
                                      $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                      $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                      $str [] = ($number < 21) ? $words[$number] .
                                      " " . $digits[$counter] . $plural . " " . $hundred
                                      :
                                      $words[floor($number / 10) * 10]
                                      . " " . $words[$number % 10] . " "
                                      . $digits[$counter] . $plural . " " . $hundred;
                                      } else $str[] = null;
                                      }
                                      $str = array_reverse($str);
                                      $result = implode('', $str);
                                      $points = ($point) ?
                                      "." . $words[$point / 10] . " " .
                                      $words[$point = $point % 10] : '';
                                      $convertAmt =  $result . "Rupees  " . $points . " Only";
                                      ?>
                                      
                                    </tbody>
                                  </table><br><hr/>
                                  <h4 style=" margin: 5px;font-size: 0.9em;font-weight: bold;">Payment Details</h4>
                                  <table class="tablePrint" border="0" width="100%" >
                                    <tbody>
                                      <tr>
                                        <style>
                                        .tablePrint h5{font-size: 0.8em;
                                        padding-left: 10px;margin:0px;}
                                        </style>
                                        
                                        <td><h5>GST @ <?php echo $rowMember['gst_range'] ?>% : Rs. <?php echo round($rowMember['gst']) ?>.00
                                        </h5></td>
                                        <td><h5>Round-off : Rs. - 0.00</h5></td>
                                        <td style="text-align: right; padding-right: 20px;"><h5>Total Amount : Rs.
                                          <?php $setTotal =round($rowMember['grand_total']);
                                          $setRound = 0.00;
                                          $getTotal = $setTotal-$setRound;
                                        ?><?php echo $getTotal; ?> .00</h5></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <h5 style="margin-top: 0px;  padding-left: 15px;">Rupees in words : <span style="text-transform: uppercase;"><?php echo $convertAmt; ?></span></h5>
                                  <table class="tablePrint" border="0" width="100%" >
                                    <tbody>
                                      
                                    </tbody>
                                  </table><hr/>
                                  <h4 style=" margin: 5px;font-size: 0.9em;font-weight: bold;">Shipment Details</h4>
                                  <table class="tablePrint" border="0" width="100%" style="font-size: 0.8em;">
                                    <tbody>
                                      <tr>
                                        <td><span>Courier Id : <?php echo $rowMember['courier_id'] ?></span></td>
                                        <td><span>Order Status : <?php echo $rowMember['order_status'] ?></span></td>
                                        <td><span>Shipment Mode : <?php echo $rowMember['transport_number'] ?></span></td>
                                        
                                      </tr>
                                      <tr>
                                        <td><span>Last Update : <?php echo $rowMember['order_date'] ?></span></td>
                                        <td><span>Payment : <?php echo $rowMember['payment_process'] ?></span></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <h4 style="margin: 5px;font-size: 0.9em;font-weight: bold;">Bank Account Details</h4>
                                  <table class="tablePrint" border="0" width="100%" style="font-size: 0.8em;">
                                    <tbody>
                                      <tr>
                                        <td><span>Bank Name : AXIS BANK</span></td>
                                        <td><span>Account Name : Aaradhya Cargo Movers</span></td>
                                        <td><span>Account Type : Current Account</span></td>
                                      </tr>
                                      <tr>
                                        <td><span>Account No. : 918020089221996</span></td>
                                        <td><span>IFSC Code : UTIB0001614</span></td>
                                        <td><span>Branch : Yeshwanthpur, Bangalore</span></td>
                                      </tr>
                                    </tbody>
                                  </table><hr/>
                                  <style type="text/css">
                                  .tablePrintImage .stampLogo img
                                  {
                                  float: right;
                                  margin-top: 15px;
                                  height: 70px;
                                  }
                                  .tablePrintImage .statusImage img
                                  {
                                  
                                  
                                  height: 70px;
                                  }
                                  </style>
                                  <table class="tablePrintImage" border="0" width="100%">
                                    <tbody>
                                      
                                      <tr>
                                        <td width="200px;">
                                          <?php
                                          $deskstatus = $rowMember['order_status'];
                                          $ordered = "Ordered";
                                          $dispatched  = "Dispatched";
                                          $shipping = "Shipping";
                                          $delivered  = "Delivered";
                                          if ($deskstatus==$ordered) {
                                          ?>
                                          <div class="statusImage">
                                            <img src="../image/confirm.png" alt="">
                                          </div>
                                          <?php }else if($deskstatus==$dispatched){ ?>
                                          <div class="statusImage">
                                            <img src="../image/dispatched.png" alt="">
                                          </div>
                                          <?php
                                          }else if($deskstatus==$shipping){ ?>
                                          <div class="statusImage">
                                            <img src="../image/shipping.png" alt="">
                                          </div>
                                          <?php
                                          } else if($deskstatus==$delivered){ ?>
                                          <div class="statusImage">
                                            <img src="../image/delive.png" alt="">
                                          </div>
                                          <?php } ?>
                                        </td>
                                        
                                        <td width="200px;">
                                          <div class="stampLogo">
                                            <img src="../image/Picture2.png" alt="" class="img-responsive">
                                          </div></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </table>
                          </div>
                          <!-- PRINT SECTION -->
                          <?php
                          }
                          }
                          else{
                          ?>
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <div class="col-lg-4">
                                <img src="../image/empty-box-01.png" class="img-responsive" alt="">
                              </div>
                              <div class="col-lg-4"></div>
                            </div>
                            <h4 style="text-align: center;">No records found!</h4>
                          </div>
                          <?php
                          }?>
                          <?php
                          
                          }
                          
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                break;}
                else
                {
                echo "else";
                }
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
                    <h5>You haven't created any orders yet.</h5>
                  </div>
                </div>
                <?php
                }
                ?>
                
                
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