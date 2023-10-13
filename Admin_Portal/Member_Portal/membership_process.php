
<?php
require_once('../../Database/db.php');
$upload_dir = 'uploads/members-uploads/';
if (isset($_POST['Submit'])) {
	$renewal_id = $_POST['renewal_id'];
	$renewal_id_gen = 'MR'.'-'.rand(1000000,9999999);
	$membership_id = $_POST['membership_id'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$membershipType = $_POST['membershipType'];
	$shiftTiming = $_POST['shiftTiming'];
	$medicalHistory = $_POST['medicalHistory'];
	$joiningDate = $_POST['joiningDate'];
	$expiryDate = $_POST['expiryDate'];
	$packgeAmount = $_POST['packgeAmount'];
	$discountAmount = $_POST['discountAmount'];
	$amountPaid = $_POST['amountPaid'];
	$paymentMode = $_POST['paymentMode'];
	$receiptDate = date("d-m-Y");
	$remarksRenew = $_POST['remarksRenew'];
 
		if(!isset($errorMsg)){
			$sql = "insert into renew_member (renewal_id,membership_id,firstName,lastName,email,phone,membershipType,shiftTiming,medicalHistory,joiningDate,expiryDate,packgeAmount,discountAmount,amountPaid,paymentMode,receiptDate,remarksRenew)
					values('".$renewal_id_gen."','".$membership_id."','".$firstName."','".$lastName."','".$email."','".$phone."','".$membershipType."','".$shiftTiming."','".$medicalHistory."','".$joiningDate."','".$expiryDate."','".$packgeAmount."','".$discountAmount."','".$amountPaid."','".$paymentMode."','".$receiptDate."','".$remarksRenew."')";
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