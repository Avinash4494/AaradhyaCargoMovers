<?php
require_once('../db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Service Portal</title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      
      <!--         <div class="compNavPaggignation">
        <div class="row">
          
          <div class="col-lg-2">
            
          </div>
          <div class="subCompButton">
            <div class="col-lg-2"></div>
            <div class="col-lg-2">
              <a href="request_status.php">
                <button class="actionButtonIcons-center" type="submit">
                <i class="fa fa-address-card"></i> &nbsp My Trainings</button>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="request_status.php">
                <button class="actionButtonIcons-center" type="submit">
                <i class="fa fa-address-card"></i> &nbsp My Request</button>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="itServices.php">
                <button class="actionButtonIcons-center" type="submit"><i class="fa fa-address-card"></i> &nbsp My Incidents</button>
              </a>
            </div>
            <div class="col-lg-2">
              <a href="eStore.php" >
                <button class="actionButtonIcons-center" type="submit"><i class="fa fa-shopping-cart"></i> &nbsp Catalog</button>
              </a>
            </div>
          </div>
        </div>
      </div> -->
      <div class="compHeadLanding">
        <div class="compSubHead"> </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-6">
              <div class="compHeadText">
                <h1>How can we help?</h1>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> /<a href="myHelpline_index.php" data-toggle="tooltip" title="My Helpline!" data-placement="top">myHelpline</a> / <span class="activePage">Report an Issue</span></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="compPartPannel">
          <div class="well">
            <div class="row">
           <a href="INC_new_Infra.php">
                <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-desktop"></i>&nbsp &nbsp</span>IT Infrastructure Support</h2>
                  <p>New Desktop Report Desktop,<br>Laptop,Asset and <br>many more.....</p>
                </div>
              </div>
           </a>
             <a href="INC_new_application.php">
                <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-code"></i>&nbsp &nbsp</span>Application Support</h2>
                  <p>Report Technical Issues & Queries related to myApp application (myTime,myRequest,myClaims & Others).</p>
                </div>
              </div>
             </a>
              <a href="INC_new_facility.php">
              <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-archive"></i>&nbsp &nbsp</span>Facility Related</h2>
                  <p>Office Cafeteria,House Keeping AC <br> & and many more premise <br> location concerns.</p>
                </div>
              </div>
              </a>
            </div>
          </div>
        </div>
      </div>
 
    </div>
  </div>
  
</body>
</html>