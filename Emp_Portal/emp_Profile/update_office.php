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
$offc_desig = $_POST['offc_desig'];
$offc_floor = $_POST['offc_floor'];
$offc_wing = $_POST['offc_wing'];
$offc_cubicle = $_POST['offc_cubicle'];
$offc_tower = $_POST['offc_tower'];
$offc_location = $_POST['offc_location'];
$joiningDate = $_POST['joiningDate'];
$offc_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update employee_login
set
offc_desig = '".$offc_desig."',
offc_floor = '".$offc_floor."',
offc_wing = '".$offc_wing."',
offc_cubicle = '".$offc_cubicle."',
offc_tower = '".$offc_tower."',
offc_location = '".$offc_location."',
joiningDate = '".$joiningDate."',
offc_upDate = '".$offc_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="officeSuccess.php"; }, 500);
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Update Office Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                          <h4>Update Office Details</h4>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Information was last updated on : <?php echo $row['offc_upDate'] ?></h6>
                        </div>
                      </div>
                      
                      <div class*="row">
                        <div class="col-lg-12">
                          <div class="profileDisplayComponent">
                            <div class="well">
                              <div class="formSection">
                                <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                                  <input type="text" id="user_id" name="random_user_id" hidden="">
                                  <div class="row">
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Employee ID <span>*</span></label>
                                        <input type="text" id="dob" name="employees_id" class="form-control" value="<?php echo $row['employees_id']?>" disabled>
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Designation <span>*</span></label>
                                        <input type="text" id="dob" name="offc_desig" placeholder="Designation" class="form-control" value="<?php echo $row['offc_desig']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Date of Joining (dd-mm-yyyy)<span>*</span></label>
                                        <input type="text" id="joiningDate" name="joiningDate" placeholder="Joining Date" class="form-control" value="<?php echo $row['joiningDate']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Floor<span>*</span></label>
                                        
                                        <input type="text" id="offc_floor" name="offc_floor" placeholder="Office Floor" class="form-control" value="<?php echo $row['offc_floor']?>">
                                         
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Wing Name <span>*</span></label>
                                        <input type="text" id="offc_wing" name="offc_wing" placeholder="Office Wing" class="form-control" value="<?php echo $row['offc_wing']?>">
 
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Cubicle Number<span>*</span></label>
                                        <input type="text" id="" name="offc_cubicle" class="form-control" placeholder ="Office Cubicle" value="<?php echo $row['offc_cubicle']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Tower Number<span>*</span></label>
                                        <input type="text" id="" name="offc_tower" class="form-control" placeholder ="Office Tower" value="<?php echo $row['offc_tower']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-3 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Office Location <span>*</span></label>
                                         <input type="text" id="" name="offc_location" class="form-control" placeholder ="Office Location" value="<?php echo $row['offc_location']?>">
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