<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowAllStud = mysqli_fetch_assoc($result);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="Courier_Portal/deleteSuccess.php"; }, 1000);
</script>';
}
}
}
?>
<?php
include_once 'db.php';
$resultName = mysqli_query($connect,"SELECT * FROM  admin_login");
?>
<?php
include_once 'db.php';
$resultAllCouriers = mysqli_query($connect,"SELECT * FROM addcourier");
?>
<?php
require_once('db.php');
$upload_dir = 'Profile_Portal/uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from contact where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
session_start();
if($_SESSION["username"]){
}
else {
header("location: index.php");
}
?>
<?php
include_once 'db.php';
$username = $_SESSION['username'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='$username'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Dashboard - <?php echo $row["Fullname"]; ?> </title>
  <head>
    <?php include_once 'navAdminLinks.php'?>
  </head>
  <div><?php include_once 'adminNavTop.php' ?></div>
  
  <body onload="showtime(),kFormatter(),kWeightFormat(),showtimesmall(),kFormatterSmall(),kWeightFormatSmall()" >
    <div class="sectionHiddens"></div>
    <div class="container-fluid hidden-xs">
      <div class="row">
        <div class="col-lg-2">
          <div class="leftPannelAdmin">
            <div class="shortProfile">
              <div class="well">
                <div class="profilePic">
                  <?php
                  require_once "db.php";
                  $upload_dir = 'Profie_Portal/uploads/';
                  $username = $_SESSION['username'];
                  $query_profile = mysqli_query($connect,
                  "SELECT a.USN,a.Fullname,a.Email,u.image
                  From admin_login as a
                  join admin_info as u
                  on a.USN = u.USN_id
                  WHERE USN='$username'");
                  $row_profile = mysqli_fetch_assoc($query_profile)
                  ?>
                  <img src="<?php echo $upload_dir.$row_profile['image'] ?>"  class="img-responsive">
                  <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <div id="status"></div>
                    </div>
                  </div>
                  <h4><?php echo $row_profile["Fullname"]; ?></h4>
                  <h6><?php echo $row_profile["Email"]; ?></h6>
                </div>
              </div>
            </div>
            <?php include_once 'sideNavAdmin.php' ?>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="dashIntroDash"  >
            <div class="row">
              <div class="col-lg-12">
                <h4><span id="greetings"></span> <?php echo $row["Fullname"]; ?> </h4>
                <span id="show_time"></span>
              </div>
            </div>
          </div>
          <div class="rightPannel" >
            <div class="row">
              <div class="col-lg-6">
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/index.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsBoxApp">
                        <div class="well">
                          <div class="circleContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Couriers</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  tbl_employees ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Employees_Portal/index.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsBoxApp">
                        <div class="well">
                          <div class="circleContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>Employees</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <?php
                  include_once 'db.php';
                  $query_run = mysqli_query($connect,"SELECT * FROM addcourier");
                  $qty= 0;$wt=0;
                  while ($num = mysqli_fetch_array($query_run)) {
                  $qty += $num['cost'];
                  $wt +=(int)$num['actualwt'];
                  }
                  ?>
                  <div class="col-lg-6">
                    <div class="widgetsBoxApp">
                      <div class="well">
                        <div class="circleContent">
                          <h4 id="amountTotal">.00 Rs</h4>
                          <p>Grand Total</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="widgetsBoxApp">
                      <div class="well">
                        <div class="circleContent">
                          <h4 id="weightTotal"> Kg</h4>
                          <p>Frieght Weights</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><br>
            <div class="row">
              <div class="widgetCircleApp">
                <div class="col-lg-4">
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  apply_now_careers ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Careers_Portal/allApplicants.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsCircleLeft">
                        <div class="well">
                          <div class="circleContent">
                            <h3 id="total"><?php echo $rowUser[0] ?></h3>
                            <h4>Applicants</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  usercoment ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/feedback_report.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsCircleRight">
                        <div class="well">
                          <div class="circleContent">
                            <h3 id="total"><?php echo $rowUser[0] ?></h3>
                            <h4>Feedback</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  quote ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/quote_report.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsCircleLeft">
                        <div class="well">
                          <div class="circleContent">
                            <h3 id="total"><?php echo $rowUser[0] ?></h3>
                            <h4>Quote</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  quote ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/blogs_report.php">
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsCircleRight">
                        <div class="well">
                          <div class="circleContent">
                            <h3 id="total"><?php echo $rowUser[0] ?></h3>
                            <h4>Blogs</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="col-lg-8"></div>
              <div class="col-lg-8 col-xs-6 hidden-xs">
                <div class="widgetsBoxAppLg">
                  <div class="well">
                    <div class="BoxLgContent">
                      <?php
                      include_once 'db.php';
                      $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier order by courierdate ");
                      while($rowUser = mysqli_fetch_array($resultUser))  {
                      ?>
                      <div class="row">
                        <div class="col-lg-9">
                          <h4>Courier Report</h4>
                        </div>
                        <div class="col-lg-3"><h5 style="text-align: center;">Total: <?php echo $rowUser[0] ?></h5></div>
                      </div>
                      <?php
                      }
                      ?>
                      <div class="row">
                        <div class="col-lg-12">
                          <table class="table table-hover" width="100%">
                            <thead>
                              <tr>
                                <th>Docket No.</th>
                                <th>Receiver Name</th>
                                <th>Contact</th>
                                <th>Receiver Email</th>
                                <th>Weight (Kg)</th>
                                <th>Date</th>
                                <th>View</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              require_once "db.php";
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM addcourier order by courierdate LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowAllStud = mysqli_fetch_array($rs_result)) {
                              // Display each field of the records.
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $row['id'] ?></p>
                                <td><?php echo $rowAllStud['docketNumber'] ?></td>
                                <td><?php echo $rowAllStud['rname'] ?></td>
                                <td><?php echo $rowAllStud['rmobile'] ?></td>                      <td><?php echo $rowAllStud['remail'] ?></td>
                                <td><?php echo $rowAllStud['actualwt'] ?></td>
                                <td><?php echo $rowAllStud['courierdate'] ?></td>
                                <td style="text-align: center;"><a href="Courier_Portal/courierEdit.php?id=<?php echo $rowAllStud['id'] ?>" ><i class="fa fa-pencil"></i></a>
                              </td>
                            </tr>
                            <?php
                            }
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                      <a href="Courier_Portal/index.php"><button class="universalButtonView">View All</button></a>
                    </div>
                    <div class="col-lg-4"></div>
                  </div>
                  
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="onSmallScreen hidden-lg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-xs-3">
          <?php
          require_once "db.php";
          $upload_dir = 'Profie_Portal/uploads/';
          $username = $_SESSION['username'];
          $query_profile = mysqli_query($connect,
          "SELECT a.USN,a.Fullname,a.Email,u.image
          From admin_login as a
          join admin_info as u
          on a.USN = u.USN_id
          WHERE USN='$username'");
          $row_profile = mysqli_fetch_assoc($query_profile)
          ?>
          <div class="smallProfile">
            <img src="<?php echo $upload_dir.$row_profile['image'] ?>"  class="img-responsive">
          </div>
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <div id="status"></div>
            </div>
          </div>
          
        </div>
        <div class="col-lg-9">
          <div class="smallIntro">
            <h4><span id="greetingsSmall"></span> <?php echo $row_profile["Fullname"]; ?></h4>
            <h6><?php echo $row_profile["Email"]; ?></h6>
            <h6 id="show_timeSmall"></h6>
          </div>
        </div><hr/ >
        <div class="smallPannelComp">
          <div class="container-fluid">
            <div class="row">
              
              <?php
              include_once 'db.php';
              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  admin_login ");
              while($rowUser = mysqli_fetch_array($resultUser))  {
              ?>
              <a href="Profie_Portal/allAccounts.php">
                <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6"> <i class="fa fa-users"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Accounts</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <?php
              }
              ?>
              <?php
              include_once 'db.php';
              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  admin_login ");
              while($rowUser = mysqli_fetch_array($resultUser))  {
              ?>
              <a href="Profie_Portal/index.php">
                <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6"> <i class="fa fa-user-plus"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Manage Accounts</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <?php
              }
              ?>
            </div>
            <div class="row">
              <?php
              include_once 'db.php';
              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier ");
              while($rowUser = mysqli_fetch_array($resultUser))  {
              ?>
              <a href="Courier_Portal/index.php">
                <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6"> <i class="fa fa-cart-plus" aria-hidden="true"></i></div>
                          <div class="col-xs-6"> <p class="countNum"><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Couriers</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <?php
              }
              ?>
              <?php
              include_once 'db.php';
              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  addcourier ");
              while($rowUser = mysqli_fetch_array($resultUser))  {
              ?>
              <a href="Profie_Portal/allAccounts.php">
                <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6"> <i class="fa fa-archive"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Courier Report</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
              <?php
              }
              ?>
              
              
            </div>
            <div class="row">
              <?php
              include_once 'db.php';
              $query_run = mysqli_query($connect,"SELECT * FROM addcourier");
              $qtySmall= 0;$wtSmall=0;
              while ($num = mysqli_fetch_array($query_run)) {
              $qtySmall += $num['cost'];
              $wtSmall +=(int)$num['actualwt'];
              }
              ?>
              <div class="col-lg-6 col-xs-12">
                <div class="smallwidgetsBoxApp">
                  <div class="well">
                    <div class="smallContent">
                      <div class="row">
                        <div class="col-xs-1"> <i class="fa fa-inr" aria-hidden="true"></i></div>
                        <div class="col-xs-4"> <h4 class="resultText">Grand Total</h4></div>
                        <div class="col-xs-7"> <p id="amountTotalSmall"><?php echo $qtySmall ?>.00 Rs</p></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-xs-12">
                <div class="smallwidgetsBoxApp">
                  <div class="well">
                    <div class="smallContent">
                      <div class="row">
                        <div class="col-xs-1"> <i class="fa fa-truck" aria-hidden="true"></i></div>
                        <div class="col-xs-4"> <h4 class="resultText">Frieght Weights</h4></div>
                        <div class="col-xs-7"> <p id="weightTotalSmall"><?php echo $wtSmall ?>.00 Kg</p></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
             
            <div class="row">
                   <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  apply_now_careers ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Careers_Portal/allApplicants.php">
                     <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6">  <i class="fa fa-briefcase" aria-hidden="true"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Applicants</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  apply_now_careers ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Careers_Portal/index.php">
                    <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6"> <i class="fa fa-briefcase" aria-hidden="true"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Careers</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  usercoment ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Feedback_Portal/feedback_report.php">
                     <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6">  <i class="fa fa-comments-o" aria-hidden="true"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Feedbacks</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  quote ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <a href="Courier_Portal/quote_report.php">
                    <div class="col-xs-6">
                  <div class="smallwidgetsBoxApp">
                    <div class="well">
                      <div class="smallContent">
                        <div class="row">
                          <div class="col-xs-6">  <i class="fa fa-address-card-o" aria-hidden="true"></i></div>
                          <div class="col-xs-6"> <p><?php echo $rowUser[0] ?></p></div>
                        </div>
                        <div class="row">
                          <div class="col-xs-12">
                            <h4>Quotes</h4>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  </a>
                  <?php
                  }
                  ?>
                  
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
if(h>=1 && h<=12)
{
document.getElementById("greetings").innerHTML= 'Good Morning';
}
else if(h>=12 && h<=15)
{
document.getElementById("greetings").innerHTML= 'Good Afternoon';
}
else if(h>=15 && h<=18)
{
document.getElementById("greetings").innerHTML= "Good Evening";
}
else if(h>=18 && h<=24)
{
document.getElementById("greetings").innerHTML= "<i class='fas fa-cloud-moon'></i> Good Night";
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
function kFormatter() {
var num='<?php echo $qty; ?>';
console.log(num);
return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
}
function kWeightFormat() {
var weight='<?php echo $wt; ?>';
console.log(weight);
return Math.abs(weight) > 999 ? Math.sign(weight)*((Math.abs(weight)/1000).toFixed(1)) + 'k' : Math.sign(weight)*Math.abs(weight)
}
document.getElementById("amountTotal").innerHTML = window.kFormatter();
document.getElementById("weightTotal").innerHTML = window.kWeightFormat();
</script>
<!-- <script>
var hint = document.getElementById("hint");
// Defining function to update connection status
function updateConnectionStatus() {
var status = document.getElementById("status");
if(navigator.onLine) {
status.classList.add("online");
status.classList.remove("offline");
} else {
window.location.href="offlineDash.php";
status.classList.add("offline");
status.classList.remove("online");
}
}
// Attaching event handler for the load event
window.addEventListener("load", updateConnectionStatus);
// Attaching event handler for the online event
window.addEventListener("online", function(e) {
updateConnectionStatus();
hint.innerHTML = "And we're back!";
});
// Attaching event handler for the offline event
window.addEventListener("offline", function(e) {
updateConnectionStatus();
hint.innerHTML = "Hey, it looks like you're offline.";
console.log("Hey, it looks like you're offline.")
});
</script> -->
<script>
// Set timeout variables.
var timoutWarning = 12000; // Display warning in 14 Mins.
var timoutNow = 12000; // Timeout in 15 mins.
var logoutUrl = ''; // URL to logout page.
var warningTimer;
var timeoutTimer;
// Start timers.
function StartTimers() {
warningTimer = setTimeout("IdleWarning()", timoutWarning);
timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
}
// Reset timers.
function ResetTimers() {
clearTimeout(warningTimer);
clearTimeout(timeoutTimer);
StartTimers();
$("#timeout").dialog('close');
}
// Show idle timeout warning dialog.
function IdleWarning() {
$("#timeout").dialog({
modal: true
});
// var msg = '<div class="bigBox"><div class="container-fluid"><div class="row"><div class="col-lg-3"></div><div class="col-lg-6"><div class="well"><h5>Warning, your page will redirected to login page. Due to not move your mouse within the page in 15 minutes.</h5></div><div class="col-lg-3"></div></div></div></div>'
// document.getElementById("dialogPop").innerHTML = msg;
// alert("Warning, your page will redirected to login page. Due to not move your mouse within the page in 15 minutes.");
}
// Logout the user.
function IdleTimeout() {
window.location = logoutUrl;
}
</script>


<!-- FOR SMALL -->
<script>
function showtimesmall() {
var today = new Date();
var slicedate=today.toString().slice(0,16);
var h = today.getHours();
var m = today.getMinutes();
var s = today.getSeconds();
m = checkTimeSmall(m);
s = checkTimeSmall(s);
document.getElementById('show_timeSmall').innerHTML =
slicedate + " " + h + ":" + m + ":" + s;

var t = setTimeout(showtimesmall, 500);
if(h>=1 && h<=12)
{
document.getElementById("greetingsSmall").innerHTML= 'Good Morning';
}
else if(h>=12 && h<=15)
{
document.getElementById("greetingsSmall").innerHTML= 'Good Afternoon';
}
else if(h>=15 && h<=24)
{
document.getElementById("greetingsSmall").innerHTML= "Good Evening";
}
 
// 1.2k
var str = '<?php echo $row["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameString").innerHTML=acronym;
}
function checkTimeSmall(i) {
if (i < 10) {i = "0" + i};
return i;
}
// function kFormatterSmall() {
// var num='<?php echo $qtySmall; ?>';
// console.log(num);
// return Math.abs(num) > 999 ? Math.sign(num)*((Math.abs(num)/1000).toFixed(1)) + 'k' : Math.sign(num)*Math.abs(num)
// }
// function kWeightFormatSmall() {
// var weight='<?php echo $wtSmall; ?>';
// console.log(weight);
// return Math.abs(weight) > 999 ? Math.sign(weight)*((Math.abs(weight)/1000).toFixed(1)) + 'k' : Math.sign(weight)*Math.abs(weight)
// }
// document.getElementById("amountTotalSmall").innerHTML = window.kFormatterSmall();
// document.getElementById("weightTotalSmall").innerHTML = window.kWeightFormatSmall();

</script>