<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from employee_login where id=".$id;
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
$pan_num = $_POST['pan_num'];
$aadhar_num = $_POST['aadhar_num'];
$aadhar_name = $_POST['aadhar_name'];
$aadhar_dob = $_POST['aadhar_dob'];
$country_birth = $_POST['country_birth'];
$blood_grp = $_POST['blood_grp'];
$birth_place = $_POST['birth_place'];
$martial_status = $_POST['martial_status'];
$father_name = $_POST['father_name'];
$father_dob = $_POST['father_dob'];
$nationality = $_POST['nationality'];
$profile_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update employee_login
set
dob = '".$dob."',
gender = '".$gender."',
alternate_phone = '".$alternate_phone."',
pan_num = '".$pan_num."',
aadhar_num = '".$aadhar_num."',
aadhar_name = '".$aadhar_name."',
aadhar_dob = '".$aadhar_dob."',
country_birth = '".$country_birth."',
blood_grp = '".$blood_grp."',
birth_place = '".$birth_place."',
martial_status = '".$martial_status."',
father_name = '".$father_name."',
father_dob = '".$father_dob."',
nationality = '".$nationality."',
profile_upDate = '".$profile_upDate."'
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
require_once('db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php
              $dob = $row['dob'];
              $gender = $row['gender'];
              $alternate_phone = $row['alternate_phone'];
              $pan_num = $row['pan_num'];
              $aadhar_num = $row['aadhar_num'];
              $aadhar_name = $row['aadhar_name'];
              $aadhar_dob = $row['aadhar_dob'];
              $country_birth = $row['country_birth'];
              $blood_grp = $row['blood_grp'];
              $birth_place = $row['birth_place'];
              $martial_status = $row['martial_status'];
              
              if ($dob==''||$gender==''||$alternate_phone==''||$pan_num==''||$aadhar_num==''||$aadhar_name==''||$aadhar_dob==''||$country_birth==''||$blood_grp==''||$birth_place==''||$martial_status=='')
              {
              ?>
              
              <?php
              }
              else{
              ?>
              <?php include_once 'topLeftPannel.php' ?>
              <?php
              }
              ?>
              
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Create Profile</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <div class="row">
                        <div class="col-lg-6">
                          <h4>Create Profile</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Information was last updated on : <?php echo $row['profile_upDate'] ?></h6>
                        </div>
                      </div>
                      <div class*="row">
                        <div class="col-lg-12">
                          <p id="AllFields"></p>
                          <div class="profileDisplayComponent">
                            <div class="well">
                              
                              <div class="formSection">
                                <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                                  <input type="text" id="user_id" name="random_user_id" hidden="">
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Employee ID<span>*</span></label>
                                        <input type="text" id="employees_id" name="employees_id" class="form-control" value="<?php echo $row['employees_id']?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Date of Birth<span>*</span></label>
                                        <input type="text" id="dob" name="dob" placeholder="Date of Birth" class="form-control" value="<?php echo $row['dob']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Gender<span>*</span></label>
                                        <select name="gender" id="gender" class="form-control">
                                          <option value="Null">Select Any</option>
                                          <option value="Male">Male</option>
                                          <option value="Female">Female</option>
                                        </select>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Father's Name<span>*</span></label>
                                        <input type="text" id="father_name" name="father_name" class="form-control" placeholder="Father's Name" value="<?php echo $row['father_name']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Father's Date of Birth<span>*</span></label>
                                        <input type="text" id="father_dob" name="father_dob" class="form-control" placeholder ="Father's Date of Birth" value="<?php echo $row['father_dob']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Nationality<span>*</span></label>
                                        <input type="text" id="nationality" name="nationality" class="form-control" placeholder ="Nationality" value="<?php echo $row['nationality']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <style>
                                  .formSection span
                                  {
                                  color: red;
                                  padding-left: 5px;
                                  }
                                  .formSection p
                                  {font-size: 0.8em;
                                  padding-top: 5px;
                                  margin-bottom: -10px;
                                  }
                                  </style>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Alternate Phone (Optional)</label>
                                        <input type="text" id="contact" onkeyup="contactValidate()"  name="alternate_phone" class="form-control" placeholder ="Alternate Phone Number" value="<?php echo $row['alternate_phone']?>">
                                        <p id='contactError'></p>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">PAN Number<span>*</span></label>
                                        <input type="text" onkeyup="panValidate()" id="pan_num" name="pan_num" placeholder="PAN Number" class="form-control"  value="<?php echo $row['pan_num']?>">
                                        <p id='panError'></p>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Blood Group<span>*</span></label>
                                        <input type="text" id="blood_grp" name="blood_grp" placeholder="Blood Group" class="form-control" value="<?php echo $row['blood_grp']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Aadhar Number<span>*</span></label>
                                        <input type="text" id="aadhar_num" onkeyup="aadharValidate()" name="aadhar_num" placeholder="Aadhar Number" class="form-control" value="<?php echo $row['aadhar_num']?>">
                                        <p id='aadharError'></p>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Name as per aadhar<span>*</span></label>
                                        <input type="text" id="aadhar_name" name="aadhar_name" class="form-control" placeholder ="Name as per aadhar" value="<?php echo $row['aadhar_name']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Date of Birth as per aadhar<span>*</span></label>
                                        <input type="text" id="aadhar_dob" name="aadhar_dob" class="form-control" placeholder ="Date of birth as per aadhar" value="<?php echo $row['aadhar_dob']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Country of Birth<span>*</span></label>
                                        <input type="text" id="country_birth" name="country_birth" class="form-control" placeholder="Country of Birth" value="<?php echo $row['country_birth']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Place of Birth<span>*</span></label>
                                        <input type="text" id="birth_place" name="birth_place" class="form-control" placeholder ="Place of Birth" value="<?php echo $row['birth_place']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Martial Status<span>*</span></label>
                                        <input type="text" id="martial_status" name="martial_status" class="form-control" placeholder ="Martial Status" value="<?php echo $row['martial_status']?>">
                                      </div>
                                    </div>
                                  </div>
                                  
                                  <div class="row">
                                    <div class="col-lg-5"></div>
                                    
                                    <div class="col-lg-2">
                                      <button type="submit" style="margin-top: 5px;" name="Submit" class="actionButtonProfile-center">Submit</button>
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
        </div>
      </div>
    </div>
  </body>
</html>
<script>
function myvalidate()
{
var employees_id=document.getElementById("employees_id").value;
var dob=document.getElementById("dob").value;
var gender=document.getElementById("gender").value;
var father_name=document.getElementById("father_name").value;
var father_dob=document.getElementById("father_dob").value;
var nationality=document.getElementById("nationality").value;
var contact=document.getElementById("contact").value;
var pan_num=document.getElementById("pan_num").value;
var blood_grp=document.getElementById("blood_grp").value;
var aadhar_num=document.getElementById("aadhar_num").value;
var aadhar_name=document.getElementById("aadhar_name").value;
var aadhar_dob=document.getElementById("aadhar_dob").value;
var country_birth=document.getElementById("country_birth").value;
var birth_place=document.getElementById("birth_place").value;
var martial_status=document.getElementById("martial_status").value;


if(employees_id.length==0||dob.length==0||gender.length==0||father_name.length==0||father_dob.length==0||nationality.length==0||contact.length==0||pan_num.length==0||blood_grp.length==0||aadhar_num.length==0||aadhar_name.length==0||aadhar_dob.length==0||country_birth.length==0||birth_place.length==0||martial_status.length==0)
{
document.getElementById("AllFields").innerHTML="* All Fields are required";
return false;
}
else
{
document.getElementById("AllFields").innerHTML="";
return true;
}
}
function contactValidate()
{
var contact = document.forms["register"]["contact"];
if (contact.value == "")
{
document.getElementById("contactError").innerHTML="Contact Number shouldn't be empty.";
contact.focus();
return false;
}
else
{
document.getElementById("contactError").innerHTML="";
}
if (contact.value.length<10)
{
document.getElementById("contactError").innerHTML="Contact Number shouldn't be less than 10 digits.";
contact.focus();
return false;
}
else
{
document.getElementById("contactError").innerHTML="";
}
if (contact.value.length>10)
{
document.getElementById("contactError").innerHTML="Contact Number shouldn't be more than 10 digits.";
contact.focus();
return false;
}
else
{
document.getElementById("contactError").innerHTML="";
}
}
function aadharValidate()
{
var aadhar_num = document.forms["register"]["aadhar_num"];
if (aadhar_num.value == "")
{
document.getElementById("aadharError").innerHTML="Aadhar Number shouldn't be empty.";
aadhar_num.focus();
return false;
}
else
{
document.getElementById("aadharError").innerHTML="";
}
if (aadhar_num.value.length<12)
{
document.getElementById("aadharError").innerHTML="Aadhar Number shouldn't be less than 12 digits.";
aadhar_num.focus();
return false;
}
else
{
document.getElementById("aadharError").innerHTML="";
}
if (aadhar_num.value.length>12)
{
document.getElementById("aadharError").innerHTML="Aadhar Number shouldn't be more than 12 digits.";
aadhar_num.focus();
return false;
}
else
{
document.getElementById("aadharError").innerHTML="";
}
}
function panValidate()
{
var pan_num = document.forms["register"]["pan_num"];
if (pan_num.value == "")
{
document.getElementById("panError").innerHTML="PAN Number shouldn't be empty.";
pan_num.focus();
return false;
}
else
{
document.getElementById("panError").innerHTML="";
}
if (pan_num.value.length<10)
{
document.getElementById("panError").innerHTML="PAN Number shouldn't be less than 10 digits.";
pan_num.focus();
return false;
}
else
{
document.getElementById("panError").innerHTML="";
}
if (pan_num.value.length>10)
{
document.getElementById("panError").innerHTML="PAN Number shouldn't be more than 10 digits.";
pan_num.focus();
return false;
}
else
{
document.getElementById("panError").innerHTML="";
}
}
</script>