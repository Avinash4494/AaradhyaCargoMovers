<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
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
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Couriers Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftCouriers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Couriers Portal</span></h5>
              </div>
              <div class="courierAddComponent"> 
              <div class="row">
                <div class="col-lg-4">
                  <?php
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="widgetsReport" >
                    <div class="well">
                      <div class="rectContent">
                        <h4 id="total"><?php echo $rowUser[0] ?></h4>
                        <p>Total Couriers </p>
                        <p><a href="../Reports_Portal/report_Courier.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Couriers Report</a></p>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="col-lg-4">
                  <?php
                        $query_run = mysqli_query($connect,"SELECT * FROM addcourier");
                        $totalPayment=0;
                        while ($num = mysqli_fetch_array($query_run)) {
                        $totalPayment +=(int)$num['grand_total'];
                        }
                        ?>
                  <div class="widgetsReport" >
                    <div class="well">
                      <div class="rectContent">
                        <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalPayment; ?>.00</h4>
                        <p>Total Payments </p>
                        <p><a href="../Payment_Portal/report_Payment.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Payments Report</a></p>
                      </div>
                    </div>
                  </div>
                   
                </div>
                <div class="col-lg-4">
                  <?php
                        $query_run = mysqli_query($connect,"SELECT * FROM addcourier");
                        $totalWeight=0;
                        while ($num = mysqli_fetch_array($query_run)) {
                        $totalWeight +=(int)$num['total_weight'];
                        }
                        ?>
                  <div class="widgetsReport" >
                    <div class="well">
                      <div class="rectContent">
                        <h4 id="total"><?php echo $totalWeight; ?>.00 Kg</h4>
                        <p>Total Weights</p>
                        <p><a href="../Reports_Portal/report_Courier.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Couriers Report</a></p>
                      </div>
                    </div>
                  </div>
                   
                </div>
              </div>
              <?php
              require_once "db.php";
              $upload_dir = 'uploads/employees-uploads/';
              $per_page_record = 6;
              if (isset($_GET["page"])) {
              $page  = $_GET["page"];
              }
              else {
              $page=1;
              }
              $start_from = ($page-1) * $per_page_record;
              $query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
              $rs_result = mysqli_query ($connect, $query);
              ?>
              <?php
              if(mysqli_num_rows($rs_result)){
              while ($rowMember = mysqli_fetch_array($rs_result)) {
              ?> <style>
              .rectLongContent .rectWidget .well p{text-align: left;line-height: 20px;}
              </style>
              <div class="rectLongContent">
                <div class="rectWidget">
                  <div class="well">
                    <div class="row">
                      
                      <div class="col-lg-1">
                        <a href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><p>Dkt. No. <br><?php echo $rowMember['docketNumber'] ?>
                        </p></a>
                      </div>
                      <div class="col-lg-1">
                        <p>Date <br><?php echo $rowMember['courierdate'] ?></p>
                      </div>
                      <div class="col-lg-1">
                        <p>Mode By<br><?php echo $rowMember['mode'] ?></p>
                      </div>
                      
                      <div class="col-lg-1">
                        <p>From <br><?php echo $rowMember['package_from'] ?></p>
                      </div>
                      <div class="col-lg-1">
                        <p>To <br><?php echo $rowMember['package_from'] ?></p>
                      </div>
                      
                      <div class="col-lg-1">
                        <p>Rate <br><i class="fa fa-inr"></i> <?php echo $rowMember['rate'] ?>.00</p>
                      </div>
                      <div class="col-lg-1">
                        <p>Pkg <br><?php echo $rowMember['nofpkts'] ?> Pcs</p>
                      </div>
                      <div class="col-lg-1">
                        <p>Weight<br><?php echo $rowMember['total_weight'] ?> Kg</p>
                      </div>
                      <div class="col-lg-1">
                        <p>Ft. Charges<br><i class="fa fa-inr"></i> <?php echo $rowMember['frieght_charge'] ?>.00</p>
                      </div>
                      
                      <div class="col-lg-1">
                        <p>Amount<br><i class="fa fa-inr"></i> <?php echo $rowMember['grand_total'] ?>.00</p>
                      </div>
                      
                      <div class="col-lg-1">
                        <p>Update <br>
                          <a class="actionIcon"  href="courierEdit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                            <i class="fa fa-pencil-square"></i>
                          </a></p>
                        </div>
                        <div class="col-lg-1">
                          <p>Delete <br>
                            <a  class="actionIcon" href="courier_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <i class="fa fa-trash-o"></i>
                            </a></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                  ?>
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