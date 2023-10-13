<?php
include_once '../db.php';
include_once "../session.php";
$upload_dir = 'uploads/';
?>
 
<?php
require_once('db.php');
$sql = "select * from user_login";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Password</span></h5>
              </div>
              <div class="createWidget" style="margin-top:-30px;">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-2">
                      <a href="company_profile.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-building"></i> Company Profile</button></a>
                    </div>
                    <div class="col-lg-2">
                      <a href="change_pwd.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-unlock-alt"></i> Change Password</button></a>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                      <a href="../user_AppStore/raise_shipment.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="widgetShipmentComp">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="dashWidgetTop">
                        <div class="well">
                          <div class="coy_profile_logo">
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
                          <p style="font-size: 0.8em;text-align: center;">Last updated on <?php echo $row['pic_upDate']; ?> </p>
                          <a href="update_photo.php?id=<?php echo $row['id'] ?>"> <button class="actionButtonCreate" >Update Logo</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="row">
                        <div class="col-lg-11">
                          <h4>Update Password</h4>
                        </div>
                        <div class="col-lg-1">
                        </div>
                      </div>
                      <div class="basicInfoUpdate">
                        <div class="formUpdate">
                          <p id="allFields"></p>
                          <form action="rs.php" class="templatemo-login-form" method="POST" onsubmit="return myvalidate();" name ="register">
                            <div class="row">
                              <div class="col-lg-12">
                                <label for="">User Id <span>*</span></label>
                                <div class="form-group">
                                  <input type="text" id="user_id" name="user_id" class="form-control" placeholder ="Employee ID">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <label for="">Choose Security Question <span>*</span></label>
                                  <select type="text" id="securityQuestion" name="Question" class="form-control" placeholder="Security Question">
                                    <option>Select Any Question</option>
                                    <option value="What is your nickname?">What is your nickname?</option>
                                    <option value="What is your fav spot?">What is your favourite spot?</option>
                                    <option value="What is your fav dish?">What is your favourite dish?</option>
                                    <option value="What is your dream land address?">What is your dream land address?</option>
                                    <option value="What is your first mobile number?">What is your first mobile number?</option>
                                    <option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know?</option>
                                    <option value="What is your detained years in life?">What is your detained years in life?</option>
                                    <option value="What is your pet's name?">What is your pet's name?</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="form-group">
                                  <input type="text" id="answer" name="Answer" class="form-control" placeholder="Answer" >
                                </div>
                                <div class="form-group">
                                  
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <div class="col-lg-4">
                                <button type="submit" class="actionButtonIcons">Send Request</button>
                              </div>
                              <div class="col-lg-4"></div>
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
function  myvalidate()
{
  var user_id = document.getElementById("user_id").value;
  var securityQuestion = document.getElementById("securityQuestion").value;
  var answer = document.getElementById("answer").value;
  if (user_id.length==0 ||securityQuestion.length==0 ||answer.length==0) 
  {
    document.getElementById('allFields').innerHTML = "* All Fields are required";
    return false;
  }
  else{
    return true;
      }
}
</script>
</body>
</html>