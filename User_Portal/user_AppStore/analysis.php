<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <link rel="stylesheet" type="text/css" href="../ProgressAnalysis/progresscircle.css">
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Analysis</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                  <a href="raise_shipment.php"><button style="margin-top: -40px;margin-bottom: 15px;" class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                </div>
              </div>
 <div class="analysisComp">
                 <style>
                        .progressiveComp{background-color: white;margin-top: 10px;padding: 15px;border-radius: 5px;}
                      
                        .progressiveComp p{color: #1c2833;padding-top: 15px;text-align: center;font-size: 0.9em;}
                        .circlechart{margin-left: 30px;}
.success-stroke {
  stroke: red;
}

.warning-stroke {
  stroke: #F98834 ;
}

.danger-stroke {
  stroke: #ff4444;
}
                        </style>
                        <div class="progressiveComp">
                          <div class="row">
                            <div class="col-lg-4">
                              <?php

                              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  member_add_courier  Where user_id = '$user_id' ");
                              while($rowUser = mysqli_fetch_array($resultUser))  {
                              $getNum = $rowUser[0];
                             $setNum =100;$getPer = ($getNum/$setNum)*100; ?>
                              <div class="circlechart" data-percentage="<?php echo $getPer; ?>">Total Couriers</div>
                               <p><?php echo round($getNum,1); ?>  of 200 Dockets</p>
                              <?php } ?>
                            </div>
                            
                            <div class="col-lg-4">
                             <?php
                            $query_Amt = mysqli_query($connect,"SELECT * FROM member_add_courier  Where user_id = '$user_id' ");
                            $AmtPerVar= 0;
                            while ($Amt = mysqli_fetch_array($query_Amt)) {
                            $AmtPerVar +=(int)$Amt['grand_total'];
                            }
                             $getAmt = $AmtPerVar;
                            $setAmt = 300000;
                            $getAmtPer = ($getAmt/$setAmt)*100;
                            ?>
                            <div class="circlechart" data-percentage="<?php echo round($getAmtPer,1); ?>">Payments</div>
                            <p>Rs. <?php echo round($AmtPerVar,1);  ?> of Rs. 3,00,000.00 </p>
                            </div>
                            
                            <div class="col-lg-4">
                               <?php
                            $query_weight = mysqli_query($connect,"SELECT * FROM member_add_courier  Where user_id = '$user_id' ");
                            $weightPerVar=0;
                            while ($weight = mysqli_fetch_array($query_weight)) {
                            $weightPerVar +=(int)$weight['total_weight'];
                              }
                           
                            $getWeight = $weightPerVar;
                            $setWeight = 30000;
                            $getWeightPer = ($getWeight/$setWeight)*100;
                            ?>
                              <div class="circlechart" data-percentage="<?php echo round($getWeightPer,1); ?>">Weights</div>
                              <p><?php echo round($weightPerVar,1); ?>Kg  of 30,000 Kg</p>
                               
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
</body>
</html>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../ProgressAnalysis/progresscircle.js"></script>
    <script>
    $('.circlechart').circlechart(); // Initialization
    </script>