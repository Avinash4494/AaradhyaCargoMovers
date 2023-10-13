<?php
require_once('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_vehicle where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$veh_name = $_POST['veh_name'];
$veh_num = $_POST['veh_num'];
$veh_type = $_POST['veh_type'];
$regis_num = $_POST['regis_num'];
$veh_driver = $_POST['veh_driver'];
$veh_joinDt = $_POST['veh_joinDt'];
$dl_num = $_POST['dl_num'];
$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = $veh_num.'_'.rand(100,999).'.'.$imgExt;
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
$sql = "update add_vehicle
set veh_name = '".$veh_name."',
veh_num = '".$veh_num."',
veh_type = '".$veh_type."',
regis_num = '".$regis_num."',
veh_driver = '".$veh_driver."',
veh_joinDt = '".$veh_joinDt."',
dl_num = '".$dl_num."',
image = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updateSuceess.php"; }, 100);
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
  <title>Vehicles Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftVehicle.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top">Vehicles Portal</a> / <span class="activePage">Vehicle Edit</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <h5><b>Vehicle ID : <?php echo $rowedit['vehicle_id'] ?></b></h5>
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                          <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="">
                            
                            <div class="row">
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_num" required="" value="<?php echo $rowedit['veh_num'] ?>" placeholder="Vehicle Number">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_name" required="" value="<?php echo $rowedit['veh_name'] ?>" placeholder="Vehicle Name">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Type :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_type" required="" value="<?php echo $rowedit['veh_type'] ?>" placeholder="Vehicle Type">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Registration Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="regis_num" required="" value="<?php echo $rowedit['regis_num'] ?>" placeholder="Registration Number" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Joining Date :</label>
                                    <div class="form-group">
                                      <input type="date" class="form-control"  name="veh_joinDt" required="" value="<?php echo $rowedit['veh_joinDt'] ?>" placeholder="Vehicle Joining Date ">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Driver Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_driver" required="" value="<?php echo $rowedit['veh_driver'] ?>" placeholder="Driver's Name">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">DL Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="dl_num" required="" value="<?php echo $rowedit['dl_num'] ?>" placeholder="DL Number">
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
                            </div>
                            <div class="row">
                              <div class="col-lg-9"></div>
                              <div class="col-lg-3">
                                <br>
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <button type="submit" name="Submit" onclick="quoteValidate()" class="actionButtonProfile-center">Submit</button>
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
  </div>
</div>
</div>
</body>
</html>
<script>
function amountCalculate()
{
var total_weight = document.getElementById('total_weight').value || 0;
var rate = document.getElementById('rate').value || 0;
var frieght_charge = document.getElementById('frieght_charge').value || 0;
var pickup_charge = document.getElementById('pickup_charge').value || 0;
var docket_charge = document.getElementById('docket_charge').value || 0;
var gst_range = document.getElementById('gst_range').value || 0;
var gst_charge = document.getElementById('gst_charge').value || 0;
var rateWt = rate*total_weight;
var rateWtResult = document.getElementById('rateWt').innerHTML = rateWt;
var rateDiff = parseInt(frieght_charge)+parseInt(pickup_charge)+parseInt(docket_charge);
var rateGst = (rateDiff/100)*gst_range;
var gstResult = document.getElementById('rateGst').innerHTML = rateGst;
var totalAmount = parseInt(rateDiff)+parseInt(gstResult);
var totalResult = document.getElementById('totalAmount').innerHTML = totalAmount;
}
</script>