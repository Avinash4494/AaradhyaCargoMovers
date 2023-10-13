<?php
require_once('db.php');
$upload_dir = 'uploads/members-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$martialStatus = $_POST['martialStatus'];
$medicalHistory = $_POST['medicalHistory'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alternate_phone = $_POST['alternate_phone'];
$aadharNo = $_POST['aadharNo'];
$remarks = $_POST['remarks'];
$present_address = $_POST['present_address'];
$state = $_POST['state'];
$present_pincode = $_POST['present_pincode'];
$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = $firstName.' '.$lastName.'_'.$phone.'.'.$imgExt;
if(in_array($imgExt, $allowExt)){
if($imgSize < 5000000){
unlink($upload_dir.$row['image']);
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
$sql = "update add_member
set firstName = '".$firstName."',
lastName = '".$lastName."',
dob = '".$dob."',
age = '".$age."',
martialStatus = '".$martialStatus."',
medicalHistory = '".$medicalHistory."',
email = '".$email."',
phone = '".$phone."',
alternate_phone = '".$alternate_phone."',
aadharNo = '".$aadharNo."',
present_address = '".$present_address."',
present_pincode = '".$present_pincode."',
remarks = '".$remarks."',
image = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="all_Members_List.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Member Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'topPannelEdit.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
             <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Update Member</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Update Member</h4>
                <!-- Your Code Here -->
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                    <input type="text" id="membership_id" name="membership_id" hidden="">
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">First Name<span>*</span></label>
                          <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $row['firstName']?>" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Last Name<span>*</span></label>
                          <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row['lastName']?>"  >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Date of Birth<span>*</span></label>
                          <input type="date" id="dob" name="dob" class="form-control" value="<?php echo $row['dob']?>"  >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Age</label>
                          <input type="text" id="" name="age" class="form-control" value="<?php echo $row['age']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Martial Status<span>*</span></label><br>
                          <input type="radio" id="gender_male" name="martialStatus"  value="Married"> <label for="">&nbsp Married</label>
                          &nbsp &nbsp
                          <input type="radio" id="gender_female" name="martialStatus"  value="Unmarried" > <label for="">&nbsp Unmarried</label>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Medical History</label>
                          <input type="text" id="medicalHistory" name="medicalHistory" class="form-control" placeholder="Medical History" value="<?php echo $row['medicalHistory']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Email<span>*</span></label>
                          <input type="email" id="email" name="email" class="form-control" placeholder="Email" value="<?php echo $row['email']?>" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Mobile Number<span>*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Alternate Number (Optional)</label>
                          <input type="text" id="alternate_phone" name="alternate_phone" class="form-control" value="<?php echo $row['alternate_phone']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Aadhar Card No.</label>
                          <input type="text" id="aadharNo" name="aadharNo" class="form-control" value="<?php echo $row['aadharNo']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Address<span>*</span></label>
                          <input type="text" id="present_address" name="present_address" class="form-control" value="<?php echo $row['present_address']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">State<span>*</span></label>
                          <select name="state" id="state" class="form-control">
                            <option value="<?php echo $row['state'] ?>" ><b><?php echo $row['state'] ?></b></option>
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
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Pincode<span>*</span></label>
                          <input type="text" id="present_pincode" name="present_pincode" class="form-control" placeholder="Pincode" value="<?php echo $row['present_pincode']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Remarks</label>
                          <input type="text" id="remarks" name="remarks" class="form-control" value="<?php echo $row['remarks']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <img src="<?php echo $upload_dir.$row['image'] ?>" width="100">
                      </div>
                      <div class="col-lg-3">
                        <div class="form-group">
                          <label for="contact">Update Image</label>
                          <input type="file" class="form-control" name="image" id="image" >
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-3">
                      <button type="reset" class="actionButton">Cancel</button>
                    </div>
                    <div class="col-lg-3">
                      <button type="submit" name="Submit" class="actionButton">Submit</button>
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