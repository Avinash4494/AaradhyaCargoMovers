<?php
include('db.php');
$upload_dir = '../uploads/courier-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_member where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_member where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="member_Index.php"; }, 1000);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
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
          <div class="col-lg-12">
            <div class="rightPannel">
              <div class="paggignation" style="margin-bottom: -10px;">
                <h5><a href="courier_index.php" data-toggle="tooltip" title="Courier Portal!" data-placement="top">Courier Portal</a> / <span class="activePage">Create Invoice</span></h5>
              </div>
              
                  <div class="courierAddComponent" style="margin-top: -30px;">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                          <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="addCourierProcess.php">
                            <input type="text" id="courier_id" name="courier_id" hidden="">
                             <input type="text" id="order_status" name="order_status" hidden="" value="Ordered">
                              <input type="text" id="order_date" name="order_date" hidden="">
                             
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
                                      <input type="text" class="form-control" id="invoice_num"  name="invoice_no" required="" placeholder="Invoice Number" value="">
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
                                  <div class="col-lg-12 col-xs-6">
                                    <label for="usr">Weight :</label>
                                    <div class="form-group">
                                      <input type="text" name="total_weight" placeholder="Weight" id="total_weight"  class="form-control"  >
                                    </div>
                                  </div>
                                   <div class="col-lg-12 col-xs-6">
                                    <label for="usr">Docket Charges :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="docket_charge" placeholder="Docket Charges" name="docket_charge" required="" value="">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  
                                </div>
                              </div>
                              <div class="col-lg-3">
                                
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Freight Charges : </label>
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="frieght_charge" placeholder="Freight Charges" name="frieght_charge" onfocusout="amountCalculate();" required="">
                                    </div>
                                  </div>

                                </div>
                                <div class="row">
                                   <div class="col-lg-12">
                                    <label for="usr">Rate : <i class="fa fa-inr"></i> <span id="getRate"></span>.00</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="rate" required="" placeholder="Rate"  id="rate">
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
                                 <!--  <div class="row">
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
                                </div> -->
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
// var rateWt = rate*total_weight;
// var rateWtResult = document.getElementById('rateWt').innerHTML = rateWt;
var setRate = frieght_charge/total_weight;
var getRateResult= document.getElementById('getRate').innerHTML = setRate;
var rateDiff = parseInt(frieght_charge)+parseInt(pickup_charge)+parseInt(docket_charge);
var rateGst = (rateDiff/100)*(gst_range);
var gstResult = document.getElementById('rateGst').innerHTML = Math.round(rateGst);
var totalAmount = parseInt(rateDiff)+parseInt(gstResult);
var totalResult = document.getElementById('totalAmount').innerHTML = totalAmount;
}
 
</script>