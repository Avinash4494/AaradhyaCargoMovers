<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'BR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$offc_location = $_POST['offc_location'];
$prim_owner = $_POST['prim_owner'];
$dev_type = $_POST['dev_type'];
$dev_name = $_POST['dev_name'];
$dev_modelNo = $_POST['dev_modelNo'];
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];

$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_byod(request_id,employees_id,raised_by,offc_location,prim_owner,dev_type,dev_name,dev_modelNo,fromDate,toDate,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$offc_location."','".$prim_owner."', '".$dev_type."','".$dev_name."','".$dev_modelNo."','".$fromDate."','".$toDate."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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