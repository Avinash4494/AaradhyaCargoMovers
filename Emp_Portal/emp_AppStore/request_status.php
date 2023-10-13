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
          .requestStat .well
          {
          margin-bottom: 5px;
          }
          
          .actionButtonRequest
          {
          margin-top: -10px;
          }
          .iconDel
          {
          margin-top: -30px;
          }
          .actionButtonIcons-center
          {
          margin-top: 10px;
          }
          </style>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="request_index.php" data-toggle="tooltip" title=" My Request!" data-placement="top">My Request</a> / <span class="activePage">Request Status</span></h5>
              </div>
              <div class="bodyComponentReq">
                
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    $per_page_record = 2;
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
                    <h6>Stationery Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowStat['request_id'] ?></p>
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
                                <div class="actionButtonRequest"><h4><?php echo $rowStat['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_stat.php?id=<?php echo $rowStat['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allStationery.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div>
                    <br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                
                
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_guest  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowGuest = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Guest Pass Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowGuest['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Guest Name - <?php echo $rowGuest['guest_name'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowGuest['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowGuest['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_guest.php?id=<?php echo $rowGuest['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allGuest.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                
                
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    $per_page_record = 2;
                    error_reporting(0);
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_gate_pass  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowGate = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Gate Pass Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <a href="view_gate.php?id=<?php echo $rowGate['id'] ?>">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-1">
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
                                <div class="col-lg-8">
                                  
                                  <div class="row">
                                    <div class="col-lg-4">
                                      <p>Request No. - <?php echo $rowGate['request_id'] ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                      <p>Move Between - <?php echo $rowGate['move_btwn'] ?></p>
                                      
                                    </div>
                                    <div class="col-lg-4">
                                      <p>Raised On. - <?php echo $rowGate['raised_on'] ?></p>
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-2">
                                  <div class="actionButtonRequest"><h4><?php echo $rowGate['req_status'] ?></h4></div>
                                </div>
                                <div class="col-lg-1">
                                  <div class="iconDel">
                                    <a href="view_gate.php?id=<?php echo $rowGate['id'] ?>">
                                      <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allGate.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                
                
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    $per_page_record = 2;
                    error_reporting(0);
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_vehicle_pass  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowVech = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Vehicle Pass Request</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowVech['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Veh. No. - <?php echo $rowVech['veh_num'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowVech['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowVech['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_vech.php?id=<?php echo $rowVech['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allVech.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <?php
                    $per_page_record = 2;
                    error_reporting(0);
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_vend_pass  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowVend = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Vendor Pass Request</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowVend['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Vendor Name - <?php echo $rowVend['vendor_name'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowVend['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowVend['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_vend.php?id=<?php echo $rowVend['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allVend.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                
                <div class="row">
                  <div class="col-lg-12">
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
                    <h6>Desktop Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowDesk['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Office location - <?php echo $rowDesk['offc_location'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowDesk['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowDesk['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_desktop.php?id=<?php echo $rowDesk['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allDesktop.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                <div class="row">
                  <div class="col-lg-12">
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
                    <h6>BYOD Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <?php
                              $status = $rowByod['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Apporved";
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowByod['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Office location - <?php echo $rowByod['offc_location'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowByod['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowByod['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_byod.php?id=<?php echo $rowByod['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allByod.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                  
                </div>
                
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_business_card  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowBuis = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Business Card Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowBuis['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Office location - <?php echo $rowBuis['offc_location'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowBuis['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowBuis['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_buis.php?id=<?php echo $rowBuis['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allBuis.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_convclaim  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowConv = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Conveyance Claim Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                              <?php
                              $convTime = $rowConv["raised_on"];
                              $convTime1 = strtotime($convTime);
                              $convTime2 = strtotime(date('Y-m-d'));
                              $convSecs = $convTime2 - $convTime1;// == <seconds between the two times>
                              $convDays = $convSecs / 86400;
                              $convFin = round($convDays,0);
                              ?>
                              <?php
                              $deskstatus = $rowConv['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5> <i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Conveyance Claim  request is active since <?php echo $convFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5> <i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Conveyance Claim  request is pending since <?php echo $convFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5> <i class="fa fa-circle" style="color: green;"></i> &nbsp Your Conveyance Claim  request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5> <i class="fa fa-circle" style="color: red;"></i> &nbsp Your Conveyance Claim  request is rejected.</h5>
                              <?php
                              }
                              ?>
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Claim No. - <?php echo $rowConv['claim_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Amount - <i class="fa fa-inr"></i> <?php echo $rowConv['total_claimed'] ?>.00</p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowConv['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowConv['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_convclaims.php?id=<?php echo $rowConv['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allConvClaims.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_foodclaim  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowFood = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Food Claim Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                              <?php
                              $foodTime = $rowFood["raised_on"];
                              $foodTime1 = strtotime($foodTime);
                              $foodTime2 = strtotime(date('Y-m-d'));
                              $foodSecs = $foodTime2 - $foodTime1;// == <seconds between the two times>
                              $foodDays = $foodSecs / 86400;
                              $foodFin = round($foodDays,0);
                              ?>
                              <?php
                              $deskstatus = $rowFood['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Food Claim  request is active since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Food Claim  request is pending since <?php echo $foodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Food Claim  request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Food Claim  request is rejected.</h5>
                              <?php
                              }
                              ?>
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Claim No. - <?php echo $rowFood['claim_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Amount - <i class="fa fa-inr"></i> <?php echo $rowFood['total_claimed'] ?>.00</p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowFood['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowFood['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_foodclaims.php?id=<?php echo $rowFood['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allFoodClaims.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_misceclaim  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowMisc = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Miscellaneous Claim Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                              <?php
                              $miscTime = $rowMisc["raised_on"];
                              $miscTime1 = strtotime($miscTime);
                              $miscTime2 = strtotime(date('Y-m-d'));
                              $miscSecs = $miscTime2 - $miscTime1;// == <seconds between the two times>
                              $miscDays = $miscSecs / 86400;
                              $miscFin = round($miscDays,0);
                              ?>
                              <?php
                              $deskstatus = $rowMisc['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Miscellaneous Claim  request is active since <?php echo $miscFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Miscellaneous Claim  request is pending since <?php echo $miscFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Miscellaneous Claim  request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Miscellaneous Claim  request is rejected.</h5>
                              <?php
                              }
                              ?>
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Claim No. - <?php echo $rowMisc['claim_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Amount - <i class="fa fa-inr"></i> <?php echo $rowMisc['total_claimed'] ?>.00</p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowMisc['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowMisc['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_misceClaims.php?id=<?php echo $rowMisc['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allMiscClaims.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
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
                    $query = "SELECT * FROM raise_mediclaim  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowMedi = mysqli_fetch_array($rs_result)) {
                    ?>
                    <h6>Medi Claim Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
                                <div class="iconCal">
                                  <i class="fa fa-calendar"></i>
                                </div>
                              </div>
                              <?php
                              $mediTime = $rowMedi["raised_on"];
                              $mediTime1 = strtotime($mediTime);
                              $mediTime2 = strtotime(date('Y-m-d'));
                              $mediSecs = $mediTime2 - $mediTime1;// == <seconds between the two times>
                              $mediDays = $mediSecs / 86400;
                              $mediFin = round($mediDays,0);
                              ?>
                              <?php
                              $deskstatus = $rowMedi['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($deskstatus==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Medi Claim  request is active since <?php echo $mediFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Medi Claim  request is pending since <?php echo $mediFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($deskstatus == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Medi Claim  request is approved.</h5>
                              <?php
                              }
                              else if($deskstatus==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Medi Claim  request is rejected.</h5>
                              <?php
                              }
                              ?>
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Claim No. - <?php echo $rowMedi['claim_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Amount - <i class="fa fa-inr"></i> <?php echo $rowMedi['total_claimed'] ?>.00</p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowMedi['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowMedi['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_mediClaim.php?id=<?php echo $rowMedi['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allMediClaims.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
                      </div>
                    </div><br>
                    <?php
                    }
                    }
                    
                    ?>
                  </div>
                </div>
                                <div class="row">
                  <div class="col-lg-12">
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
                    ?>
                    <h6>Asset Requests</h6>
                    <div class="row">
                      <div class="col-lg-10">
                        <div class="requestStat">
                          <div class="well">
                            <div class="row">
                              <div class="col-lg-1">
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
                                        <?php
                              $status = $rowAsset['req_status'];
                              $active= "Active";
                              $pending  = "Pending";
                              $approved="Approved";
                              $Rejected = "Rejected";
                              if ($status==$active) {
                              ?>
                              <h5><i class="fa fa-circle" style="color: yellow;"></i> &nbsp Your Asset request is active since <?php echo $byodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $pending)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: orange;"></i> &nbsp Your Asset request is pending since <?php echo $byodFin; ?> days and waiting for approval.</h5>
                              <?php
                              }
                              else if($status == $approved)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: green;"></i> &nbsp Your Asset request is approved.</h5>
                              <?php
                              }
                              else if($status==$Rejected)
                              {
                              ?>
                              <h5><i class="fa fa-circle" style="color: red;"></i> &nbsp Your Asset request is rejected.</h5>
                              <?php
                              }
                              ?>
                              <div class="col-lg-8">
                                
                                <div class="row">
                                  <div class="col-lg-4">
                                    <p>Request No. - <?php echo $rowAsset['request_id'] ?></p>
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Asset Type - <?php echo $rowAsset['asset_type'] ?></p>
                                    
                                  </div>
                                  <div class="col-lg-4">
                                    <p>Raised On. - <?php echo $rowAsset['raised_on'] ?></p>
                                    
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-2">
                                <div class="actionButtonRequest"><h4><?php echo $rowAsset['req_status'] ?></h4></div>
                              </div>
                              <div class="col-lg-1">
                                <div class="iconDel">
                                  <a href="view_asset.php?id=<?php echo $rowAsset['id'] ?>">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-2">
                        <a href="allMediClaims.php">
                          <button class="actionButtonIcons-center" type="submit"> View More</button>
                        </a>
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
<!--
<script>
function changeColor()
{
var getStatus = document.getElementById("Status").innerHTML;
var active = "Active";
if (getStatus==active)
{
document.getElementById("changeColor").style.backgroundColor = "red";
}
}
</script> -->