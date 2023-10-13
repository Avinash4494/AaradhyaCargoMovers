<!DOCTYPE html>
<html lang="en">
	<title>FitFreak- Sign Up</title>
	<body>
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3">
					<div class="WrapperLogoReg">
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
				<div class="col-lg-6">
					<div class="registerPannel">
						<div class="well">
							<div class="sectionHeadReg">
										<h2>Sign In</h2>
									</div>
							<p id="AllFields" ></p>
							<form method="POST" name ="register" class="templatemo-login-form" action="reg.php" onsubmit="return myvalidate();">
								<input type="text" id="gender" name="random_user_id" hidden="" value="Null">
								<input type="text" id="gender" name="dob" hidden="" value="Null">
								<input type="text" id="gender" name="gender" hidden="" value="Null">
								<input type="text" id="gender" name="alternate_phone" hidden="" value="Null">
								<input type="text" id="gender" name="present_address" hidden="" value="Null">
								<input type="text" id="gender" name="present_state" hidden="" value="Null">
								<input type="text" id="gender" name="present_pincode" hidden="" value="Null">
								<input type="text" id="gender" name="permanent_address" hidden="" value="Null">

								<input type="text" id="gender" name="permanent_state" hidden="" value="Null">
								<input type="text" id="gender" name="permanent_pincode" hidden="" value="Null">
								<input type="text" id="gender" name="profile_image" hidden="" value="Null">
								<div class="row">
									<div class="col-lg-6 col-xs-6">
										<div class="form-group">
											<label for="">Full Name<span>*</span></label>
											<input type="text" id="fullname" name="Fullname" class="form-control" placeholder="FullName" >
										</div>
									</div>
									<div class="col-lg-6 col-xs-6">
										<div class="form-group">
											<label for="">Username <span>*</span></label>
											<input type="text" id="username" name="employees_id" class="form-control" placeholder="Username" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6 col-xs-6">
										<div class="form-group">
											<label for="">Phone <span>*</span></label>
											<input type="text" id="phone" id="password" name="mobile" class="form-control" placeholder="Phone Number" >
										</div>
									</div>
									<div class="col-lg-6 col-xs-6">
										<div class="form-group">
											<label for="">Email<span>*</span></label>
											<input type="text" id="email" name="Email" class="form-control" placeholder="Email*" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6  col-xs-6">
										<div class="form-group">
											<label for="">Password <span>*</span></label>
											<input type="password" id="pass" name="PASSWORD" class="form-control" placeholder="******" >
										</div>
									</div>
									<div class="col-lg-6 col-xs-6">
										<div class="form-group">
											<label for="">Confirm Password <span>*</span></label>
											<input type="password" id="repass" name="repassword" class="form-control" placeholder="Confirm Password" >
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Securtiy Question <span>*</span></label>
											<select type="text" name="Question" class="form-control" placeholder="Security Question*" >
												<option value="What is your nickname?">What is your nickname ?</option>
												<option value="What is your fav spot?">What is your favourite sport ?</option>
												<option value="What is your fav dish?">What is your favourite dish ?</option>
												<option value="What is your dream land address?">What is your dream land address ?</option>
												<option value="What is your first mobile number?">What is your first mobile number ?</option>
												<option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know ?</option>
												<option value="What is your detained years in life?">What is your detained years in life ?</option>
												<option value="What is your pet name?">What is your petname ?</option>
												
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Answer<span>*</span></label>
											<input type="text" id="answer" name="Answer" class="form-control" placeholder="Answer*" >
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-lg-12">
											<button type="submit" name="submit" class="actionButtonIcons-login">Sign Up</button>
										</div>
									</div>
								</form>
								<div class="row">
									<div class="col-lg-6">
										<h6 style="padding-top: 10px;text-align: left;">Already have an account? <a href="index.php">Log In</a></h6>
									</div>
									<div class="col-lg-6">
										<h6 style="padding-top: 10px;text-align: right;"><a href="ResetCodeProcess.php">Forgot Password</a></h6>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<p>By clicking the "Sign up" button, you are creating an account,<br> and agree to Fit Freak' Terms of Service and Privacy Policy</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
		</body>
	</html>
	<script>
			function myvalidate()
	{
		var fullname=document.getElementById("fullname").value;;
		var username=document.getElementById("username").value;
		var email=document.getElementById("email").value;;
		var phone=document.getElementById("phone").value; ;
		var pass=document.getElementById("pass").value;;
		var repass=document.getElementById("repass").value;;
		var answer=document.getElementById("answer").value;;
	if(fullname.length==0||username.length==0||email.length==0||phone.length==0||pass.length==0||repass.length==0||answer.length==0)
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
	</script>