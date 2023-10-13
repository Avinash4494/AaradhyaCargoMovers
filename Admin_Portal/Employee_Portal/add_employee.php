<?php
require_once('db.php');
include_once "../session.php"
?>
<!DOCTYPE html>
<html>
	</title>
	<head>
	</head>
	<title>Employees Portal</title>
	<body>
		<?php include_once '../../Header_Links/header_links.php' ?>
		<div class="wrapper">
			<?php include_once '../rightTopPannel.php' ?>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-2">
						<div class="leftPannel">
							<div class="empty-left-Index-comTop"></div>
							<?php include_once 'toLeftMembers.php' ?>
						</div>
					</div>
					<div class="col-lg-10">
						<div class="rightPannel">
							<div class="paggignation">
								<h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top">Employees Portal</a> / <span class="activePage">Add Employee</span></h5>
							</div>
<div class="bodyComponent">
	<div class*="row">
		<div class="col-lg-12"><p id="AllFields" ></p>
			<div class="profileDisplayComponent">
				<div class="well">
<style>
	span{color: red;}
</style>
<form method="POST" name ="register" class="templatemo-login-form" action="reg.php" onsubmit="return Employeevalidate();">
<input type="text" id="employees_id" name="employees_id" hidden="">
<input type="text" id="gender" name="dob" hidden="">
<input type="text" id="gender" name="gender" hidden="">
<input type="text" id="gender" name="alternate_phone" hidden="">
<input type="text" id="gender" name="present_address" hidden="">
<input type="text" id="gender" name="present_state" hidden="">
<input type="text" id="gender" name="present_pincode" hidden="">
<input type="text" id="gender" name="permanent_address" hidden="">
<input type="text" id="gender" name="permanent_state" hidden="">
<input type="text" id="gender" name="permanent_pincode" hidden="">
<input type="text" id="gender" name="profile_image" hidden="" value="Null">
<input type="text" id="gender" name="pan_num" hidden="">
<input type="text" id="gender" name="aadhar_num" hidden="" >
<input type="text" id="gender" name="aadhar_name" hidden="" >
<input type="text" id="gender" name="aadhar_dob" hidden="" >
<input type="text" id="gender" name="blood_grp" hidden="" >
<input type="text" id="gender" name="country_birth" hidden="" >
<input type="text" id="gender" name="birth_place" hidden="" >
<input type="text" id="gender" name="martial_status" hidden="" >
<input type="text" id="gender" name="father_name" hidden="" >
<input type="text" id="gender" name="father_dob" hidden="" >
<input type="text" id="gender" name="fatherNationality" hidden="" >
<input type="text" id="gender" name="nationality" hidden="" >
<input type="text" id="gender" name="bank_record_name" hidden="" >
<input type="text" id="gender" name="bank_account_num" hidden="" >
<input type="text" id="gender" name="bank_name" hidden="" >
<input type="text" id="gender" name="bank_code" hidden="" >
<input type="text" id="gender" name="bank_city" hidden="" >
<input type="text" id="gender" name="bank_country" hidden="" >
<input type="text" id="gender" name="bank_ifsc_code" hidden="" >
<input type="text" id="gender" name="bank_type" hidden="" >
<input type="text" id="gender" name="bank_confirm" hidden="" >
<input type="text" id="gender" name="bank_joint_confirm" hidden="" >
<input type="text" id="gender" name="address_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="profile_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="pic_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="bank_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="work_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="family_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="col_upDate" hidden="" value="No Record Found">

