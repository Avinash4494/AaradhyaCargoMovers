<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$followUp_id = $_POST['followUp_id'];
	$followUp_id_gen = 'FL'.'-'.rand(1000000,9999999);
	$enquiry_id = $_POST['enquiry_id'];
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$lastFollow = date("Y-m-d");
	$nextFollow = $_POST['nextFollow'];
	$followMsg = $_POST['followMsg'];
		if(!isset($errorMsg)){
			$sql = "insert into follow_ups (followUp_id,enquiry_id,firstName,lastName,email,phone,lastFollow,nextFollow,followMsg)
					values('".$followUp_id_gen."','".$enquiry_id."','".$firstName."','".$lastName."','".$email."','".$phone."','".$lastFollow."','".$nextFollow."','".$followMsg."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="followUp_Success.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>