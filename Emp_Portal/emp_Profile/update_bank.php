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
$bank_record_name = $_POST['bank_record_name'];
$bank_account_num = $_POST['bank_account_num'];
$bank_name = $_POST['bank_name'];
$bank_code = $_POST['bank_code'];
$bank_city = $_POST['bank_city'];
$bank_country = $_POST['bank_country'];
$bank_ifsc_code = $_POST['bank_ifsc_code'];
$bank_type = $_POST['bank_type'];
$bank_confirm = $_POST['bank_confirm'];
$bank_joint_confirm = $_POST['bank_joint_confirm'];
$bank_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update employee_login
set
bank_record_name = '".$bank_record_name."',
bank_account_num = '".$bank_account_num."',
bank_name = '".$bank_name."',
bank_code = '".$bank_code."',
bank_city = '".$bank_city."',
bank_country = '".$bank_country."',
bank_ifsc_code = '".$bank_ifsc_code."',
bank_type = '".$bank_type."',
bank_confirm = '".$bank_confirm."',
bank_joint_confirm = '".$bank_joint_confirm."',
bank_upDate = '".$bank_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="successBank.php"; }, 500);
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Update Bank Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                           <h4>Update Bank Details</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Information was last updated on : <?php echo $row['bank_upDate'] ?></h6>
                        </div>
                      </div>
                     
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="profileDisplayComponent">
                            <div class="well">
                              <div class="formSection">
                                <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                                  <input type="text" id="user_id" name="random_user_id" hidden="">
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
                                        <input type="text" id="dob" name="bank_record_name" placeholder="Name as per records" class="form-control" value="<?php echo $row['bank_record_name']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Account Number <span>*</span></label>
                                        <input type="text" id="dob" name="bank_account_num" placeholder="Account Number" class="form-control" value="<?php echo $row['bank_account_num']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Bank Name <span>*</span></label>
                                        <input type="text" id="dob" name="bank_name" class="form-control" placeholder="Bank Name" value="<?php echo $row['bank_name']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Bank Code <span>*</span></label>
                                        <input type="text" id="" name="bank_code" class="form-control" placeholder ="Bank Code" value="<?php echo $row['bank_code']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">City <span>*</span></label>
                                        <input type="text" id="" name="bank_city" class="form-control" placeholder ="City" value="<?php echo $row['bank_city']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Country <span>*</span></label>
                                        <input type="text" id="" name="bank_country" class="form-control" placeholder ="Country" value="<?php echo $row['bank_country']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">IFSC Code <span>*</span></label>
                                        <input type="text" id="dob" name="bank_ifsc_code" placeholder="IFSC Code" class="form-control" value="<?php echo $row['bank_ifsc_code']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Bank Type <span>*</span></label>
                                        <input type="text" id="dob" name="bank_type" placeholder="Bank Type" class="form-control" value="<?php echo $row['bank_type']?>">
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-10 col-xs-12">
                                      <div class="form-group">
                                        <label for="">1. &nbsp Please confirm wheather the account number belongs to you.</label>
                                      </div>
                                    </div>
                                    <div class="col-lg-2 col-xs-12">
                                      <div class="form-group">
                                         <input type="text" id="dob" name="bank_confirm" placeholder="Bank Type" class="form-control" value="<?php echo $row['bank_confirm']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-10 col-xs-12">
                                      <div class="form-group">
                                        <label for="">2. &nbsp Please confirm wheather this is a joint account.</label>
                                      </div>
                                    </div>
                                    <div class="col-lg-2 col-xs-12">
                                      <div class="form-group">
                                         <input type="text" id="dob" name="bank_joint_confirm" placeholder="Bank Type" class="form-control" value="<?php echo $row['bank_joint_confirm']?>">
                                      </div>
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