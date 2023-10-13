<?php
include('db.php');
$upload_dir = '../uploads/courier-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="courier_index.php"; }, 100);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Finder Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftFinder.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Docket Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Docket Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <button class="actionButtonIcons-center hidden-xs" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
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
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                      
                    </div>
                    <div class="col-lg-2"></div>
                    
                  </div>
                  
                </form>
                <br>
                <div id="priint_setion">
                  <div class="row">
                    
                    <div class="col-lg-12">
                      <?php
                      
                      include('db.php');
                      error_reporting(0);
                      $upload_dir = '../uploads/courier-uploads/';
                      if(isset($_POST['click'])){
                      $dock_num = $_POST['dock_number'];
                      $q = "SELECT * FROM addcourier where (docketNumber = '$dock_num') or (invoice_no = '$dock_num')";
                      $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                      if(mysqli_num_rows($result)>=1){
                      while($rowMember = mysqli_fetch_assoc($result)){
                      ?>
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
                      <div id="print_setion" class="hidden-xs" style="border:2px solid black;padding: 5px; margin-bottom: 20px;margin-top: -15px;">
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
                                      <td><span id="amountFrieght"></span>.00</td>
                                      <td><?php echo $rowMember['docket_charge'] ?>.00</td>
                                      <td><span id="amountPick"></span>.00</td>
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
                                        ?><span id="grandTotal"></span> .00</h5></td>
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
                            <script>
  function printDivSection(setion_id) {
  var Contents_Section = document.getElementById(setion_id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = Contents_Section;
  window.print();
  document.body.innerHTML = originalContents;
  }
  function numberWithCommas(){
  
  var grandAmount ='<?php echo $getTotal; ?>';
  var amtGrandMatches = grandAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById("grandTotal").innerHTML=amtGrandMatches;
  var pickAmount ='<?php echo $rowMember['pickup_charge'] ?>';
  var amtPickMatches = pickAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById("amountPick").innerHTML=amtPickMatches;
  
  var friAmount ='<?php echo $rowMember['frieght_charge'] ?>';
  var amtFriMatches = friAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  document.getElementById("amountFrieght").innerHTML=amtFriMatches;
  
  
  }
  </script>
                          <?php
                          }
                          }
                          else{
                          ?>
                          <?php
                          echo "<h1 style='color:red;text-align:center;font-size:1em;padding-bottom:15px; font-family: Asap;'>Sorry...No Record Found!!</h1>";?>
                          <?php
                          }
                          }
                          ?>
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
