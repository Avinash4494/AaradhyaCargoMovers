<?php
require_once('db.php');
$upload_dir = 'uploads/';
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
$cus_name = $_POST['cus_name'];
$cus_address = $_POST['cus_address'];
$cus_contact = $_POST['cus_contact'];
$cus_gstin = $_POST['cus_gstin'];
$invoice_date = $_POST['invoice_date'];
$invoice_no = $_POST['invoice_no'];
$courierdate = $_POST['courierdate'];
$docketNumber = $_POST['docketNumber'];
$nofpkts = $_POST['nofpkts'];
$mode = $_POST['mode'];
$package_from = $_POST['package_from'];
$package_to = $_POST['package_to'];
$total_weight = $_POST['total_weight'];
$rate = $_POST['rate'];
$frieght_charge = $_POST['frieght_charge'];
$pickup_charge = $_POST['pickup_charge'];
$docket_charge = $_POST['docket_charge'];
$gst = $_POST['gst'];
$grand_total = $_POST['grand_total'];
$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
if(in_array($imgExt, $allowExt)){
if($imgSize < 5000000){
unlink($upload_dir.$rowedit['image']);
move_uploaded_file($imgTmp ,$upload_dir.$userPic);
}else{
$errorMsg = 'Image too large';
}
}else{
$errorMsg = 'Please select a valid image';
}
}else{
$userPic = $row['image'];
}
if(!isset($errorMsg)){
$sql = "update addcourier
set cus_name = '".$cus_name."',
cus_address = '".$cus_address."',
cus_contact = '".$cus_contact."',
cus_gstin = '".$cus_gstin."',
invoice_date = '".$invoice_date."',
invoice_no = '".$invoice_no."',
courierdate = '".$courierdate."',
docketNumber = '".$docketNumber."',
nofpkts = '".$nofpkts."',
mode = '".$mode."',
package_from = '".$package_from."',
package_to = '".$package_to."',
total_weight = '".$total_weight."',
rate = '".$rate."',
frieght_charge = '".$frieght_charge."',
pickup_charge = '".$pickup_charge."',
pickup_charge = '".$docket_charge."',
pickup_charge = '".$pickup_charge."',
gst = '".$gst."',
grand_total = '".$grand_total."',
image = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updateSuceess.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Courier Portal!" data-placement="top">Courier Portal</a> / <span class="activePage">Update Courier</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="">
                      <input type="text" id="courier_id" name="courier_id" hidden="">
                      <h5><b>Customer Details</b></h5>
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Name :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_name" required="" value="<?php echo $rowedit['cus_name'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Address :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_address" required="" value="<?php echo $rowedit['cus_address'] ?>">
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">GSTIN Number :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_gstin" required="" value="<?php echo $rowedit['cus_gstin'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Customer Contact :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="cus_contact" required="" value="<?php echo $rowedit['cus_contact'] ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Date :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="invoice_date" required="" value="<?php echo $rowedit['invoice_date'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Invoice Number :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="invoice_no" required="" value="<?php echo $rowedit['invoice_no'] ?>">
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
                                <input type="text" class="form-control"  name="docketNumber" required="" value="<?php echo $rowedit['docketNumber'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Docket Date :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="sname" name="courierdate" required="" value="<?php echo $rowedit['courierdate'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">No. Of Package :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="nofpkts" name="nofpkts" required="" value="<?php echo $rowedit['nofpkts'] ?>">
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Mode By :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="semail" name="mode" required="" value="<?php echo $rowedit['mode'] ?>">
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="col-lg-3">
                          
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">From :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="package_from" required="" value="<?php echo $rowedit['package_from'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">To :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="package_to" required="" value="<?php echo $rowedit['package_to'] ?>">
                              </div>
                            </div>
                          </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Weight :</label>
                              <div class="form-group">
                                <input type="text" name="total_weight" placeholder="Description" id="Description"  class="form-control" value="<?php echo $rowedit['total_weight'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Rate :</label>
                              <div class="form-group">
                                <input type="text" class="form-control"  name="rate" required="" value="<?php echo $rowedit['rate'] ?>">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-3">
                            
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Freight Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="sname" name="frieght_charge" required="" value="<?php echo $rowedit['frieght_charge'] ?>">
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Pick-up Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pickup_charge" name="pickup_charge" required="" value="<?php echo $rowedit['pickup_charge'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">                            
                            <div class="col-lg-12">
                              <label for="usr">Docket Charges :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="docket_charge" name="docket_charge" required="" value="<?php echo $rowedit['docket_charge'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-12">
                              <label for="usr">Total Amount :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="grand_total" required=""  value="<?php echo $rowedit['grand_total'] ?>">
                              </div>
                            </div>
                          </div>
                         
                        </div>
                        <div class="col-lg-3">
                         
                          <div class="row">                           
                            <div class="col-lg-12">
                              <label for="usr">GST @  :</label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="semail" name="gst" required="" value="<?php echo $rowedit['gst'] ?>">
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