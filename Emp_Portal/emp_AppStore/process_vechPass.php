<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'VR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$location = $_POST['location'];
$veh_regis = $_POST['veh_regis'];
$veh_type = $_POST['veh_type'];
$veh_num = $_POST['veh_num'];
$veh_model = $_POST['veh_model'];
$veh_name = $_POST['veh_name'];
$veh_location = $_POST['veh_location'];
$dl_num = $_POST['dl_num'];
$comments = $_POST['comments'];
$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_vehicle_pass(request_id,employees_id,raised_by,location,veh_regis,veh_type,veh_num,veh_model,veh_name,veh_location,dl_num,comments,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$location."','".$veh_regis."', '".$veh_type."','".$veh_num."','".$veh_model."','".$veh_name."','".$veh_location."','".$dl_num."','".$comments."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
			$result = mysqli_query($connect, $sql);
			if($result){
echo '<script>
setTimeout(function(){ window.location.href="addedSuccess.php"; }, 150);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>