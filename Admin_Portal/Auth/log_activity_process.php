<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$log_activity_id = $_POST['log_activity_id'];
	$log_activity_id_gen = 'LA'.'-'.rand(1000000,9999999);
	$log_time = date("d-m-Y");
	$admin_id= $_POST['admin_id'];
	$log_out_time= $_POST['log_out_time'];
	$log_ip_address= $_POST['log_ip_address'];
	$log_user_location= $_POST['log_user_location'];
	$password= $_POST['password'];
		if(!isset($errorMsg)){
			$sql = "insert into admin_log_activity (log_activity_id,admin_id,log_time,log_out_time,log_ip_address,log_user_location,password)
					values('".$log_activity_id_gen."','".$admin_id."','".$log_time."','".$log_out_time."','".$log_ip_address."','".$log_user_location."','".$password."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="loginProcess.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>