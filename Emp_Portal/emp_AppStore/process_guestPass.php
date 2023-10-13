<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'GR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$place_visit = $_POST['place_visit'];
$pass_type = $_POST['pass_type'];
$photography = $_POST['photography'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$guest_name = $_POST['guest_name'];
$organisation = $_POST['organisation'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_guest(request_id,employees_id,raised_by,place_visit,pass_type,photography,start_date,end_date,guest_name,organisation,contact,email,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$place_visit."','".$pass_type."', '".$photography."','".$start_date."','".$end_date."','".$guest_name."','".$organisation."','".$contact."','".$email."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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