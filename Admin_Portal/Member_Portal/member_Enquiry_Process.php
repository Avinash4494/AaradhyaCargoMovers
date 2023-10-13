<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$enquiry_id = $_POST['enquiry_id'];
	$enquiry_id_gen = 'EN'.'-'.rand(1000000,9999999);
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$remarks = $_POST['remarks'];
	$tDate = date("d-m-Y");
		if(!isset($errorMsg)){
			$sql = "insert into enquiry_member (enquiry_id,firstName,lastName,email,phone,remarks,tDate)
					values('".$enquiry_id_gen."','".$firstName."','".$lastName."','".$email."','".$phone."','".$remarks."','".$tDate."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="../../index_Success.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>