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
              <?php include_once 'topLeftPannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> MyTravel</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>My Passport Details</h4>
                      <div class="personalData">
                        <?php
                        $pass_num = $row['pass_num'];
                        $pass_dateOfIssue = $row['pass_dateOfIssue'];
                        $pass_dateOfExpiry = $row['pass_dateOfExpiry'];
                        $pass_issueAuth = $row['pass_issueAuth'];
                        $pass_address_1 = $row['pass_address_1'];
                        $pass_address_2 = $row['pass_address_2'];
                        
                        if ($pass_num==''||$pass_dateOfIssue==''||$pass_dateOfExpiry==''||$pass_issueAuth==''||$pass_address_1==''||$pass_address_2=='')
                        {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="nullAddress" style="text-align:
                              center;padding-bottom: 10px;">
                              <p>Oops!! Travel details are not yet updated. Click on "edit" to update your travel details.</p>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <a href="update_travel.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                              <button class="actionButtonIcons-center">Edit &nbsp
                              <i class="fa fa-pencil"></i>
                              </button>
                            </a>
                          </div>
                        </div>
                        <?php
                        }
                        else {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="row">
                              <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Name on Passport :</b> <?php echo $row['Fullname'] ?></li>
                                  <li class="list-group-item"><b>Date of Birth :</b> <?php echo $row['dob'] ?></li>
                                  <li class="list-group-item"><b>Birth Country :</b> <?php echo $row['country_birth'] ?></li>
                                  <li class="list-group-item"><b>Passport Number :</b> <?php echo $row['pass_num'] ?></li>
                                                                    
                                </ul>
                              </div>
                              <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Date of Issue :</b> <?php echo $row['pass_dateOfIssue'] ?></li>
                                  <li class="list-group-item"><b>Date of Expiry :</b> <?php echo $row['pass_dateOfExpiry'] ?></li>
                                  <li class="list-group-item"><b>Issuing Authority :</b> <?php echo $row['pass_issueAuth'] ?></li>
                                  <li class="list-group-item"><b>Address on Passport :</b> <?php echo $row['pass_address_1'] ?>,<?php echo $row['pass_address_2'] ?></li>
                                
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <a href="update_travel.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                              <button class="actionButtonIcons-center">Edit &nbsp
                              <i class="fa fa-pencil"></i>
                              </button>
                            </a>
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
        </div>
      </div>
    </div>
  </body>
</html>