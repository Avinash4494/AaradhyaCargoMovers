<!DOCTYPE html>
<html>
  <title>Payments Portal</title>
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
              <div class="left-compTop">
                <a href="payment_Index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-home" aria-hidden="true"></i>&nbsp Home</button>
                  <div class="actionBox"></div>
                </a>
                <a href="all_Payment_Receipts.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp All Payments </button>
                  <div class="actionBox"></div>
                </a>
                 <a href="pending_Payment.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Pending Payments </button>
                  <div class="actionBox"></div>
                </a>
               <a href="payment_Search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button>
               <div class="actionBox"></div></a>
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
               <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> Payments Portal</span> </h5>
            </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <!-- rightPannel -->
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $totalAmount= 0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $totalAmount +=(int)$num['amountPaid'];
                  }
                  ?>
                  <div class="col-lg-3 col-xs-6">
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
                  include_once 'db.php';
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $totalAmount= 0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $totalAmount +=(int)$num['amountPaid'];
                  }
                  ?>
                  <div class="col-lg-3 col-xs-6">
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
                  <?php
                  include_once 'db.php';
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $packageAmount=0;$paidAmount=0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $packageAmount +=(int)$num['packgeAmount'];
                  $paidAmount +=(int)$num['amountPaid'];
                  $totalAmtExpenses =$packageAmount+$paidAmount;
                  }
                  ?>
                  <div class="col-lg-3 col-xs-6">
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
                  <?php
                  include_once 'db.php';
                  $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                  $packageAmount=0;$paidAmount=0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $packageAmount +=(int)$num['packgeAmount'];
                  $paidAmount +=(int)$num['amountPaid'];
                  $totalAmtPending =$packageAmount-$paidAmount;
                  }
                  ?>
                  <div class="col-lg-3 col-xs-6">
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
<!--                 <h4>Graphical Representation</h4> -->
                <div class="row">
                  <div class="col-lg-6 col-xs-6">
                    <h5><b>Received Payments </b></h5>
                    <div class="widgetsGraph">
                      <div class="well">
                        <div class="graphContent">
                           
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-xs-6">
                    <h5><b>Pending Payments</b></h5>
                    <div class="widgetsGraph">
                      <div class="well">
                        <div class="graphContent">
                           
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
