<?php
include_once 'db.php';
$resultName = mysqli_query($connect,"SELECT * FROM  admin_login");
?>
<?php
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: Auth/index.php");
}
?>
<?php
$upload_direct = 'Profile_Portal/uploads/';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query)
?>
<?php
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
echo '<script>
setTimeout(function(){ window.location.href="AdminDashboard.php"; }, 100);
</script>';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  <head>
  </head>
  <body onload="showtime()">
    
    <?php include_once '../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <div class="left-topHeading">
        <div class="container-fluid">
          <div class="row">
            <div class="left-Logo">
              <div class="col-lg-2" >
                <img src="image/mainlogo.png" alt="" class="img-responsive">
              </div>
            </div>
            <div class="col-lg-10" style="background-color: #1C2833;">
              <div class="row">
                <div class="col-lg-1">
                  <div class="profileCircleDrop">
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
                <div class="col-lg-9">
                  <div class="right-topHeading">
                    <h5>Welcome</h5>
                    <h6><?php echo $row["Fullname"]; ?></h6>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div class="nameString">
                    <span id="nameString"></span>
                  </div>
                </div>
                <div class="col-lg-1">
                  <div class="logoutFrame" data-toggle="dropdown">
                    <a href=""><i class="fa fa-cogs"></i></a>
                  </div>
                  <div class="dropdown-menu">
                    <div class="row">
                      <div class="col-lg-3">
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
                      <div class="col-lg-8">
                        <div class="profileName">
                          <h5><?php echo $row["Fullname"]; ?></h5>
                          <h5><?php echo $row["employees_id"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="Profile_Portal/index.php"><h5>View and Edit Profile</h5></a>
                      </div>
                      <div class="logout">
                        <a href="Auth/logout.php"><h5>Log Out</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Home-comTop"></div>
              <div class="left-compTop">
                <a href="AdminDashboard.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-dashboard"></i> &nbsp Dashboard</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Courier_Portal/courier_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-comments"></i> &nbsp Couriers</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Admin_Portal/enquiry_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-envelope-open"></i> &nbsp Quotation</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Reports_Portal/report_Index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-file-text"></i> &nbsp Reports</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Admin_Portal/payment_Index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-inr"></i> &nbsp Payments</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Admin_Portal/payment_Index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-inr"></i> &nbsp Receipts</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Admin_Portal/feedback_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-comments"></i> &nbsp Feedback</button>
                  <div class="actionBox"></div>
                </a>
                <!--                 <a href="Admin_Portal/member_Index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-user-plus"></i> &nbsp Members</button>
                  <div class="actionBox"></div>
                </a> -->
                
                
                
                
                <a href="Admin_Portal/employees_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-users"></i> &nbsp Employees</button>
                  <div class="actionBox"></div>
                </a>
                <a href="Admin_Portal/leave_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-calendar"></i> &nbsp Vehicles</button>
                  <div class="actionBox"></div>
                </a>
                <!--                 <a href="Admin_Portal/career_index.php">
                  <button class="actionButtonIcons" type="submit"><i class="fa fa-briefcase"></i> &nbsp Careers</button>
                  <div class="actionBox"></div>
                </a> -->
                
              </div>
            </div>
          </div>
          <style>
          .rightPannel
          {
          margin-top: 22px;
          }
          </style>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="widgetsGreetings">
                <div class="well">
                  <div class="headContent">
                    <div class="row">
                      <div class="col-lg-8">
                        <p>Hello!!! &nbsp &nbsp <span id="greetings"></span></p>
                      </div>
                      <div class="col-lg-4">
                        <div class="timeShow">
                          <p><i class="fa fa-clock-o"></i>&nbsp <span id="show_time"></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <!-- rightPannel -->
                <div class="row">
                  <div class="col-lg-5">
                    <div class="row">
                      <div class="col-lg-6">
                        <?php
                        $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier ");
                        while($rowUser = mysqli_fetch_array($resultUser))  {
                        ?>
                        
                        <div class="widgetsReport">
                          <div class="well">
                            <div class="rectContent">
                              <h4 id="total"><?php echo $rowUser[0] ?></h4>
                              <p>Couriers </p>
                              <p><a href="User_Portal/report_Complaints.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Couriers Report</a></p>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                        $packageAmount=0;$paidAmount=0;
                        while ($num = mysqli_fetch_array($query_run)) {
                        $packageAmount +=(int)$num['packgeAmount'];
                        $paidAmount +=(int)$num['amountPaid'];
                        $totalAmtPending =$packageAmount-$paidAmount;
                        }
                        ?>
                        
                        <div class="widgetsReport">
                          <div class="well">
                            <div class="rectContent">
                              <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmtPending ?>/-</h4>
                              <p>Total Pending Payments</p>
                              <p><a href="User_Portal/pending_Payment.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Payment Report</a></p>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <div class="col-lg-6">
                        <?php
                        $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  raise_complaint ");
                        while($rowUser = mysqli_fetch_array($resultUser))  {
                        ?>
                        
                        <div class="widgetsReport">
                          <div class="well">
                            <div class="rectContent">
                              <h4 id="total"><?php echo $rowUser[0] ?></h4>
                              <p>Quote Request</p>
                              <p><a href="User_Portal/pending_Payment.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Quote Report</a></p>
                            </div>
                          </div>
                        </div>
                        <?php
                        }
                        ?>
                        <?php
                        $query_run = mysqli_query($connect,"SELECT * FROM add_member");
                        $totalAmount= 0;
                        while ($num = mysqli_fetch_array($query_run)) {
                        $totalAmount +=(int)$num['amountPaid'];
                        }
                        ?>
                        
                        <div class="widgetsReport">
                          <div class="well">
                            <div class="rectContent">
                              <h4 id="total"><i class="fa fa-inr"></i> <?php echo $totalAmount ?>/-</h4>
                              <p>Total Payment Received</p>
                              <p><a href="User_Portal/report_Payments.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Payment Report</a></p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-7">
                    <style>
                    .rectLongContent .rectWidget .well {                    
                    margin-top: -15px;
                    }
                    .rectLongContent {
    margin-top: 15px;
}
                    </style>
                    <?php
                    require_once "db.php";
                    $upload_dir = 'uploads/employees-uploads/';
                    $per_page_record = 8;
                    if (isset($_GET["page"])) {
                    $page  = $_GET["page"];
                    }
                    else {
                    $page=1;
                    }
                    $start_from = ($page-1) * $per_page_record;
                    $query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
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
                            <div class="col-lg-2">
                              <p><a href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left">Dkt No. <br><?php echo $rowMember['docketNumber'] ?>
                              </a></p>
                            </div>
                             
                            <div class="col-lg-1">
                              <p style="margin-left: -55px;">Date <br><?php echo $rowMember['courierdate'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -40px;">Mode <br><?php echo $rowMember['mode'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -40px;">From <br><?php echo $rowMember['package_from'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -40px;">To <br><?php echo $rowMember['package_to'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -45px;">Weight <br><?php echo $rowMember['total_weight'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -35px;">Rate <br><?php echo $rowMember['rate'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -35px;">Pkg <br><?php echo $rowMember['nofpkts'] ?></p>
                            </div>
                             <div class="col-lg-1">
                              <p style="margin-left: -35px;">Ft. Charges <br><?php echo $rowMember['frieght_charge'] ?></p>
                            </div>
                            <div class="col-lg-1">
                              <p style="margin-left: -10px;">Amount<br><?php echo $rowMember['grand_total'] ?>.00/-</p>
                            </div>
                            <div class="col-lg-1">
                             <p style="text-align: center;font-size: 1.2em;padding-top: 5px;" >
                        <a  href="courier_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <i class="fa fa-trash-o"></i>
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
                    <div class="row">
                      <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <a href="all_Quorier_List.php"><button class="actionButtonIcons-center" type="submit">View All</button></a>
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                  </div>
                </div>
                
                <!--  <div class="widgetsGreetings" style="margin-top: -10px;">
                  <div class="well">
                    <div class="headContent">
                      <div class="row">
                        <div class="col-lg-8">
                          <p>Hello!!! &nbsp &nbsp <span id="greetings"></span></p>
                        </div>
                        <div class="col-lg-4">
                          <div class="timeShow">
                            <p><i class="fa fa-clock-o"></i>&nbsp <span id="show_time"></span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> -->
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
  if(h>=1 && h<=12)
  {
  document.getElementById("greetings").innerHTML= "Good Morning <i class='fas fa-sun-o'></i>";
  }
  else if(h>=12 && h<=15)
  {
  document.getElementById("greetings").innerHTML= "Good Afternoon <i class='fas fa-cloud-moon'></i>";
  }
  else if(h>=15 && h<=24)
  {
  document.getElementById("greetings").innerHTML= "Good Evening <i class='fas fa-moon-o'></i>";
  }
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
  </script>