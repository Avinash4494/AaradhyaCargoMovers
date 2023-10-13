<?php include 'indexRedirect.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<title>Login | Aaradhya Cargo Movers</title>
	<link rel="icon" href="../../image/logo_A.png">
	<body id="tothetop">
		<?php include_once '../../Header_Links/auth_Header_Links.php' ?>
		<?php include_once '../../Header/headerLoginUser.php' ?>
		<style>
			.buttonGetStarted {
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

.buttonSign {

    background-color: white;
    border-radius: 20px;
    border: none;
    font-family: Asap;
    padding: 7px 7px;
    width: 150px;
    color: red;
    margin-left: 35px;
    margin-top: 10px;
    text-align: center;

}
.overlayColor
{
    height: 672px;
}
		</style>
		<div class="overlayColor"></div>
		<div class="wrapperComponentLogin">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
						<div class="loginPannelUser">
							<div class="tab-content">
								<div id="adminLogin" class="tab-pane fade in active">
									
									<div class="formSectionRegis">
	<div class="well">
		<div class="sectionRegis">
										<h4>Create an account</h4>
										<h5>Let's start setting up your profile</h5>
									</div>
		<p id="AllFields"></p>
		<form method="POST" name ="register" class="templatemo-login-form" action="reg.php" onsubmit="return myvalidate();">
			<input type="text" id="user_id" name="user_id" hidden="">
			<input type="text" id="profile_image" name="profile_image" hidden="">
			<input type="text" id="pic_upDate" name="pic_upDate" hidden="">
			<input type="text" id="profile_upDate" name="profile_upDate" hidden="">
			<input type="text" id="profile_upDate" name="coy_mobile" hidden="">
			<input type="text" id="profile_upDate" name="coy_fax" hidden="">
			<input type="text" id="profile_upDate" name="coy_gstin" hidden="">
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<div class="pagginComp">
						<div class="row">
							<div class="col-lg-4" >
								<div class="pagginWidget">
									<div class="pagginNum">
										<h4>1</h4>
									</div>
									<h5>Company Profile</h5>
								</div>
							</div>
							<div class="col-lg-4" >
								<div class="pagginWidgetUn">
									<div class="pagginNumUn">
										<h4>2</h4>
									</div>
									<h5>Company Contacts</h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pagginWidgetUn">
									<div class="pagginNumUn">
										<h4>3</h4>
									</div>
									<h5>User Account</h5>
								</div>
							</div>
						</div>
					</div>
					<h5 class="subHeading">What is the name of your business ?</h5>
					<div class="row">
						<div class="col-lg-12 col-xs-12">
							<div class="form-group">
								<input type="text" id="coy_name" name="coy_name" class="form-control" placeholder="What is the name of your business ?" >
								 
							</div>
						</div>
					</div>
					<h5 class="subHeading">Where is your business located ?</h5>
					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="">Address line 1<span>*</span></label>
								<input type="text" id="coy_address_1" name="coy_address_1" class="form-control" placeholder="Address line 1" >
								 
							</div>
							<div class="form-group">
								<label for="">City<span>*</span></label>
								<input type="text" id="coy_city" name="coy_city" class="form-control" placeholder="City" >
								 
							</div>
							<div class="form-group">
								<label for="">Zip code/Postal code<span>*</span></label>
								<input type="text" id="coy_pin" name="coy_pin" class="form-control" placeholder="Zip code/Postal code" >
								 
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="">Address line 2</label>
								<input type="text" id="coy_address_2" name="coy_address_2" class="form-control" placeholder="Address line 2" >
								 
							</div>
							<div class="form-group">
								<label for="">State<span>*</span></label>
								<input type="text" id="coy_state" name="coy_state" class="form-control" placeholder="State" >
								 
							</div>
							<div class="form-group">
								<label for="">Country<span>*</span></label>
								<input type="text" id="coy_country" name="coy_country" class="form-control" placeholder="Country" >
								 
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-9"></div>
						<div class="col-lg-3">
							<a data-toggle="tab" href="#menu1"><button class="actionButtonIcons">Next</button></a>
						</div>
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="pagginComp">
						<div class="row">
							<div class="col-lg-4">
								<div class="pagginWidgetUn">
									<div class="pagginNumFull">
										<h4>1</h4>
									</div>
									<h5>Company Profile</h5>
								</div>
							</div>
							<div class="col-lg-4" >
								<div class="verticalContact"></div>
								<div class="pagginWidget">
									<div class="pagginNum">
										<h4>2</h4>
									</div>
									<h5>Company Contacts</h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pagginWidgetUn">
									<div class="pagginNumUn">
										<h4>3</h4>
									</div>
									<h5>User Account</h5>
								</div>
							</div>
						</div>
					</div>
					<h5 class="subHeading">Tell us about your company`s contact information.</h5>
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Email address<span>*</span></label>
								<input type="email" id="coy_email" name="coy_email" class="form-control" placeholder="Company Email address" >
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="">Phone number<span>*</span></label>
								<input type="text" id="coy_phone" name="coy_phone" class="form-control" placeholder="Company Phone Number" >
								
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-3">
							<a data-toggle="tab" href="#home"><button class="actionButtonIcons">Previous</button></a>
						</div>
						<div class="col-lg-3">
							<a data-toggle="tab" href="#menu2"><button class="actionButtonIcons">Next</button></a>
						</div>
					</div>
				</div> 
				<div id="menu2" class="tab-pane fade">
					<div class="pagginComp">
						<div class="row">
							<div class="col-lg-4" >
								<div class="pagginWidgetUn">
									<div class="pagginNumFull">
										<h4>1</h4>
									</div>
									<h5>Company Profile</h5>
								</div>
							</div>
							<div class="col-lg-4" >
								<div class="verticalAccount"></div>
								<div class="pagginWidgetUn">
									<div class="pagginNumFull">
										<h4>2</h4>
									</div>
									<h5>Company Contacts</h5>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="verticalAccount"></div>
								<div class="pagginWidget">
									<div class="pagginNum">
										<h4>3</h4>
									</div>
									<h5>User Account</h5>
								</div>
							</div>
						</div>
					</div>
					<h5 class="subHeading">Tell us about your contact information.</h5>
					<div class="row">
						<div class="col-lg-4  col-xs-12">
							<div class="form-group">
								<label for="">Name<span>*</span></label>
								<input type="text" id="Fullname" name="Fullname" class="form-control" placeholder="Fullname" >
							</div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div class="form-group">
								<label for="">Email<span>*</span></label>
								<input type="email" id="Email" name="Email" class="form-control" placeholder="Your Email" >
							</div>
						</div>
						<div class="col-lg-4 col-xs-12">
							<div class="form-group">
								<label for="">Phone<span>*</span></label>
								<input type="text" id="mobile" name="mobile" class="form-control" placeholder="Your Contact Number" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6  col-xs-12">
							<div class="form-group">
								<label for="">Password<span>*</span></label>
								<input type="password" id="pass" name="PASSWORD" class="form-control" placeholder="******" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
							</div>
						</div>
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="">Confirm Password<span>*</span></label>
								<input type="password" id="repass" name="repassword" class="form-control" placeholder="Confirm Password" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="">Securtiy Question<span>*</span></label>
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
						<div class="col-lg-6 col-xs-12">
							<div class="form-group">
								<label for="">Security Answer<span>*</span></label>
								<input type="text" id="answer" name="Answer" class="form-control" placeholder="Security Answer*" >
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6"></div>
						<div class="col-lg-3">
							<a data-toggle="tab" href="#menu1"><button class="actionButtonIcons">Previous</button></a>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
			 					<button type="submit" style="letter-spacing: 2px;" name="submit" class="actionButtonIcons">Register</button>
							</div>
						</div>
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
					<div class="col-lg-3">
						<div id="checkPassword">
							<div class="well">
								<h5 style="text-align: center;">Password must contain the following:</h5>
								<p id="letter" class="invalid">A <b>lowercase</b> letter</p>
								<p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
								<p id="number" class="invalid">A <b>number</b></p>
								<p id="length" class="invalid">Minimum <b>8 characters</b></p>
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
var myInput = document.getElementById("pass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");
// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("checkPassword").style.display = "block";
}
// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("checkPassword").style.display = "none";
}
// When the user starts to type something inside the password field
myInput.onkeyup = function() {
// Validate lowercase letters
var lowerCaseLetters = /[a-z]/g;
if(myInput.value.match(lowerCaseLetters)) {
letter.classList.remove("invalid");
letter.classList.add("valid");
} else {
letter.classList.remove("valid");
letter.classList.add("invalid");
}
// Validate capital letters
var upperCaseLetters = /[A-Z]/g;
if(myInput.value.match(upperCaseLetters)) {
capital.classList.remove("invalid");
capital.classList.add("valid");
} else {
capital.classList.remove("valid");
capital.classList.add("invalid");
}
// Validate numbers
var numbers = /[0-9]/g;
if(myInput.value.match(numbers)) {
number.classList.remove("invalid");
number.classList.add("valid");
} else {
number.classList.remove("valid");
number.classList.add("invalid");
}
// Validate length
if(myInput.value.length >= 8) {
length.classList.remove("invalid");
length.classList.add("valid");
} else {
length.classList.remove("valid");
length.classList.add("invalid");
}
}
</script>
<script>
		function myvalidate()
{
	var coy_name=document.getElementById("coy_name").value;
	var coy_address_1=document.getElementById("coy_address_1").value;
	var coy_city=document.getElementById("coy_city").value;
	var coy_pin=document.getElementById("coy_pin").value;
	var coy_address_2=document.getElementById("coy_address_2").value;
	var coy_state=document.getElementById("coy_state").value;
	var coy_country=document.getElementById("coy_country").value;
	var coy_phone=document.getElementById("coy_phone").value;
	var coy_email=document.getElementById("coy_email").value;
if(coy_name.length==0||coy_address_1.length==0||coy_city.length==0||coy_pin.length==0||coy_address_2.length==0||coy_state.length==0||coy_country.length==0||coy_phone.length==0||coy_email.length==0)
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