<input type="text" id="gender" name="col_college" hidden="" >
<input type="text" id="gender" name="col_branch" hidden="" >
<input type="text" id="gender" name="col_percentage" hidden="" >
<input type="text" id="gender" name="col_yearPass" hidden="" >
<input type="text" id="gender" name="col_highQual" hidden="" >
<input type="text" id="gender" name="col_state" hidden="" >
<input type="text" id="gender" name="col_degree" hidden="" >
<input type="text" id="gender" name="joiningDate" hidden="" >
<input type="text" id="gender" name="work_company" hidden="" >
<input type="text" id="gender" name="work_role" hidden="" >
<input type="text" id="gender" name="work_exp" hidden="" >
<input type="text" id="gender" name="work_primskills" hidden="" >
<input type="text" id="gender" name="work_secskills" hidden="" >
<input type="text" id="gender" name="work_about" hidden="" >
<input type="text" id="gender" name="pass_num" hidden="" >
<input type="text" id="gender" name="pass_dateOfIssue" hidden="" >
<input type="text" id="gender" name="pass_dateOfExpiry" hidden="" >

<input type="text" id="gender" name="pass_address_1" hidden="" >
<input type="text" id="gender" name="pass_address_2" hidden="" >
<input type="text" id="gender" name="pass_issueAuth" hidden="" >
<input type="text" id="gender" name="pass_upDate" hidden="" value="No Record Found">
<input type="text" id="gender" name="offc_upDate" hidden="" value="No Record Found" >
<input type="text" id="gender" name="offc_desig" hidden="" >
<input type="text" id="gender" name="offc_floor" hidden="" >
<input type="text" id="gender" name="offc_wing" hidden="" >
<input type="text" id="gender" name="offc_cubicle" hidden="" >
<input type="text" id="gender" name="offc_tower" hidden="" >
<input type="text" id="offc_location" name="offc_location" hidden="" >

<input type="text" id="gender" name="auth_status" hidden="" value="Pending">
<input type="text" id="gender" name="approved_By" hidden="" value="">
<input type="text" id="gender" name="approved_On" hidden="" value="">
<input type="text" id="gender" name="approved_msg" hidden="" value="">
<input type="text" id="auth_type" name="auth_type" hidden="" value="">
<input type="text" id="created_on" name="created_on" hidden="" value="">


													
<div class="row">
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">Full Name <span>*</span></label>
			<input type="text" id="fullname" name="Fullname" class="form-control" placeholder="FullName" onkeyup="getUserId()">
			<span id='NameError'></span>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">User ID <span>*</span></label> <!-- <span style="color: white;float: right;font-size: 0.9em;">(Hint : First two letters of name with date of birth.)</span> -->
			<input type="text" id="nameStrin" name="random_user_id" class="form-control" placeholder="User ID ( Eg : AV20011996 )" onkeyup="UserValidate()">
			<span id='employees_idError'></span>
		</div>
	</div>
</div>
 
<script>
function getUserId() {
var str = document.getElementById("fullname").value;
var matches = str.match(/\b(\w)/g); // ['J','S','O','N']
var acronym = matches.join(''); // JSON
var genRand = Math.random() * 10000000;
var genRound = Math.round(genRand);
document.getElementById("nameStrin").value=acronym + genRound;
}
 
</script>
<div class="row">
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">Phone <span>*</span></label>
			<input type="text" id="phone" name="mobile" class="form-control" placeholder="Phone Number" onkeyup="contactValidate()">
			<span id='contactError'></span>
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">Email <span>*</span></label>
			<input type="text" id="email" name="Email" class="form-control" placeholder="Email" onkeyup="emailValidate()">
			<span id='emailError'></span>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6  col-xs-12">
		<div class="form-group">
			<label for="">Password <span>*</span></label>
			<input type="password" id="pass" name="PASSWORD" class="form-control" placeholder="******" >
		</div>
	</div>
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">Confirm Password <span>*</span></label>
			<input type="password" id="repass" name="repassword" class="form-control" placeholder="Confirm Password" >
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-6 col-xs-12">
		<div class="form-group">
			<label for="">Securtiy Question <span>*</span></label>
			<select type="text" name="Question" id="question" class="form-control" placeholder="Security Question*" >
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
			<label for="">Answer <span>*</span></label>
			<input type="text" id="answer" name="Answer" class="form-control" placeholder="Answer*" >
		</div>
	</div>
