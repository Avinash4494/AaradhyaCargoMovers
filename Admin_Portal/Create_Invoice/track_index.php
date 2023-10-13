<?php
include('db.php');
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Couriers Portal</title>
  <body onload="showtime();">
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top">Couriers Portal</a> / <span class="activePage">Courier Status</span></h5>
              </div>
              <div class="bodyComponent">
                
                <?php
                require_once "db.php";
                $upload_dir = 'uploads/employees-uploads/';
                $per_page_record = 8;
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
                
                ?>
                <style>
                .rectLongContent .rectWidget .well p{text-align: left;line-height: 20px;}
                </style>
                
                <div class="rectLongContent hidden-xs">
                  <div class="rectWidget">
                    <div class="well">
                      <div class="row">
                        <style>
                        .rectWidget .well h5
                        {
                        text-align: left;
                        line-height: 5px;
                        font-size: 0.9em;
                        }
                          .rectWidget .well h6
                        {
                        text-align: center;
                        position: absolute;
                       padding-left: 5px;
                        padding-top: 25px;
                        line-height: 5px;
                        font-size: 0.9em;
                        }
                          .rectWidget .well i
                        {
                        position: absolute;
                        padding-left: 25px;
                        padding-top: 5px;
                        font-size:1.3em;
                        }
                        </style>
                        
                        <div class="col-lg-1 col-xs-12">
                          <?php
                          $courStatus = $rowMember['order_status'];
                          $ordered = "Ordered";
                          $dispatched  = "Dispatched";
                          $shipping = "Shipping";
                          $delivered  = "Delivered";
                          if ($courStatus==$ordered) {
                          ?><i class="fa fa-circle" style="color: yellow;"></i>
                          <h6>Confirmed</h6>
                          <?php
                          }
                          else if($courStatus == $dispatched)
                          {
                          ?><i class="fa fa-circle" style="color: orange;"></i>
                          <h6>Dispatched</h6>
                          <?php
                          }
                          else if($courStatus == $shipping)
                          {
                          ?><i class="fa fa-circle" style="color: #0CFDA9;"></i>
                          <h6>Shipping</h6>
                          <?php
                          }
                          else if($courStatus==$delivered)
                          {
                          ?><i class="fa fa-circle" style="color: green;"></i>
                          <h6>Delivered</h6>
                          <?php
                          }
                          ?>
                        </div> 
                        <div class="col-lg-2 col-xs-12">
                          <a href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><h5><b>Courier ID</b> - <?php echo $rowMember['courier_id'] ?></h5></a>
                        </div>
                        <div class="col-lg-2 col-xs-12">
                          <h5 ><b>Docket Number</b> - <?php echo $rowMember['docketNumber'] ?></h5>
                        </div>
                        <div class="col-lg-3 col-xs-12">
                          <h5><b>Invoice Number</b> - <?php echo $rowMember['invoice_no'] ?></h5>
                        </div>
                        <div class="col-lg-2 col-xs-12">
                          <h5><b>Docket Date</b> - <?php echo $rowMember['invoice_date'] ?></h5>
                        </div>
                        <div class="col-lg-2">
                          <?php
                          $deskstatus = $rowMember['order_status'];
                          $delivered  = "Delivered";
                          if ($deskstatus==$delivered) {
                          } else{
                          ?>
                          <a href="update_trackCourier.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                            <button style="margin-top: 10px;" class="actionButtonProfile-center"> Update</button>
                          </a>
                          <?php
                          }?>
                          
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-2">
                          <h5 ><b>Payment Status</b> - <?php echo $rowMember['payment_process'] ?></h5>
                        </div>
                        <div class="col-lg-2">
                          <h5><b>Order Status</b> - <?php echo $rowMember['order_status'] ?></h5>
                        </div>
                        <div class="col-lg-3">
                          <h5><b>Transport Details</b> - <?php echo $rowMember['transport_number'] ?></h5>
                        </div>
                        <div class="col-lg-2">
                          <h5><b>Updated On</b> - <?php echo $rowMember['order_date'] ?></h5>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <div class="rectLongContent hidden-lg" style="margin-top: 0px;">
                  <div class="rectWidget">
                    <div class="well">
                      <div class="row">
                        
                        <div class="col-xs-8">
                           <a href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><h5><b>Courier ID</b> - <?php echo $rowMember['courier_id'] ?></h5></a>
                        </div>
                        <div class="col-xs-4">
                          <?php
                          $courStatus = $rowMember['order_status'];
                          $ordered = "Ordered";
                          $dispatched  = "Dispatched";
                          $shipping = "Shipping";
                          $delivered  = "Delivered";
                          if ($courStatus==$ordered) {
                          ?><i class="fa fa-circle" style="color: yellow;"></i>
                          <h6>Confirmed</h6>
                          <?php
                          }
                          else if($courStatus == $dispatched)
                          {
                          ?><i class="fa fa-circle" style="color: orange;"></i>
                          <h6>Dispatched</h6>
                          <?php
                          }
                          else if($courStatus == $shipping)
                          {
                          ?><i class="fa fa-circle" style="color: #0CFDA9;"></i>
                          <h6>Shipping</h6>
                          <?php
                          }
                          else if($courStatus==$delivered)
                          {
                          ?><i class="fa fa-circle" style="color: green;"></i>
                          <h6>Delivered</h6>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                     
                        <style>
                        .rectWidget .well h5
                        {
                        text-align: left;
                        line-height: 10px;
                        font-size: 0.9em;
                        }
                          .rectWidget .well h6
                        {
                        text-align: center;
                        position:
                       padding-left: 5px;
                        padding-top: 25px;
                        
                        font-size: 0.9em;
                        }
                          .rectWidget .well i
                        {
                        position: absolute;
                        padding-left: 25px;
                        padding-top: 5px;
                        font-size:1.3em;
                        }
                        </style>
                         <div class="row">
                        <div class="col-lg-1 col-xs-12">
                           <h5>Docket Number - <?php echo $rowMember['docketNumber'] ?></h5>
                            <h5>Invoice Number - <?php echo $rowMember['invoice_no'] ?></h5>
                            <h5>Docket Date - <?php echo $rowMember['invoice_date'] ?></h5>
                            <h5>Payment Status - <?php echo $rowMember['payment_process'] ?></h5>
                             <h5>Order Status - <?php echo $rowMember['order_status'] ?></h5>
                             <h5>Transport Details - <?php echo $rowMember['transport_number'] ?></h5>
                             <h5>Updated On - <?php echo $rowMember['order_date'] ?></h5>
                        </div>
                        <div class="col-lg-2 col-xs-12">
                          <?php
                          $deskstatus = $rowMember['order_status'];
                          $delivered  = "Delivered";
                          if ($deskstatus==$delivered) {
                          } else{
                          ?>
                          <a href="update_trackCourier.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                            <button style="margin-top: 10px;margin-bottom: 00px;" class="actionButtonProfile-center"> Update</button>
                          </a>
                          <?php
                          }?>
                        </div>
                      </div>
                         <?php
                          $deskstatus = $rowMember['order_status'];
                          $delivered  = "Delivered";
                          if ($deskstatus==!$delivered) {
                          } else{
                          ?>
                            <a href="downloadCourier.php?id=<?php echo $rowMember['id'] ?>">
                            <button style="margin-top: 10px;margin-bottom: 00px;" class="actionButtonProfile-center"> Download Invoice<i class="fa fa-download"></i></button>
                          </a>
                          <?php
                          }?>
                    </div>
                      
                      
                  </div>
                </div>








                <?php
                }
                }
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                ?>
                                <div class="row hidden-lg" >
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