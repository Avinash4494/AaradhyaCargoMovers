 

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
                      <h3 style="text-align: center;">Forgot Password</h3>
                    </div>
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
                    <div class="formSectionLogin">
                      <p style="color: red;" id="allFields" ></p>
                      <form action="rs.php" class="templatemo-login-form" method="POST" onsubmit="return myvalidate();" name ="register">
                        <div class="row">
                          <div class="col-lg-12">
                            <label for="">User Id <span>*</span></label>
                            <div class="form-group">
                              <input type="text" id="user_id" name="user_id" class="form-control" value="<?php echo $userId = $rowMember["user_id"]; ?>">
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label for="">Choose Security Question <span>*</span></label>
                              <select type="text" id="securityQuestion" name="Question" class="form-control" placeholder="Security Question">
                                <option>Choose Security Question</option>
                                <option value="What is your nickname?">What is your nickname?</option>
                                <option value="What is your fav spot?">What is your favourite spot?</option>
                                <option value="What is your fav dish?">What is your favourite dish?</option>
                                <option value="What is your dream land address?">What is your dream land address?</option>
                                <option value="What is your first mobile number?">What is your first mobile number?</option>
                                <option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know?</option>
                                <option value="What is your detained years in life?">What is your detained years in life?</option>
                                <option value="What is your pet's name?">What is your pet's name?</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group">
                              <input type="text" id="answer" name="Answer" class="form-control" placeholder="Answer" >
                            </div>
                            <p id="AllFields"></p>
                            <p id="OkFields"></p>
                            <div class="form-group">
                              <button type="submit" class="actionButtonIcons">Send Request</button>
                            </div>
                          </div>
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
  var securityQuestion = document.getElementById("securityQuestion").value;
  var answer = document.getElementById("answer").value;
  if (user_id.length==0 ||securityQuestion.length==0 ||answer.length==0) 
  {
    document.getElementById('allFields').innerHTML = "* All Fields are required";
    return false;
  }
  else{
    return true;
      }
}
</script>