<?php
	include 'indexRedirect.php';
?>
<!DOCTYPE html>
<html lang="en">
	<title>FitFreak- Login</title>
	<body>
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="WrapperLogo">
						<a href="../../index.php" data-toggle="tooltip" title="Back to Home!" data-placement="bottom">
							<div class="row">
								<div class="col-lg-3">
									<img src="../image/logoBlack.png" alt="" class="img-responsive">
								</div>
								<div class="col-lg-9">
									<h3>Fit Freak</h3>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="loginPannel">
						<div class="switchPannel">
							<div class="row">
								<div class="col-lg-12">
									<div class="activeAdmin">
										<a data-toggle="tab" href="#adminLogin">Admin Login</a>
									</div>
								</div>
							</div>
						</div>
						<div class="well">
							<div class="tab-content">
								 
								<div id="adminLogin" class="tab-pane fade in active">
									<div class="sectionHead">
										<div class="row">
											<div class="col-lg-4"></div>
											<div class="col-lg-4">
												<img src="../image/admin.png" alt="" class="img-responsive">
											</div>
											<div class="col-lg-4"></div>
										</div>
										<h2>Admin Log In</h2>
									</div>
									<div class="formSection">
										<p id="AllFields" ></p>
										<form  action="loginProcess.php" name ="register" method="POST" onsubmit="return myvalidate();">
											<div class="form-group">
												<div class="row">
													<div class="col-lg-6">
														<label for="">Username <span>*</span></label>
													</div>
													<div class="col-lg-6">
														<h6>Need an account? <a href="Register.php">Sign Up</a></h6>
													</div>
												</div>
												<input type="text" onkeyup="usernameValidate()"  class="form-control" id="username" placeholder="Username" name="employees_id">
												<span id='usernameError'></span>
											</div>
											<div class="form-group">
												<label for="">Password <span>*</span></label>
												<input type="password" onkeyup="passwordValidate()" id="pass" class="form-control" placeholder="******" name="password">
												<span id='passwordError'></span>
											</div>
											<button type="submit" class="actionButtonIcons-login">Log In</button>
											<!-- <p id="OkFields"></p> -->
										</form>
									</div>
									<div class="row">
										<div class="col-lg-12">
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4"></div>
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