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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Entry Pass</span></h5>
              </div>
              <div class="bodyComponentReq">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="requestIndex">
                      <a href="raise_guestPass.php">
                        <div class="reqestTabGuest">
                          <h4>Guest Pass</h4>
                        </div>
                      </a>
                      <div class="reqestTabEntry">
                        <h4> Entry Passes</h4>
                      </div>
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
                    $query = "SELECT * FROM raise_guest  WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowGuest = mysqli_fetch_array($rs_result)) {
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
                              $getDateGuest = $rowGuest["raised_on"];
                              $guestTime1 = strtotime($getDateGuest);
                              $guestTime2 = strtotime(date('Y-m-d'));
                              $guestSecs = $guestTime2 - $guestTime1;// == <seconds between the two times>
                              $guestDays = $guestSecs / 86400;
                               $guestFin = round($guestDays,0);
                              ?>
                              <div class="col-lg-8">
                                <?php
                              $Gueststatus = $rowGuest['req_status'];
                              $active2= "Active";
                              $pending2 = "Pending";
                              $approved2="Apporved";
                              $Rejected2 = "Rejected";
                              if ($Gueststatus==$active2) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Guest Pass request is active since <?php echo $guestFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Gueststatus == $pending2)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Guest Pass request is pending since <?php echo $guestFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($Gueststatus == $approved2)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Guest Pass request is approved.</h5>
                              <?php
                              }
                              else if($Gueststatus==$Rejected2)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Guest Pass request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_guest.php?id=<?php echo $rowGuest['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowGuest['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowGuest['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowGuest['req_status'] ?></h4></div>
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
                    $query = "SELECT * FROM raise_gate_pass  WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowGate = mysqli_fetch_array($rs_result)) {
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
                                $gateTime = $rowGate["raised_on"];
                                $gateTime1 = strtotime($gateTime);
                                $gateTime2 = strtotime(date('Y-m-d'));
                                $gateSecs = $gateTime2 - $gateTime1;// == <seconds between the two times>
                                $gateDays = $gateSecs / 86400;
                                $gateFin = round($gateDays,0);
                                ?>
                              <div class="col-lg-8">
                                   <?php
                                $status = $rowGate['req_status'];
                                $active= "Active";
                                $pending  = "Pending";
                                $approved="Approved";
                                $Rejected = "Rejected";
                                if ($status==$active) {
                                ?>
                                <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Gate Pass request is active since <?php echo $gateFin; ?> days and waiting for approval.</h5>
                                <?php
                                }
                                else if($status == $pending)
                                {
                                ?>
                                <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Gate Pass request is pending since <?php echo $gateFin; ?> days and waiting for approval.</h5>
                                <?php
                                }
                                else if($status == $approved)
                                {
                                ?>
                                <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Gate Pass request is approved.</h5>
                                <?php
                                }
                                else if($status==$Rejected)
                                {
                                ?>
                                <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Gate Pass request is rejected.</h5>
                                <?php
                                }
                                ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_gate.php?id=<?php echo $rowGate['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowGate['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowGate['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowGate['req_status'] ?></h4></div>
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
                    $query = "SELECT * FROM raise_vehicle_pass  WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowVech = mysqli_fetch_array($rs_result)) {
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
                              $vehTime = $rowVech["raised_on"];
                              $vehTime1 = strtotime($vehTime);
                              $vehTime2 = strtotime(date('Y-m-d'));
                              $vehSecs = $vehTime2 - $vehTime1;// == <seconds between the two times>
                              $vehDays = $vehSecs / 86400;
                              $vehFin = round($vehDays,0);
                              ?>
                              <div class="col-lg-8">
                                     <?php
                              $vechstatus = $rowVech['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($vechstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Vehicle pass request is active since <?php echo $vehFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vechstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Vehicle pass request is pending since <?php echo $vehFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vechstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Vehicle pass request is approved.</h5>
                              <?php
                              }
                              else if($vechstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Vehicle pass request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_vech.php?id=<?php echo $rowVech['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowVech['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowVech['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowVech['req_status'] ?></h4></div>
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
                    $query = "SELECT * FROM raise_vend_pass WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowVend = mysqli_fetch_array($rs_result)) {
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
                              $vendGuest = $rowVend["raised_on"];
                              $vendTime1 = strtotime($vendGuest);
                              $vendTime2 = strtotime(date('Y-m-d'));
                              $vendSecs = $vendTime2 - $vendTime1;// == <seconds between the two times>
                              $vendDays = $vendSecs / 86400;
                              $vendFin = round($vendDays,0);
                              ?>
                              <div class="col-lg-8">
                                       <?php
                              $vendstatus = $rowVend['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($vendstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Vendor pass request is active since <?php echo $vendFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vendstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Vendor pass request is pending since <?php echo $vendFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($vendstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Vendor pass request is approved.</h5>
                              <?php
                              }
                              else if($vendstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Vendor pass request is rejected.</h5>
                              <?php
                              }
                              ?>
                              </div>
                              <div class="col-lg-2">
                                <div class="iconDel">
                                  <a href="view_vend.php?id=<?php echo $rowVend['id'] ?>">
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
                                      <p>Request No. - <?php echo $rowVend['request_id'] ?></p>
                                      
                                    </div>
                                    <div class="col-lg-6">
                                      <p>Raised On. - <?php echo $rowVend['raised_on'] ?></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-3">
                                <div class="actionButtonRequest"><h4><?php echo $rowVend['req_status'] ?></h4></div>
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