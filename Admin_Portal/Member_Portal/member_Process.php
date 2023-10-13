<?php
require_once('../../Database/db.php');
$upload_dir = 'uploads/members-uploads/';
if (isset($_POST['Submit'])) {
	$member_id = $_POST['membership_id'];
	$member_id_gen = 'MI'.'-'.rand(1000000,9999999);
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$dob = $_POST['dob'];
	$gender= $_POST['gender'];
	$age = $_POST['age'];
	$martialStatus = $_POST['martialStatus'];
	$membershipType = $_POST['membershipType'];
	$shiftTiming = $_POST['shiftTiming'];
	$medicalHistory = $_POST['medicalHistory'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alternate_phone = $_POST['alternate_phone'];
	$aadharNo = $_POST['aadharNo'];
	$joiningDate = $_POST['joiningDate'];
	$expiryDate = $_POST['expiryDate'];
	$packgeAmount = $_POST['packgeAmount'];
	$discountAmount = $_POST['discountAmount'];
	$amountPaid = $_POST['amountPaid'];
	$paymentMode = $_POST['paymentMode'];
	$receiptDate = date("d-m-Y");
	$remarks = $_POST['remarks'];
	$present_address = $_POST['present_address'];
	$state = $_POST['state'];
	$present_pincode = $_POST['present_pincode'];
	$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($firstName)){
			$errorMsg = 'Please input name';
		}elseif(empty($dob)){
			$errorMsg = 'Please input contact';
		}elseif(empty($gender)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $firstName.' '.$lastName.'_'.$member_id_gen.'.'.$imgExt;
			if(in_array($imgExt, $allowExt)){
				if($imgSize < 50000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}
		if(!isset($errorMsg)){
			$sql = "insert into add_member (membership_id,firstName,lastName,dob,gender,age,martialStatus,membershipType,shiftTiming,medicalHistory,email,phone,alternate_phone,aadharNo,joiningDate,expiryDate,packgeAmount,discountAmount,amountPaid,paymentMode,receiptDate,remarks,present_address,state,present_pincode,image)
					values('".$member_id_gen."','".$firstName."','".$lastName."','".$dob."','".$gender."','".$age."','".$martialStatus."','".$membershipType."','".$shiftTiming."','".$medicalHistory."','".$email."','".$phone."','".$alternate_phone."','".$aadharNo."','".$joiningDate."','".$expiryDate."','".$packgeAmount."','".$discountAmount."','".$amountPaid."','".$paymentMode."','".$receiptDate."','".$remarks."','".$present_address."','".$state."','".$present_pincode."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="all_Members_List.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>