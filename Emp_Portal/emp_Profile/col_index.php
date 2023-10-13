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
                 <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">MyCollege</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                           <h4>College Details</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your College Information was last updated on : <?php echo $row['col_upDate'] ?></h6>
                        </div>
                      </div>
                     
                      <div class="personalData">
                        <?php
                        $col_highQual = $row['col_highQual'];
                        $col_degree = $row['col_degree'];
                        $col_state = $row['col_state'];
                        $col_yearPass = $row['col_yearPass'];
                        $col_branch = $row['col_branch'];
                        $col_percentage = $row['col_percentage'];
                        $col_college = $row['col_college'];
                        
                        if ($col_highQual==''||$col_degree==''||$col_state==''||$col_yearPass==''||$col_branch==''||$col_percentage==''||$col_college=='')
                        {
                        ?>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="nullAddress" style="text-align:
                              center;padding-bottom: 10px;">
                              <p>Oops!! Educational details are not yet updated. Click on edit to update your bank details.</p>
                            </div>
                          </div>
                            <div class="col-lg-2">
                            <a href="update_col.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
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
                                  <li class="list-group-item"><b>Highest Qualification : </b><?php echo $row['col_highQual'] ?></li>
                                  <li class="list-group-item"><b>Degree : </b><?php echo $row['col_degree'] ?></li>
                                  <li class="list-group-item"><b>State : </b><?php echo $row['col_state'] ?></li>
                                  <li class="list-group-item"><b>Year of Passing : </b><?php echo $row['col_yearPass'] ?></li>
                                  
                                </ul>
                              </div>
                              <div class="col-lg-6">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Percentage/CGPA : </b><?php echo $row['col_percentage'] ?></li>
                                  <li class="list-group-item"><b>Branch : </b><?php echo $row['col_branch'] ?></li>
                                  <li class="list-group-item"><b>College : </b><?php echo $row['col_college'] ?></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2">
                            <a href="update_col.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
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