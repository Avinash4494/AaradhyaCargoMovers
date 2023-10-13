<?php
require_once('../db.php');
if (isset($_POST['Submit'])) {
	$request_id = $_POST['request_id'];
	$request_id_gen = 'BR'.'-'.rand(100000,999999);
	$employees_id = $_POST['employees_id'];;
$raised_by = $_POST['raised_by'];
$name = $_POST['name'];
$designation = $_POST['designation'];
$offc_location = $_POST['offc_location'];
$noOfCards = $_POST['noOfCards'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$req_status = $_POST['req_status'];
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];
$raised_on = date("Y-m-d");
		if(!isset($errorMsg)){
		
	$sql = "insert into raise_business_card(request_id,employees_id,raised_by,name,designation,offc_location,noOfCards,contact,email,req_status,updated_on,remarks,raised_on)
	values('".$request_id_gen."','".$employees_id."','".$raised_by."','".$name."','".$designation."','".$offc_location."','".$noOfCards."','".$contact."','".$email."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
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