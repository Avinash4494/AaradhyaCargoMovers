 <?php 
require_once('db.php');
 include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body onload="aadharSplit(),showtime();">
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <?php
        $profileData = $row['dob'];
        if ($profileData=='') {
        ?>
        <div class="row">
          <div class="col-lg-12">
            <div class="welcomeOnbaord">
              <h3>"Welcome Onboard!" <?php echo $row['Fullname'] ?> </h3>
              <h4>Aaradhya Cargo Movers</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            
            <div class="createProfile">
              <div class="well">
                <h5>Create your profile.</h5>
                <a href="addProfile.php?id=<?php echo $row['id'] ?>" >
                  <button class="actionButtonIcons" style="text-align: center;">Create profile
                  &nbsp <i class="fa fa-user-plus"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
        <?php
        }
        else{
        ?>
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Personal Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                       
                      <div class="personalData">
                        <?php  include_once 'accountInfo.php'; ?>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php
        }
        ?>
        
      </div>
    </div>
  </body>
</html>