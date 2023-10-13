
<?php
include('db.php');
if(isset($_GET['id'])){
$id = $_GET['id'];
$sql = "select * from schedule_pickup where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowMember = mysqli_fetch_assoc($result);
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Courier Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftPickup.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="pickup_index.php" data-toggle="tooltip" title="Pickup Portal!" data-placement="top">Pickup Portal</a> / <span class="activePage">Create Invoice</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                         
                          <div class="row">
                            <div class="col-lg-6">
                              <h5>Customer Information</h5>
                            </div>
                            <div class="col-lg-6">
                               <p style="font-size: 0.9em;text-align: right;">Generating Invoice shipment request for : <?php echo $rowMember["pickup_id"]; ?> </p>
                            </div>
                          </div>
                          <style>
                            .companyInfor .well
                            {
                              background-color: white;
                              color: #1c2833;
                              padding: 5px;
                              padding-bottom: 0px;
                              margin-bottom: 5px;
                              margin-top: -7px;
                            }
                          </style>
                  <div class="companyInfor">
                    <div class="well">
                              <div class="row">
                            <div class="col-lg-4">
                              <p>Company Name : <?php echo $rowMember["pick_personal_names"]; ?></p>
                               <p>GSTIN : <?php echo $rowMember["gstin"]; ?></p>
                            </div>
                            <div class="col-lg-3">
                               <p>Email : <?php echo $rowMember["pick_personal_email"]; ?></p>
                            </div>
                            <div class="col-lg-2">
                               <p>Phone : <?php echo $rowMember["pick_personal_phone"]; ?></p>
                            </div>
                            <div class="col-lg-3">
                              <p>From : <?php echo $rowMember["pick_city"]; ?></p>
                              <p>To : <?php echo $rowMember["pick_deliCity"]; ?></p>
                            </div>
                          </div>
                    </div>
                  </div>
                          <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="addCourierProcess.php">
                            <input type="text" id="courier_id" name="courier_id" hidden="">
                             <input type="text" id="order_status" name="order_status" hidden="" value="Ordered">
                              <input type="text" id="order_date" name="order_date" hidden="">
                              <input type="text" id="order_date" name="user_id" value="<?php echo $rowMember["user_id"]; ?>" hidden="">
                              <input type="text" id="pickup_id" name="pickup_id" value="<?php echo $rowMember["pickup_id"]; ?>" hidden="">
                               
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Customer Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="cus_name" required="" placeholder="Customer Name">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Customer Address :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="cus_address" required="" placeholder="Customer Address">
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">GSTIN Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="cus_gstin" required="" placeholder="Customer GSTIN">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Customer Contact :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="cus_contact" required="" placeholder="Customer Contact" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Invoice Date :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="invoice_date" required="" placeholder="DD/MM/YYYY">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Invoice Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="invoice_no" required="" placeholder="Invoice Number" value="">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Docket Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="docketNumber" required="" placeholder="Docket Number">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Docket Date :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="sname" name="courierdate" required="" placeholder="DD/MM/YYYY">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">No. Of Package :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="nofpkts" name="nofpkts" required="" placeholder="Number of Package">
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Mode By :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="semail" name="mode" required="" placeholder="Mode of transport">
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="col-lg-3">
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">From :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="saddress" name="package_from" required="" placeholder="Pick-up From">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">To :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="saddress" name="package_to" required="" placeholder="Delivery To">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Weight :</label>
                                    <div class="form-group">
                                      <input type="text" name="total_weight" placeholder="Weight" id="total_weight"  class="form-control"  >
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Rate :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="rate" required="" placeholder="Rate" onfocusout="amountCalculate();" id="rate">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Freight Charges : <i class="fa fa-inr"></i> <span id="rateWt"></span>.00</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="frieght_charge" placeholder="Freight Charges" name="frieght_charge"  required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Pick-up Charges :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="pickup_charge" placeholder="Pick-up Charges" name="pickup_charge" required="">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Docket Charges :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="docket_charge" placeholder="Docket Charges" name="docket_charge" required="" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">GST % :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="gst_range" placeholder="GST Percentage" name="gst_range" required="" onfocusout="amountCalculate();">
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">GST Charges : <i class="fa fa-inr"></i> <span id="rateGst"></span>.00</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="gst_charge" name="gst" placeholder="GST Charges" onfocusout="amountCalculate();" required="" value="">
                                    </div>
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Total Amount : <i class="fa fa-inr"></i> <span id="totalAmount"></span>.00</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="grand_total" placeholder="Grand Total" name="grand_total" required="" value="">
                                    </div>
                                  </div>
                                </div>
                                  <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Payment Status :</label>
                                    <div class="form-group">
                                      <select name="payment_process" class="form-control" id="">
                                        <option value="Select Any">Select Any</option>
                                        <option value="Paid">Full Paid</option>
                                        <option value="Pending">Pending</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="image">Upload Image</label>
                                    <div class="form-group">
                                      <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                 
                                
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <div class="col-lg-4">
                                <div class="row" style="margin-top: 10px;">
                                  <div class="col-lg-12 col-xs-12">
                                    <button type="submit" name="Submit" onclick="quoteValidate()" class="actionButtonProfile-center">Submit</button>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4"></div>
                            </div>
                          </form>
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
function amountCalculate()
{
var total_weight = document.getElementById('total_weight').value || 0;
var rate = document.getElementById('rate').value || 0;
var frieght_charge = document.getElementById('frieght_charge').value || 0;
var pickup_charge = document.getElementById('pickup_charge').value || 0;
var docket_charge = document.getElementById('docket_charge').value || 0;
var gst_range = document.getElementById('gst_range').value || 0;
var gst_charge = Math.round(document.getElementById('gst_charge')).value || 0;
var rateWt = rate*total_weight;
var rateWtResult = document.getElementById('rateWt').innerHTML = rateWt;
var rateDiff = parseInt(frieght_charge)+parseInt(pickup_charge)+parseInt(docket_charge);
var rateGst = (rateDiff/100)*(gst_range);
var gstResult = document.getElementById('rateGst').innerHTML = Math.round(rateGst);
var totalAmount = parseInt(rateDiff)+parseInt(gstResult);
var totalResult = document.getElementById('totalAmount').innerHTML = totalAmount;
}
</script>