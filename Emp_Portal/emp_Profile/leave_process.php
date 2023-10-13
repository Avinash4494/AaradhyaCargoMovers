<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$leave_id = $_POST['leave_id'];
	$leave_id_gen = 'AL'.'-'.rand(1000000,9999999);
	$employees_id = $_POST['employees_id'];
	$raised_by = $_POST['raised_by'];
	$noOfdays = $_POST['noOfdays'];
	$leaveType = $_POST['leaveType'];
	$leaveFrom = $_POST['leaveFrom'];
	$leaveTo = $_POST['leaveTo'];
	$message = $_POST['message'];
	$status = $_POST['status'];
	$appliedDate= date("d-m-Y");
	$remarks =$_POST['remarks'];
	$updatedDate =$_POST['updatedDate'];

		if(!isset($errorMsg)){
			$sql = "insert into apply_leave (leave_id,employees_id,raised_by,noOfdays,leaveType,leaveFrom,leaveTo,message,status,appliedDate,remarks,updatedDate)
					values('".$leave_id_gen."','".$employees_id."','".$raised_by."','".$noOfdays."','".$leaveType."','".$leaveFrom."','".$leaveTo."','".$message."','".$status."','".$appliedDate."','".$remarks."','".$updatedDate."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="leave_Success.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>