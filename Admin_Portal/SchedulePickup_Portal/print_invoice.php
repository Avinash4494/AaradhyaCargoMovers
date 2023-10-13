<!-- PRINT SECTION -->
 <?php include_once '../../Header_Links/header_links.php' ?>
<?php
include_once 'db.php';
$query = mysqli_query($connect,"SELECT a.cus_name,a.cus_address,a.cus_contact,a.cus_gstin,a.invoice_no,a.invoice_date,a.gst_range,a.docketNumber,a.package_from,a.package_to,a.nofpkts,a.mode,a.total_weight,a.rate,a.docket_charge,a.gst,a.grand_total,a.courier_id,a.order_status,a.transport_number,a.order_date,a.payment_process,a.frieght_charge,a.pickup_charge
From member_add_courier as a
inner join schedule_pickup as u
on a.user_id = u.user_id");
$rowMember = mysqli_fetch_assoc($query);
?>
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