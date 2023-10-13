<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'VR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$place_visit = $_POST['place_visit'];
$noOfPerson = $_POST['noOfPerson'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$vendor_name = $_POST['vendor_name'];

$item_carried = $_POST['item_carried'];
$id_type = $_POST['id_type'];
$proff_num = $_POST['proff_num'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$req_status = $_POST['req_status'];
$raised_on = date("Y-m-d");

$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_vend_pass(request_id,employees_id,raised_by,place_visit,start_date,end_date,vendor_name,noOfPerson,item_carried,id_type,proff_num,contact,email,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$place_visit."','".$start_date."','".$end_date."','".$vendor_name."','".$noOfPerson."','".$item_carried."','".$id_type."','".$proff_num."','".$contact."','".$email."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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