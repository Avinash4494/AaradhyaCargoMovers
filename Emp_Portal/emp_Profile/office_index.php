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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> MyOffice</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <h4>Office Details</h4>
                        </div>
                        <div class="col-lg-6">
                            <h6 style="float: right;">Your Office Information was last updated on : <?php echo $row['offc_upDate'] ?></h6>
                        </div>
                      </div>
                      
                      <div class="personalData">
                        <?php
                        $offc_desig = $row['offc_desig'];
                        $offc_floor = $row['offc_floor'];
                        $offc_wing = $row['offc_wing'];
                        $offc_cubicle = $row['offc_cubicle'];
                        $offc_tower = $row['offc_tower'];
                        
                        if ($offc_desig==''||$offc_floor==''||$offc_wing==''||$offc_cubicle==''||$offc_tower=='')
                        {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="nullAddress" style="text-align:
                              center;padding-bottom: 10px;">
                              <p>Oops!! Office details are not yet updated. Click on "Edit" to update.</p>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <h4>  <a href="update_office.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                              <button class="actionButtonIcons-center">
                              <i class="fa fa-pencil"></i> &nbsp Edit
                              </button>
                            </a></h4>
                          </div>
                        </div>
                        <style>
                        .actionButtonIcons-center
                        {
                        font-size: 0.8em;
                        }
                        </style>
                        <?php
                        }
                        else {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="row">
                              <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Employee ID Name : </b> <?php echo $row['employees_id'] ?></li>
                                  <li class="list-group-item"><b>Name :</b> <?php echo $row['Fullname'] ?></li>
                                  <li class="list-group-item"><b>Designation :</b> <?php echo $row['offc_desig'] ?></li>
                                  <li class="list-group-item"><b>Email Id :</b> <?php echo $row['Email'] ?></li>
                                   <li class="list-group-item"><b>Date of Joining :</b> <?php echo $row['joiningDate'] ?></li>
                                
                                </ul>
                              </div>
                              <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Floor :</b> <?php echo $row['offc_floor'] ?></li>
                                  <li class="list-group-item"><b>Wing :</b> <?php echo $row['offc_wing'] ?></li>
                                  <li class="list-group-item"><b>Cubicle Number :</b> <?php echo $row['offc_cubicle'] ?></li>
                                  <li class="list-group-item"><b>Tower Number :</b> <?php echo $row['offc_tower'] ?></li>
                                  <li class="list-group-item"><b>Location :</b> <?php echo $row['offc_location'] ?></li>

                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <a href="update_office.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
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