<?php
require_once('db.php');
$upload_dir = 'uploads/';
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

error_reporting(0); 
if(isset($_POST['Submit'])){

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
$sql = "update admin_login
set profile_image = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 500);
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
            <?php include_once 'topLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Photo</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Your Code Here --><h4>Update Photo</h4>
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-4">

                          </div>
                          <div class="col-lg-4">
                            <div class="personalData">
                                                                 <?php
                      $profile_image = $row['profile_image'];
                    
 if ($profile_image=='Null') 
 {
?>
<div class="nullImage">
  <img src="../../image/empWhite.png" class="img-responsive">
</div>
<?php

 }
else {
    ?>
    <div class="showImage">
      <img src="<?php echo $upload_direct.$row['profile_image']; ?>" class="img-responsive">
    </div>
    <?php
  }
                     ?>
      <style>
        .personalData .nullImage img{
          margin-left: 100px;
          height: 150px;
          width: 150px;
        }
         .personalData .showImage img{
          margin-left: 70px;
          height: 200px;
          border-radius: 50%;
          width: 200px;
          padding:3px;
          border:2px solid #00B8E0;
        }
      </style>
                              <div class="formSection">
                                <form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
                                 
                          <div class="form-group">
                            <label for="image">Select Image</label>
                            <input type="file" class="form-control" name="profile_image" id="profile_image">
                          </div>
                           <div class="row">
                             <div class="col-lg-4"></div>
                             <div class="col-lg-4">
                               <button type="submit" name="Submit" class="actionButtonIcons-center">Upload</button>
                             </div>
                             <div class="col-lg-4"></div>
                           </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
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