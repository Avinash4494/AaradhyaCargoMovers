 
<?php
require_once('db.php');
$upload_dir = '../uploads/courier-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from addcourier where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Tax Invoice / Aaradhya Cargo Movers  </title>
  <head>
    <?php include_once 'Header_Links/header_links.php' ?>
  </head>
  <body onload="timeout_init();">
  	<?php include_once 'Header/headerHome.php' ?>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          	<style>
          		.rightPannel
          		{
          			padding-top: 100px;
          			 
          		}
          		.Mainheading h5
          		{
          			font-size: 2em;
          			text-align: center;
          		}
          	</style>
            <div class="rightPannel">
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-10 col-xs-10" >
                     
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-2 col-xs-2" >
                      <button class="actionButtonIcons" style="margin-top: 15px;text-align: center;display: none;" onclick="timeout_trigger('print_setion')"  type="submit" id="clickPrint" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <div id="print_setion" style="border:2px solid black;padding: 5px; margin-bottom: 20px;margin-top: -15px;">
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
                          <img src="image/mainLogo.png" alt="" height="50px" width="200px">
                          <h4 style="margin-left: 20px;font-size: 0.8em;">GSTIN : 29DJIPS6581L2Z5</h4>
                        </td>
                        
                        <td width="470px">
                          <img src="image/Picture1.png" alt="" class="img-responsive" style="height: 70px;margin-left: 100px;margin-top: -30px;">
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
                      .css-serial {
                      counter-reset: serial-number;  /* Set the serial number counter to 0 */
                      }
                      .css-serial td:first-child:before {
                      counter-increment: serial-number;  /* Increment the serial number counter */
                      content: counter(serial-number);  /* Display the counter */
                      }
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
                        padding-left: 10px;
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
                        <th>Total Amt.</th>
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
                        <td><?php echo $rowMember['gst'] ?>.00</td>
                        <td><?php echo $rowMember['grand_total'] ?>.00</td>
                      </tr>
                    </tbody>
                  </table>
                  <table class="tablePrintdetails" border="0" width="100%">
                    <tbody>
                      <tr style="font-size: 1em;">
                      	<td width="500px"></td>
                        <td width="" style="padding-top: 10px;"> <span style="margin-right: 20px;">Total Amount</span> Rs. <?php echo $rowMember['grand_total'] ?>.00</td>
                        
                      </tr>
                      
                    </tbody>
                  </table><br><br><br><br><br><hr/>
                  <h4 style=" margin: 5px;font-size: 0.9em;font-weight: bold;">Payment Details</h4>
                  <table class="tablePrint" border="0" width="100%" style="font-size: 0.8em;">
                    <tbody>
                      <tr>
                        <td><span>GST @ 5 % : Rs. <?php echo $rowMember['gst'] ?>.00</span></td>
                        <td><span>Round-off : Rs. 0.00</span></td>
                        <td><span>Total Amount : Rs. <?php echo $rowMember['grand_total'] ?>.00</span></td>
                        <td><span>Payment Status : <?php echo $rowMember['payment_process'] ?></span></td>
                      </tr>
                    </tbody>
                  </table>
                  <h4 style=" margin: 5px;font-size: 0.9em;font-weight: bold;">Shipment Details</h4>
                  <table class="tablePrint" border="0" width="100%" style="font-size: 0.8em;">
                    <tbody>
                    	<tr>
                       <td><span>Courier Id : <?php echo $rowMember['courier_id'] ?></span></td>
                       <td><span>Order Status : <?php echo $rowMember['order_status'] ?></span></td>
                       <td><span>Shipment Mode : <?php echo $rowMember['transport_number'] ?></span></td>
                        <td><span>Last Update : <?php echo $rowMember['order_date'] ?></span></td>
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
                $dispatched  = "Dispatched";
                $delivered  = "Delivered";
                if ($deskstatus==$delivered) {
                ?>
                <div class="statusImage">
                  <img src="image/delive.png" alt="">
                </div>
                <?php }
                else
                {
                ?>
                <div class="statusImage">
                  <img src="image/dispatched.png" alt="">
                </div>
                <?php
                } ?>
                      	</td>
                     
                        <td width="200px;">
                        	<div class="stampLogo">
                        		<img src="image/Picture2.png" alt="" class="img-responsive">
                        	</div></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                </td>
              		</tr>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
  <script>

  function timeout_trigger(setion_id) {
  var Contents_Section = document.getElementById(setion_id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = Contents_Section;
  window.print();
  document.body.innerHTML = originalContents;    
}
window.onload = function() {
  setTimeout(function() {
    document.getElementById('clickPrint').click();
  }, 1000);
};
function timeout_init() {
    setTimeout('timeout_trigger()', 500);
}
  </script>