<?php
session_start();
error_reporting(0);
if($_SESSION["username"]){
}
else {
header("location:index.php");
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
  <title>Add Courier - <?php echo $row["Fullname"]; ?></title>
  <?php include_once '../navAdminLinks.php'?>
  <div><?php include_once 'adminNavOthers.php' ?></div>
<section id="sectionHide" style="padding-top: 20px;"></section>
<body onload="showtime()" >
  <div class="sectionHiddens"></div>
  <?php
  require_once "db.php";
  $upload_dir = '../Profie_Portal/uploads/';
  $username = $_SESSION['username'];
  $query = mysqli_query($connect,
  "SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender,u.alternate_phone,u.present_address,u.present_state,u.present_state,u.present_pincode,u.permanent_address,u.permanent_state,u.permanent_pincode,u.image
  From admin_login as a
  join admin_info as u
  on a.USN = u.USN_id
  WHERE USN='$username'");
  $row = mysqli_fetch_assoc($query)
  ?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 hidden-xs">
        <div class="leftPannel">
          <div class="shortProfile">
            <div class="well">
              <div class="profilePic">
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
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
          <?php include_once 'sideNavCourierPortal.php' ?>
        </div>
      </div>
      <?php
      include('db.php');
      if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $sql = "select * from addcourier where id = ".$id;
      $result = mysqli_query($connect, $sql);
      if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from addcourier where id=".$id;
      if(mysqli_query($connect, $sql)){
      echo '<script>
      setTimeout(function(){ window.location.href="deleteCourier.php"; }, 500);
      </script>';
      }
      }
      }
      ?>
      <div class="col-lg-10">
        <div class="rightPannelProfile" >
          <div class="dashIntro" >
            <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-10">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Add Courier </h3>
                </div>
                <div class="col-xs-2 hidden-lg">
                  <a href="index.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left">
                    <button class="universalButtonAdd"><i class="fa fa-home" aria-hidden="true"></i></button>
                  </a>
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
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="addCourierProcess.php">
                      <input type="text" id="courier_id" name="courier_id" hidden="">
                      <div class="row">
                        <div class="col-lg-6">
                          <h4>Consigner Details</h4>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Docket Number :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control"  name="docketNumber" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Sender Name :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="sname" name="sname" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Sender Mobile :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="smobile" name="smobile" required="" value="0258">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Sender Email :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="email" class="form-control" id="semail" name="semail" required="" value="a@gmail.com">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Departure Place:</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="saddress" required="" value="25879">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Type of Frieght :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <select name="tofpkts" id="tofpkts" class="form-control" >
                                  <option value="Select">Select type of Pakects</option>
                                  <option value="Boxes">Boxes</option>
                                  <option value="Fragile">Fragile Goods</option>
                                  <option value="Dry">Dry Goods</option>
                                  <option value="Vegetables">Vegetables</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Actual Weight :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="actualwt" required="" value="25879">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Description :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" name="descri" placeholder="Description" id="Description"  class="form-control"  value="We are known for offering reliable Rail Cargo Services">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="image">Upload Image</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="file" class="form-control" name="image" id="image">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <h4>Consignee Details</h4>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Bill Date :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="rname" name="courierdate" required="" value="265799">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Reciever Name :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="rname" name="rname" required="" value="265799">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Reciever Mobile :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="rmobile" name="rmobile" required="" value="265799">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Reciever Email :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="email" class="form-control" id="remail" name="remail" required="" value="e@gmail.com">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Arrival Place :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="radd" name="raddress" required="" value="254789">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Grand Total :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="radd" name="cost" required="" value="254789">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">No. of Packets. :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" id="saddress" name="nofpkts" required="" value="254789">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"> <label for="usr">Chargeable Weight :</label></div>
                            <div class="col-lg-8">
                              <div class="form-group" value="254789">
                                <input type="text" class="form-control" id="saddress" name="chargewt" required="" value="2157">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-4 col-xs-6">
                              <button type="reset" name="reset" class="universalButton">Reset</button>
                            </div>
                            <div class="col-lg-4 col-xs-6">
                              <button type="submit" name="Submit" onclick="quoteValidate()" class="universalButton">Submit</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      
                      <div class="row">
                        <div class="col-lg-12">
                          
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