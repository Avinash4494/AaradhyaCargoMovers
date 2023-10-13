<?php include('db.php'); ?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Accounts Portal </title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftAccounts.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Accounts Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="row">
                  <?php
                  include_once '../db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  admin_login ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-6 col-xs-6">
                <a href="All_Account_List.php">
                      <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Admin Accounts</p>
                          <p> <a href="All_Account_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Accounts Report</a></p>
                        </div>
                      </div>
                    </div>
                </a>
                  </div>
                  <?php
                  }
                  ?>
                  <?php
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  admin_login ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-6 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Active Admins</p>
                          <p><a href="All_Account_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Accounts Report</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                </div>
                <div class="bodyComponent">
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-12">
                        <?php
                        $per_page_record = 5;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM admin_login  LIMIT $start_from, $per_page_record ";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMember = mysqli_fetch_array($rs_result)) {
                        ?>
                        <div class="rectLongContent">
                          <div class="rectWidget">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-10 col-xs-9">
                                  <div class="row">
                                    <div class="col-lg-2">
                                      
                                     <a  href="account_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><p style=" padding-top: 10px;padding-left: 10px;font-size: 1em; text-decoration: none;">User Id : <?php echo $rowMember['random_user_id'] ?> </p>

                                     
                                   </a>
                                    </div>
                                    <div class="col-lg-2">
                                      
                                      <p>Name - <?php echo $rowMember['Fullname'] ?></p>
                                      <p>Contact - <?php echo $rowMember['mobile'] ?></p>
                                    </div>
                                    <div class="col-lg-2">
                                      
                                      <p>D.O.B. - <?php echo $rowMember['dob'] ?></p>
                                      <p>Blodd Group - <?php echo $rowMember['blood_grp'] ?></p>
                                      
                                    </div>
                                    <div class="col-lg-3">
                                       <p>Aadhar No. - <?php echo $rowMember['aadhar_num'] ?></p>
                                     
                                      <p>Email - <?php echo $rowMember['Email'] ?></p>
                                    </div>

                                    <div class="col-lg-3">
                                      <p>PAN No. - <?php echo $rowMember['pan_num'] ?></p>
                                     
                                     <p>Approval Status - <?php echo $rowMember['aadhar_num'] ?>  </p>
                                    </div>

                                  </div>
                                </div>
                                <div class="col-lg-1 col-xs-3">
                                  <p>View <br>
                                    <a style="margin-left: -5px;" class="actionIcon" href="account_View.php?id=<?php echo $rowMember['id'] ?>">
                                      <i class="fa fa-eye"></i>
                                    </a></p>
                                  </div>
                                  <div class="col-lg-1 col-xs-3">
                                    <p>Update <br>
                                      <a  class="actionIcon" href="approval_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                        <i class="fa fa-pencil-square"></i>
                                      </a></p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php
                            }
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
                          </div>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="col-lg-8 col-xs-12"  >
                          <div class="pagination" >
                            <?php
                            $query = "SELECT COUNT(*) FROM admin_login";
                            $rs_result = mysqli_query($connect, $query);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];
                            // Number of pages required.
                            $total_pages = ceil($total_records / $per_page_record);
                            $pagLink = "";
                            if($page>=2){
                            echo "<a style='border:none;' href='admin_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                            if ($i == $page) {
                            $pagLink .= "<a class = 'active' href='admin_index.php?page="
                            .$i."'>".$i." </a>";
                            }
                            else  {
                            $pagLink .= "<a href='admin_index.php?page=".$i."'>
                            ".$i." </a>";
                            }
                            };
                            echo $pagLink;
                            if($page<$total_pages){
                            echo "<a style='border:none;' href='admin_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                            }
                            ?>
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12" >
                          <div class="pagination" style="float: right;">
                            <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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