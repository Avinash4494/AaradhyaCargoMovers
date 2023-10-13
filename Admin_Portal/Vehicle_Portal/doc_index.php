
<?php
require_once('db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title></title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftVehicle.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
            <div class="paggignation">
                  <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="vehicle_index.php" data-toggle="tooltip" title="Vehicles Portal!" data-placement="top">Vehicles Portal</a> / <span class="activePage">Upload Documents</span></h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-10">

                       
                       <?php  include_once 'docDetails.php'; ?>
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