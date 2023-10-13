 <?php 
require_once('db.php');
 include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body >
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftTime.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                  <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top" >Profile Portal</a> / <span class="activePage">Leave Details </span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4 style="margin-bottom: 22px;">Leave Details</h4>
                                    
                 <?php
                $per_page_record = 2;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $query = "SELECT * FROM raise_stat  WHERE employees_id='$employees_id'";
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowStat = mysqli_fetch_array($rs_result)) {
                ?>
                
                <div class="row">
                  <div class="col-lg-12">
                    <div class="requestStat">
                      <a href="view_stat.php?id=<?php echo $rowStat['id'] ?>">
                        <div class="well">
                          <div class="row">
                            <div class="col-lg-1">
                              <div class="iconCal">
                                <i class="fa fa-calendar"></i>
                              </div>
                            </div>
                            <div class="col-lg-8">
                              <?php
                              $getDate = $rowStat["raised_on"];
                              
                              $datetime1 = strtotime($getDate);
                              $datetime2 = strtotime(date('Y-m-d'));
                              $secs = $datetime2 - $datetime1;// == <seconds between the two times>
                              $days = $secs / 86400;
                              ?>
                              
                              <h5>Your Stationery request is pending since <?php echo $days; ?> days and waiting for approval.</h5>
                              <div class="row">
                                <div class="col-lg-4">
                                  <p>Request Id. - <?php echo $rowStat['request_id'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Item - <?php echo $rowStat['sta_item'] ?></p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Raised On. - <?php echo $rowStat['raised_on'] ?></p>
                                </div>
                                
                              </div>
                            </div>
                            <div class="col-lg-2">
                              <div id="changeColor" class="actionButtonRequest"><h4 id="Status"><?php echo $rowStat['req_status'] ?></h4></div>
                            </div>
                            <div class="col-lg-1">
                              <div class="iconDel">
                                <a href="request_status.php?delete=<?php echo $rowStat['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                  <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    
                  </div>
                </div>
                <?php
                }
                }
                ?>
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