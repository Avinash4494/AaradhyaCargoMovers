<?php
include('updateUser.php')
?>
<?php
session_start();
if($_SESSION["username"]){
}
else {
header("location: index.php");
}
?>
<?php
include_once 'db.php';
$username = $_SESSION['username'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='$username'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Dashboard - <?php echo $row["Fullname"]; ?> </title>
  <head>
    <?php include_once 'navAdminLinks.php'?>
  </head>
  <div><?php include_once 'adminNavOthers.php' ?></div>
  
  <body onload="showtime(),kFormatter(),kWeightFormat()" >
    <div class="sectionHiddens"></div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2 hidden-xs">
          <div class="leftPannel">
            <div class="shortProfile">
              <div class="well">
                <div class="profilePic">
                  <?php
                  require_once "db.php";
                  $upload_dir = 'uploads/';
                  $username = $_SESSION['username'];
                  $query = mysqli_query($connect,
                  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
                  From admin_login as a
                  join admin_info as u
                  on a.USN = u.USN_id
                  WHERE USN='$username'");
                  $row = mysqli_fetch_assoc($query)
                  ?>
                  <img src="<?php echo $upload_dir.$row['image'] ?>"  class="img-responsive">
                  <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div id="status"></div>
                    </div>
                  </div>
                  <h4><?php echo $row["Fullname"]; ?></h4>
                  <h6><?php echo $row["Email"]; ?></h6>
                </div>
              </div>
            </div>
            <?php include_once 'sideNavProfile.php' ?>
          </div>
        </div><br class="hidden-lg">
        <div class="col-lg-10">
          <div class="rightPannelProfile" >
            <div class="dashIntro">
               <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ <a href="index.php">Manage Accounts</a> / Create Profile</h3>
                </div>
                <div class="timeName">
                  <div class="col-lg-3 col-xs-5">
                    <h3 id="show_time"></h3>
                  </div>
                  <div class="col-lg-5 col-xs-7">
                    <h3 style="float: right;"><span id="greetings"></span> <?php echo $row["Fullname"]; ?> </h3>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-11">
                  <h4>Create Profile</h4> <br>
                </div>
                <div class="col-lg-1">
                  <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
                </div>
              </div>
              <div class="profileDisplayComponent">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-12">
                      <form class="" name ="register" onsubmit="return myvalidate();" action="updateUser.php" method="post" enctype="multipart/form-data">
                        <input type="text" id="user_id" name="random_user_id" hidden="">
                        <div class="row">
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Username<span>*</span></label>
                              <input type="text" id="username" name="USN_id" class="form-control" placeholder="Username" >
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Date of Birth<span>*</span></label>
                              <input type="text" id="dob" name="dob" class="form-control" placeholder="Date of Birth" >
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Gender<span>*</span></label>
                              <input type="text" id="gender" name="gender" class="form-control" placeholder="Gender" >
                            </div>
                          </div>
                          <div class="col-lg-3 col-xs-12">
                            <div class="form-group">
                              <label for="">Alternate Number (Optional)</label>
                              <input type="text" id="" name="alternate_phone" class="form-control" placeholder="Alternate Number">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-8 col-xs-12">
                            <div class="row">
                              <div class="col-lg-6">
                                <h5>Present Address</h5>
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                      <label for="">Address<span>*</span></label>
                                      <input type="text" id="present_address" name="present_address" class="form-control" placeholder="Your Address Here">
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
                                      <input type="text" id="present_pincode" name="present_pincode" class="form-control" placeholder="Pincode">
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
                                      <input type="text" id="permanent_address" name="permanent_address" class="form-control" placeholder="Your Address Here" >
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
                                      <input type="text" id="permanent_pincode" name="permanent_pincode" class="form-control" placeholder="Pincode" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4 ">
                            <div class="updateProfilePic">
                              <div class="form-group">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control" name="image" id="image">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <button type="submit" name="Submit" class="signButton">Submit</button>
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
  </body>
</html>
<script>
function showtime() {
var today = new Date();
var slicedate=today.toString().slice(0,16);
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTime(m);
s = checkTime(s);
document.getElementById('show_time').innerHTML =
slicedate + " " + h + ":" + m + ":" + s;
var t = setTimeout(showtime, 500);
if(h>=1 && h<=12)
{
document.getElementById("greetings").innerHTML= 'Good Morning';
}
else if(h>=12 && h<=15)
{
document.getElementById("greetings").innerHTML= 'Good Afternoon';
}
else if(h>=15 && h<=18)
{
document.getElementById("greetings").innerHTML= "Good Evening";
}
else if(h>=18 && h<=24)
{
document.getElementById("greetings").innerHTML= "<i class='fas fa-cloud-moon'></i> Good Night";
}
function checkTime(i) {
if (i < 10) {i = "0" + i};
return i;
}
}
</script>