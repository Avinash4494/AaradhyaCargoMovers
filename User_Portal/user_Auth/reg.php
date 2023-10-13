<?php
include_once '../db.php';
if(isset($_POST['submit']))
{
	// Company Detials
$coy_name = $_POST['coy_name'];
$coy_address_1 = $_POST['coy_address_1'];
$coy_city = $_POST['coy_city'];
$coy_pin = $_POST['coy_pin'];
$coy_address_2 = $_POST['coy_address_2'];
$coy_state = $_POST['coy_state'];
$coy_country = $_POST['coy_country'];
$coy_email = $_POST['coy_email'];
$coy_phone = $_POST['coy_phone'];
$coy_mobile = $_POST['coy_mobile'];
$coy_fax = $_POST['coy_fax'];
$coy_gstin = $_POST['coy_gstin'];

// User Register Details

$Fullname = $_POST['Fullname'];
$user_id = $_POST['user_id'];
$user_id_gen = 'ACM'.'-'.rand(10000,99999);
$mobile = $_POST['mobile'];
$password = $_POST['PASSWORD'];
$repassword = $_POST['repassword'];
$Email = $_POST['Email'];
$Question = $_POST['Question'];
$Answer = $_POST['Answer'];
$profile_image = $_POST['profile_image'];
$pic_upDate = $_POST['pic_upDate'];
$profile_upDate = $_POST['profile_upDate'];

// Bank Details
$bankAccNum = $_POST['bankAccNum'];
$bankBenAccType = $_POST['bankBenAccType'];
$bankBenName = $_POST['bankBenName'];
$bankBranch = $_POST['bankBranch'];
$bankReAccNum = $_POST['bankReAccNum'];
$bankIfsc = $_POST['bankIfsc'];
$bankName = $_POST['bankName'];
$bank_upDate = $_POST['bank_upDate'];

$check = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='".$user_id."'") or die("Check Query");
if(mysqli_num_rows($check) == 0)
{
if($repassword == $password)
{
if($query = mysqli_query($connect,"INSERT INTO user_login(coy_name,coy_address_1,
	coy_city,coy_pin,coy_address_2,coy_state,coy_country,coy_email,coy_phone,
	Fullname,user_id,mobile,PASSWORD,repassword,Email,Question,Answer,profile_image,pic_upDate,profile_upDate,coy_mobile,coy_fax,coy_gstin,bankAccNum,bankBenAccType,bankBenName,bankBranch,bankReAccNum,bankIfsc,bank_upDate)
	VALUES ('$coy_name','$coy_address_1','$coy_city','$coy_pin','$coy_address_2',
	'$coy_state','$coy_country','$coy_email','$coy_phone','$Fullname','$user_id_gen',
	'$mobile', '$password','$repassword','$Email','$Question','$Answer','$profile_image','$pic_upDate','$profile_upDate','$coy_mobile','$coy_fax','$coy_gstin','$bankAccNum','$bankBenAccType','$bankBenName','$bankBranch','$bankReAccNum','$bankIfsc','$bank_upDate')"))
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