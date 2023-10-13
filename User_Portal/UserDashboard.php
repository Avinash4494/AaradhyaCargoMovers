<?php
include_once 'db.php';
$resultName = mysqli_query($connect,"SELECT * FROM  user_login");
?>
<?php
session_start();
if($_SESSION["user_id"]){
}
else {
header("location: user_Auth/index.php");
}
?>
<?php
$upload_direct = 'user_Profile/uploads/';
$user_id = $_SESSION['user_id'];
$query = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Dashboard - <?php echo $row["coy_name"]; ?></title>
  <head>
    <link rel="icon" href="../image/logo_A.png">
  </head>
  <body onload="showtime(),shipmentPending(),trackPending(),orderPending();">
    <?php include_once '../Header_Links/auth_Header_Links.php' ?>
    <div class="wrapper">
      <div class="left-topHeading" >
        <div class="container-fluid">
          <div class="row">
            <div class="left_logo">
              <div class="col-lg-2 col-xs-3  hidden-xs" >
                <a href="UserDashboard.php">
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
                    if ($profile_image=='')
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
                    <h6><?php echo $row["coy_name"]; ?></h6>
                  </div>
                  <div class="right-topHeading hidden-lg">
                    <h5> <span id="greetings"></span></h5>
                    <h6><?php echo $row["coy_name"]; ?></h6>
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
                  <div class="logoutFrame" >
                    <button type="button" class="actionButtonIconsCogs" data-toggle="collapse"  data-target="#dropdownDemoDrop"><i class="fa fa-cogs"></i></button>
                  </div>
                  <div class="dropdown-menu" id="dropdownDemoDrop">
                    <div class="row">
                      <div class="col-lg-3 col-xs-3">
                        <div class="profileCircleDropdown">
                          <?php
                          if ($profile_image=='')
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
                          <h5 style="padding-top: 15px;"><?php echo $row["coy_name"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="user_Profile/company_profile.php"><h5><i class="fa fa-pencil"></i>&nbsp View and Edit Profile</h5></a>
                      </div>
                      <div class="user_Auth">
                        <a href="user_Auth/logout.php"><h5><i class="fa fa-sign-out"></i>&nbsp Log Out</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapperCompEmp">
        <div class="container-fluid">
          <div class="pannelComp">
            <div class="row">
              <div class="col-lg-2">
                <div class="dashWidgetTop">
                  <div class="well">
                    <div class="coy_profile">
                      <?php
                      if ($profile_image=='')
                      {
                      ?>
                      <img src="image/emp.png" class="img-responsive">
                      <?php
                      }
                      else {
                      ?>
                      <img src="<?php echo $upload_direct.$row['profile_image'] ?>" class="img-responsive">
                      <?php
                      }
                      ?>
                      <h5><?php echo $row["coy_name"]; ?> </h5>
                    </div>
                  </div>
                </div>
                <div class="dashWidgetBottom">
                  <div class="contentComp">
                    <a href="UserDashboard.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-dashboard"></i>&nbsp Dashboard</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="user_AppStore/index_couriers.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-truck"></i>&nbsp Couriers</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="user_AppStore/billing_index.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-money"></i>&nbsp Billing</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="user_AppStore/trace_courier.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-search"></i>&nbsp Track</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="user_AppStore/shipment_index.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-cart-plus"></i>&nbsp Shipment</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                     <a href="user_AppStore/analysis.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-calculator"></i>&nbsp Analysis</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="user_Profile/company_profile.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-cogs"></i>&nbsp Settings</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-10">
                <div class="createWidget">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-10"></div>
                      <div class="col-lg-2">
                        <a href="user_AppStore/raise_shipment.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                <style type="text/css">
                   .createWidget .well,.widgetComp .well
                  {
                    background-color: white;
                  }
                  .widgetComp .well
                  {
                    background-color: #FAFAFA;
                  }
                  
                  
                </style>
                <div class="widgetComp" style="margin-top: -10px;margin-bottom: -10px;">
                  <div class="well">
                    <?php
                    error_reporting(0);
                    $query_run = mysqli_query($connect,"SELECT * FROM member_add_courier Where user_id = '$user_id'");
                    $num = mysqli_fetch_array($query_run);
                    $getId = $num['invoice_no'];
                    if ($getId == 0) {
                    ?><style>
                    .welcomeComp
                    {
                    text-align: center;
                    }
                    </style>
                    <div class="welcomeComp">
                      <h1>Welcome  </h1>
                      <h3><?php echo $row['coy_name']; ?></h3>
                    </div>
                    <?php
                    }else
                    {
                    ?>
                    <div class="row">
                      <div class="col-lg-4">
                        <?php
                        $user_id = $row['user_id'];
                        $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  member_add_courier Where user_id = '$user_id' ");
                        while($rowUser = mysqli_fetch_array($resultUser))  {
                        ?>
                        <style type="text/css">
                          .dashWidgetSmall .well
                          {
                            background-color: #1c2833;
                          }
                        </style>
                        <a href="user_AppStore/index_couriers.php">
                          <div class="dashWidgetSmall" >
                            <div class="well">
                              <h4>Couriers</h4>
                              <div class="row">
                                <div class="col-lg-8">
                                  <i class="fa fa-archive"></i>
                                </div>
                                <div class="col-lg-4">
                                  <h3><?php echo $rowUser[0]; ?></h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php
                        }
                        ?>
                        
                      </div>
                      <div class="col-lg-4">
                        <?php
                        $user_id = $row['user_id'];
                        $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  schedule_pickup Where user_id = '$user_id' ");
                        while($rowUser = mysqli_fetch_array($resultUser))  {
                        ?>
                        
                        <a href="user_AppStore/shipment_index.php">
                          <div class="dashWidgetSmall" >
                            <div class="well">
                              <h4>Shipments</h4>
                              <div class="row">
                                <div class="col-lg-8">
                                  <i class="fa fa-file"></i>
                                </div>
                                <div class="col-lg-4">
                                  <h3><?php echo $rowUser[0]; ?></h3>
                                </div>
                              </div>
                            </div>
                          </div>
                        </a>
                        <?php
                        }
                        ?>
                        
                      </div>
                      <div class="col-lg-4">
                        <?php
                        $query_run = mysqli_query($connect,"SELECT * FROM member_add_courier Where user_id = '$user_id'");
                        $totalAmount= 0;
                        while ($num = mysqli_fetch_array($query_run)) {
                        $totalAmount +=(int)$num['grand_total'];
                        }
                        ?>
                        <div class="dashWidgetSmall" >
                          <div class="well">
                            <h4>Payments</h4>
                            <div class="row">
                              <div class="col-lg-3">
                                <i class="fa fa-inr"></i>
                              </div>
                              <div class="col-lg-9">
                                <h5><span id="amountString"></span>.00</h5>
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
 

<div class="widgetOuter">
   <h4>Get started in a few easy steps :</h4>
  <div class="well">

    <div class="widgetTabs">
  <div class="row">
            <div class="col-lg-4">
      <div class="well">
         <div id="pendingShip">
          <div class="widgetPending"><h6>Pending</h6></div>
        <div class="sqarePending"></div>
        </div>
        <?php
$user_id = $row['user_id'];
$resultUser = mysqli_query($connect,"SELECT * FROM  schedule_pickup Where user_id = '$user_id' ");
$rowUser = mysqli_fetch_array($resultUser);
$getPickup = $rowUser["pickup_id"];

?>
        <script>
          function shipmentPending()
          {
            var getPickId = '<?php echo $getPickup; ?>';
            if (getPickId=='') 
            {
              document.getElementById("pendingShip").style.display = "block";
            }
            else
            {
              document.getElementById("pendingShip").style.display = "none";
            }
          }
        </script>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="widgetIcon">
               <i class="fa fa-archive"></i>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
        <h4>Create Your Shipment</h4>
        <p>Select a courier of your choice and
schedule a pickup when ready.</p>
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <a href="user_AppStore/raise_shipment.php">
              <button class="actionButtonCreate" type="submit">Create Shipment</button>
            </a>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="well">
          <div id="pendingTrack">
          <div class="widgetPending"><h6>Pending</h6></div>
        <div class="sqarePending"></div>
        </div>
                <?php
 
$resultUser = mysqli_query($connect,"SELECT * FROM  member_add_courier Where user_id = '$user_id' ");
$rowUser = mysqli_fetch_array($resultUser);
$getTrack = $rowUser["courier_id"];

?>
        <script>
          function trackPending()
          {
            var getTrack = '<?php echo $getPickup; ?>';
            if (getTrack=='') 
            {
              document.getElementById("pendingTrack").style.display = "block";
            }
            else
            {
              document.getElementById("pendingTrack").style.display = "none";
            }
          }
        </script>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="widgetIcon">
               <i class="fa fa-map"></i>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
        <h4>Track Your Order</h4>
        <p>Select a courier to track the <br>status of courier.</p>
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <a href="user_AppStore/trace_courier.php">
              <button class="actionButtonCreate" type="submit">Track Order</button>
            </a>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </div>
        <div class="col-lg-4">
      <div class="well">
        <div id="orderPending">
          <div class="widgetPending"><h6>Pending</h6></div>
        <div class="sqarePending"></div>
        </div> 
                <?php
 
$resultUser = mysqli_query($connect,"SELECT * FROM  member_add_courier Where user_id = '$user_id' ");
$rowUser = mysqli_fetch_array($resultUser);
$getPickup = $rowUser["pickup_id"];

?>
        <script>
          function orderPending()
          {
            var getPickId = '<?php echo $getPickup; ?>';
            if (getPickId=='') 
            {
              document.getElementById("orderPending").style.display = "block";
            }
            else
            {
              document.getElementById("orderPending").style.display = "none";
            }
          }
        </script>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="widgetIcon">
               <i class="fa fa-file"></i>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
        <h4>Add Your Order</h4>
        <p>Add your order manually or connect your
        website / marketplace orders.</p>
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <a href="">
              <button class="actionButtonCreate" type="submit">Add Order</button>
            </a>
          </div>
          <div class="col-lg-3"></div>
        </div>
      </div>
    </div>

  </div>
</div>
  </div>
</div>

<div class="widgetOuter">
   <h4>Recommended Actions to Setup Your Account : </h4>
    <div class="well" style="padding: 15px;">
<div class="row">
<div class="col-lg-6">
  <div class="widgetSetup">
    <div class="well">
      <div class="row">
        <div class="col-lg-2">
          <div class="widgetIconSetup">
            <i class="fa fa-video"></i>
          </div>
        </div>
        <div class="col-lg-10">
          <h5>Register for Training</h5>
          <p>Attend our training session to learn about the processes of Aaradhya Cargo Movers to make your journey seamless</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="widgetSetup">
    <div class="well">
      <div class="row">
        <div class="col-lg-2">
          <div class="widgetIconSetup">
            <i class="fa fa-building"></i>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="row">
            <div class="col-lg-10">
              <h5>Bank Details</h5>
            </div>
            <div class="col-lg-2">
               <a href="user_AppStore/add_bank.php?id=<?php echo $row['id'] ?>">
            <i style="padding-top: 10px;" class="fa fa-pencil"></i>
          </a>
            </div>
          </div>
          
<?php
$bankAccNum = $row['bankAccNum'];
if ($bankAccNum!=='')
{
?>
<div class="accountDetails" style="padding-top: 15px;">
  <div class="row">
  <div class="col-lg-5">
  <p>Acc. No. : <?php echo $row['bankAccNum']; ?> </p>
  </div>
  <div class="col-lg-7">
    <p>Name : <?php echo $row['bankBenName']; ?> </p>
  </div>
</div>
</div>
<?php
}
else {
?>
<p>Connect your company's bank account for seamless transactions <br>for your couriers..</p>
<?php
}
?>
         
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-lg-6">
  <div class="widgetSetup">
    <div class="well">
      <div class="row">
        <div class="col-lg-2">
          <div class="widgetIconSetup">
            <i class="fa fa-file"></i>
          </div>
        </div>
        <div class="col-lg-10">
          <h5>Add GSTIN</h5>
          <p>Enter your registered GST Identification Number to add it to your freight and customer invoice.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6">
  <div class="widgetSetup">
    <div class="well">
      <div class="row">
        <div class="col-lg-2">
          <div class="widgetIconSetup">
            <i class="fa fa-file"></i>
          </div>
        </div>
        <div class="col-lg-10">
  <div class="row">
            <div class="col-lg-10">
              <h5>Company Information</h5>
            </div>
            <div class="col-lg-2">
               <a href="user_Profile/update_profile.php?id=<?php echo $row['id'] ?>">
            <i style="padding-top: 10px;" class="fa fa-pencil"></i>
          </a>
            </div>
          </div>           
          <?php
$coy_name = $row['coy_name'];
if ($bankAccNum!=='')
{
?>
<div class="accountDetails" style="padding-top: 15px;">
  <div class="row">
  <div class="col-lg-7">
  <p><?php echo $row['coy_name']; ?> </p>
  </div>
  <div class="col-lg-5">
    <p><?php echo $row['coy_gstin']; ?> </p>
  </div>
</div>
</div>
<?php
}
else {
?>
<p>Add your company's details for seamless transportation <br>for your couriers..</p>
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
<div class="widgetOuter">
  <h4>Help Resources : </h4>
  <div class="well">
    <div class="row">
      <div class="col-lg-6">
        <div class="widgetHelp">
          <div class="well">
            <div class="row">
              <div class="col-lg-7">
                <h4>Aaradhya Cargo Movers <br>
                Knowledge Centre</h4>
                <p>Browse through various self-help articles to learn more.</p>
                <a href="">
                  <button class="actionButtonCreate">Visit Knowledge Center</button>
                </a>
              </div>
              <div class="col-lg-5">
                <img src="image/15.png" class="img-responsive" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="widgetHelp">
          <div class="well">
            <div class="row">
              <div class="col-lg-7">
                <h4>Watch Tutorials</h4>
                <br>
                <p>Watch tutorials on Youtube to learn about getting
                started and processing orders.</p>
                <a href="">
                  <button class="actionButtonCreate">Watch Tutorials</button>
                </a>
              </div>
              <div class="col-lg-5">
                <img src="image/16.png" class="img-responsive" alt="">
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
// 1.2k
var str = '<?php echo $row["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameString").innerHTML=acronym;
var strAmount ='<?php echo $totalAmount; ?>';
var amountMatches = strAmount.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
document.getElementById("amountString").innerHTML=amountMatches;
}
function checkTime(i) {
if (i < 10) {i = "0" + i};
return i;
}
</script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../Progress-Circle/progresscircle.js"></script>
    <script>
    $('.circlechart').circlechart(); // Initialization
    </script>
 