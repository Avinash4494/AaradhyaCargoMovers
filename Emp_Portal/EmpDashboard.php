<?php
include_once 'db.php';
$resultName = mysqli_query($connect,"SELECT * FROM  employee_login");
?>
<?php
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: emp_Auth/index.php");
}
?>
<?php
$upload_direct = 'emp_Profile/uploads/';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM employee_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  <head>
    <link rel="icon" href="../image/logo_A.png">
  </head>
  <body onload="showtime()">

    <style>
    .notApproved .well
    {
    margin-top: 150px;
    padding: 30px;
    text-align: center;
    background-color: red;
    color: white;
    }
    .notApproved .well .actionButtonIcons
    {
      background-color: white;
      color: red;
      text-align: center;
    }
    </style>
    <?php include_once '../Header_Links/header_links.php' ?>
    <?php
    $deskTime = $row['created_on'];
    $next3Days =  date('d-m-Y', strtotime($deskTime. ' + 3 days'));

    $getAuthStatus = $row['auth_status'];
    $checkAuth = "Approved";
    echo $profileData = $row['dob'];
    if($getAuthStatus!=$checkAuth)
    { 

    ?>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
          <div class="notApproved">
            <div class="well">
              <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                  <img src="../image/notAccess.png" class="img-responsive" />
                </div>
                <div class="col-lg-4"></div>
              </div>
              <br>
              <h4>Your access is not yet approved. </h4>
              <h5 style="line-height: 25px;">Your access request is pending with the admin and will be approved soon.</h5>
              <!-- <h5>Approval Expected Date <?php echo $next3Days; ?></h5> -->
                            <br>
            <div class="row">
              <div class="col-lg-4"></div>
              <div class="col-lg-4">
                  <a href="emp_Auth/logout.php">
                <button class="actionButtonIcons">
                <i class="fa fa-sign-out"></i>&nbsp Log Out
              </button></a>
              </div>
              <div class="col-lg-4">
                <p id="demo"></p>
              </div>
            </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3"></div>
      </div>
    </div>
    <?php
    }else
    {
    ?>
    <div class="wrapper">
      <div class="left-topHeading" >
        <div class="container-fluid">
          <div class="row">
            <div class="left_logo">
              <div class="col-lg-2 col-xs-3  hidden-xs" >
                <a href="AdminDashboard.php">
                  <img src="image/mainlogo.png" alt=""  >
                </a>
              </div>
            </div>
            <div class="col-lg-10 col-xs-12" style="background-color: #1C2833;">
              <div class="row">
                <div class="col-lg-2 col-xs-1 hidden-lg">
                  <div class="hamburgerMenu">
                    <button type="button" class="actionButtonIcons" data-toggle="collapse" data-target="#demo"><i class="fa fa-bars"></i></button>
                  </div>
                </div>
                <div class="col-lg-1 col-xs-2">
                  <div class="profileCircleDrop hidden-xs">
                    <?php
                    $profile_image = $row['profile_image'];
                    if ($profile_image=='Null')
                    {
                    ?>
                    <img src="image/empWhite.png" class="img-responsive">
                    <?php
                    }
                    else {
                    ?>
                    <img src="<?php echo $upload_direct.$row['profile_image'] ?>" class="img-responsive">
                    <?php
                    }
                    ?>
                  </div>
                </div>
                <div class="col-lg-6 col-xs-5" >
                  <div class="right-topHeading hidden-xs">
                    <h5>Welcome</h5>
                    <h6><?php echo $row["Fullname"]; ?> - (<?php echo $row["employees_id"]; ?>)</h6>
                  </div>
                  <div class="right-topHeading hidden-lg">
                    <h5> <span id="greetings"></span></h5>
                    <h6><?php echo $row["Fullname"]; ?></h6>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div id="show_time"></div>
                </div>
                <div class="col-lg-1 col-xs-2">
                  <div class="nameString hidden-xs">
                    <span id="nameString"></span>
                  </div>
                </div>
                <div class="col-lg-1 col-xs-3">
                  <div class="logoutFrame hidden-xs" data-toggle="dropdown" >
                    <a href=""><i class="fa fa-cogs"></i></a>
                  </div>
                  <div class="logoutFrame hidden-lg" >
                    <button type="button" class="actionButtonIconsCogs" data-toggle="collapse"  data-target="#dropdownDemoDrop"><i class="fa fa-cogs"></i></button>
                  </div>
                  <div class="dropdown-menu hidden-xs">
                    <div class="row">
                      <div class="col-lg-3 col-xs-3">
                        <div class="profileCircleDropdown">
                          <?php
                          if ($profile_image=='Null')
                          {
                          ?>
                          <img src="image/empWhite.png" class="img-responsive">
                          <?php
                          }
                          else {
                          ?>
                          <img src="<?php echo $upload_direct.$row['profile_image'] ?>" class="img-responsive">
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-lg-8 col-xs-8">
                        <div class="profileName">
                          <h5><?php echo $row["Fullname"]; ?></h5>
                          <h5><?php echo $row["employees_id"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="emp_Profile/index.php"><h5><i class="fa fa-pencil"></i>&nbsp View and Edit Profile</h5></a>
                      </div>
                      <div class="emp_Auth/logout">
                        <a href="emp_Auth/logout.php"><h5><i class="fa fa-sign-out"></i>&nbsp Log Out</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SMALL DEVICE -->
      <div id="dropdownDemoDrop" class="collapse hidden-lg">
        <div class="profileDetailsSmall">
          <div class="row">
            <div class="col-lg-3 col-xs-3">
              <div class="profileCircleDropdown">
                <?php
                if ($profile_image=='Null')
                {
                ?>
                <img src="image/empWhite.png" class="img-responsive">
                <?php
                }
                else {
                ?>
                <img src="<?php echo $upload_direct.$row['profile_image'] ?>" class="img-responsive">
                <?php
                }
                ?>
              </div>
            </div>
            <div class="col-lg-8 col-xs-6">
              <div class="profileName">
                <h5><?php echo $row["Fullname"]; ?></h5>
                <h5><i class="fa fa-user"></i>&nbsp Username <?php echo $row["employees_id"]; ?></h5>
              </div>
            </div>
            <div class="col-xs-2">
              
            </div>
          </div>
        </div>
        <div class="profileAnchorSmall">
          <div class="row">
            <div class="col-xs-6">
              <div class="editProfile">
                <a href="emp_Profile/index.php"><button class="actionButtonIconsSignOut"><i class="fa fa-pencil"></i>&nbsp Update</button></a>
              </div>
            </div>
            <div class="col-xs-6" style="">
              <div class="logout">
                <a href="emp_Auth/logout.php"><button class="actionButtonIconsSignOut"><i class="fa fa-sign-out"></i>&nbsp Log Out</button> </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- SMALL DEVICE -->
      <div class="wrapperCompEmp">
        <div class="container-fluid">
          <!-- small device -->
          <div class="smallDevice hidden-lg">
            <div id="demo" class="collapse">
              <div class="leftPannel">
                <div class="empty-left-Home-comTop"></div>
                <div class="left-compTop pannelComp">
                  <a href="AdminDashboard.php">
                    <button class="actionButtonIcons" type="submit"><i class="fa fa-dashboard"></i> &nbsp Dashboard</button>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!-- small device -->
          <div class="pannelComp">
            <div class="row">
              <div class="col-lg-3">
                <div class="dashViewComp">
                  <div class="well">
                    <h4>Favourite Apps</h4>
                    <div class="myFavApp">
                      <div class="row">
                        <div class="col-lg-3">
                          <a href="emp_Profile/myTime_apply.php">
                            <div class="favApps">
                              <div class="well">
                                <i class="fa fa-calendar"></i>
                                <p>myTime</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_AppStore/finder_index.php">
                            <div class="favApps">
                              <div class="well">
                                <i style="padding-top: 2px;padding-left: 2px;" class="fa fa-search"></i>
                                <p>myFinder</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_Profile/index.php">
                            <div class="favApps">
                              <div class="well">
                                <i style="padding-top: 2px;" class="fa fa-briefcase"></i>
                                <p>myData</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_Profile/office_index.php">
                            <div class="favApps">
                              <div class="well" >
                                <i style="padding-left: 2px;" class="fa fa-building" ></i>
                                <p>myOffice</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">
                          <a href="emp_AppStore/claims_index.php">
                            <div class="favApps">
                              <div class="well">
                                <i class="fa fa-money"></i>
                                <p>myClaims</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_AppStore/myHelpline_index.php">
                            <div class="favApps">
                              <div class="well">
                                <i class="fa fa-headphones"></i>
                                <p>myHelpline</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_AppStore/request_index.php">
                            <div class="favApps">
                              <div class="well">
                                <i class="fa fa-address-card"></i>
                                <p>myRequest</p>
                              </div>
                            </div>
                          </a>
                        </div>
                        <div class="col-lg-3">
                          <a href="emp_AppStore/appStore_index.php">
                            <div class="favApps">
                              <div class="well" >
                                <i style="padding-top: 3px;padding-left: 2px;" class="fa fa-ellipsis-h" ></i>
                                <p style="margin-top: -1px;">AppStore</p>
                              </div>
                            </div>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="dashViewCompReq">
                  <div class="well">
                    <h4>My Requests</h4>
                    <div class="contentCompList">
                      <a href="emp_Profile/leave_apply.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-calendar"></i>&nbsp Apply leaves</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_vehiclePass.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-address-card-o"></i>&nbsp Vehicle Pass Request</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/claims_index.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-cutlery"></i>&nbsp Food Claim Request</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_gatePass.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-address-card"></i>&nbsp Gate Pass Request</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_travel.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-plane"></i>&nbsp Travel Request</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/claims_index.php">
                        <div class="listItemsComp">
                          <h5><i class="fa fa-credit-card-alt"></i>&nbsp MyClaims</h5>
                          <div class="listSlider"></div>
                        </div>
                      </a>
                    </div>
                    <div class="row">
                      <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <a href="emp_AppStore/request_index.php">
                          <button class="actionButtonDash-center" type="submit">More</button>
                        </a>
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="col-lg-6">
                <div class="dashViewWidget">
                  <div class="well">
                    <div class="row">
                      <a href="emp_AppStore/raise_guestPass.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-address-card"></i>
                            <h3>Guest Pass</h3>
                            <p>Don't keep a visitor waiting,<br>Raise a guest pass quickly.</p>
                          </div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_desktop.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-desktop"></i>
                            <h3>Desktop Request</h3>
                            <p>Request for a desktop/laptop <br> with a few taps.</p>
                          </div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_businnessCard.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-address-card-o"></i>
                            <h3>Business Card</h3>
                            <p>Request for a cool business <br> card made for you.</p>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div class="row">
                      <a href="emp_AppStore/raise_stationery.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-pencil"></i>
                            <h3>Stationery</h3>
                            <p>Raise quick request for stationery items to get started.</p>
                          </div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_byod.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-desktop"></i>
                            <h3>BYOD</h3>
                            <p>Enroll for Bring Your Own Device <br>and  register in the ACM domain.</p>
                          </div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_weBuy.php">
                        <div class="col-lg-4">
                          <div class="detailAppStore">
                            <i class="fa fa-shopping-cart"></i>
                            <h3>WeBuy</h3>
                            <p>Select,order & collect your IT accessories.</p>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dashViewCompData">
                  <div class="well">
                    <h4>My Data</h4>
                    <div class="row">
                      <div class="col-lg-6">
                        <h5> Name : <?php echo $row['Fullname'] ?></h5>
                        <h5> Email : <?php echo $row['Email'] ?></h5>
                        <h5>Mobile Number : <?php echo $row['mobile'] ?></h5>
                      </div>
                      <div class="col-lg-6">
                        <h5>Aadhar Number : <?php echo $row['aadhar_num'] ?></h5>
                        <h5> PAN Number : <?php echo $row['pan_num'] ?></h5>
                        <h5>Date of Joining : <?php echo $row['joiningDate'] ?></h5>
                      </div>
                      <div class="col-lg-2">
                        
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-5"></div>
                      <div class="col-lg-2">
                        <a href="emp_Profile/index.php">
                          <button class="actionButtonDash-center" style="margin-top: 0px;" type="submit">More</button>
                        </a>
                      </div>
                      <div class="col-lg-5"></div>
                    </div>
                  </div>
                </div>
                <div class="dashViewCompData">
                  <div class="well">
                    <h4>My Asset</h4>
                    <?php
                    
                    
                    $query = "SELECT * FROM raise_asset  WHERE employees_id='$employees_id'";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowAsset = mysqli_fetch_array($rs_result)) {
                    $flag = $rowAsset["req_status"];
                    $asset_name = $rowAsset["asset_name"];
                    $Approved = "Approved";
                    if ($flag==$Approved) {
                    ?>
                    <div class="row">
                      <div class="col-lg-3">
                        <h5>Asset Type: <?php echo $rowAsset['asset_type'] ?></h5>
                        <h5>Asset Name : <?php echo $rowAsset['asset_name'] ?></h5>
                      </div>
                      <div class="col-lg-4">
                        <h5>Host No. : <?php echo $rowAsset['asset_hostName'] ?></h5>
                        <h5>Asset Status : <?php echo $rowAsset['asset_status'] ?></h5>
                      </div>
                      <div class="col-lg-5">
                        <h5>Allocation Date : <?php echo $rowAsset['asset_alloc_date'] ?></h5>
                        <h5>End of Eligibility Date : <?php echo $rowAsset['asset_end_date'] ?></h5>
                      </div>
                    </div>
                    <?php
                    }
                    else{
                    
                    }
                    }
                    }
                    else
                    {
                    ?>
                    <h5 style="text-align: center;">No Records Found</h5>
                    <?php
                    }
                    ?>
                    <div class="row">
                      <div class="col-lg-5"></div>
                      <div class="col-lg-2">
                        <a href="emp_Profile/asset_index.php">
                          <button class="actionButtonDash-center" style="margin-top: 2px;" type="submit">More</button>
                        </a>
                      </div>
                      <div class="col-lg-5"></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="dashViewCompReqStat">
                  <div class="well">
                    <h4>Requests Status</h4>
                    <?php
                    $per_page_record = 1;
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_stat  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowStat = mysqli_fetch_array($rs_result)) {
                    $flag = $rowStat["req_status"];
                    $active = "Active";
                    if ($flag==$active) {
                    ?>
                    <a href="emp_AppStore/view_stat.php?id=<?php echo $rowStat['id'] ?>">
                      <div class="listItemsReq">
                        <h5>
                        <div class="row">
                          <div class="col-lg-8">
                            <i class="fa fa-bookmark"></i>&nbsp <span style="margin-left: 15px;">Stationery  <?php echo $rowStat['request_id'] ?></span>
                          </div>
                          <div class="col-lg-4">
                            <?php echo $rowStat['req_status'] ?>
                          </div>
                        </div>
                        </h5>
                        <div class="listSliderReq"></div>
                      </div>
                    </a>
                    
                    <?php
                    }
                    else{}
                    }
                    }
                    ?>
                    
                    <?php
                    $per_page_record = 1;
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_guest  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowStat = mysqli_fetch_array($rs_result)) {
                    $flag = $rowStat["req_status"];
                    $active = "Active";
                    if ($flag==$active) {
                    ?>
                    <a href="emp_AppStore/view_guest.php?id=<?php echo $rowStat['id'] ?>">
                      <div class="listItemsReq">
                        <h5>
                        <div class="row">
                          <div class="col-lg-8">
                            <i class="fa fa-bookmark"></i>&nbsp <span style="margin-left: 10px;"> Guest Pass <?php echo $rowStat['request_id'] ?></span>
                          </div>
                          <div class="col-lg-4">
                            <?php echo $rowStat['req_status'] ?>
                          </div>
                        </div>
                        </h5>
                        <div class="listSliderReq"></div>
                      </div>
                    </a>
                    
                    <?php
                    }}
                    }
                    ?>
                    <?php
                    $per_page_record = 1;
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM raise_gate_pass  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record";
                    $rs_result = mysqli_query ($connect, $query);
                    ?>
                    <?php
                    if(mysqli_num_rows($rs_result)){
                    while ($rowStat = mysqli_fetch_array($rs_result)) {
                    $flag = $rowStat["req_status"];
                    $active = "Active";
                    if ($flag==$active) {
                    ?>
                    <a href="emp_AppStore/view_gate.php?id=<?php echo $rowStat['id'] ?>">
                      <div class="listItemsReq">
                        <h5>
                        <div class="row">
                          <div class="col-lg-8">
                            <i class="fa fa-bookmark"></i>&nbsp <span style="margin-left: 15px;">Gate Pass <?php echo $rowStat['request_id'] ?></span>
                          </div>
                          <div class="col-lg-4">
                            <?php echo $rowStat['req_status'] ?>
                          </div>
                        </div>
                        </h5>
                        <div class="listSliderReq"></div>
                      </div>
                    </a>
                    
                    <?php
                    }}
                    }
                    ?>
                    
                    <div class="row">
                      <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <a href="emp_AppStore/request_status.php">
                          <button class="actionButtonDash-center" type="submit">More</button>
                        </a>
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                  </div>
                </div>
                <div class="dashViewCompAction">
                  <div class="well">
                    <h4>Quick Actions</h4>
                    <div class="contentCompAction">
                      <a href="emp_Profile/myTime_index.php">
                        <div class="listItemsAction">
                          <h5> Fill your timesheet &nbsp<i class="fa fa-calendar"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_Profile/office_index.php">
                        <div class="listItemsAction">
                          <h5> Update office details &nbsp<i class="fa fa-building"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_stationery.php">
                        <div class="listItemsAction">
                          <h5> Request for stationery &nbsp<i class="fa fa-eraser"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/claims_index.php">
                        <div class="listItemsAction">
                          <h5> Raise a cash claim &nbsp<i class="fa fa-credit-card-alt"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/raise_travel.php">
                        <div class="listItemsAction">
                          <h5> Riase a travel request &nbsp<i class="fa fa-car"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_AppStore/claims_index.php">
                        <div class="listItemsAction">
                          <h5> Medi Buddy &nbsp<i class="fa fa-h-square"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
                      <a href="emp_Profile/index.php">
                        <div class="listItemsAction">
                          <h5> Update MyData &nbsp<i class="fa fa-user-plus"></i></h5>
                          <div class="listSliderAction"></div>
                        </div>
                      </a>
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
    </body>
  </html>
  <script>
  function showtime() {
  var today = new Date();
  var slicedate=today.toString().slice(0,16);
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('show_time').innerHTML =
  slicedate + " " + h + ":" + m + ":" + s;
  var t = setTimeout(showtime, 500);
  // 1.2k
  var str = '<?php echo $row["Fullname"]; ?>';
  var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
  var acronym = matches.join(''); // JSON
  document.getElementById("nameString").innerHTML=acronym;


  }
  function checkTime(i) {
  if (i < 10) {i = "0" + i};
  return i;
  }
//   function autoApprove()
//   {
//     var data_created_on = '<?php echo $row['created_on']; ?>';
//     var date3Days = '<?php echo $next3Days; ?>';
//     alert(date3Days);
// if (data_created_on != date3Days) 
// {
//  setTimeout(function(){ window.location.href="../Admin_Portal/Accounts_Portal/autoClick.php"; }, 1500); 
//  // 8 Hours = 28,800,000 Milliseconds
// }
// else
// {
//   alert(date3Days);
// }
    
  </script>