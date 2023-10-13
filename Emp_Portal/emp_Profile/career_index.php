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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage"> MyCareer</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                            <h4>Career Summary</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Career Information was last updated on : <?php echo $row['work_upDate'] ?></h6>
                        </div>
                      </div>
                    
                      <div class="personalData">
                        <?php
                        $work_company = $row['work_company'];
                        $work_role = $row['work_role'];
                        $work_exp = $row['work_exp'];
                        $work_primskills = $row['work_primskills'];
                        $work_secskills = $row['work_secskills'];
                        $work_about = $row['work_about'];
                        
                        if ($work_company==''||$work_role==''||$work_exp==''||$work_primskills==''||$work_secskills==''||$work_about=='')
                        {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="nullAddress" style="text-align:
                              center;padding-bottom: 10px;">
                              <p>Oops!! Work Experience details are not yet updated. Click on "Edit" to update.</p>
                            </div>
                          </div>
                          <div class="col-lg-2">
                              <h4> <a href="update_work.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                                <button class="actionButtonIcons-center">
                                  <i class="fa fa-pencil"></i> &nbsp Edit
                                </button>
                              </a></h4>
                            </div>
                        </div>
                        <?php
                        }
                        else {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="row">
                              <div class="col-lg-12">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Company Name :</b> <?php echo $row['work_company'] ?></li>
                                  <li class="list-group-item"><b>Role :</b> <?php echo $row['work_role'] ?></li>
                                  <li class="list-group-item"><b>Experience :</b> <?php echo $row['work_exp'] ?></li>
                                  <li class="list-group-item"><b>Primary Skills :</b> <?php echo $row['work_primskills'] ?></li>
                                 <li class="list-group-item"><b>Secondary Skills : </b> <?php echo $row['work_secskills'] ?></li>
                                  <li class="list-group-item"><b>Short Description about you.</b><br><?php echo $row['work_about'] ?></li>
                                </ul>
                              </div>
                        
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <a href="update_work.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
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