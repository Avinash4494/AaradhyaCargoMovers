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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Password</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Your Code Here --><h4>Update Password</h4>
                      <div class="profileDisplayComponent">
    <div class="well">
      <div class="row">
        <div class="col-lg-4">
          
        </div>
        <div class="col-lg-4">
          <div class="formSection">
            <form action="rs1.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
              <div class="form-group">
                <label for="">Username <span>*</span></label>
                <input type="text" id="employees_id" name="employees_id" class="form-control" placeholder="Username" value="<?php echo $row['employees_id']?>">
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
                <button type="submit" class="actionButtonProfile-center">Reset Password</button>
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
  </div>
</body>
</html>