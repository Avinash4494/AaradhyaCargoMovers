<?php
require_once('db.php');
$upload_dir = '../uploads/news-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from web_news_upload where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$news_title = $_POST['news_title'];
$news_source = $_POST['news_source'];
$news_uploadeBy = $_POST['news_uploadeBy'];
$news_descp = $_POST['news_descp'];
$imgName = $_FILES['image1']['name'];
$imgTmp = $_FILES['image1']['tmp_name'];
$imgSize = $_FILES['image1']['size'];
if($imgName){
$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
$allowExt  = array('jpeg', 'jpg', 'png', 'gif');
$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;
if(in_array($imgExt, $allowExt)){
if($imgSize < 5000000){
unlink($upload_dir.$rowedit['image1']);
move_uploaded_file($imgTmp ,$upload_dir.$userPic);
}else{
$errorMsg = 'Image too large';
}
}else{
$errorMsg = 'Please select a valid image';
}
}else{
$userPic = $rowedit['image'];
}
if(!isset($errorMsg)){
$sql = "update web_news_upload
set news_title = '".$news_title."',
news_source = '".$news_source."',
news_uploadeBy = '".$news_uploadeBy."',
news_descp = '".$news_descp."',
image1 = '".$userPic."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="news_index.php"; }, 100);
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
  </title>
  <head>
  </head>
  <title>Maintenance Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMaint.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Update News </span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-10">
                      
                    </div>
                    <div class="col-lg-2">
                      <a href="addNews.php"><button class="actionButtonIcons-center"><i class="fa fa-plus"></i>&nbsp Add News</button></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="newsComp" style="padding-top: 15px;">
                        <div class="well" style="padding: 10px;border:1px solid white;">
                          <div class="row">
                            <style>
                            .sideImage img{
                            margin-top: 25px;
                            }
                            span  {
                            color: red;
                            }
                            </style>
                            <div class="col-lg-4">
                              <div class="sideImage">
                                <img src="<?php echo $upload_dir.$rowedit['image1'] ?>" class="img-responsive">
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <form name ="register" onsubmit="return quotevalidate();" method="post" enctype="multipart/form-data" action="">
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                      <label for="">News Title <span>*</span></label>
                                      <input type="text" name="news_title" class="form-control" placeholder="News Title" value="<?php echo $rowedit['news_title'] ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-6 col-xs-12">
                                    <div class="updateProfilePic">
                                      <div class="form-group">
                                        <label for="image">Uploaded By <span>*</span></label>
                                        <input type="text" class="form-control" name="news_uploadeBy" id="image" value="<?php echo $rowedit['news_uploadeBy'] ?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-xs-12">
                                    <div class="updateProfilePic">
                                      <div class="form-group">
                                        <label for="image">News Source <span>*</span></label>
                                        <input type="text" class="form-control" name="news_source" id="news_source" value="<?php echo $rowedit['news_source'] ?>">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <div class="form-group">
                                      <label for="">News Description <span>*</span></label>
                                      <input name="news_descp" id="" class="form-control" value="<?php echo $rowedit['news_descp'] ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-9 col-xs-12">
                                    <div class="updateProfilePic">
                                      <div class="form-group">
                                        <label for="image">Choose Image</label>
                                        <input type="file" class="form-control" name="image1" id="image1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-xs-12">
                                    <button type="submit" name="Submit" style="margin-top: 25px;" class="actionButtonIcons-center">Save</button>
                                  </div>
                                </div>
                                <input type="text" id="next_follow" name="next_follow" hidden="">
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
  </body>
</html>