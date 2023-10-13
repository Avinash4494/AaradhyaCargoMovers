<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'GR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$offc_location = $_POST['offc_location'];
$prim_owner = $_POST['prim_owner'];
$state = $_POST['state'];
$city = $_POST['city'];
$com_code = $_POST['com_code'];
$cubicle = $_POST['cubicle'];
$wing = $_POST['wing'];
$floor_num = $_POST['floor_num'];

$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_desktop(request_id,employees_id,raised_by,offc_location,prim_owner,state,city,com_code,cubicle,wing,floor_num,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$offc_location."','".$prim_owner."', '".$state."','".$city."','".$com_code."','".$cubicle."','".$wing."','".$floor_num."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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