<?php
include('../db.php');
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
setTimeout(function(){ window.location.href="All_Couriers_List.php"; }, 1000);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Couriers Portal</title>
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
              <?php include_once 'toLeftCouriers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="courier_index.php" data-toggle="tooltip" title="Couriers Portal!" data-placement="top" >Couriers Portal</a> / <span class="activePage"> Couriers List</span> </h5>
              </div>
              <div id="print_setion">
                
          <div class="bodyComponent">
                  <div class="row">
                  <div class="col-lg-11">
                    <h4>Couriers List</h4>
                  </div>
                  <div class="col-lg-1">
                    <a href="receipt_reportCouriers.php">
                      <button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button>
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
                          <th>Dkt. No.</th>
                          <th>Date</th>
                          <th>Pkg</th>
                          <th>Mode</th>
                          <th>From</th>
                          <th>To</th>
                          <th>Weight</th>
                          <th>Rate</th>
                          <th>Dkt. Charge</th>
                          <th>Freight Charge</th>
                          <th>GST@5%</th>
                          <th>Total Amount</th>
                          <th>View</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $upload_dir = 'uploads/members-uploads/';
                        $per_page_record = 5;
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
                        // Display each field of the records.
                        
                        ?>
                        <tr>
                          
                          <p hidden=""><?php echo $rowMember['id'] ?></p>
                          <td ></td>
                          <td><b><a style="color: black;" href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['docketNumber'] ?></a></b></td>
                          <td><?php echo $rowMember['courierdate'] ?></td>
                          <td><?php echo $rowMember['nofpkts'] ?> Pcs</td>
                          <td><?php echo $rowMember['mode'] ?></td>
                          <td><?php echo $rowMember['package_from'] ?></td>
                          <td><?php echo $rowMember['package_to'] ?></td>
                          <td><?php echo $rowMember['total_weight'] ?> Kg</td>
                          <td><i class="fa fa-inr"></i> <?php echo $rowMember['rate'] ?>.00</td>
                          <td><i class="fa fa-inr"></i> <?php echo $rowMember['docket_charge'] ?>.00</td>
                          <td><i class="fa fa-inr"></i> <?php echo $rowMember['frieght_charge'] ?>.00</td>
                          <td><i class="fa fa-inr"></i> <?php echo $rowMember['gst'] ?>.00</td>
                          <td><b><i class="fa fa-inr"></i> <?php echo $rowMember['grand_total'] ?>.00</b></td>
                          <td>
                            <a href="courier_view.php?id=<?php echo $rowMember['id'] ?>" >
                              <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                            </a>
                          </td>
                          <td>
                            <a href="All_Couriers_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                            </a>
                          </td>
                        </tr>
                        <?php
                        }
                        }
                        else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                        ?>
                      </tbody>
                    </table>
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