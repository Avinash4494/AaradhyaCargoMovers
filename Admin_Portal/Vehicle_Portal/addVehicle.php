<?php
include('db.php');
$upload_dir = '../uploads/courier-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_member where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_member where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="member_Index.php"; }, 1000);
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
  <title>Vehicles Portal</title>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top" >Vehicles Portal</a> / <span class="activePage"> Add Vehicle</span> </h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="courierAddComponent">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                          <form name ="register" onsubmit="return myvalidate();" method="post" enctype="multipart/form-data" action="addVehicleProcess.php">
                            <input type="text" id="vehicle_id" name="vehicle_id" hidden="">
                              <input type="text" id="added_date" name="added_date" hidden="">
                              <input type="text" id="driver_id" name="driver_id" hidden="">
                            
                            <div class="row">
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_name" required="" placeholder="Vehicle Name">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Type :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_type" required="" placeholder="Vehicle Type">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_num" required="" placeholder="Vehicle Number">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Registration Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="regis_num" required="" placeholder="Registration Number" >
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Joining Date :</label>
                                    <div class="form-group">
                                      <input type="date" class="form-control"  name="veh_joinDt" required="" placeholder="Vehicle Joining Date ">
                                    </div>
                                  </div>
                                </div>
                                 <div class="row">
                                  <div class="col-lg-12">
                                    <label for="image">Upload Image</label>
                                    <div class="form-group">
                                      <input type="file" class="form-control" name="image" id="image">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                               <!-- <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Vehicle Owner's Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_joinDt" required="" placeholder="driv">
                                    </div>
                                  </div>
                                </div>
                              </div> -->
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">Driver Name :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="veh_driver" required="" placeholder="Driver's Name">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="usr">DL Number :</label>
                                    <div class="form-group">
                                      <input type="text" class="form-control"  name="dl_num" required="" placeholder="DL Number">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-9"></div>
                              <div class="col-lg-3">
                                <br>
                                <div class="row">
                                  <div class="col-lg-12 col-xs-12">
                                    <button type="submit" name="Submit" onclick="quoteValidate()" class="actionButtonProfile-center">Submit</button>
                                  </div>
                                </div>
                              </div>
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
function amountCalculate()
{
var total_weight = document.getElementById('total_weight').value || 0;
var rate = document.getElementById('rate').value || 0;
var frieght_charge = document.getElementById('frieght_charge').value || 0;
var pickup_charge = document.getElementById('pickup_charge').value || 0;
var docket_charge = document.getElementById('docket_charge').value || 0;
var gst_range = document.getElementById('gst_range').value || 0;
var gst_charge = document.getElementById('gst_charge').value || 0;
var rateWt = rate*total_weight;
var rateWtResult = document.getElementById('rateWt').innerHTML = rateWt;
var rateDiff = parseInt(frieght_charge)+parseInt(pickup_charge)+parseInt(docket_charge);
var rateGst = (rateDiff/100)*gst_range;
var gstResult = document.getElementById('rateGst').innerHTML = rateGst;
var totalAmount = parseInt(rateDiff)+parseInt(gstResult);
var totalResult = document.getElementById('totalAmount').innerHTML = totalAmount;
}
</script>