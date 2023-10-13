<?php
include('../db.php');
$upload_dir = 'uploads/employees-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_employees where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_employees where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="employees_index.php"; }, 1000);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>myRequest</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-lg-9">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">myApp Store</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="appComponent">
                  <div class="row">
                    <div class="col-lg-2">
                      <a data-toggle="tab" href="#AllApps">
                        <div class="appSore">
                          <div class="well">
                            <h4 class="active">myAppStore</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-2">
                      <a data-toggle="tab" href="#Finance">
                        <div class="appSore">
                          <div class="well">
                            <h4>myFinance</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-2">
                      <a data-toggle="tab" href="#Claims">
                        <div class="appSore">
                          <div class="well">
                            <h4>myClaims</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="col-lg-2">
                      <a data-toggle="tab" href="#Requests">
                        <div class="appSore">
                          <div class="well">
                            <h4>myRequests</h4>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                
                <div class="tab-content">
                  <div id="AllApps" class="tab-pane fade in active">
                    <div class="appsHead">
                      <h5>myAppStore</h5>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <a href="../emp_Profile/myTime_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-clock"></i>
                              <p>myTime</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/finance_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-money"></i>
                              <p>myFinance</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_Profile/index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-briefcase"></i>
                              <p>myData</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_Profile/office_index.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i   class="fa fa-building" ></i>
                              <p>myOffice</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_Profile/leave_history.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i  class="fa fa-calendar" ></i>
                              <p>myLeaves</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_Profile/index.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i class="fa fa-user" ></i>
                              <p>myProfile</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/claims_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-money"></i>
                              <p>myClaims</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/entryPass.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-address-card-o"></i>
                              <p>Entry Pass</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/eStore.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-pencil"></i>
                              <p>eStore</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/helpDesk.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i class="fa fa-phone" ></i>
                              <p>helpDesk</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/raise_feedback.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i  class="fa fa-comments" ></i>
                              <p>Feedback</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/itServices.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i   class="fa fa-desktop" ></i>
                              <p>itServices</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
 
                  </div>
                  <div id="Finance" class="tab-pane fade">
                    
                    <div class="appsHead">
                      <h5>myFinance</h5>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/finance_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-money"></i>
                              <p>myFinance</p>
                            </div>
                          </div>
                        </a>
                      </div>
 
 
                    </div>
                  </div>
                  <div id="Claims" class="tab-pane fade">
                    <div class="appsHead">
                      <h5>myClaims</h5>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/claims_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-car"></i>
                              <p>Conveyance</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/claims_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-money"></i>
                              <p>Food</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/claims_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-briefcase"></i>
                              <p>Miscellaneous</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div id="Requests" class="tab-pane fade">
                    <div class="appsHead">
                      <h5>myRequests</h5>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/claims_index.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-money"></i>
                              <p>myClaims</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/entryPass.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-address-card-o"></i>
                              <p>Entry Pass</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/eStore.php">
                          <div class="favAppsStore">
                            <div class="well">
                              <i class="fa fa-pencil"></i>
                              <p>eStore</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/helpDesk.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i class="fa fa-phone" ></i>
                              <p>helpDesk</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/raise_feedback.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i  class="fa fa-comments" ></i>
                              <p>Feedback</p>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-lg-2">
                        <a href="../emp_AppStore/itServices.php">
                          <div class="favAppsStore">
                            <div class="well" >
                              <i   class="fa fa-desktop" ></i>
                              <p>itServices</p>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="aboutPannel">
              <div class="well">
                <h4>About this App</h4>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation.</p>
              </div>
            </div>
            <div class="otherPannel">
              <a href="raise_feedback.php">
                <div class="well">
                  <h4>Share Feedback</h4>
                </div>
              </a>
            </div>
            <div class="otherPannel">
              <a href="helpDesk.php">
                <div class="well">
                  <h4>Help Desk</h4>
                </div>
              </a>
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