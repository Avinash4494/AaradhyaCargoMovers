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
              <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Request Details </span> </h5>
              </div>
              <div class="bodyComponent">
                <h5 style="margin-top: -10px;"><i class="fa fa-bookmark"></i> &nbsp Claim Request</h5>
                <div class="row">
                  <style type="text/css">
                  .widgetsReport .well
                  {
                  margin-bottom:0px;
                  margin-top:0px;
                  }
                  .bodyComponent i
                  {
                  font-size: 1.9em;
                  }
                  </style>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_convclaim ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="all_conv_list.php">
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Conveyance Claim Requests</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_foodclaim ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="all_food_list.php">
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Food Claim Requests</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_misceclaim ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="all_misc_list.php">
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Miscellaneous Claim Requests</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_mediclaim ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?><a href="all_medi_list.php">
                      <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Medi Claim Requests</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                
                  <?php
                  }
                  ?>
                </div>
                <h5><i class="fa fa-bookmark"></i> &nbsp Entry Passes Request</h5>
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_guest ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="passGuest_list.php">
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Guest Pass Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_gate_pass ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Gate Pass Request</p>
                        </div>
                      </div>
                    </div>
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
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Vehicle Pass Request</p>
                        </div>
                      </div>
                    </div>
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
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Vendor Pass Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <h5><i class="fa fa-bookmark"></i> &nbsp E - Store Request</h5>
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_stat ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Stationery Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_business_card ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Business Card Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_id_card ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>ID Card Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_id_card ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Name Plate Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <h5> <i class="fa fa-bookmark"></i> &nbsp IT Services Request</h5>
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_desktop ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Desktop Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_byod");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>BYOD Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_asset");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-3 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Asset Request</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  
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