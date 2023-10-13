<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from user_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$coy_name = $_POST['coy_name'];

$coy_email = $_POST['coy_email'];
$coy_phone = $_POST['coy_phone'];
$coy_mobile = $_POST['coy_mobile'];
$coy_fax = $_POST['coy_fax'];

$coy_address_1 = $_POST['coy_address_1'];
$coy_city = $_POST['coy_city'];
$coy_pin = $_POST['coy_pin'];
$coy_address_2 = $_POST['coy_address_2'];
$coy_state = $_POST['coy_state'];
$coy_country = $_POST['coy_country'];

$profile_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update user_login
set
coy_name = '".$coy_name."',
coy_email = '".$coy_email."',
coy_phone = '".$coy_phone."',
coy_mobile = '".$coy_mobile."',
coy_fax = '".$coy_fax."',
coy_address_1 = '".$coy_address_1."',
coy_city = '".$coy_city."',
coy_pin = '".$coy_pin."',
coy_address_2 = '".$coy_address_2."',
coy_state = '".$coy_state."',
coy_country = '".$coy_country."',
profile_upDate = '".$profile_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updateSuccess.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<?php
include_once '../db.php';
include_once "../session.php";
$upload_dir = 'uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Company Profile</span></h5>
              </div>
              <div class="createWidget" style="margin-top:-30px;">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-2">
                      <a href="create_contact.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-user-plus"></i> Create Contacts</button></a>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-2">
                      <a href="../user_AppStore/raise_shipment.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Contacts</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <style>
              .widgetShipmentComp .well
              {
              padding: 20px;
              }
              .widgetShipmentComp .well h4
              {
              margin: 0px;
              padding-bottom: 10px;
              }
              </style>
              <div class="widgetShipmentComp">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="dashWidgetTop">
                        <div class="well">
                          <div class="coy_profile">
                            <?php
                            if ($profile_image=='')
                            {
                            ?>
                            <img src="../image/emp.png" class="img-responsive">
                            <?php
                            }
                            else {
                            ?>
                            <img src="<?php echo $upload_dir.$row['profile_image'] ?>" class="img-responsive">
                            <?php
                            }
                            ?>
                            <h5 style="text-align: center;"><?php echo $row["coy_name"]; ?> </h5>
                          </div>
                          <a href="update_photo.php?id=<?php echo $row['id'] ?>"> <button class="actionButtonCreate" >Update Logo</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="row">
                        <div class="col-lg-11">
                          <h4>Update Basic Information</h4>
                        </div>
                        <div class="col-lg-1">
                          <a href="company_profile.php"> <button class="actionButtonCreate" ><i class="fa fa-arrow-left"></i></button></a>
                        </div>
                      </div>
                      <div class="basicInfoUpdate">
                        <div class="formUpdate">
                          <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                            <input type="text" id="user_id" name="random_user_id" hidden="">
                            <div class="row">
                              <div class="col-lg-12 col-xs-12">
                                <div class="form-group">
                                  <label for="">Company Name</label>
                                  <input type="text" id="coy_name" name="coy_name" class="form-control" value="<?php echo $row['coy_name']?>">
                                </div>
                              </div>
                            </div>
                            <h5>Contact Information</h5>
                            <div class="row">
                              <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Email Address</label>
                                  <input type="email" id="coy_email" name="coy_email" class="form-control" value="<?php echo $row['coy_email']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Phone Number</label>
                                  <input type="text" id="coy_phone" name="coy_phone" class="form-control" value="<?php echo $row['coy_phone']?>">
                                </div>
                              </div>
                              <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Fax</label>
                                  <input type="text" id="coy_fax" name="coy_fax" class="form-control" value="<?php echo $row['coy_fax']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Mobile Number</label>
                                  <input type="text" id="coy_mobile" name="coy_mobile" class="form-control" value="<?php echo $row['coy_mobile']?>">
                                </div>
                              </div>
                            </div>
                            <h5>Address Information</h5>
                            <div class="row">
                              <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Address Line 1</label>
                                  <input type="text" id="coy_address_1" name="coy_address_1" class="form-control" value="<?php echo $row['coy_address_1']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">City</label>
                                  <input type="text" id="coy_city" name="coy_city" class="form-control" value="<?php echo $row['coy_city']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Zipcode / Pincode</label>
                                  <input type="text" id="coy_pin" name="coy_pin" class="form-control" value="<?php echo $row['coy_pin']?>">
                                </div>
                              </div>
                              <div class="col-lg-6 col-xs-12">
                                <div class="form-group">
                                  <label for="">Address Line 2</label>
                                  <input type="text" id="coy_address_2" name="coy_address_2" class="form-control" value="<?php echo $row['coy_address_2']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">State</label>
                                  <input type="text" id="coy_state" name="coy_state" class="form-control" value="<?php echo $row['coy_state']?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Country</label>
                                  <input type="text" id="coy_country" name="coy_country" class="form-control" value="<?php echo $row['coy_country']?>">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-5"></div>
                              <div class="col-lg-2">
                                <button type="submit" style="margin-top: 5px;" name="Submit" class="actionButtonCreate">Submit</button>
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
</body>
</html>