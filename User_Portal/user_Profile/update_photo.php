   <?php
                          require_once('db.php');
                          $upload_dir = 'uploads/';
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
                          error_reporting(0);
                          if(isset($_POST['Submit'])){
                          $pic_upDate = date("d-m-Y");
                          $imgName = $_FILES['profile_image']['name'];
                          $imgTmp = $_FILES['profile_image']['tmp_name'];
                          $imgSize = $_FILES['profile_image']['size'];
                          if($imgName){
                          $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
                          $allowExt  = array('jpeg', 'jpg', 'png', 'gif');
                          $userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
                          if(in_array($imgExt, $allowExt)){
                          if($imgSize < 5000000){
                          unlink($upload_dir.$row['profile_image']);
                          move_uploaded_file($imgTmp ,$upload_dir.$userPic);
                          }else{
                          $errorMsg = 'Image too large';
                          }
                          }else{
                          $errorMsg = 'Please select a valid image';
                          }
                          }else{
                          $userPic = $row['profile_image'];
                          }
                          if(!isset($errorMsg)){
                          $sql = "update user_login
                          set profile_image = '".$userPic."',
                          pic_upDate = '".$pic_upDate."'
                          where id=".$id;
                          $result = mysqli_query($connect, $sql);
                          if($result){
                          $successMsg = 'New record updated successfully';
                          echo '<script>
                          setTimeout(function(){ window.location.href="updateSuccess.php"; }, 500);
                          </script>';
                          }else{
                          $errorMsg = 'Error '.mysqli_error($connect);
                          }
                          }
                          }
                          ?>
                          <?php include_once '../session.php' ?>
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
                          <h4>Company Logo </h4>
                        </div>
                        <div class="col-lg-1">
                           
                        </div>
                      </div>
                      <div class="basicInfo">
                           
                          <div class="formUpdate" style="margin-top: 30px;">
                            
                            <div class="row">
                              <div class="col-lg-3"></div>
                              <div class="col-lg-6">
                                <div class="well">
                                  <form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
                                    <div class="form-group">
                                      <label for="image">Company Logo</label>
                                      <input type="file" class="form-control" name="profile_image" id="profile_image">
                                    </div>
                                    <button type="submit" name="Submit" class="actionButtonCreate">Upload</button>
                                  </form>
                                </div>
                              </div>
                              <div class="col-lg-3"></div>
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