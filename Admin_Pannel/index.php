<?php
	include 'indexRedirect.php';
?>
<!DOCTYPE html>
<html lang="en">
	<title>Aaradhya Cargo Movers - Login</title>
	<?php include_once 'navAdminLinks.php'?>
	<body>
		<div id="AuthSectionLogin">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-lg-12"></div>
					<div class="col-lg-4 col-lg-12">
						<div class="loginComponent"   >
							<div class="well">
								<div class="row">
									<div class="col-lg-12">
										<div class="sectionHead">
											<h2>Log In</h2>
										</div>
									</div>
								</div>
								<div class="formSection">
									<p id="AllFields" ></p>
									
									<form  action="loginProcess.php" class="templatemo-login-form" name ="register" method="POST" onsubmit="return myvalidate();">
										<div class="form-group">
											<label for="">Username <span>*</span></label>
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>
												<input type="text" onkeyup="usernameValidate()"  class="form-control" id="username" placeholder="Username" name="username">
												
											</div>
											<span id='usernameError'></span>
										</div>
										<div class="form-group">
											<label for="">Password <span>*</span></label>
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>
												<input type="password" onkeyup="passwordValidate()" id="pass" class="form-control" placeholder="******" name="password">
												
											</div>
											<span id='passwordError'></span>
										</div>
										<!-- <div class="form-group" >
													<div class="checkbox">
														<input type="checkbox"  id="c1" name="cc" / >
																<label for="c1"><span></span>Remember me</label>
																	</div>
										</div> -->
										<input type="submit"  class="signButton" value="Login" >
										<p id="OkFields"></p>
										
										
									</form>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<h4>Don't have Account | <a href="Register.php">Create Account</a></h4>
									</div>
									<!-- <div class="col-lg-6">
											<h4><a href="ResetCodeProcess.php">Forgot Password</a></h4>
									</div> -->
								</div>
							</div>
							<div class="HomeComponent"  >
								<div class="well" style="padding:0px;">
									<div class="row">
										<div class="col-lg-12">
											<a href="../index.php"><button class="homeButton"><i class="fa fa-home"></i> Back To Home</button></a>
										</div>
										
									</div>
								</div>
							</div>
							
						</div>
					</div>
					<div class="col-lg-4 col-lg-12"></div>
				</div>
			</div>
		</div>
	</body>
</html>
<script>
	function myvalidate()
{
var username=document.getElementById("username").value;
var password=document.getElementById("pass").value;
if(username.length==0||password.length==0)
{


document.getElementById("AllFields").innerHTML="* All Fields are required";
return false;
}
else
{
document.getElementById("OkFields").innerHTML="Valid name";
return true;
}
}
	
	function usernameValidate()
{
var username = document.forms["register"]["username"];
if (username.value == "")
{
document.getElementById("usernameError").innerHTML="* Please enter valid Username";
username.focus();
return false;
}
else
{
document.getElementById("usernameError").innerHTML="";
}
}
function passwordValidate()
{
var password = document.forms["register"]["pass"];
if (password.value == "")
{
document.getElementById("passwordError").innerHTML="* Please enter valid Password";
password.focus();
return false;
}
else
{
document.getElementById("passwordError").innerHTML="";
}
}
</script>