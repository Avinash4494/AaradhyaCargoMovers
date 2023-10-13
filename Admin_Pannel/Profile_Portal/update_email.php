<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from admin_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$email = $_POST['Email'];
if(!isset($errorMsg)){
$sql = "update admin_login
set Email = '".$email."'
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
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: index.php");
}
?>
<?php
include_once 'db.php';
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
  <title>Profile Portal - <?php echo $row['Fullname'] ?></title>
  <head>
  </head>
  <body>
    <?php include_once '../../../Header_Links/header_links.php' ?>
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
                <h5><a href="../../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Contact</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Your Code Here --><h4>Update Contact</h4>
                    <div class="profileDisplayComponent">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-4">
                          </div>
                          <div class="col-lg-4">
                            <div class="personalData">
                              <div class="formSection">
                                <form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
                                  <div class="form-group">
                                    <label for="">Email <span>*</span></label> <input type="text" id="repassword" name="Email" class="form-control"  value="<?php echo $row['Email']?>" >
                                  </div>
                                  <p id="AllFields"></p>
                                  <p id="OkFields"></p>
                                  <div class="form-group">
                                    <button type="submit" name="Submit" class="actionButtonIcons-center">Update</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-4">
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