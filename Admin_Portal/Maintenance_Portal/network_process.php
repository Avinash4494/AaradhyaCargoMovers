<?php
require_once('db.php');
if (isset($_POST['Submit'])) {
	$network_id = $_POST['network_id'];
	$network_id_gen = 'NT'.'-'.rand(1000,9999);
 	$net_offName = $_POST['net_offName'];
	$net_mobile = $_POST['net_mobile'];
	$net_pin = $_POST['net_pin'];
	$net_address = $_POST['net_address'];
	$net_landmark = $_POST['net_landmark'];
	$net_townCity = $_POST['net_townCity'];
	$net_State = $_POST['net_State'];
	$net_addressType = $_POST['net_addressType'];
	$updateDate = $_POST['updateDate'];
	$uploadDate = date("d-m-Y");

	if(!isset($errorMsg)){
		$sql = "insert into web_network_upload(network_id,net_offName,net_mobile,net_pin,net_address,net_landmark,net_townCity,net_State,net_addressType,updateDate,uploadDate)
					values('".$network_id_gen."','".$net_offName."','".$net_mobile."','".$net_pin."','".$net_address."','".$net_landmark."','".$net_townCity."','".$net_State."','".$net_addressType."','".$updateDate."','".$uploadDate."')";
		$result = mysqli_query($connect, $sql);
		if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="network_index.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>