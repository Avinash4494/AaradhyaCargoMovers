<?php
include('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_vehicle where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_vehicle where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="vehicle_index.php"; }, 100);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Vehicles Portal</title>
  <body onload="showtime();">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftVehicle.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Vehicles Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="row">
                  <div class="col-lg-3">
                    <?php
                    $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  add_vehicle");
                    while($rowUser = mysqli_fetch_array($resultUser))  {
                    ?>
                    <div class="widgetsReport" >
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Total Vehicles </p>
                        </div>
                      </div>
                    </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="col-lg-4">
                    <?php
                    $query_run = mysqli_query($connect,"SELECT * FROM add_vehicle");
                    $totalAmount= 0;
                    while ($num = mysqli_fetch_array($query_run)) {
                    
                    }
                    ?>
                    <div class="widgetsReport" >
                      <div class="well">
                        <div class="rectContent" >
                          <h4><i class="fa fa-inr"></i> <span id="amountString"></span>.00</h4>
                          <p>Total Payments</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  
                  
                  <?php
                  $per_page_record = 5;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM add_vehicle LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  ?>
                  <div class="col-lg-3">
                    <div class="rectLongContentImg hidden-xs">
                      <div class="rectWidget">
                        <div class="well">
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="vehicleImg">
                                <div class="vehiclewell">
                                  <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
                                </div>
                                <h5><?php echo $rowMember['veh_name'] ?></h5>
                                <p>Vehicle Type : <?php echo $rowMember['veh_type'] ?></p>
                                <p>Registration No :<?php echo $rowMember['regis_num'] ?></p>
                                <p>Vehicle No : <?php echo $rowMember['veh_num'] ?></p>
                                <p>Joining Date : <?php echo $rowMember['veh_joinDt'] ?></p>
                                
                              </div>
                            </div>
                          </div>
                          <div class="vehicleIcons">
                            <div class="row">
                            <div class="col-lg-12"  >

                                <a  href="vehicle_view.php?id=<?php echo $rowMember['id'] ?>">
<button class="actionButtonVehicle-center" type="submit">View More</button>
                                  
                                   
                                </a> 
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
                    <div class="row hidden-xs" >
                      <div class="col-lg-8 col-xs-12"  >
                        <div class="pagination" >
                          <?php
                          $query = "SELECT COUNT(*) FROM addcourier";
                          $rs_result = mysqli_query($connect, $query);
                          $row = mysqli_fetch_row($rs_result);
                          $total_records = $row[0];
                          // Number of pages required.
                          $total_pages = ceil($total_records / $per_page_record);
                          $pagLink = "";
                          if($page>=2){
                          echo "<a style='border:none;' href='courier_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                          }
                          for ($i=1; $i<=$total_pages; $i++) {
                          if ($i == $page) {
                          $pagLink .= "<a class = 'active' href='courier_index.php?page="
                          .$i."'>".$i." </a>";
                          }
                          else  {
                          $pagLink .= "<a href='courier_index.php?page=".$i."'>
                          ".$i." </a>";
                          }
                          };
                          echo $pagLink;
                          if($page<$total_pages){
                          echo "<a style='border:none;' href='courier_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
    <script>
    function printDivSection(setion_id) {
    var Contents_Section = document.getElementById(setion_id).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = Contents_Section;
    window.print();
    document.body.innerHTML = originalContents;
    }
    </script>