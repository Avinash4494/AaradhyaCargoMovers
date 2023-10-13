<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from admin_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){

$dob = $_POST['dob'];
$gender = $_POST['gender'];
$alternate_phone = $_POST['alternate_phone'];
$present_address = $_POST['present_address'];
$present_state = $_POST['present_state'];
$present_pincode = $_POST['present_pincode'];
$permanent_address = $_POST['permanent_address'];
$permanent_state = $_POST['permanent_state'];
$permanent_pincode = $_POST['permanent_pincode'];
if(!isset($errorMsg)){
$sql = "update admin_login
set
dob = '".$dob."',
gender = '".$gender."',
alternate_phone = '".$alternate_phone."',
present_address = '".$present_address."',
present_state = '".$present_state."',
present_pincode = '".$present_pincode."',
permanent_address = '".$permanent_address."',
permanent_state = '".$permanent_state."',
permanent_pincode = '".$permanent_pincode."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<?php
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: index.php");
}
?>
<?php
include_once 'db.php';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body>
    <?php include_once '../../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'topLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Create Profile</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="row">
                  <div class="col-lg-2"></div>
                  <div class="col-lg-8">
                    <h4>Create Profile</h4>
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                          <input type="text" id="user_id" name="random_user_id" hidden="">
                          <div class="row">
                            <div class="col-lg-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Username<span>*</span></label>
                                <input type="text" id="dob" name="employees_id_info" class="form-control" value="<?php echo $row['employees_id']?>" disabled>
                              </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Date of Birth<span>*</span></label>
                                <input type="date" id="dob" name="dob" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                             <div class="col-lg-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Gender<span>*</span></label>
                                <select name="gender" id="" class="form-control">
                                  <option value="Null">Select Any</option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                              <div class="form-group">
                                <label for="">Alternate Phone (Optional)</label>
                                <input type="text" id="" name="alternate_phone" class="form-control" placeholder ="Alternate Phone Number">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-xs-12">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h5>Present Address</h5>
                                  <div class="row">
                                    <div class="col-lg-12 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Address<span>*</span></label>
                                        <input type="text" id="present_address" name="present_address" class="form-control"  placeholder="Your Present Address">
                                      </div>
                                      
                                      <div class="form-group">
                                        <label for="">State<span>*</span></label>
                                        <select name="present_state" id="present_state" class="form-control">
                                          <option value="">Select State</option>
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
                                      
                                      <div class="form-group">
                                        <label for="">Pincode<span>*</span></label>
                                        <input type="text" id="present_pincode" name="present_pincode" class="form-control"  placeholder="Pin Code">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                
                              </div>
                            </div>
                            <div class="col-lg-6 col-xs-12">
                              <h5>Permanent Address</h5>
                              <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                  <div class="form-group">
                                    <label for="">Address<span>*</span></label>
                                    <input type="text" id="permanent_address" name="permanent_address" class="form-control" placeholder="Your Address Here"  placeholder="Your Address">
                                  </div>
                                  <div class="form-group">
                                    <label for="">State<span>*</span></label>
                                    <select name="permanent_state" id="permanent_state" class="form-control">
                                      <option value="">Select State</option>
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
                                  <div class="form-group">
                                    <label for="">Pincode<span>*</span></label>
                                    <input type="text" id="permanent_pincode" name="permanent_pincode" class="form-control" placeholder="Pincode"  placeholder="Pin Code">
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                          <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4">
                              <button type="submit" name="Submit" class="actionButtonIcons-center">Submit</button>
                            </div>
                            <div class="col-lg-4"></div>
                          </div>
                        </form>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>