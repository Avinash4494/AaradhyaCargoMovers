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
$email = $_POST['Email'];
if(!isset($errorMsg)){
$sql = "update employee_login
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
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Update Email</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Your Code Here --><h4>Update Email</h4>
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
                                    <label for="">Email <span>*</span></label> <input type="text" id="email"  onkeyup="emailValidate()" name="Email" class="form-control"  value="<?php echo $row['Email']?>" >
                                    <span id='emailError'></span>
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
  </div>
</body>
</html>
<script>
  function emailValidate()
{
var mail = document.forms["register"]["email"];  
if (mail.value == "")                                   
{ 
   document.getElementById("emailError").innerHTML="Please enter valid email id";  
    mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}
if (mail.value.indexOf("@", 0) < 0)                 
{ 
  document.getElementById("emailError").innerHTML="@ is missing";      
  mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}

if (mail.value.indexOf(".", 0) < 0)                 
{ 
  document.getElementById("emailError").innerHTML=".com is missing";     
  mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}
}
</script>