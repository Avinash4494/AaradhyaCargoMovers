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
          <style>
          .actionButtonRequest
          {
          margin-top: -5px;
          }
          </style>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">E -  Store</span></h5>
              </div>
              <div class="bodyComponentReq">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="requestIndex">
                      <a href="raise_businnessCard.php">
                        <div class="reqestTabGuest">
                          <h4>Business Card</h4>
                        </div>
                      </a>
                      <div class="reqestTabEntry">
                        <h4>E - Store</h4>
                      </div>
                      <a href="raise_stationery.php">
                        <div class="reqestTabVeh">
                          <h4>Stationery</h4>
                        </div>
                      </a>
                      <a href="raise_namePlate.php">
                        <div class="reqestTabGate">
                          <h4>Name Plate</h4>
                        </div>
                      </a>
                      <a href="raise_IdCard.php">
                        <div class="reqestTabVendor">
                          <h4>ID Card</h4>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <?php
                    $per_page_record = 1;
                    error_reporting(0);
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_stat  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowStat = mysqli_fetch_array($rs_result)) {
                    ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-2">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
           <?php
                              $statTime = $rowStat["raised_on"];
                              $statTime1 = strtotime($statTime);
                              $statTime2 = strtotime(date('Y-m-d'));
                              $statSecs = $statTime2 - $statTime1;// == <seconds between the two times>
                              $statDays = $statSecs / 86400;
                              $statFin = round($statDays,0);
                              ?>
                              <div class="col-lg-8">
                              <?php
                              $Statstatus = $rowStat['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
                              $Rejected = "Rejected";
                              if ($Statstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Stationery request is active since <?php echo $statFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Statstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Stationery request is pending since <?php echo $statFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Statstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Stationery request is approved.</h5>
                              <?php
                              }
                              else if($Statstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Stationery request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_stat.php?id=<?php echo $rowStat['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-9">
                                <div class="itemContent">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <p>Request No. - <?php echo $rowStat['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowStat['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowStat['req_status'] ?></h4></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <?php
                    }
                    }
                    
                    ?><br>
                    <?php
                    $per_page_record = 1;
                    error_reporting(0);
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_business_card  WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowBuis = mysqli_fetch_array($rs_result)) {
                    ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-2">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                              <?php
                              $buisTime = $rowBuis["raised_on"];
                              $buisTime1 = strtotime($buisTime);
                              $buisTime2 = strtotime(date('Y-m-d'));
                              $buisSecs = $buisTime2 - $buisTime1;// == <seconds between the two times>
                              $buisDays = $buisSecs / 86400;
                              $busiFin = round($buisDays,0);
                              ?>
                              <div class="col-lg-8">
                                                   <?php
                              $status = $rowBuis['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
                              $Rejected = "Rejected";
                              if ($status==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Business Card request is active since <?php echo $busiFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Business Card request is pending since <?php echo $busiFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Business Card request is approved.</h5>
                              <?php
                              }
                              else if($status==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Business Card request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_buis.php?id=<?php echo $rowBuis['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-9">
                                <div class="itemContent">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <p>Request No. - <?php echo $rowBuis['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowBuis['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowBuis['req_status'] ?></h4></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <style>
                    .actionButtonRequest
                    {
                    margin-top: -5px;
                    }
                    </style>
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
  </body>
</html>