<?php
include('db.php');
$upload_dir = '../uploads/courier-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="courier_index.php"; }, 100);
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
  <title>Couriers Portal</title>
  <body onload="numberWithCommas(),showtime();">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel hidden-xs">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftCouriers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation" style="">
                <h5><span class="activePage">Couriers Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <a href="addCourierPannel.php">
                      <button class="actionButtonIcons-center" type="submit"><i class="fa fa-plus"> Create Invoice</i></button>
                    </a>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"> Print Invoice</i></button>
                  </div>
                </div>
              </div>
            </div>
            <div class="allCouriers" style="margin-top: -30px;">
              <?php include 'All_Couriers_List.php' ?>
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
function numberWithCommas(){
var strAmount ='<?php echo $totalAmount; ?>';
var amountMatches = strAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("amountString").innerHTML=amountMatches;
var strWeight ='<?php echo $total_weight; ?>';
var weightMatches = strWeight.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("weightString").innerHTML=weightMatches;
var strFrieght ='<?php echo $frieght_charge; ?>';
var frieghtMatches = strFrieght.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("frieghtString").innerHTML=frieghtMatches;
}
</script>