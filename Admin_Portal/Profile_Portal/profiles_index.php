<?php include('db.php'); ?>
<?php include_once '../session.php' ?> 
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
        
        
        <?php
        $profileData = $row['dob'];
        if ($profileData=='') {
        ?>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="createProfile">
              <div class="well">
                <h5>Create your profile.</h5>
                <a href="addProfile.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Admin Accounts</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <h4>Admin Accounts</h4>
                      <div class="personalData">
                        <?php  include_once 'allaccountsInfo.php'; ?>
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
                              echo "<a style='border:none;' href='profiles_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                              }
                              for ($i=1; $i<=$total_pages; $i++) {
                              if ($i == $page) {
                              $pagLink .= "<a class = 'active' href='profiles_index.php?page="
                              .$i."'>".$i." </a>";
                              }
                              else  {
                              $pagLink .= "<a href='profiles_index.php?page=".$i."'>
                              ".$i." </a>";
                              }
                              };
                              echo $pagLink;
                              if($page<$total_pages){
                              echo "<a style='border:none;' href='profiles_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
        </div>
        
        <?php
        }
        ?>
        
      </div>
    </div>
  </body>
</html>