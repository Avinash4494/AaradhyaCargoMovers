<?php
require_once('db.php');
$sql = "select * from employee_login";
$result = mysqli_query($connect, $sql);
if(isset($_POST['Submit'])){
$mobile = $_POST['mobile'];
if(!isset($errorMsg)){
$sql = "update employee_login
set mobile = '".$mobile."'";
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>

setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
  <?php 
require_once('db.php');
 include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'topLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Password</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="row">
                  <div class="col-lg-12">
                    <h4>Update Password</h4>
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-4">
                            
                          </div>
                          <div class="col-lg-4">
                            <div class="formSection">
                              <form action="rs.php" class="templatemo-login-form" method="POST" onsubmit="return myvalidate();" name ="register">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label for="">Employee ID <span>*</span></label>
                                      <div class="form-group">
                                        <input type="text" id="employees_id" name="employees_id" class="form-control" value="<?php echo $row['employees_id']?>">
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
                                        <button type="submit" class="actionButtonProfile-center">Send Request</button>
                                      </div>
                                  </div>
                                </div>
                                </form>
                              </div>
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
        </div>
      </div>
    </body>
  </html>