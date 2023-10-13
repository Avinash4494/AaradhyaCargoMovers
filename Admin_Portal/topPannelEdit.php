 <body onload="showtime()">
 <?php
session_start();
 
if($_SESSION["employees_id"]){
}
else {
header("location: ../index.php");
}
?>
 
<?php
 
 include_once 'db.php';
$upload_direct ='Profile_Portal/uploads/';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$rowInfo = mysqli_fetch_assoc($query);
?>
      <div class="left-topHeading">
        <div class="container-fluid">
          <div class="row">
            <div class="left-Logo">
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-5">
                    <img src="../image/logoBlack.png" alt="" class="img-responsive">
                  </div>
                  <div class="col-lg-7"><h3>Fit Freak</h3></div>
                </div>
              </div>
            </div>
            <div class="col-lg-10" style="background-color: #1C2833;">
              <div class="row">
                <div class="col-lg-1">
                  <div class="profileCircleDrop">
                                    <?php 
                   $profile_image = $rowInfo['profile_image'];
 if ($profile_image=='Null') 
 {
?>
<img src="../image/empWhite.png" class="img-responsive">
<?php

 }
else {
    ?>
    <img src="<?php echo $upload_direct.$rowInfo['profile_image'] ?>" class="img-responsive">
    <?php
  }
                     ?>
                  </div>
                </div>
                <div class="col-lg-9">
                  <div class="right-topHeading">
                    <h5>Welcome</h5>
                    <h6><?php echo $rowInfo["Fullname"]; ?></h6>
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
<img src="../image/empWhite.png" class="img-responsive">
<?php

 }
else {
    ?>
    <img src="<?php echo $upload_direct.$rowInfo['profile_image'] ?>" class="img-responsive">
    <?php
  }
                     ?>
                        </div>
                      </div>
                      <div class="col-lg-8">
                        <div class="profileName">
                          <h5><?php echo $rowInfo["Fullname"]; ?></h5>
                          <h5><?php echo $rowInfo["employees_id"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="Profile_Portal/index.php"><h5>View and Edit Profile</h5></a>
                      </div>
                      <div class="logout">
                        <a href="Admin_Portal/logout.php"><h5>Log Out</h5></a>
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
                <script>
function showtime() {
var str = '<?php echo $rowInfo["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameString").innerHTML=acronym;
}
 
</script>