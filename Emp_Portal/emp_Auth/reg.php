<?php
include_once '../db.php';
if(isset($_POST['submit']))
{
$Name = $_POST['Fullname'];
$employees_id = $_POST['employees_id'];
$employees_id_gen = 'ACM'.'-'.rand(100000,999999);
$mobile = $_POST['mobile'];
$password = $_POST['PASSWORD'];
$repassword = $_POST['repassword'];
$Email = $_POST['Email'];
$Question = $_POST['Question'];
$Answer = $_POST['Answer'];
$random_id = $_POST['random_user_id'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];
$alternate_phone = $_POST['alternate_phone'];
$present_address = $_POST['present_address'];
$present_state = $_POST['present_state'];
$present_pincode = $_POST['present_pincode'];
$permanent_address = $_POST['permanent_address'];
$permanent_state = $_POST['permanent_state'];
$permanent_pincode = $_POST['permanent_pincode'];
$pan_num = $_POST['pan_num'];
$aadhar_num = $_POST['aadhar_num'];
$aadhar_name = $_POST['aadhar_name'];
$aadhar_dob = $_POST['aadhar_dob'];
$country_birth = $_POST['country_birth'];
$blood_grp = $_POST['blood_grp'];
$birth_place = $_POST['birth_place'];
$martial_status = $_POST['martial_status'];
$father_name = $_POST['father_name'];
$father_dob = $_POST['father_dob'];
$nationality = $_POST['nationality'];
$bank_record_name = $_POST['bank_record_name'];
$bank_account_num = $_POST['bank_account_num'];
$bank_name = $_POST['bank_name'];
$bank_code = $_POST['bank_code'];
$bank_city = $_POST['bank_city'];
$bank_country = $_POST['bank_country'];
$bank_ifsc_code = $_POST['bank_ifsc_code'];
$bank_type = $_POST['bank_type'];
$bank_confirm = $_POST['bank_confirm'];
$bank_joint_confirm = $_POST['bank_joint_confirm'];
$address_upDate = $_POST['address_upDate'];
$profile_upDate = $_POST['profile_upDate'];
$pic_upDate = $_POST['pic_upDate'];

	$pass_num = $_POST['pass_num'];
$pass_dateOfIssue = $_POST['pass_dateOfIssue'];
$pass_dateOfExpiry = $_POST['pass_dateOfExpiry'];
$pass_address_1 = $_POST['pass_address_1'];
$pass_address_2 = $_POST['pass_address_2'];
$pass_upDate = $_POST['pass_upDate'];
$pass_issueAuth = $_POST['pass_issueAuth'];
$offc_desig = $_POST['offc_desig'];
$offc_floor = $_POST['offc_floor'];
$offc_wing = $_POST['offc_wing'];
$offc_cubicle = $_POST['offc_cubicle'];
$offc_tower = $_POST['offc_tower'];
$offc_location = $_POST['offc_location'];
$offc_upDate = $_POST['offc_upDate'];

$profile_image = $_POST['profile_image'];
$check = mysqli_query($connect,"SELECT * FROM employee_login WHERE employees_id='".$employees_id."'") or die("Check Query");
if(mysqli_num_rows($check) == 0)
{
if($repassword == $password)
{
if($query = mysqli_query($connect,"INSERT INTO employee_login(Fullname,employees_id,mobile,PASSWORD,repassword,Email,Question,Answer,random_user_id,dob,gender,alternate_phone,present_address,present_state,present_pincode,permanent_address,permanent_state,permanent_pincode,pan_num,aadhar_num,aadhar_name,aadhar_dob,country_birth,blood_grp,birth_place,martial_status,father_name,father_dob,nationality,bank_record_name,bank_account_num,bank_name,bank_code,bank_city,bank_country,bank_ifsc_code,bank_confirm,bank_joint_confirm,address_upDate,profile_upDate,pic_upDate,pass_num,pass_dateOfIssue,
	pass_dateOfExpiry,pass_issueAuth,
	pass_address_1,pass_address_2,
	pass_upDate,offc_desig,offc_floor,
	offc_wing,offc_cubicle,offc_tower,
	offc_location,offc_upDate, profile_image)
	VALUES ('$Name', '$employees_id_gen','$mobile', '$password','$repassword','$Email','$Question','$Answer','$random_id','$dob','$gender','$alternate_phone','$present_address','$present_state','$present_pincode','$permanent_address','$permanent_state','$permanent_pincode',
'$pan_num','$aadhar_num','$aadhar_name','$aadhar_dob','$country_birth','$blood_grp','$birth_place','$martial_status','$father_name','$father_dob','$nationality','$bank_record_name','$bank_account_num','$bank_name','$bank_code','$bank_city','$bank_country','$bank_ifsc_code','$bank_confirm','$bank_joint_confirm','$address_upDate','$profile_upDate','$pic_upDate','$pass_num','$pass_dateOfIssue','$pass_dateOfExpiry','$pass_issueAuth','$pass_address_1','$pass_address_2','$pass_upDate','$offc_desig','$offc_floor','$offc_wing','$offc_cubicle','$offc_tower','$offc_location','$offc_upDate','$profile_image')"))
{
echo '<script>
setTimeout(function(){ window.location.href="addedSuccessReg.php"; }, 1000);
</script>';
}
}
else
{
echo '<script>
setTimeout(function(){ window.location.href="passError.php"; }, 500);
</script>';
}
}
else
{
echo '<script>
setTimeout(function(){ window.location.href="name_error.php"; }, 500);
</script>';
}
}
?>