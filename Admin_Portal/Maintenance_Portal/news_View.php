 
<?php
require_once('../db.php');
$upload_dir = '../uploads/news-upload/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from web_news_upload where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from web_news_upload where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowMember = mysqli_fetch_assoc($result);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="news_View.php"; }, 100);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">News Index</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  
                  <div class="row">
                    <div class="col-lg-10">
                      <h5 style="margin-top: 0px;">News Index</h5>
                    </div>
                    <div class="col-lg-2">
                      <a href="addNews.php"><button class="actionButtonIcons-center"><i class="fa fa-plus"></i>&nbsp Add News</button></a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="newsComp" style="padding-top: 15px;">
                        <div class="well" style="padding: 10px;border:1px solid #1c2833;">
                          <div class="row">
                            <div class="col-lg-4">
                              <img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive"><br>
                              <div class="row">
                                <div class="col-lg-4">
                                  <a href="news_View.php?id=<?php echo $rowMember['id'] ?>">
                                    <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                                <div class="col-lg-4">
                                  <a href="news_edit.php?id=<?php echo $rowMember['id'] ?>">
                                    <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                  </a>
                                </div>
                                <div class="col-lg-4">
                                  <a href="news_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                    <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <h3><?php echo $rowMember["news_title"]; ?></h3>
                              <div class="row">
                                <div class="col-lg-6">
                                  <p>By <?php echo $rowMember["news_uploadeBy"]; ?></p>
                                </div>
                                <div class="col-lg-6">
                                  <p style="float: right;">Posted On <?php echo $rowMember["uploadDate"]; ?></p>
                                </div>
                              </div>
                              <p style="text-align: justify;"><?php echo $rowMember["news_descp"]; ?></p>
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