<body onload="showtime(),myDisable();">
  <?php
  $upload_direct = '../emp_Profile/uploads/';
  $employees_id = $_SESSION['employees_id'];
  $query = mysqli_query($connect,"SELECT * FROM employee_login WHERE employees_id='$employees_id'");
  $row = mysqli_fetch_assoc($query);
  
  ?>
  
  <div class="left-topHeading" >
        <div class="container-fluid">
          <div class="row">
            
            <div class="left_logo">
              <div class="col-lg-2 col-xs-3  hidden-xs" >
               <a href="../EmpDashboard.php">
                  <img src="../image/mainlogo.png" alt=""  >
               </a>
              </div>
            </div>
            <div class="col-lg-10 col-xs-12" style="background-color: #1C2833;">
              <div class="row">
                <div class="col-lg-1 col-xs-4">
                  <div class="profileCircleDrop">
                    <?php
                    $profile_image = $row['profile_image'];
                    if ($profile_image=='Null')
                    {
                    ?>
                    <img src="../image/empWhite.png" class="img-responsive">
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
                <div class="col-lg-9 col-xs-3" >
                  <div class="right-topHeading">
                    <h5>Welcome</h5>
                    <h6><?php echo $row["Fullname"]; ?> - (<?php echo $row["employees_id"]; ?>)</h6>
                  </div>
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
                  <div class="dropdown-menu">
                    <div class="row">
                      <div class="col-lg-3 col-xs-3">
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
                        <a href="../emp_Profile/index.php"><h5><i class="fa fa-pencil"></i>&nbsp View and Edit Profile</h5></a>
                      </div>
                      <div class="logout">
                        <a href="../emp_Auth/logout.php"><h5><i class="fa fa-sign-out"></i>&nbsp Log Out</h5></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                <a href="index.php"><button class="actionButtonIconsSignOut"><i class="fa fa-pencil"></i>&nbsp Update</button></a>
              </div>
            </div>
            <div class="col-xs-6" style="">
              <div class="logout">
                <a href="../Auth/logout.php"><button class="actionButtonIconsSignOut"><i class="fa fa-sign-out"></i>&nbsp Log Out</button> </a>
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