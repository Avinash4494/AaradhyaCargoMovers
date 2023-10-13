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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">IT Services</span></h5>
              </div>
              <div class="bodyComponentReq">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="requestIndex">
                      <a href="raise_desktop.php">
                        <div class="reqestTabGuest">
                          <h4>Desktop Request</h4>
                        </div>
                      </a>
                      <div class="reqestTabEntry">
                        <h4> IT Services</h4>
                      </div>
                      <a href="raise_vehiclePass.php">
                        <div class="reqestTabVeh">
                          <h4>Accessories Request</h4>
                        </div>
                      </a>
                      <a href="raise_byod.php">
                        <div class="reqestTabGate">
                          <h4>BYOD</h4>
                        </div>
                      </a>
                      <a href="raise_asset.php">
                        <div class="reqestTabVendor">
                          <h4>Asset Request</h4>
                        </div>
                      </a>
                    </div>
                  </div>
                  <style>
                  .actionButtonRequest
                  {
                  margin-top: -5px;
                  }
                  </style>
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
                    $query = "SELECT * FROM raise_desktop  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowDesk = mysqli_fetch_array($rs_result)) {
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
                              $deskTime = $rowDesk["raised_on"];
                              $deskTime1 = strtotime($deskTime);
                              $deskTime2 = strtotime(date('Y-m-d'));
                              $deskSecs = $deskTime2 - $deskTime1;// == <seconds between the two times>
                              $deskDays = $deskSecs / 86400;
                              $deskFin = round($deskDays,0);
                              ?>
                              <div class="col-lg-8">
                            <?php
                              $deskstatus = $rowDesk['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Desktop request is active since <?php echo $deskFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Desktop request is pending since <?php echo $deskFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Desktop request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Desktop request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_desktop.php?id=<?php echo $rowDesk['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowDesk['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowDesk['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowDesk['req_status'] ?></h4></div>
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
                    $query = "SELECT * FROM raise_asset  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowAsset = mysqli_fetch_array($rs_result)) {
                      $getState = $rowAsset["asset_return"];
                      $setState = "Return";
                      if ($getState==$setState) {
                        
                      }else {
                        ?>

                    <div class="row">
                      <div class="col-lg-12">
                        <div class="requestStat">
                          <div class="well">
                              <a href="view_asset.php?id=<?php echo $rowAsset['id'] ?>">
                            <div class="row">
                              <div class="col-lg-2">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                             <?php
                              $assetTime = $rowAsset["raised_on"];
                              
                              $assetTime1 = strtotime($assetTime);
                              $assetTime2 = strtotime(date('Y-m-d'));
                              $assetSecs = $assetTime2 - $assetTime1;// == <seconds between the two times>
                              $assetDays = $assetSecs / 86400;
                              $assetFin = round($assetDays,0);

                              ?>
                              <div class="col-lg-8">
                                    <?php
                              $assetStatus = $rowAsset['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($assetStatus==$active) {
                                
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Asset request is active since <?php echo $assetFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($assetStatus == $pending)
                              {
                                
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Asset request is pending since <?php echo $assetFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($assetStatus == $approved)
                              { 
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Asset request is approved.</h5>
                              <?php
                              }
                              else if($assetStatus==$Rejected)
                              { 
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Asset request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-lg-9">
                                <div class="itemContent">
                                  <div class="row">
                                    <div class="col-lg-6">
                                      <p>Request No. - <?php echo $rowAsset['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowAsset['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowAsset['req_status'] ?></h4></div>
                              </div>
                            </div>
                          </a>
                          </div>
                        </div>
                      </div>
                    </div>
                      <?php
                      }
                    ?>
                    <?php
                    }
                    }
                    
                    ?>
                    <br>
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
                    $query = "SELECT * FROM raise_byod  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowByod = mysqli_fetch_array($rs_result)) {
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
                              $byodTime = $rowByod["raised_on"];
                              $byodTime1 = strtotime($byodTime);
                              $byodTime2 = strtotime(date('Y-m-d'));
                              $byodSecs = $byodTime2 - $byodTime1;// == <seconds between the two times>
                              $byodDays = $byodSecs / 86400;
                              $byodFin = round($byodDays,0);
                              ?>
                              <div class="col-lg-8">
                                    <?php
                              $status = $rowByod['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($status==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your BYOD request is active since <?php echo $byodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your BYOD request is pending since <?php echo $byodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your BYOD request is approved.</h5>
                              <?php
                              }
                              else if($status==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your BYOD request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_byod.php?id=<?php echo $rowByod['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowByod['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowByod['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowByod['req_status'] ?></h4></div>
                              </div>
                            </div>
                          </div>
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
  </body>
</html>