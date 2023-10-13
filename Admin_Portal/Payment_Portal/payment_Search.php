<!DOCTYPE html>
<html>
  <title>Payment Search</title>
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
              <div class="empty-left-comTop"></div>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="payment_Index.php" data-toggle="tooltip" title="Payments Portal!" data-placement="top" >Payments Portal</a> / <span class="activePage"> Payment Search</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Payment Search</h4>
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Your Code Here -->
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