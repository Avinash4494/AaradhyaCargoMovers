
<!DOCTYPE html>
<html lang="en">
	<title>Login | Aaradhya Cargo Movers</title>
	<link rel="icon" href="../../image/logo_A.png">
	<body id="tothetop">
		<?php include_once '../../Header_Links/auth_Header_Links.php' ?>
		<?php include_once '../../Header/headerLogin.php' ?>
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
	<p id="AllFields" ></p>
	<form  action="loginProcess.php" name ="register" method="POST" onsubmit="return myvalidate();">
<!-- 		<input type="text" class="log_activity_id" name="log_activity_id" hidden="">
		<input type="date" class="log_time" name="log_time" hidden="">
		<input type="date" class="log_out_time" name="log_out_time" hidden="" value="0">
		<input type="text" class="log_ip_address" name="log_ip_address" hidden="" value="0">
		<input type="text" class="log_user_location" name="log_user_location" hidden="" value="0"> -->
		<div class="form-group">
			<label for="">Email Address</label>
			<input type="text" onkeyup="usernameValidate()"  class="form-control" id="username" placeholder="Email Address" required="" name="admin_id">
			<span id='usernameError'></span>
		</div>
		<div class="form-group">
			<label for="">Password </label>
			<input type="password" onkeyup="passwordValidate()" id="pass" class="form-control" placeholder="******" required="" name="password">
			<span id='passwordError'></span>
		</div>
		<button type="submit" class="actionButtonIcons">Log In</button>
		<!-- <p id="OkFields"></p> -->
	</form>
	<div class="forgotPass">
		<a href="ResetCodeProcess.php"><h5>Forgot Password ? </h5></a>
	</div>
</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
					</div>
				</div>
			</div>
		</div>
		<div class="footerSection">
			<?php include_once '../../Footer/footerLogin.php' ?>
		</div>
	</body>
</html>
 