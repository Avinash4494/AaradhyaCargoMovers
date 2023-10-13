<?php
require_once('db.php');

	$log_activity_id = $_POST['log_activity_id'];
	$log_activity_id_gen = 'LA'.'-'.rand(10000,99999);
	$auth_type = $_POST['auth_type'];
	$login_id= $_POST['login_id'];
	$log_time= $_POST['log_time'];
	$logout_time= $_POST['logout_time'];
	$log_ip_address= $_POST['log_ip_address'];
	$logLocation= $_POST['logLocation'];
	$user_email= $_POST['user_email'];
	$log_browser= $_POST['log_browser'];
		if(!isset($errorMsg)){
			$sql = "insert into log_activity (log_activity_id,auth_type,login_id,log_time,log_ip_address,logLocation,user_email,log_browser)
					values('".$log_activity_id_gen."','".$auth_type."','".$login_id."','".$log_time."','".$log_ip_address."','".$logLocation."','".$user_email."','".$log_browser."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="indexRedirect.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}

?>