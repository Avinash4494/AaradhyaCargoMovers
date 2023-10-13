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
$docketNumber = $_POST['docketNumber'];
$sname = $_POST['sname'];
$smobile = $_POST['smobile'];
$semail = $_POST['semail'];
$saddress = $_POST['saddress'];
$tofpkts = $_POST['tofpkts'];
$actualwt = $_POST['actualwt'];
$courierdate = $_POST['courierdate'];
$rname = $_POST['rname'];
$rmobile = $_POST['rmobile'];
$remail = $_POST['remail'];
$raddress = $_POST['raddress'];
$cost = $_POST['cost'];
$nofpkts = $_POST['nofpkts'];
$chargewt = $_POST['chargewt'];
$descri = $_POST['descri'];
$imgName = $_FILES['image']['name'];
$imgTmp = $_FILES['image']['tmp_name'];
$imgSize = $_FILES['image']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
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
$sql = "update addcourier
set docketNumber = '".$docketNumber."',
sname = '".$sname."',
smobile = '".$smobile."',
semail = '".$semail."',
saddress = '".$saddress."',
tofpkts = '".$tofpkts."',
actualwt = '".$actualwt."',
courierdate = '".$courierdate."',
rname = '".$rname."',
rmobile = '".$rmobile."',
remail = '".$remail."',
raddress = '".$raddress."',
cost = '".$cost."',
nofpkts = '".$nofpkts."',
chargewt = '".$chargewt."',
descri = '".$descri."',
image = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
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
  <title>Update Courier - <?php echo $row["Fullname"]; ?></title>
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
 
        
        <div class="col-lg-10">
          <div class="rightPannelProfile" >
            <div class="dashIntro" >
            <div class="rightPaggignation" >
              <div class="row">
                <div class="col-lg-4 col-xs-10">
                  <h3><a href="../AdminDashboard.php" data-toggle="tooltip" title="Home" class="red-tooltip" data-placement="left"><i class="fa fa-home"></i> Dashboard </a>/ Update Courier </h3>
                </div>
                <div class="col-xs-2 hidden-lg">
                  <a href="index.php">
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
            <div class="row">
              <div class="col-lg-12">
                <div class="courierAddComponent" style="margin-top: -30px;">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                    <input type="text" id="courier_id" name="courier_id" hidden="">
                    <div class="row">
                      <div class="col-lg-6">
                        <h4>Consigner Details</h4>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Docket Number :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control"  name="docketNumber" required="" value="<?php echo $rowedit['docketNumber'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Sender Name :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="sname" name="sname" required="" value="<?php echo $rowedit['sname'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Sender Mobile :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="smobile" name="smobile" required="" value="<?php echo $rowedit['smobile'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Sender Email :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="email" class="form-control" id="semail" name="semail" required="" value="<?php echo $rowedit['semail'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Departure Place:</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="saddress" name="saddress" required="" value="<?php echo $rowedit['saddress'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Type of Frieght :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <select name="tofpkts" id="tofpkts" class="form-control"  value="<?php echo $rowedit['tofpkts'] ?>">
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
                              <input type="text" class="form-control" id="saddress" name="actualwt" required="" value="<?php echo $rowedit['actualwt'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Description :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" name="descri" placeholder="Description" id="Description"  class="form-control"  value="<?php echo $rowedit['descri'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4">
                            <img src="<?php echo $upload_dir.$rowedit['image'] ?>" class="img-responsive">
                            <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i> </button>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="myModal1" role="dialog">
                            <div class="modal-dialog modal-lg">
                              <div class="modal-content" >
                                <div class="modal-header">
                                  <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                                </div>
                                <div class="modal-body">
                                  <img src="<?php echo $upload_dir.$rowedit['image'] ?>" class="img-responsive">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <label for="contact">Upload Image</label>
                              <input type="file" class="form-control" name="image" id="image" >
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
                              <input type="text" class="form-control" id="rname" name="courierdate" required="" value="<?php echo $rowedit['courierdate'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Reciever Name :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="rname" name="rname" required="" value="<?php echo $rowedit['rname'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Reciever Mobile :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="rmobile" name="rmobile" required="" value="<?php echo $rowedit['rmobile'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Reciever Email :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="email" class="form-control" id="remail" name="remail" required="" value="<?php echo $rowedit['remail'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Arrival Place :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="radd" name="raddress" required="" value="<?php echo $rowedit['raddress'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Grand Total :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="radd" name="cost" required="" value="<?php echo $rowedit['cost'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">No. of Packets. :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group">
                              <input type="text" class="form-control" id="saddress" name="nofpkts" required="" value="<?php echo $rowedit['nofpkts'] ?>">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-4"> <label for="usr">Chargeable Weight :</label></div>
                          <div class="col-lg-8">
                            <div class="form-group" value="254789">
                              <input type="text" class="form-control" id="saddress" name="chargewt" required="" value="<?php echo $rowedit['chargewt'] ?>">
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
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html