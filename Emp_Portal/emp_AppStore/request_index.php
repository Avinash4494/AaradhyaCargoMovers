<?php
require_once('../db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>myRequest</title>
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
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftRequest.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">My Request</span></h5>
              </div>
              <div class="bodyComponentReq">
 <h3>Frequently used requests.</h3>
                <div class="requestIndexPannel" style="padding-left: 330px;">

                  <a href="raise_guestPass.php">
                    <div class="reqestTabGuest">
                      <h4>Guest Pass</h4>
                    </div>
                  </a>
                  <a href="raise_stationery.php">
                    <div class="reqestTabEntry">
                    <h4>Stationery</h4>
                  </div>
                  </a>
                  <a href="raise_vehiclePass.php">
                    <div class="reqestTabVeh">
                      <h4>Vehicle Pass</h4>
                    </div>
                  </a>
                  <a href="raise_gatePass.php">
                    <div class="reqestTabGate">
                      <h4>Gate Pass</h4>
                    </div>
                  </a>
                  <a href="raise_vendorPass.php">
                    <div class="reqestTabVendor">
                      <h4>Vendor Pass</h4>
                    </div>
                  </a>
                   <a href="raise_vendorPass.php">
                    <div class="reqestTabName">
                      <h4>Name Plate</h4>
                    </div>
                  </a>
                     <a href="raise_idCard.php">
                    <div class="reqestTabIdCard">
                      <h4>ID Card</h4>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>