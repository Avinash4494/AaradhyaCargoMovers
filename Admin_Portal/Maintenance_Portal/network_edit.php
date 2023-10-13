<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from web_network_upload where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$net_offName = $_POST['net_offName'];
$net_mobile = $_POST['net_mobile'];
$net_pin = $_POST['net_pin'];
$net_address = $_POST['net_address'];
$net_landmark = $_POST['net_landmark'];
$net_townCity = $_POST['net_townCity'];
$net_State = $_POST['net_State'];
$net_addressType = $_POST['net_addressType'];
$updateDate = date("d-m-Y");

$sql = "update web_network_upload
set net_offName = '".$net_offName."',
net_mobile = '".$net_mobile."',
net_pin = '".$net_pin."',
net_address = '".$net_address."',
net_landmark = '".$net_landmark."',
net_townCity = '".$net_townCity."',
net_State = '".$net_State."',
net_addressType = '".$net_addressType."',
updateDate = '".$updateDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="success_network.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Maintenance Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMaint.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Update Network </span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  <div class="formPannel">
                    <div class="row">
                      <div class="col-lg-11">
                        <h5 style="margin-top: 0px;">Update Network</h5>
                      </div>
                      <div class="col-lg-1">
                        <a href="network_index.php"><button class="actionButtonIcons-center">Back</button></a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                          <input type="date" id="updateDate" name="updateDate"  hidden="">
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Office Name<span>*</span></label>
                                  <input type="text" class="form-control" name="net_offName" id="news_source" placeholder="Office Name" value="Aaradhya Cargo Movers">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Mobile<span>*</span></label>
                                  <input type="text" class="form-control" name="net_mobile" id="net_mobile" placeholder="Mobile Number" value="<?php echo $rowedit['net_mobile'] ?>">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Pincode<span>*</span></label>
                                <input type="text" class="form-control" name="net_pin" id="news_source" placeholder="Pincode" value="<?php echo $rowedit['net_pin'] ?>">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Area,Street,Sector<span>*</span></label>
                                <input type="text" name="net_address" class="form-control" placeholder="Area,Street,Sector" value="<?php echo $rowedit['net_address'] ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Landmark<span>*</span></label>
                                <input type="text" class="form-control" name="net_landmark" id="news_source" placeholder="Landmark" value="<?php echo $rowedit['net_landmark'] ?>">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Town/City<span>*</span></label>
                                <input type="text" class="form-control" name="net_townCity" id="news_source" placeholder="Town/City" value="<?php echo $rowedit['net_townCity'] ?>">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">State<span>*</span></label>
                                <select class="form-control" class="col-lg-9" id="fromstate" required="" name="net_State" style="text-transform:;">
                                  <option>Select State</option>
                                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                  <option value="Assam">Assam</option>
                                  <option value="Bihar">Bihar</option>
                                  <option value="Chhatisgarh">Chhatisgarh</option>
                                  <option value="Goa">Goa</option>
                                  <option value="Gujarat">Gujarat</option>
                                  <option value="Haryana">Haryana</option>
                                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                                  <option value="Jammu and kashmir">Jammu and Kashmir</option>
                                  <option value="Jharkhand">Jharkhand</option>
                                  <option value="Karnataka">Karnataka</option>
                                  <option value="Kerala">Kerala</option>
                                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                                  <option value="Maharashtra">Maharashtra</option>
                                  <option value="Manipur">Manipur</option>
                                  <option value="Meghalaya">Meghalaya</option>
                                  <option value="Mizoram">Mizoram</option>
                                  <option value="Nagaland">Nagaland</option>
                                  <option value="Orissa">Orissa</option>
                                  <option value="Punjab">Punjab</option>
                                  <option value="Rajasthan">Rajasthan</option>
                                  <option value="Sikkim">Sikkim</option>
                                  <option value="Tamil Nadu">Tamil Nadu</option>
                                  <option value="Telagana">Telagana</option>
                                  <option value="Tripura">Tripura</option>
                                  <option value="Uttranchal">Uttranchal</option>
                                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                                  <option value="West Bengal">West Bengal</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Address Type<span>*</span></label>
                                <select class="form-control" name="net_addressType" id="">
                                  <option value="Select and address type">Select and address type</option>
                                  <option value="Office/Commercial (10AM-6PM)">Office/Commercial (10AM-6PM)</option>
                                  <option value="Warehouse (10AM-6PM)">Warehouse (10AM-6PM)</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-2 col-xs-12">
                              <button type="submit" name="Submit" style="margin-top: 10px;" class="actionButtonIcons-center">Save</button>
                            </div>
                            <div class="col-lg-5"></div>
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
  </body>
</html>