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
$mobile = $_POST['mobile'];
if(!isset($errorMsg)){
$sql = "update employee_login
set mobile = '".$mobile."'
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
            <?php include_once 'topLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Contact</span> </h5>
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
                                <form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" name ="register">
                                  <div class="form-group">
                                    <label for="">New Contact Number <span>*</span></label> <input type="text" id="contact" name="mobile" class="form-control" onkeyup="contactValidate()" value="<?php echo $row['mobile']?>" >
                                     <span id='contactError'></span>
                                  </div>
                                 
                                  <div class="form-group">
                                    <button type="submit" name="Submit" class="actionButtonProfile-center">Update</button>
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
  </body>
</html>
<script>
  function contactValidate()
{
var contact = document.forms["register"]["contact"]; 
if (contact.value == "")                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be empty."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
if (contact.value.length<10)                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be less than 10 digits."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
if (contact.value.length>10)                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be more than 10 digits."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
}
</script>