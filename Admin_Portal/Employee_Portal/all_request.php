<?php
require_once('db.php');
 
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftRequest.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Request Summary </span> </h5>
              </div>
              <div class="bodyComponent">
                <div class="tab-content">
                  <div id="Leaves" class="tab-pane fade ">
                    <div class="tabPaneClaims">
                      <div class="tab-content">
                        <?php include_once 'tab_Leave_List.php' ?>
                      </div>
                    </div>
                  </div>
                  <div id="Claims" class="tab-pane fade">
                    <div class="row">
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_convclaim ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#ConveyanceClaims">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <h4><?php echo $rowUser[0] ?></h4>
                                    <h5>Conveyance Claims</h5>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_foodclaim ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#FoodClaims">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <h4><?php echo $rowUser[0] ?></h4>
                                    <h5>Food Claims</h5>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_misceclaim ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#MiscellaneousClaims">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <h4><?php echo $rowUser[0] ?></h4>
                                    <h5>Miscellaneous Claims</h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_mediclaim ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#MediClaims">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <h4><?php echo $rowUser[0] ?></h4>
                                    <h5>Medi Claims</h5>
                                  </div>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      
                    </div>
                    <div class="tabPaneClaims">
                      <div class="tab-content">
                        <?php include_once 'tab_claims_List.php' ?>
                      </div>
                    </div>
                  </div>
                  <div id="EntryPasses" class="tab-pane fade">
                    <div class="row">
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_guest ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#guestPass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Guest Pass Request</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_gate_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#gatePass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Gate Pass Request</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_vehicle_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#vehiclePass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Vehicle Pass Request</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_vend_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#vendorPass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Vendor Pass Request</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="tabPaneClaims">
                      <div class="tab-content">
                        <?php include_once 'tab_EntryPasses_List.php' ?>
                      </div>
                    </div>
                    
                  </div>
                  <div id="ItServices" class="tab-pane fade in active">
                    <div class="row">
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_desktop ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#Desktop">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Desktop Request</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <style>
                      .widgetsReport .well
                      {
                      margin-bottom: 5px;
                      }
                      </style>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_byod ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#byod">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>BYOD </h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_asset ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#asset">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>IT Asset</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_vehicle_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#vehiclePass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>ID Card</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      
                    </div>
                    <div class="tab-content">
                      <?php include_once 'tab_itServices_List.php' ?>
                    </div>
                    
                  </div>
                  <div id="EStore" class="tab-pane fade">
                    <div class="row">
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_stat ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#Stationery">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Stationery</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <style>
                      .widgetsReport .well
                      {
                      margin-bottom: 5px;
                      }
                      </style>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_business_card ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#businessCard">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Business Card </h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_gate_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#gatePass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>Name Plate</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_vehicle_pass ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="col-lg-3 col-xs-6">
                        <a data-toggle="tab" href="#vehiclePass">
                          <div class="widgetsReport">
                            <div class="well">
                              <div class="rectContent">
                                <div class="row">
                                  <div class="col-lg-8">
                                    <h5>ID Card</h5>
                                  </div>
                                  <div class="col-lg-4">
                                    <span><?php echo $rowUser[0] ?></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                      </div>
                      <?php
                      }
                      ?>
                      
                    </div>
                    <div class="tab-content">
                      <?php include_once 'tab_Estore_List.php' ?>
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
  <script>
  function printDivSection(setion_id) {
  var Contents_Section = document.getElementById(setion_id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = Contents_Section;
  window.print();
  document.body.innerHTML = originalContents;
  }
  </script>