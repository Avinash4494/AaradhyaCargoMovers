<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$feedback_id = $_POST['feedback_id'];
	$feedback_id_gen = 'FD'.'-'.rand(1000000,9999999);
	$firstName = $_POST['firstName'];
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$message= $_POST['message'];
	$feedback_Date = date("d-m-Y");
		if(!isset($errorMsg)){
			$sql = "insert into raise_feedback (feedback_id,firstName,email,phone,message,feedback_Date)
					values('".$feedback_id_gen."','".$firstName."','".$email."','".$phone."','".$message."','".$feedback_Date."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="../../index.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>