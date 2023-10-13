
<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from employee_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$approved_By = $_POST['approved_By'];
$approved_On = date("d/m/Y");
$auth_status = $_POST['auth_status'];
$approved_msg = $_POST['approved_msg'];
$auth_type = $_POST['auth_type'];

if(!isset($errorMsg)){
$sql = "update employee_login
set
approved_By = '".$approved_By."',
approved_On = '".$approved_On."',
auth_status = '".$auth_status."',
approved_msg = '".$approved_msg."',
auth_type = '".$auth_type."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="approveEmpSuccess.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Accounts Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
           <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftAccounts.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
                <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="admin_index.php" data-toggle="tooltip" title="Accounts Portal!" data-placement="top" >Accounts Portal</a> / <span class="activePage"> Update Access</span> </h5>
              </div>
              <div id="print_setion">
                <style>
                  .rectWidget .well {font-size: 1.1em;line-height: 30px;}
                </style>
                <div class="bodyComponent">
<div class="rectLongContent">
  <div class="rectWidget">
    <div class="well">
      <div class="row">
        <div class="col-lg-10 col-xs-9">
          <div class="row">
            <div class="col-lg-3">
              <p>User Id : <?php echo $rowedit['random_user_id'] ?></p>
              <p>Name - <?php echo $rowedit['Fullname'] ?></p>
            </div>
            <div class="col-lg-3">
              <p>Email - <?php echo $rowedit['Email'] ?></p>
              <p>Contact - <?php echo $rowedit['mobile'] ?></p>
            </div>
            <div class="col-lg-3">
              <p>Aadhar No. - <?php echo $rowedit['aadhar_num'] ?></p>
              <p>PAN No. - <?php echo $rowedit['pan_num'] ?></p>
            </div>
            <div class="col-lg-3">
              <p>Approval Status - <?php echo $rowedit['auth_status'] ?>  </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                  <div class="row">
                  <div class="col-lg-12">
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="formSection">
                          <form name ="register" onsubmit="return quotevalidate();" method="post" enctype="multipart/form-data" action="">
                            <div class="row">
                               <div class="col-lg-3 col-xs-12" >
                                <label for="usr"><b>Updated By <span>*</span> </b></label>
                                <div class="form-group">
                                  <input type="text" class="form-control" id="weight" name="approved_By">
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-12">
                                <label for="usr"><b>Access Status <span>*</span></b></label>
                              <div class="form-group">
                                  <div class="form-group">
                                  <select name="auth_status" id="" class="form-control">
                                    <option value="Null">Access Status </option>
                                    <option value="Active">Active</option>
                                    <option value="Denied">Denied</option>
                                    <option value="Approved">Approved</option>
                                  </select>
                                </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-12">
                                <label for="usr"><b>Access Type <span>*</span></b></label>
                              <div class="form-group">
                                  <div class="form-group">
                                  <select name="auth_type" id="" class="form-control">
                                    <option value="Null">Access Type </option>
                                    <option value="Level_1">Level 01</option>
                                    <option value="Level_2">Level 02</option>
                                    <option value="Level_3">Level 03</option>
                                  </select>
                                </div>
                                </div>
                              </div>
                              <div class="col-lg-3 col-xs-12">
                                <label for="usr"><b>Status Message <span>*</span></b></label>
                              <div class="form-group">
                                  <div class="form-group">
                                  <input type="text" class="form-control" id="weight" name="approved_msg" value="<?php echo $rowedit['approved_msg'] ?>">
                                </div>
                                </div>
                              </div>
                            </div>
 
                            <div class="row">
                              <div class="col-lg-4 "></div>
                                  <div class="col-lg-4 col-xs-12" style="background-color:;">
                                    <div class="form-group">
                                      <button type="submit" name="Submit" class="actionButtonProfile">Sumit</button>
                                    </div>
                                  </div>
                              <div class="col-lg-4"></div>
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
  </body>
</html>