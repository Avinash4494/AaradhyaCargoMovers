<?php
include('gallery_process.php')
?>
<?php
include('db.php');
$upload_dir = '../uploads/gallery-upload/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from web_gallery_upload where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image1'];
unlink($upload_dir.$image);
$sql = "delete from web_gallery_upload where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="gallery_index.php"; }, 100);
</script>';
}
}
}
?>
<?php
require_once('db.php');
include_once '../session.php' ?>
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
              <?php include_once 'toLeftGallery.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Gallery Update</span></h5>
              </div>
              <div class="bodyComponent">
                <h4>Gallery Update</h4>
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="gallery_process.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="document_id" name="document_id"  hidden="">
                    <input type="date" id="uploadDate" name="uploadDate"  hidden="">
                    <div class="row">
                      <div class="col-lg-6 col-xs-12">
                        <div class="form-group">
                          <label for="">Image Description<span>*</span></label>
                          <input type="text" name="image_name" class="form-control" placeholder="Image Description Number">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="updateProfilePic">
                          <div class="form-group">
                            <label for="image">Chosse Image</label>
                            <input type="file" class="form-control" name="image1" id="image">
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                      </div>
                      <style type="text/css">
                      .actionButton{
                      margin-top: 25px;
                      }
                      </style>
                      <div class="col-lg-3 col-xs-12">
                        <button type="submit" name="Submit" class="actionButton">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <h5 style="margin-top: 0px;">Gallery Index</h5>
                  <?php
                   $upload_direct = '../uploads/gallery-upload/';
                    $per_page_record = 8;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM web_gallery_upload LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  ?>
                  <style>
                    .showDocumentEmp .well
                    {
                      background-color: transparent;
                      border-radius: 0px;
                      padding: 0px;
                      border:none;
                    }
                  </style>
                  <div class="col-lg-3">
                    <div class="showDocumentEmp">
                      <div class="well">
                        <img src="<?php echo $upload_direct.$rowMember['image1'] ?>" class="img-responsive">
                      </div>
                      <p><?php echo $rowMember["image_name"]; ?></p>
                    </div>
                    <a href="gallery_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                      <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                    </a>
                  </div>
                  <?php
                  }
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                  ?>
                </div>
              </div>
                                 <div class="row" >
                      <div class="col-lg-8 col-xs-12"  >
                        <div class="pagination" style="margin-top: 15px;margin-bottom: 20px;">
                          <?php
                          $query = "SELECT COUNT(*) FROM web_gallery_upload";
                          $rs_result = mysqli_query($connect, $query);
                          $row = mysqli_fetch_row($rs_result);
                          $total_records = $row[0];
                          // Number of pages required.
                          $total_pages = ceil($total_records / $per_page_record);
                          $pagLink = "";
                          if($page>=2){
                          echo "<a style='border:none;' href='gallery_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                          }
                          for ($i=1; $i<=$total_pages; $i++) {
                          if ($i == $page) {
                          $pagLink .= "<a class = 'active' href='gallery_index.php?page="
                          .$i."'>".$i." </a>";
                          }
                          else  {
                          $pagLink .= "<a href='gallery_index.php?page=".$i."'>
                          ".$i." </a>";
                          }
                          };
                          echo $pagLink;
                          if($page<$total_pages){
                          echo "<a style='border:none;' href='gallery_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-lg-4 col-xs-12" >
                        <div class="pagination" style="float: right;">
                          <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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