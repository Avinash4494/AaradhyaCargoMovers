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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">My Helpline</span></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="compPartPannel">
          <div class="well">
            <div class="row">
           <a href="INC_report_index.php">
                <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-desktop"></i>&nbsp &nbsp</span>Report an Issue</h2>
                  <p>Issues/concerns related to laptops,assets,desktop,applications and many more.....</p>
                </div>
              </div>
           </a>
              <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-desktop"></i>&nbsp &nbsp</span>Raise a Service Request</h2>
                  <p>New Desktop,Vehicle Pass,<br>Vendor Pass <br>and many more.....</p>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="compPartSubPannel">
                  <h2><span><i class="fa fa-desktop"></i>&nbsp &nbsp</span>Knowledge Base</h2>
                  <p>Search on topics and <br> articles to get relavent information and many more.....</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="compLeftWrapper">
        <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4">
            <div class="compLeftpannel">
              <h3>My Open Incidents</h3>
                                <?php
                  $per_page_record = 2;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM raise_inc_infra  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
             
                <div class="well">
                <p><?php echo $rowMember['issue_reason'] ?></p>
                <span><?php echo $rowMember['request_id'] ?> </span><span style="float: right;font-size: 0.8em;">Raised On : <?php echo $rowMember['raised_on'] ?></span>
              </div>
               
                   <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                  ?>
                  <a href="INC_myIncident_index.php"><button class="actionButtonIcons-center">View All</button></a>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="compLeftpannel">
              <h3>Account locket out? Want to reset password?</h3>
              <div class="well">
                <h5>Visit : <a href="../emp_Profile/Forgot Password.php">Forgot Password</a></h5>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="compLeftpannel">
              <h3>Popular Items</h3>
              <div class="well">
                <h5><a href="raise_vendorPass.php">Vendor Pass</a></h5>
                <h5><a href="raise_vehiclePass.php">Vehicle Pass Request</a></h5>
                <h5><a href="raise_desktop.php">Desktop Request</a></h5>
                
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