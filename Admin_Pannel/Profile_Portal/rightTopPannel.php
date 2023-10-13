<body onload="showtime()">
<?php
$upload_direct ='uploads/';
 $employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query);
 
?>
 
      <div class="left-topHeading">
        <div class="container-fluid">
          <div class="row">
            <div class="left-Logo">
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-lg-5">
                    <img src="../../image/logoBlack.png" alt="" class="img-responsive">
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
                      $profile_image = $row['profile_image'];
                    
 if ($profile_image=='Null') 
 {
?>
<img src="../../image/empWhite.png" class="img-responsive">
<?php

 }
else {
    ?>
    <img src="<?php echo $upload_direct.$row['profile_image']; ?>" class="img-responsive">
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
<img src="../../image/empWhite.png" class="img-responsive">
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
                        <a href="index.php"><h5>View and Edit Profile</h5></a>
                      </div>
                      <div class="logout">
                        <a href="../logout.php"><h5>Log Out</h5></a>
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
var str = '<?php echo $row["Fullname"]; ?>';
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
document.getElementById("nameString").innerHTML=acronym;
}
 
</script>