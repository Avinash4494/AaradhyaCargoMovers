<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<?php
include('db.php');
error_reporting(0);
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from web_network_upload where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowMember = mysqli_fetch_assoc($result);
$image = $row['image1'];
unlink($upload_direct.$image);
$sql = "delete from web_network_upload where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="network_index.php"; }, 100);
</script>';
}
}
}
?>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Network Index</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  
                  <div class="row">
                    <div class="col-lg-10">
                      <h5 style="margin-top: 0px;">Network Index</h5>
                    </div>
                    <div class="col-lg-2">
                      <a href="addOffice.php"><button class="actionButtonIcons-center"><i class="fa fa-plus"></i>&nbsp Add Network</button></a>
                    </div>
                  </div>
                  <div class="row">
                    <?php
                    $per_page_record = 9;
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM web_network_upload LIMIT $start_from, $per_page_record ";
                    $rs_result = mysqli_query ($connect, $query);
                    if(mysqli_num_rows($rs_result)){
                    while ($rowMember = mysqli_fetch_array($rs_result)) {
                    ?>
                    <div class="col-lg-12">
                      <div class="newsComp" style="padding-top: 5px;" >
                        <div class="well" style="border:1px solid red;border-radius: 5px;padding: 10px;">
                          <style>
                            .newsComp p{margin: 3px;}
                          </style>
                          <div class="row">
                            <div class="col-lg-3">
                              <p> Office Name : <?php echo $rowMember["net_offName"]; ?></p>
                              <p> Office Id. : <?php echo $rowMember["network_id"]; ?></p>
                              <p> Contact : <?php echo $rowMember["net_mobile"]; ?></p>
                            </div>
                            <div class="col-lg-2">
                              <p>Pincode : <?php echo $rowMember["net_pin"]; ?></p>
                              <p>Town/City : <?php echo $rowMember["net_townCity"]; ?></p>
                              <p>State : <?php echo $rowMember["net_State"]; ?></p>
                            </div>
                            <div class="col-lg-5">
                              
                               <p>Landmark : <?php echo $rowMember["net_landmark"]; ?></p>
                               <p>Area,Street,Sector : <?php echo $rowMember["net_address"]; ?></p>
                              <p>Address Type : <?php echo $rowMember["net_addressType"]; ?></p>
                            </div>
                            <div class="col-lg-2">
                              <div class="sideButton" style="padding-top: 12px;">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <a href="network_edit.php?id=<?php echo $rowMember['id'] ?>">
                                      <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                    </a>
                                  </div>
                                  <div class="col-lg-6">
                                    <a href="network_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                      <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
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
                      $query = "SELECT COUNT(*) FROM web_news_upload";
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
    </div>
  </body>
</html>