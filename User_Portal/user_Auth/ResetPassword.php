
<!DOCTYPE html>
<html lang="en">
  <title>Login | Aaradhya Cargo Movers</title>
  <link rel="icon" href="../../image/logo_A.png">
  <body id="tothetop">
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <?php include_once '../../Header/headerLoginUser.php' ?>
    <div class="wrapperComponentLogin">
      <div class="container-fluid">
        <div class="row">
                  <style>
    .buttonGetStarted {
    
    background-color: white;
    border-radius: 20px;
    border: none;
    font-family: Asap;
    padding: 7px 7px;
    width: 150px;
    color: red;
    margin-left: 20px;
    margin-top: 10px;
    text-align: center;
    }
    .buttonSign {
    background-color: red;
    border-radius: 20px;
    border: none;
    font-family: Asap;
    padding: 7px 7px;
    width: 150px;
    color: white;
    margin-left: 25px;
    margin-top: 10px;
    text-align: center;
    }
    </style>
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            <div class="loginPannelUser">
              <div class="well">
                <div class="tab-content">
                  <div id="adminLogin" class="tab-pane fade in active">
                    <div class="sectionHead">
                      <h4>Aaradhya Cargo Movers</h4>
                      <h3 style="text-align: center;">Reset Password</h3>
                    </div>
                    <div class="formSectionLogin">
                      <p id="allFields" ></p>
                       
<?php
require_once('db.php');
$sql = "select * from user_login";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
?>
                      <form action="rs1.php" class="templatemo-login-form" method="POST" enctype="multipart/form-data" onsubmit="return myvalidate();" name ="register">
                        <div class="form-group">
                          <label for="">User Id <span>*</span></label>
                          <input type="text" id="user_id" name="user_id" class="form-control" placeholder="User ID" value="<?php echo $userId = $rowMember["user_id"]; ?>">

                        </div>
                        <div class="form-group">
                          <label for="">New Password <span>*</span></label>
                          <input type="password" id="password" name="PASSWORD" class="form-control" placeholder="New Password" >
                        </div>
                        <div class="form-group">
                          <label for="">Confirm Password <span>*</span></label> <input type="password" id="repassword" onkeyup="pwdValidate()" name="repassword" class="form-control" placeholder="Confirm Password" >
                        </div>
                        <p id="passwordError" style="color: red;padding-top: 15px;margin-bottom: 0px;" ></p>
                        <div class="form-group">
                          <button type="submit" class="actionButtonIcons">Reset Password</button>
                        </div>
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4"></div>
        </div>
      </div>
    </div>
    <div class="footerSection">
      <?php include_once '../../Footer/footerLogin.php' ?>
    </div>
  </body>
</html>
<script>
function  myvalidate()
{
  var user_id = document.getElementById("user_id").value;
  var password = document.getElementById("password").value;
  var repassword = document.getElementById("repassword").value;
  if (user_id.length==0 ||password.length==0 ||repassword.length==0) 
  {
    document.getElementById('allFields').innerHTML = "* All Fields are required";
    return false;
  }
  else{
    return true;
      }
}
function pwdValidate()
{
var password = document.getElementById("password").value;
var repassword = document.getElementById("repassword").value;
if (password == repassword )
{
document.getElementById("passwordError").innerHTML="";
return false;
}
else
{
document.getElementById("passwordError").innerHTML="* Both password doesn't match";
password.focus();
}
}
</script>