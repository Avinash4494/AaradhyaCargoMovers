<?php
require_once('db.php');

	$log_activity_id = $_POST['log_activity_id'];
	$log_activity_id_gen = 'LA'.'-'.rand(1000000,9999999);
	$auth_type= $_POST['auth_type'];
	$login_id= $_POST['login_id'];
	$log_time= $_POST['log_time'];
	$log_date= $_POST['log_date'];
	$log_ip_address= $_POST['log_ip_address'];
	$logLocation= $_POST['logLocation'];
	$log_browser= $_POST['log_browser'];
	$log_hostname= $_POST['log_hostname'];
	
		if(!isset($errorMsg)){
			$sql = "insert into userlog_activity (log_activity_id,auth_type,login_id,log_time,log_date,
			log_ip_address,logLocation,log_browser,log_hostname)
					values('".$log_activity_id_gen."','".$auth_type."','".$login_id."','".$log_time."','".$log_date."','".$log_ip_address."','".$logLocation."','".$log_browser."','".$log_hostname."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="index.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}

?>