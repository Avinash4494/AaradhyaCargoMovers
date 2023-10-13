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
$col_college = $_POST['col_college'];
$col_branch = $_POST['col_branch'];
$col_percentage = $_POST['col_percentage'];
$col_yearPass = $_POST['col_yearPass'];
$col_highQual = $_POST['col_highQual'];
$col_state = $_POST['col_state'];
$col_degree = $_POST['col_degree'];
$col_upDate = date("d-m-Y");
 
if(!isset($errorMsg)){
$sql = "update employee_login
set
col_college = '".$col_college."',
col_branch = '".$col_branch."',
col_percentage = '".$col_percentage."',
col_yearPass = '".$col_yearPass."',
col_highQual = '".$col_highQual."',
col_state = '".$col_state."',
col_degree = '".$col_degree."',
col_upDate = '".$col_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="successCollege.php"; }, 500);
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="index.php" data-toggle="tooltip" title="Profile Portal!" data-placement="top">Profile Portal</a> / <span class="activePage">Update College Details</span> </h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col-lg-6">
                           <h4>Update College Details</h4>
                        </div>
                        <div class="col-lg-6">
                           <h6 style="float: right;">Your Information was last updated on : <?php echo $row['col_upDate'] ?></h6>
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
                                        <label for="">College Name <span>*</span></label>
                                        <input type="text" id="dob" name="col_college" placeholder="Name fo College" class="form-control" value="<?php echo $row['col_college']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Degree <span>*</span></label>
                                        <input type="text" id="dob" name="col_degree" placeholder="Degree" class="form-control" value="<?php echo $row['col_degree']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Branch <span>*</span></label>
                                        <input type="text" id="dob" name="col_branch" class="form-control" placeholder="Branch Name" value="<?php echo $row['col_branch']?>">
                                      </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Percentage/CGPA <span>*</span></label>
                                        <input type="text" id="" name="col_percentage" class="form-control" placeholder ="Percentage/CGPA" value="<?php echo $row['col_percentage']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Year of Passing <span>*</span></label>
                                        <input type="text" id="" name="col_yearPass" class="form-control" placeholder ="Year of Passing" value="<?php echo $row['col_yearPass']?>">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">Highest Qualification <span>*</span></label>
                                        <input type="text" id="" name="col_highQual" class="form-control" placeholder ="Passed from" value="<?php echo $row['col_highQual']?>">
                                      </div>
                                    </div>
                                    <div class="col-lg-4 col-xs-12">
                                      <div class="form-group">
                                        <label for="">State <span>*</span></label>
                                        <input type="text" id="" name="col_state" class="form-control" placeholder ="Passed from" value="<?php echo $row['col_state']?>">
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