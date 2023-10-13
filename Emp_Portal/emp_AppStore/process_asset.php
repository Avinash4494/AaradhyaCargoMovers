<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'GR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$offc_location = $_POST['offc_location'];
$prim_owner = $_POST['prim_owner'];
$asset_type = $_POST['asset_type'];
$asset_location = $_POST['asset_location'];
$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];

$asset_name = $_POST['asset_name'];
$asset_no = $_POST['asset_no'];
$asset_provider = $_POST['asset_provider'];
$asset_status = $_POST['asset_status'];
$asset_hostName = $_POST['asset_hostName'];
$asset_serial = $_POST['asset_serial'];
$asset_desc = $_POST['asset_desc'];
$asset_alloc_date = $_POST['asset_alloc_date'];
$asset_end_date = $_POST['asset_end_date'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_asset(request_id,employees_id,raised_by,offc_location,prim_owner,asset_type,asset_location,asset_name,asset_no,asset_provider,asset_status,asset_hostName,asset_serial,asset_desc,asset_alloc_date,asset_end_date,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$offc_location."','".$prim_owner."', '".$asset_type."','".$asset_location."','".$asset_name."','".$asset_no."','".$asset_provider."','".$asset_status."','".$asset_hostName."','".$asset_serial."','".$asset_desc."','".$asset_alloc_date."','".$asset_end_date."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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