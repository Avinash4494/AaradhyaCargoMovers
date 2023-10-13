<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from employee_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$pass_num = $_POST['pass_num'];
$pass_dateOfIssue = $_POST['pass_dateOfIssue'];
$pass_dateOfExpiry = $_POST['pass_dateOfExpiry'];
$pass_issueAuth = $_POST['pass_issueAuth'];
$pass_address_1 = $_POST['pass_address_1'];
$pass_address_2 = $_POST['pass_address_2'];
$pass_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update employee_login
set
pass_num = '".$pass_num."',
pass_dateOfIssue = '".$pass_dateOfIssue."',
pass_dateOfExpiry = '".$pass_dateOfExpiry."',
pass_issueAuth = '".$pass_issueAuth."',
pass_address_1 = '".$pass_address_1."',
pass_address_2 = '".$pass_address_2."',
pass_upDate = '".$pass_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 500);
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
            <div class="leftPannel">
              <div class="empty-left-Index"></div>
              <?php include_once 'topLeftPannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Update Travel Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                           <h4>Update Travel Details</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Information was last updated on : <?php echo $row['pass_upDate'] ?></h6>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="profileDisplayComponent">
                            <div class="well">
                              <div class="formSection">
                                <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Employee ID <span>*</span></label>
                                        <input type="text" id="dob" name="employees_id" class="form-control" value="<?php echo $row['employees_id']?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Name as per records <span>*</span></label>
                                        <input type="text" id="dob" name="Fullname" placeholder="Name as per records" class="form-control" value="<?php echo $row['Fullname']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Passport Number <span>*</span></label>
                                        <input type="text" id="dob" name="pass_num" placeholder="Passport Number" class="form-control" value="<?php echo $row['pass_num']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Date of Issue <span>*</span></label>
                                        <input type="date" id="dob" name="pass_dateOfIssue" class="form-control" placeholder="Bank Name" value="<?php echo $row['pass_dateOfIssue']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Date of Expiry <span>*</span></label>
                                        <input type="date" id="" name="pass_dateOfExpiry" class="form-control" placeholder ="Bank Code" value="<?php echo $row['pass_dateOfExpiry']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Issuing Authority <span>*</span></label>
                                        <input type="text" id="" name="pass_issueAuth" class="form-control" placeholder ="Issuing Authority" value="<?php echo $row['pass_issueAuth']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Address On Passport <span>*</span></label>
                                        <input type="text" id="" name="pass_address_1" class="form-control" placeholder ="Country" value="<?php echo $row['pass_address_1']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Address Line 1 <span>*</span></label>
                                        <input type="text" id="dob" name="pass_address_2" placeholder="Address Line 1" class="form-control" value="<?php echo $row['pass_address_2']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
 
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-2">
                                      <button type="submit" style="margin-top: 5px;" name="Submit" class="actionButtonProfile-center">Submit</button>
                                    </div>
                                    <div class="col-lg-5"></div>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>