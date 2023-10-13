<?php
include('db.php');
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
setTimeout(function(){ window.location.href="All_vehicle_List.php"; }, 1000);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Vehicles Portal</title>
  <head>
  </head>
  
  <body>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top" >Vehicles Portal</a> / <span class="activePage"> All Vehicle</span> </h5>
              </div>
<div class="smallCont hidden-lg">
                 <?php
                          $per_page_record = 8;
                          if (isset($_GET["page"])) {
                          $page  = $_GET["page"];
                          }
                          else {
                          $page=1;
                          }
                          $start_from = ($page-1) * $per_page_record;
                          $query = "SELECT * FROM add_vehicle  LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          ?>
                                <div class="rectLongContent" style="margin-top: -10px;margin-bottom: 35px;">
                    <div class="rectWidge" >
                      
                      
                      <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                        <div class="row">
                          <div class="col-xs-12">
                            <h5 style="text-align: center;font-weight: bold;">Vehicle Id : <?php echo $rowMember['vehicle_id'] ?></h5>
                            <h5><b>Regis. No.</b> - <?php echo $rowMember['regis_num'] ?></h5>
                            <h5><b>Veh. Name</b> - <?php echo $rowMember['veh_name'] ?></h5>
                            <h5><b>Veh. Number </b> - <?php echo $rowMember['veh_num'] ?></h5>
                          </div>
                        </div>
                      </div>
                    </div>
                    <a href="vehicle_view.php?id=<?php echo $rowMember['id'] ?>">
                       <button class="actionButtonIcons-center" type="submit" data-toggle="tooltip" title="Print" data-placement="top"> View More &nbsp <i class="fa fa-eye"></i></button>
                    </a>
                  </div>
                     <?php
                          }
                          }
                          else{echo '<h3 style="color:red;position: absolute; font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                          ?>
</div>
              <div id="print_setion" class="hidden-xs">
                
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a href="receipt_reportVehicle.php">
                        <button class="actionButtonIcons-center" style="margin-top: -30px;" type="submit"><i class="fa fa-print"></i></button>
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <table class="css-serial table table-hover" width="100%">
                        <style>
                        .css-serial {
                        counter-reset: serial-number;  /* Set the serial number counter to 0 */
                        }
                        .css-serial td:first-child:before {
                        counter-increment: serial-number;  /* Increment the serial number counter */
                        content: counter(serial-number);  /* Display the counter */
                        }
                        </style>
                        <thead >
                          <tr>
                            <th>Sr. No.</th>
                            <th>Vehicle Id.</th>
                            <th>Registration No.</th>
                            <th>Vehicle Name</th>
                            <th>Vehicle No.</th>
                            <th>Type</th>
                            <th>Joining Date</th>
                            <th>Driver Id.</th>
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $per_page_record = 8;
                          if (isset($_GET["page"])) {
                          $page  = $_GET["page"];
                          }
                          else {
                          $page=1;
                          }
                          $start_from = ($page-1) * $per_page_record;
                          $query = "SELECT * FROM add_vehicle  LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          ?>
                          <tr>
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td ></td>
                            <td><b><a style="color: black;" href="vehicle_view.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['vehicle_id'] ?></a></b></td>
                            <td><?php echo $rowMember['regis_num'] ?></td>
                            <td><?php echo $rowMember['veh_name'] ?></td>
                            <td><?php echo $rowMember['veh_num'] ?></td>
                            <td><?php echo $rowMember['veh_type'] ?></td>
                            <td><?php echo $rowMember['veh_joinDt'] ?></td>
                            <td><?php echo $rowMember['driver_id'] ?></td>
                            <td>
                              <a href="vehicleEdit.php?id=<?php echo $rowMember['id'] ?>" >
                                <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil"></i></button>
                              </a>
                            </td>
                            <td>
                              <a href="All_vehicle_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                              </a>
                            </td>
                          </tr>
                          <?php
                          }
                          }
                          else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="row" >
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
                        echo "<a style='border:none;' href='All_Couriers_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                        }
                        for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                        $pagLink .= "<a class = 'active' href='All_Couriers_List.php?page="
                        .$i."'>".$i." </a>";
                        }
                        else  {
                        $pagLink .= "<a href='All_Couriers_List.php?page=".$i."'>
                        ".$i." </a>";
                        }
                        };
                        echo $pagLink;
                        if($page<$total_pages){
                        echo "<a style='border:none;' href='All_Couriers_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>