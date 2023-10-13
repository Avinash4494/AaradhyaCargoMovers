<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'GR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$move_btwn = $_POST['move_btwn'];
$pass_type = $_POST['pass_type'];
$out_date = $_POST['out_date'];
$out_by = $_POST['out_by'];
$mat_type = $_POST['mat_type'];
$quantity = $_POST['quantity'];
$total_weight = $_POST['total_weight'];
$mat_descp = $_POST['mat_descp'];
$sender_name = $_POST['sender_name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$organisation = $_POST['organisation'];
$sender_location = $_POST['sender_location'];
$req_status = $_POST['req_status'];
$raised_on = date("Y-m-d");
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_gate_pass(request_id,employees_id,raised_by,move_btwn,pass_type,out_date,out_by,mat_type,quantity,total_weight,mat_descp,sender_name,organisation,contact,email,sender_location,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$move_btwn."','".$pass_type."','".$out_date."','".$out_by."','".$mat_type."','".$quantity."','".$total_weight."','".$mat_descp."','".$sender_name."','".$organisation."','".$contact."','".$email."','".$sender_location."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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