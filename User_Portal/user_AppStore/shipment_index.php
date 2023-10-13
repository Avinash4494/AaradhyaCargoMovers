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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Shipments</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-10"></div>
                <div class="col-lg-2">
                  <a href="raise_shipment.php"><button style="margin-top: -40px;margin-bottom: 5px;" class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                </div>
              </div>
              <div class="rectLongContent">
              <div class="row">
                <div class="col-lg-12">
                  <?php
                  $per_page_record = 10;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM schedule_pickup Where user_id = '$user_id'  LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  ?>
    <style>
                    .rectLongContent {
    padding: 0px 15px;
    height: 440px;
 
    overflow-y: scroll;
}
                  </style>
                    <div class="pannelWidget">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-12 col-xs-9">
                            <div class="row">
                              <div class="col-lg-3">
                                <p class="quote_id">Pickup Id - <?php echo $rowMember['pickup_id'] ?>
                                </p>
                                <p>Raised On - <?php echo $rowMember['pick_request_date'] ?></p>
                              </div>
                             <!--  <div class="col-lg-2">
                                <p>Name - <?php echo $rowMember['pick_personal_names'] ?></p>
                                <p>Contact - <?php echo $rowMember['pick_personal_phone'] ?></p>
                              </div> -->
                              <div class="col-lg-3">
                                <p>Pick On - <?php echo $rowMember['pick_date'] ?></p>
                                <p>Pick Time - <?php echo $rowMember['pick_time'] ?></p>
                              </div>
                              <div class="col-lg-3">
                                <p>Pickup From - <?php echo $rowMember['pick_state'] ?></p>
                                <p>Delivery To - <?php echo $rowMember['pick_deliState'] ?></p>
                              </div>
                              <div class="col-lg-2">
                                <p>Status <br>
                                  <?php
                                  $courStatus = $rowMember['pick_status'];
                                  $Active = "Active";
                                  $inProg  = "In Progress";
                                  $Resolved = "Resolved";
                                  if ($courStatus==$Active) {
                                  ?>
                                  <h6  style="margin:0px;"><i class="fa fa-circle" style="color: #FF940B ;"></i>&nbsp Active</h6>
                                  <?php
                                  }
                                  else if($courStatus == $inProg)
                                  {
                                  ?>
                                  <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0BFFCB ;"></i> &nbsp In Progress</h6>
                                  <?php
                                  }
                                  else if($courStatus == $Resolved)
                                  {
                                  ?>
                                  <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0CFDA9;"></i> &nbsp Resolved</h6>
                                  <?php
                                  }
                                  else if($courStatus == "")
                                  {
                                  ?>
                                  <h6><i class="fa fa-circle" style="color: #D2F707 ;"></i> &nbsp Pending</h6>
                                  <?php
                                  }else{}
                                  ?>
                                </p>
                              </div>
                              <div class="col-lg-1">
                               <a style="color: black;" href="pickup_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">
                                  <button style="margin-top: 5px;" class="actionButtonCreate" type="submit">View </button>
                               </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                   
                  <?php
                  }
                  }
                  else{
                  ?>
                  <div class="emptyBox">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                          <img src="../image/empty-box-01.png" class="img-responsive" alt="">
                        </div>
                        <div class="col-lg-4"></div>
                      </div>
                      <h4>No records found!</h4>
                      <h5>You haven't created any shipment yet.</h5><br>
                      <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                          <a href="raise_shipment.php">
                            <button class="actionButtonCreate" type="submit">Create Shipment</button>
                          </a>
                        </div>
                        <div class="col-lg-5"></div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div> <!-- rectLongContent -->
                          <div class="row" >
                <div class="col-lg-10 col-xs-12"  >
                  <div class="pagination" >
                    <?php
                    $query = "SELECT COUNT(*) FROM schedule_pickup Where user_id = '$user_id'";
                    $rs_result = mysqli_query($connect, $query);
                    $row = mysqli_fetch_row($rs_result);
                    $total_records = $row[0];
                    // Number of pages required.
                    $total_pages = ceil($total_records / $per_page_record);
                    $pagLink = "";
                    if($page>=2){
                    echo "<a style='border:none;' href='shipment_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                    }
                    for ($i=1; $i<=$total_pages; $i++) {
                    if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='shipment_index.php?page="
                    .$i."'>".$i." </a>";
                    }
                    else  {
                    $pagLink .= "<a href='shipment_index.php?page=".$i."'>
                    ".$i." </a>";
                    }
                    };
                    echo $pagLink;
                    if($page<$total_pages){
                    echo "<a style='border:none;' href='shipment_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-2 col-xs-12" >
                  <div class="pagination">
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
</body>
</html>