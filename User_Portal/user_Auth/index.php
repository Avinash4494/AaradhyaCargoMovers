<?php include 'indexRedirect.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<title>Login | Aaradhya Cargo Movers</title>
	<link rel="icon" href="../../image/logo_A.png">
	<body id="tothetop" >
		<?php include_once '../../Header_Links/auth_Header_Links.php' ?>
		<?php include_once '../../Header/headerLoginUser.php' ?>
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
		.overlayColor
{

    height: 548px;

}
		</style>
		<div class="overlayColor"></div>
		<div class="wrapperComponentLogin">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<div class="loginPannelUser">
<div class="well">
	<div class="tab-content">
		<div id="adminLogin" class="tab-pane fade in active">
			<div class="sectionHead">
				<h4>Aaradhya Cargo Movers</h4>
				<h2>Log In</h2>
				<h5>Need an account ? <a href="Register.php" style="color: red;">Create an account</a></h5>
			</div>
			<div class="formSectionLogin">
				<form  action="loginProcess.php" name ="register" method="POST" onsubmit="return myvalidate();">
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" onkeyup="usernameValidate()"  class="form-control" id="username" placeholder="Email Address" name="user_id">
						<span id='usernameError'></span>
					</div>
					<div class="form-group">
						<label for="">Password </label>
						<input type="password" onkeyup="passwordValidate()" id="pass" class="form-control" placeholder="******" name="password">
						<span id='passwordError'></span>
					</div>
					<input type="checkbox" onclick="showPassword()">&nbsp &nbsp Show Password
					<button type="submit" class="actionButtonIcons">Log In</button>
					<!-- <p id="OkFields"></p> -->
				</form>
				<div class="forgotPass">
					<a href="ForgotPassword.php"><h5>Forgot Password ? </h5></a>
				</div>
			</div>
		</div>
	</div>
</div>
						</div>
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="row" >
					<div class="col-lg-4"></div>
					<div class="col-lg-5"></div>
					<div class="col-lg-3" >
						<div class="errorComp">
							<div id="errorBox">
								<div class="well">
									<p id="AllFields" >
										All Fields are required
									</p>
								</div>
							</div>
							<div id="validBox">
								<div class="well">
									<p id="AllFields" >
										Success
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footerSection">
			<?php include_once '../../Footer/footerLogin.php' ?>
		</div>
	</body>
</html>
<script>
	function showPassword() {
var x = document.getElementById("pass");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
	function myvalidate()
{
var username=document.getElementById("username").value;
var password=document.getElementById("pass").value;
if(username.length==0||password.length==0)
{
document.getElementById("errorBox").style.display="block";
const myTimeout = setTimeout(errorBox, 2500);
function errorBox() {
document.getElementById("errorBox").style.display="none";
}
return false;
}
else
{
document.getElementById("validBox").style.display="block";
const myValid = setTimeout(validBox, 2500);
function validBox() {
document.getElementById("validBox").style.display="none";
}
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
var getUserId = document.getElementById("username").value;
		document.getElementById("user_id").value = getUserId;
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
var getPassword = document.getElementById("pass").value;
		document.getElementById("getPassword").value = getPassword;
}
</script>