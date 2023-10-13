 
<?php
require_once('db.php');
$sql = "select * from employee_login";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
?>
<!DOCTYPE html>
<html lang="en">
  <title>Employee - Login</title>
  <link rel="icon" href="../../image/logo_A.png">
  <body>
    <?php include_once '../../Header_Links/noAnim_links.php' ?>
    <div class="wrapperComponentLogin" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="WrapperLogoReg hidden-xs">
              <a href="../../index.php" data-toggle="tooltip" title="Back to Home!" data-placement="bottom">
                <!-- <div class="row">
                  <div class="col-lg-4">
                    <img src="../image/mainlogo.png" class="img-responsive" alt="">
                  </div>
                  <div class="col-lg-8"></div>
                </div> -->
                <div class="row">
                  <div class="col-lg-12">
                    <h1>Welcome to</h1>
                    <h3>Aaradhya Cargo Movers</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-2"></div>
          <div class="col-lg-4">
            <div class="loginPannel" style="padding-top: 30px;">
              <div class="well">
                <div class="tab-content">
                  <div id="adminLogin" class="tab-pane fade in active">
                    <div class="sectionHeadAuth">
                      
                      <h2> Reset Password</h2>
                    </div>
          <div class="formSectionLogin"  >
            <form action="rs1.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
              <div class="form-group">
                <label for="">Employee Id <span>*</span></label>
                <input type="text" id="employees_id" name="employees_id" class="form-control" placeholder="Employee ID">
              </div>
              <div class="form-group">
                <label for="">New Password <span>*</span></label>
                <input type="password" id="password" name="PASSWORD" class="form-control" placeholder="New Password" >
              </div>
              <div class="form-group">
                <label for="">Confirm Password <span>*</span></label> <input type="password" id="repassword" name="repassword" class="form-control" placeholder="Confirm Password" >
              </div>
              <p id="AllFields"></p>
              <p id="OkFields"></p>
              <div class="form-group">
                <button type="submit" class="actionButtonIcons-center">Reset Password</button>
              </div>
              
            </form>
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