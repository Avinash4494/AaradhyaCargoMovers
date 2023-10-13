<?php
require_once('db.php');
$upload_dir = 'uploads/'; 
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from enquiry_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
require_once('db.php');
$upload_dir = 'uploads/'; 
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from enquiry_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Enquiry Report</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
<?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
          <div class="leftPannel">
            <div class="empty-left-Index-comTop"></div>
   <?php include_once 'toLeftEnquiry.php' ?>
          </div>
        </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="enquiry_index.php" data-toggle="tooltip" title="Enquiry Portal!" data-placement="top" >Enquiry Portal</a> / <span class="activePage"> Enquiry Status</span> </h5>
              </div>
              
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Enquiry Status</h4>
                  </div>
                  <div class="col-lg-1">
                    <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                  </div>
                </div>
                  <style>
                    .css-serial {
                    counter-reset: serial-number;  /* Set the serial number counter to 0 */
                    }
                    .css-serial td:first-child:before {
                    counter-increment: serial-number;  /* Increment the serial number counter */
                    content: counter(serial-number);  /* Display the counter */
                    }
                    </style>
              <div class="row">
                <div class="col-lg-12">
                   Enquiry Id : <?php echo $rowMember['enquiry_id'] ?>
              Enquiry Date : <?php echo $rowMember['tDate'] ?>
              Name : <?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?>
              Email<?php echo $rowMember['email'] ?>
              Mobile Number<?php echo $rowMember['phone'] ?>
              Message<?php echo $rowMember['remarks'] ?>
<!-- Report Code Here -->
                    <table class="css-serial table table-hover" width="100%">
                      <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Enquiry Id</th>
                                <th>Follow Up Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Last Follow Up</th>
                                <th>Next Follow Up</th>
                                <th>Remarks</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              require_once "db.php";
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }

                              $start_from = ($page-1) * $per_page_record;
                              $enquiry_id = $rowMember['enquiry_id'];
                              echo $enquiry_id;
                              $query = "SELECT * FROM  follow_ups order by nextFollow LIMIT $start_from, $per_page_record ";

                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                               <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                            if ($enquiry_id==$rowMember['enquiry_id']) {
  # code...

                              // Display each field of the records.
                              ?>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                                <td><?php echo $rowMember['enquiry_id'] ?></td>
                                <td><?php echo $rowMember['followUp_id'] ?></td>
                                <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
                                <td><?php echo $rowMember['email'] ?></td>
                                <td><?php echo $rowMember['phone'] ?></td>
                                <td><?php echo $rowMember['lastFollow'] ?></td>
                                <td><?php echo $rowMember['nextFollow'] ?></td>
                                <td><?php echo $rowMember['followMsg'] ?></td>
                                
                            </tr>
                            <?php
                            }
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



