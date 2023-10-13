<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
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
?>
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
              <?php include_once 'toLeftCouriers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Courier Portal!" data-placement="top">Courier Portal</a> / <span class="activePage">Add Courier</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="addCourierProcess.php">
                      <input type="text" id="courier_id" name="courier_id" hidden="">
                      <h5><b>Customer Details</b></h5>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Name :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_name" required="" value="Avinash Singh Pvt. Ltd.">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Address :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_address" required="" value="afasdfs">
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">GSTIN Number :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_gstin" required="" value="Avinash Singh Pvt. Ltd.">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Contact :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_contact" required="" value="Avin">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Date :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="invoice_date" required="" value="Avinash Singh Pvt. Ltd.">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Invoice Number :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="invoice_no" required="" value="Avinash Singh Pvt. Ltd.">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><h5><b>Docket Details</b></h5>
                      <div class="row">
                        
                        <div class="col-lg-3">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Docket Number :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="docketNumber" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Docket Date :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="sname" name="courierdate" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">No. Of Package :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="nofpkts" name="nofpkts" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Mode By :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="semail" name="mode" required="" value="Train">
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-lg-3">
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">From :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="package_from" required="" value="25879">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">To :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="package_to" required="" value="25879">
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Weight :</label>
                              <div class="form-group">
                                <input type="text" name="total_weight" placeholder="Description" id="Description"  class="form-control"  value="We ">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Rate :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="rate" required="" value="0258">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                            
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Freight Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="sname" name="frieght_charge" required="" value="0258">
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Pick-up Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pickup_charge" name="pickup_charge" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">                            
                            <div class="col-lg-12">
                              <label for="usr">Docket Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="docket_charge" name="docket_charge" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">                           
                            <div class="col-lg-12">
                              <label for="usr">GST @  :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="semail" name="gst" required="" value="5">
                              </div>
                            </div>
                          </div>
                         
                        </div>
                        <div class="col-lg-3">
                         <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Total Amount :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="grand_total" required="" value="25879">
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
                        </div><br><br>
                        <div class="col-lg-3">
                          <div class="row">
                            <div class="col-lg-6 col-xs-6">
                              <button type="reset" name="reset" class="actionButtonIcons-center">Reset</button>
                            </div>
                            <div class="col-lg-6 col-xs-6">
                              <button type="submit" name="Submit" onclick="quoteValidate()" class="actionButtonIcons-center">Submit</button>
                            </div>
                          </div>
                        </div>
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