</div>
<div class="form-group">
	<div class="row">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<button type="submit" style="letter-spacing: 2px;" name="submit" class="actionButtonProfile">Register</button>
		</div>
		<div class="col-lg-4"></div>
		
	</div>
</form>
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
	function Employeevalidate()
	{
	var fullname=document.getElementById("fullname").value;
	var random_user=document.getElementById("random_user").value;
	var phone=document.getElementById("phone").value;
	var email=document.getElementById("email").value;
	var pass=document.getElementById("pass").value;
	var repass=document.getElementById("repass").value;
	var question=document.getElementById("question").value;
	var answer=document.getElementById("answer").value;
	
	if(fullname.length==0||random_user.length==0||phone.length==0||email.length==0||pass.length==0||repass.length==0||question.length==0||answer.length==0)
	{
	document.getElementById("AllFields").innerHTML="* All Fields are required";
	return false;
	}
	else
	{
	document.getElementById("AllFields").innerHTML="";
	return true;
	}
	}
	function NameValidate()
	{
	var fullname = document.forms["register"]["fullname"];
	if (fullname.value == "")
	{
	document.getElementById("NameError").innerHTML="Please enter valid name";
	fullname.focus();
	return false;
	}
	else
	{
	document.getElementById("NameError").innerHTML="";
	}
	}
		function UserValidate()
	{
	var random_user = document.forms["register"]["random_user"];
	if (random_user.value == "")
	{
	document.getElementById("employees_idError").innerHTML="Employee ID shouldn't be empty.";
	random_user.focus();
	return false;
	}
	else
	{
	document.getElementById("employees_idError").innerHTML="";
	}
	if (random_user.value.length<10)
	{
	document.getElementById("employees_idError").innerHTML="User ID shouldn't be less than 10 digits.";
	random_user.focus();
	return false;
	}
	else
	{
	document.getElementById("employees_idError").innerHTML="";
	}
		if (random_user.value.length>10)
	{
	document.getElementById("employees_idError").innerHTML="User ID shouldn't be more than 10 digits.";
	random_user.focus();
	return false;
	}
	else
	{
	document.getElementById("employees_idError").innerHTML="";
	}
 
	}
	function contactValidate()
	{
	var phone = document.forms["register"]["phone"];
	if (phone.value == "")
	{
	document.getElementById("contactError").innerHTML="Contact Number shouldn't be empty.";
	phone.focus();
	return false;
	}
	else
	{
	document.getElementById("contactError").innerHTML="";
	}
	if (phone.value.length<10)
	{
	document.getElementById("contactError").innerHTML="Contact Number shouldn't be less than 10 digits.";
	phone.focus();
	return false;
	}
	else
	{
	document.getElementById("contactError").innerHTML="";
	}
	if (phone.value.length>10)
	{
	document.getElementById("contactError").innerHTML="Contact Number shouldn't be more than 10 digits.";
	phone.focus();
	return false;
	}
	else
	{
	document.getElementById("contactError").innerHTML="";
	}
	}
	function emailValidate()
	{
	var email = document.forms["register"]["email"];
	if (email.value == "")
	{
	document.getElementById("emailError").innerHTML="Please enter valid email id";
	email.focus();
	return false;
	}
	else
	{
	document.getElementById("emailError").innerHTML="";
	}
	if (email.value.indexOf("@", 0) < 0)
	{
	document.getElementById("emailError").innerHTML="@ is missing";
	email.focus();
	return false;
	}
	else
	{
	document.getElementById("emailError").innerHTML="";
	}
	if (email.value.indexOf(".", 0) < 0)
	{
	document.getElementById("emailError").innerHTML=".com is missing";
	email.focus();
	return false;
	}
	else
	{
	document.getElementById("emailError").innerHTML="";
	}
	}
	</script>
