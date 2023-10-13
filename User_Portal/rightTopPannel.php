<body onload="showtime(),myDisable();">
  <?php
$upload_direct = '../user_Profile/uploads/';
  ?>
      <div class="left-topHeading" >
        <div class="container-fluid">
          <div class="row">
            <div class="left_logo">
              <div class="col-lg-2 col-xs-3  hidden-xs" >
                <a href="../UserDashboard.php">
                  <img src="../image/mainlogo.png" alt=""  >
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
                <div class="col-lg-6 col-xs-5" >
                  <div class="right-topHeading hidden-xs">
                    <h5>Welcome</h5>
                    <h6><?php echo $row["coy_name"]; ?></h6>
                  </div>
                  <div class="right-topHeading hidden-lg">
                    <h5> <span id="greetings"></span></h5>
                    <h6><?php echo $row["Fullname"]; ?></h6>
                  </div>
                </div>
                <div class="col-lg-3" >
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
                          <h5 style="padding-top: 15px;"><?php echo $row["coy_name"]; ?></h5>
                        </div>
                      </div>
                    </div>
                    <div class="profileAnchor">
                      <div class="editProfile">
                        <a href="../user_Profile/company_profile.php"><h5><i class="fa fa-pencil"></i>&nbsp View and Edit Profile</h5></a>
                      </div>
                      <div class="user_Auth">
                        <a href="../user_Auth/logout.php"><h5><i class="fa fa-sign-out"></i>&nbsp Log Out</h5></a>
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
</script>