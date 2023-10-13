<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Maintenance Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMaint.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Blogs Update</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
 