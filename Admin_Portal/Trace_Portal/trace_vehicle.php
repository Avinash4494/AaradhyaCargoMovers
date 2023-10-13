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
  <title>Finder Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftFinder.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Vehicle Search</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="Mainheading">
                  <div class="row">
                    <div class="col-lg-12 col-xs-10" >
                      <h5><b>Vehicle Search</b></h5>
                    </div>
                  </div>
                </div>
                <form action="trace_vehicle.php" method="post">
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                      <p>Search by Vehicle Number or Vehicle Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="word"  name="dock_number"  autocomplete="off" placeholder="Enter Vehicle ID or Vehicle Number"  required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    include('db.php');
                    $upload_dir = '../uploads/vehicle-upload/';
                    if(isset($_POST['click'])){
                    $dock_num = $_POST['dock_number'];
                    $q = "SELECT * FROM add_vehicle where (vehicle_id = '$dock_num') or (veh_num = '$dock_num')";
                    $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                    if(mysqli_num_rows($result)>=1){
                    while($rowMember = mysqli_fetch_assoc($result)){
                    ?>
                    <div class="Mainheading">
                      <div class="row">
                        <div class="col-lg-11 col-xs-10" >
                          <h5><b>Vehicle Details</b></h5>
                        </div>
                        <div class="buttonTop">
                          <div class="col-lg-1 col-xs-2" >
                            <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="rectLongContentImg hidden-xs">
                      <div class="rectWidget">
                        <div class="well">
                          <div class="row">
                            <div class="col-lg-3">
                              <div class="vehicleImg">
                                <div class="vehiclewell">
                                  <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
                                </div>
                                <h5><?php echo $rowMember['veh_name'] ?></h5>
                              </div>
                            </div>
                            <div class="col-lg-9">
                              <div class="vehicleContent">
                                <h5>Vehicle Details</h5>
                                <div class="row">
                                  <div class="col-lg-6">
                                    <p>Vehicle Type : <?php echo $rowMember['veh_type'] ?></p>
                                    <p>Registration No :<?php echo $rowMember['regis_num'] ?></p>
                                    <p>Vehicle No : <?php echo $rowMember['veh_num'] ?></p>
                                  </div>
                                  <div class="col-lg-6">
                                    <p>Joining Date : <?php echo $rowMember['veh_joinDt'] ?></p>
                                    <p>Driver Name : <?php echo $rowMember['veh_driver'] ?></p>
                                    <p>Driver Id : <?php echo $rowMember['driver_id'] ?></p>
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
                <div id="print_setion" class="hidden-xs hidden-lg" style="border:2px solid black;padding: 5px; margin-bottom: 30px; ">
                  <h4 style="text-align: center;margin: 0px;">Vehicle Details</h4><br>
                  <div class="courier_view">
                    <table class="tablePrint hidden-xs" border="0" width="100%">
                      <tbody>
                        <tr>
                          <td width="300px">
                            <img src="../image/mainLogo.png" alt="" height="50px" width="200px">
                            <h4 style="margin-left: 20px;">GSTIN : 29DJIPS6581L2Z5</h4>
                          </td>
                          <td width="300px">
                            <img src="../image/Picture1.png" alt="" class="img-responsive" style="height: 70px;margin-left: 100px;margin-top: -30px;">
                          </td>
                          <td width="400px">
                            <p style="text-align: left; margin: 0px;padding-bottom:15px;"><b>Registred Office:</b><br>
                              +91 9113855664 | +91 9743866386 <br>
                              aaradhyacargomovers@gmail.com <br>
                              #26, 1st Floor, Yeshwantpur 1st Main Road Mathikere,
                            <br>Land Mark : Opp. Coffe Santhe Hotel, Banglore, 560054</p>
                          </td>
                        </tr>
                      </tbody>
                    </table><br>
                    <table class="tablePrintdetails" border="1"  width="100%">
                      <thead>
                        
                        <h5><b>Vehicle Details</b></h5>
                        <tr>
                          <th>Vehicle Id.</th>
                          <th>Registration No.</th>
                          <th>Vehicle Name</th>
                          <th>Vehicle No.</th>
                          <th>Type</th>
                          <th>Joining Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $rowMember['vehicle_id'] ?></td>
                          <td><?php echo $rowMember['regis_num'] ?></td>
                          <td><?php echo $rowMember['veh_name'] ?></td>
                          <td><?php echo $rowMember['veh_num'] ?></td>
                          <td><?php echo $rowMember['veh_type'] ?></td>
                          <td><?php echo $rowMember['veh_joinDt'] ?></td>
                        </tr>
                      </tbody>
                    </table><br>
                    <table class="tablePrintdetails" border="1"  width="100%">
                      <thead>
                        <h5><b>Driver Details</b></h5>
                        <tr>
                          <th>Driver Id.</th>
                          <th>Driver Name</th>
                          <th>DL Number</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td><?php echo $rowMember['driver_id'] ?></td>
                          <td><?php echo $rowMember['veh_driver'] ?></td>
                          <td><?php echo $rowMember['dl_num'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="tablePrintImage" border="0" width="100%">
                      <tbody>
                        <tr>
                          <td><img src="../image/Picture2.png" alt="" class="img-responsive" style="height: 50px;float: right;margin-right: 30px;margin-top: 60px;margin-bottom: 20px;"></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                
                <?php
                }
                }
                else{
                ?>
                
                <?php
                echo "<h1 style='color:red;text-align:center;font-size:1em; font-family: Asap;'>Sorry...No Record Found!!</h1>";?>
                
                
                <?php
                }
                }
                ?>
                
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