<?php include('db.php'); ?>
<?php include_once '../session.php' ?>


<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Pickup Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftPickup.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Pickup Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="row">
                  <?php
                  include_once '../db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  schedule_pickup ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="All_Quote_List.php">
                    <div class="col-lg-6 col-xs-12">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Total Pickups</p>
                            <p> <a href="All_Quote_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Pickup Report</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  schedule_pickup ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="todayPickupRequest.php">
                    <div class="col-lg-6 col-xs-12">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Membership Pickup </p>
                            <p><a href="todayPickupReport.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Membership Pickup Report</a></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                </div>
                <div class="bodyComponent hidden-xs">
                  
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <?php
                      $per_page_record = 7;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM schedule_pickup  LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                      <div class="rectLongContent">
                        <div class="rectWidget">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-11 col-xs-9">
                                <div class="row">
                                  <div class="col-lg-2">
                                    <a href="pickup_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><p class="quote_id">Pickup Id - <?php echo $rowMember['pickup_id'] ?>
                                    </p></a>
                                    <p>Reqested On - <?php echo $rowMember['pick_request_date'] ?></p>
                                  </div>
                                  <div class="col-lg-2">
                                    <p>Name - <?php echo $rowMember['pick_personal_names'] ?></p>
                                    <p>Contact - <?php echo $rowMember['pick_personal_phone'] ?></p>
                                  </div>
                                  <div class="col-lg-2">
                                    <p>Pickup Date - <?php echo $rowMember['pick_date'] ?></p>
                                    <p>Pickup Time - <?php echo $rowMember['pick_time'] ?></p>
                                  </div>
                                  <div class="col-lg-2">
                                    <p>Mode By - <?php echo $rowMember['pick_freight_type'] ?></p>
                                    <p>Status - <?php echo $rowMember['pick_status'] ?></p>
                                  </div>
                                  <div class="col-lg-2">
                                    <p>Pickup From - <?php echo $rowMember['pick_state'] ?></p>
                                    <p>Delivery To - <?php echo $rowMember['pick_deliState'] ?></p>
                                  </div>
                                  <div class="col-lg-2">

                                      
                                           <?php
                                $courCheck = $rowMember['pick_status'];
                                $resolvedCheck  = "Resolved";
                                if ($courCheck==$resolvedCheck) {
                                ?>
                                <a id="foundInvoice" href="gen_courier.php?id=<?php echo $rowMember['id'] ?>">
                                      <button style="margin-top: 5px;background-color:white;color: #1c2833"  class="actionButtonIcons-center"  type="submit"><i style="color: #1c2833;" class="fa fa-pencil"></i> &nbsp Invoice</button>
                                    </a>
                                <?php
                                }else {?>
                                
                                <?php }?>

                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-1 col-xs-3">
                                <?php
                                $courCheck = $rowMember['pick_status'];
                                $ActiveCheck = "Active";
                                $inProgCheck  = "In Progress";
                                $resolvedCheck  = "Resolved";
                                if ($courCheck==$resolvedCheck) {
                                ?>
                                <a href="javascript: void(0)">
                                  <button style="background-color: green;margin-top: 5px;" class="actionButtonIcons-center"  type="submit">  <i class="fa fa-check" style="color: white;"></i></button>
                                </a>
                                <?php
                                }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                                <a href="pickup_edit.php?id=<?php echo $rowMember['id'] ?>" >
                                  <button style="margin-top: 9px;padding: 7px;"  class="actionButtonIcons-center"  type="submit"><i class="fa fa-pencil"></i></button>
                                </a>
                                <style>
                                .actionButtonIcons-center{
                                background-color: white;
                                color: #1c2833;
                                }
                                </style>
                                <?php }?>
                                
                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-lg-2">
                                
                              </div>
                              <div class="col-lg-10">
                                
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
                      <div class="pagination" >
                        <?php
                        $query = "SELECT COUNT(*) FROM schedule_pickup";
                        $rs_result = mysqli_query($connect, $query);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];
                        // Number of pages required.
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";
                        if($page>=2){
                        echo "<a style='border:none;' href='pickup_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                        }
                        for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                        $pagLink .= "<a class = 'active' href='pickup_index.php?page="
                        .$i."'>".$i." </a>";
                        }
                        else  {
                        $pagLink .= "<a href='pickup_index.php?page=".$i."'>
                        ".$i." </a>";
                        }
                        };
                        echo $pagLink;
                        if($page<$total_pages){
                        echo "<a style='border:none;' href='pickup_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
        <?php include 'print_invoice.php' ?>
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