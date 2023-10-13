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
$work_company = $_POST['work_company'];
$work_role = $_POST['work_role'];
$work_exp = $_POST['work_exp'];
$work_primskills = $_POST['work_primskills'];
$work_secskills = $_POST['work_secskills'];
$work_about = $_POST['work_about'];
$work_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update employee_login
set
work_company = '".$work_company."',
work_role = '".$work_role."',
work_exp = '".$work_exp."',
work_primskills = '".$work_primskills."',
work_secskills = '".$work_secskills."',
work_about = '".$work_about."',
work_upDate = '".$work_upDate."'
 
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="successCareer.php"; }, 500);
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Update Work Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                           <h4>Update Work Details</h4>
                        </div>
                        <div class="col-lg-6">
                           <h6 style="float: right;">Your Information was last updated on : <?php echo $row['work_upDate'] ?></h6>
                        </div>
                      </div>
                     
                      <div class*="row">
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
                                        <label for="">Company Name <span>*</span></label>
                                        <input type="text" id="dob" name="work_company" placeholder="Name of Company" class="form-control" value="<?php echo $row['work_company']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Role <span>*</span></label>
                                        <input type="text" id="dob" name="work_role" placeholder="Role" class="form-control" value="<?php echo $row['work_role']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Experience <span>*</span></label>
                                        <input type="text" id="dob" name="work_exp" class="form-control" placeholder="Experience" value="<?php echo $row['work_exp']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Primary Skills <span>*</span></label>
                                        <input type="text" id="" name="work_primskills" class="form-control" placeholder ="Primary Skills" value="<?php echo $row['work_primskills']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                     <div class="form-group">
                                        <label for="">Secondary Skills <span>*</span></label>
                                        <input type="text" id="" name="work_secskills" class="form-control" placeholder ="Secondary Skills" value="<?php echo $row['work_secskills']?>">
                                      </div>
                                     
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-12">
                                       <div class="form-group">
                                        <label for="">About Yourself <span>*</span></label>
                                        <input type="text" id="" name="work_about" class="form-control" placeholder ="Describe about yourself in 100-400 words" value="<?php echo $row['work_about']?>">
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