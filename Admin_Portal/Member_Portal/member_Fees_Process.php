<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$order_id = $_POST['order_id'];
	$order_id_gen = '#'.'-'.rand(1000000,9999999);
	$fees_id = $_POST['fees_id'];
	$fees_id_gen = 'FE'.'-'.rand(1000000000,9999999999);
	$membership_id = $_POST['membership_id'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$feesMonthly = $_POST['feesMonthly'];
	$packgeAmount = $_POST['packgeAmount'];
	$amountPaid = $_POST['amountPaid'];
	$paymentMode = $_POST['paymentMode'];
	$receiptDate = date('d-m-Y');
	$remarks = $_POST['remarks'];
		if(!isset($errorMsg)){
			$sql = "insert into  fees_member (order_id,fees_id,membership_id,firstName,lastName,email,phone,feesMonthly,packgeAmount,amountPaid,paymentMode,receiptDate,remarks)
					values('".$order_id_gen."','".$fees_id_gen."','".$membership_id."','".$firstName."','".$lastName."','".$email."','".$phone."','".$feesMonthly."','".$packgeAmount."','".$amountPaid."','".$paymentMode."','".$receiptDate."','".$remarks."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="member_index.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>