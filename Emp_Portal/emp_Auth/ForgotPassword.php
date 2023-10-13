<?php
include 'indexRedirect.php';
?>
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
    <div class="wrapperComponentLogin">
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
            <div class="loginPannel">
              <div class="well">
                <div class="tab-content">
                  <div id="adminLogin" class="tab-pane fade in active">
                    <div class="sectionHeadAuth">
                      
                      <h2> Forgot Password</h2>
                    </div>
                    <div class="formSectionLogin" style="margin-bottom: -15px;padding-top: 3px;">
                      <form action="rs.php" class="templatemo-login-form" method="POST" onsubmit="return myvalidate();" name ="register">
                        <div class="row">
                          <div class="col-lg-12">
                            <label for="">Employee Id <span>*</span></label>
                            <div class="form-group">
                              <input type="text" id="employees_id" name="employees_id" class="form-control" placeholder ="Employee ID">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Choose Security Question <span>*</span></label>
                              <select type="text" id="securityQuestion" name="Question" class="form-control" placeholder="Security Question">
                                <option>Choose Security Question</option>
                                <option value="What is your nickname?">What is your nickname?</option>
                                <option value="What is your fav spot?">What is your favourite spot?</option>
                                <option value="What is your fav dish?">What is your favourite dish?</option>
                                <option value="What is your dream land address?">What is your dream land address?</option>
                                <option value="What is your first mobile number?">What is your first mobile number?</option>
                                <option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know?</option>
                                <option value="What is your detained years in life?">What is your detained years in life?</option>
                                <option value="What is your pet's name?">What is your pet's name?</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <input type="text" name="Answer" class="form-control" placeholder="Answer" >
                            </div>
                            <p id="AllFields"></p>
                            <p id="OkFields"></p>
                            <div class="form-group">
                              <button type="submit" class="actionButtonIcons-center">Send Request</button>
                            </div>
                          </div>
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