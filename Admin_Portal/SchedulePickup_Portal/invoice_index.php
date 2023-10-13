<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from member_add_courier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from member_add_courier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="invoice_index.php"; }, 1000);
</script>';
}
}
}
?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Pickup Portal</title>
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
              <?php include_once 'toLeftPickup.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="pickup_index.php" data-toggle="tooltip" title="Pickup Portal!" data-placement="top">Pickup Portal</a> / <span class="activePage"> Invoices</span> </h5>
              </div>
              <?php
              include_once 'db.php';
              $query = mysqli_query($connect,"SELECT a.cus_name,a.cus_address,a.cus_contact,a.cus_gstin,a.invoice_no,a.invoice_date,a.gst_range,a.docketNumber,a.package_from,a.package_to,a.nofpkts,a.mode,a.total_weight,a.rate,a.docket_charge,a.gst,a.grand_total,a.courier_id,a.order_status,a.transport_number,a.order_date,a.payment_process,a.frieght_charge,a.pickup_charge,a.courierdate
              From member_add_courier as a
              inner join schedule_pickup as u
              on a.user_id = u.user_id");
              $rowMember = mysqli_fetch_assoc($query);
              ?>
              <div class="smallComp hidden-lg">
                <?php
                $per_page_record = 8;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $query = "SELECT * FROM member_add_courier  LIMIT $start_from, $per_page_record ";
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowMember = mysqli_fetch_array($rs_result)) {
                // Display each field of the records.
                
                ?>
                <div class="rectLongContent" style="margin-top: -15px;padding-bottom: 25px;">
                  <div class="rectWidge" >
                    <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                      <div class="row">
                        <div class="col-xs-7">
                          <b><h6 style="margin:0px;font-size: 1em;"> Pickup Id. : <?php echo $rowMember['pickup_id'] ?></h6></b>
                        </div>
                        <div class="col-xs-5">
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
                          else
                          {
                          ?>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <h5><b>Name</b> - <?php echo $rowMember['pick_personal_names'] ?></h5>
                          <h5><b>Requested On</b> - <?php echo $rowMember['pick_request_date'] ?></h5>
                          <h5><b>Mobile No.</b> - <?php echo $rowMember['pick_personal_phone'] ?></h5>
                          <h5 ><b>Email</b> - <?php echo $rowMember['pick_personal_email'] ?></h5>
                          <h5><b>From</b> - <?php echo $rowMember['pick_state'] ?></h5>
                          <h5><b>To</b> - <?php echo $rowMember['pick_deliState'] ?></h5>
                        </div>
                      </div>
                      
                      <div class="buttonComp" style="margin-top: 10px;">
                        <div class="row">
                          <div class="col-xs-4">
                            <a href="quote_View.php?id=<?php echo $rowMember['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-eye"></i></button>
                            </a>
                          </div>
                          <?php
                          $courCheck = $rowMember['pick_status'];
                          $ActiveCheck = "Active";
                          $inProgCheck  = "In Progress";
                          $resolvedCheck  = "Resolved";
                          if ($courCheck==$resolvedCheck) {
                          ?>
                          <?php
                          }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                          <div class="col-xs-4">
                            <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                            </a>
                          </div>
                          <?php }?>
                          <div class="col-xs-4">
                            <a href="All_Pickup_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
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
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                ?>
                <div class="row" >
                  <div class="col-lg-8 col-xs-12"  >
                    <div class="pagination" >
                      <?php
                      $query = "SELECT COUNT(*) FROM member_add_courier";
                      $rs_result = mysqli_query($connect, $query);
                      $row = mysqli_fetch_row($rs_result);
                      $total_records = $row[0];
                      // Number of pages required.
                      $total_pages = ceil($total_records / $per_page_record);
                      $pagLink = "";
                      if($page>=2){
                      echo "<a style='border:none;' href='All_Pickup_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='All_Pickup_List.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='All_Pickup_List.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='All_Pickup_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
              
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <!--  <a href="receipt_report_quote.php">
                        <button  style="margin-top: -25px;" class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button>
                      </a> -->
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
                            <th>Dkt. No.</th>
                            <th>Inv. No.</th>
                            <th>Date</th>
                            <th>Mode</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Weight</th>
                            <th>Freight Charge</th>
                            <th>GST Charge</th>
                            <th>Total Amount</th>
                            <th>Edit</th>
                            <th>Action</th>
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
                          $query = "SELECT * FROM member_add_courier  LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          // Display each field of the records.
                          
                          ?>
                       <tr>
                            
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td ></td>
                            <td><b><a style="color: black;" href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['docketNumber'] ?></a></b></td>
                            <td><?php echo $rowMember['invoice_no'];?></td>
                            <td><?php echo $rowMember['courierdate'] ?></td>
                            <td><?php echo $rowMember['mode'] ?></td>
                            <td><?php echo $rowMember['package_from'] ?></td>
                            <td><?php echo $rowMember['package_to'] ?></td>
                            <td><?php echo $rowMember['total_weight'] ?> Kg</td>
                            <td><i class="fa fa-inr"></i> <?php echo $rowMember['frieght_charge'] ?>.00</td>
                            <td><i class="fa fa-inr"></i> <?php echo round($rowMember['gst']) ?>.00</td>
                            <td><b><i class="fa fa-inr"></i> <?php echo round($rowMember['grand_total']) ?>.00</b></td>
                            <td>
                              <a href="update_CourStatus.php?id=<?php echo $rowMember['id'] ?>">
                                <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                              </a>
                            </td>
                            <td>
                                 <?php $getInv  = $rowMember['invoice_no'];
                                    if ($getInv == ' ') {
                                    ?>
                                    <a href="gen_courier.php?id=<?php echo $rowMember['id'] ?>">
                                      <button class="actionButtonIcons-center"  type="submit"><i class="fa fa-plus"></i></button>
                                    </a>
                                    <?php
                                    } else{
                                    ?>
                                    <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-download"></i></button>
                                    <?php
                                    }
                                    ?>
                            </td>
                            <td>
                              <a href="invoice_index.php?delete=<?php echo $rowMember['id'] ?>">
                                <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-trash-o"></i></button>
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
                      $query = "SELECT COUNT(*) FROM schedule_pickup";
                      $rs_result = mysqli_query($connect, $query);
                      $row = mysqli_fetch_row($rs_result);
                      $total_records = $row[0];
                      // Number of pages required.
                      $total_pages = ceil($total_records / $per_page_record);
                      $pagLink = "";
                      if($page>=2){
                      echo "<a style='border:none;' href='All_Pickup_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='All_Pickup_List.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='All_Pickup_List.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='All_Pickup_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
 