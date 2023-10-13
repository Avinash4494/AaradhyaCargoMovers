<?php
require_once('db.php');
$upload_dir = '../uploads/courier-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from addcourier where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$payment_process = $_POST['payment_process'];
$order_status = $_POST['order_status'];
$transport_number = $_POST['transport_number'];
$order_date = date("d/m/Y");
 
if(!isset($errorMsg)){
$sql = "update addcourier
set payment_process = '".$payment_process."',
order_status = '".$order_status."',
transport_number = '".$transport_number."',
order_date = '".$order_date."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="track_index.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
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
  <title>Couriers Portal</title>
  <body onload="showtime();">
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top">Couriers Portal</a> / <span class="activePage">Docket Track</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                          
                          
                          <div class="row">
                            <div class="col-lg-3">
                              <h5 ><b>Courier ID</b> - <?php echo $rowedit['courier_id'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5 ><b>Docket Number</b> - <?php echo $rowedit['docketNumber'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5><b>Invoice Number</b> - <?php echo $rowedit['invoice_no'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5><b>Docket Date</b> - <?php echo $rowedit['invoice_date'] ?></h5>
                            </div>
                          </div>
                          <hr/>
                          <div class="row">
                            <div class="col-lg-5">
                              <h5 ><b>Customer Name</b> - <?php echo $rowedit['cus_name'] ?></h5>
                              <h5 ><b>Customer Address :</b> - <?php echo $rowedit['cus_address'] ?></h5>
                              
                            </div>
                            <div class="col-lg-3">
                              <h5 ><b>Invoice Date</b> - <?php echo $rowedit['invoice_date'] ?></h5>
                              <h5 ><b>Courier Status</b> - <?php echo $rowedit['order_status'] ?></h5>
                            </div>
                            <div class="col-lg-3">
                              <h5><b>GSTIN Number : </b> - <?php echo $rowedit['cus_gstin'] ?></h5>
                              <h5 ><b>Payment Status</b> - <?php echo $rowedit['payment_process'] ?></h5>
                            </div>
                          </div>
                          <hr/>
                     <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="">
                            <input type="text" id="courier_id" name="courier_id" hidden="">
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Payment Status :</label>
                                    <div class="form-group">
                                      <select name="payment_process" class="form-control" id="">
                                        <option value="Select Any">Select Any</option>
                                        <option value="Full Paid">Full Paid</option>
                                        <option value="Pending">Pending</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Update Order Status : (<?php echo $rowedit['order_status'] ?>) </label>
                                    <div class="form-group">
                                       
                                      <select name="order_status" class="form-control" id="">
                                        <option value="Select Any">Select Any</option>
                                        <option value="Ordered">Ordered</option>
                                        <option value="Dispatched">Dispatched</option>
                                        <option value="Shipping">Shipping</option>
                                        <option value="Delivered">Delivered</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Transport Details :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="transport_number" placeholder="Transport Number" value="<?php echo $rowedit['transport_number'] ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <button style="margin-top: 20px;" type="submit" name="Submit" class="actionButtonProfile">Submit</button>
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
</script>