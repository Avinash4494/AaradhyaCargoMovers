<!DOCTYPE html>
<html>
  <title>Report Portal</title>
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
              <div class="left-compTop">
                <a href="report_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-home" aria-hidden="true"></i>&nbsp Home</button>
                  <div class="actionBox"></div>
                </a>
                <a href="report_Members.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Members Report</button>
                  <div class="actionBox"></div>
                </a>
<!--                  <a href="report_Sales.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Sales Report</button>
                  <div class="actionBox"></div>
                </a> -->
                <a href="report_Payments.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Payments Report</button>
                  <div class="actionBox"></div>
                </a>
 
                <a href="report_Enquiry.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Enquiry Report</button>
                  <div class="actionBox"></div>
                </a>
 
 
                <a href="report_Feedback.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Feedback Report</button>
                  <div class="actionBox"></div>
                </a>
                                <a href="report_Members.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Vehicle Report</button>
                  <div class="actionBox"></div>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
               <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> Report Portal</span> </h5>
            </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <!-- rightPannel -->
                <div class="row">
                  <?php
                  include_once '../db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  enquiry_member ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Total Enquiry </p>
                          <p><a href="enquiryReport.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Enquiry Report</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                  }
                  ?>
                  <?php
                   
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  add_member ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Total Sales </p>
                          <p><a href="salesReport.php">Sales Report</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <?php
                  }
                  ?>
                </div>
                <div class="row">
                  <?php
                   
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $totalAmount= 0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $totalAmount +=(int)$num['amountPaid'];
                  }
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmount ?>/-</h4>
                          <p>Total Payment Received</p>
                          <a href="paymentReport.php">Payment Report</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $totalAmount= 0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $totalAmount +=(int)$num['amountPaid'];
                  }
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmount ?>/-</h4>
                          <p>Staff Salary Expenses</p>
                          <a href="paymentReport.php">Salary Report</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <?php
                   
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  follow_ups ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/index.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Total Follow Ups</p>
                            <a href="paymentReport.php">Follow Ups Report</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $packageAmount=0;$paidAmount=0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $packageAmount +=(int)$num['packgeAmount'];
                  $paidAmount +=(int)$num['amountPaid'];
                  $totalAmtExpenses =$packageAmount+$paidAmount;
                  }
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmtExpenses ?>/-</h4>
                          <p>Total Expenses</p>
                          <a href="paymentReport.php">Payment Report</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                <div class="row">
                  <?php
                  
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  add_member ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/index.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Total Addmission</p>
                            <a href="all_Members_List.php">Members Report</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $packageAmount=0;$paidAmount=0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $packageAmount +=(int)$num['packgeAmount'];
                  $paidAmount +=(int)$num['amountPaid'];
                  $totalAmtPending =$packageAmount-$paidAmount;
                  }
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmtPending ?>.00 Rs</h4>
                          <p>Total Pending Payment</p>
                          <a href="pending_Payment.php">Pendings Report</a>
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
</script>