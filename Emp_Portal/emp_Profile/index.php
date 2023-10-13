 <?php 
require_once('db.php');
 include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <style>
        .onboardContainer
        {
          background-image: url(../image/team.png);
          background-repeat: no-repeat;
          height:565px;
          background-size: cover;
         }
      </style>
      <?php include_once 'rightTopPannel.php' ?>
              <?php
        $dob = $row['dob'];
        $gender = $row['gender'];
          $alternate_phone = $row['alternate_phone'];
          $pan_num = $row['pan_num'];
          $aadhar_num = $row['aadhar_num'];
          $aadhar_name = $row['aadhar_name'];
          $aadhar_dob = $row['aadhar_dob'];
          $country_birth = $row['country_birth'];
          $blood_grp = $row['blood_grp'];
          $birth_place = $row['birth_place'];
          $martial_status = $row['martial_status'];
        if ($dob==''||$gender==''||$alternate_phone==''||$pan_num==''||$aadhar_num==''||$aadhar_name==''||$aadhar_dob==''||$country_birth==''||$blood_grp==''||$birth_place==''||$martial_status=='') {
        ?>
<div class="onboardContainer">
<div class="container-fluid">
            <div class="row">
              <div class="col-lg-4"></div>
          <div class="col-lg-8">
            <div class="welcomeOnbaord">
              <h3>"Welcome Onboard!" <?php echo $row['Fullname'] ?> </h3>
              <h4>Aaradhya Cargo Movers</h4>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6"></div>
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
          <div class="col-lg-2"></div>
        </div>
</div>
</div>
      <div class="container-fluid" >
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