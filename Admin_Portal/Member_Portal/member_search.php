<!DOCTYPE html>
<html>
  <title>Member Portal - Member Search</title>
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
             <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member Search</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Member Search</h4>
                  </div>
                  <div class="col-lg-1">
                    <a href="receipt_reportMember.php">
                      <button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button>
                    </a>
                  </div>
                </div>
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