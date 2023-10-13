<?php
require_once('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if (isset($_POST['Submit'])) {
$vehicle_id = $_POST['vehicle_id'];
$vehicle_id_gen = 'VE'.'-'.rand(10000000,99999999);
$driver_id = $_POST['driver_id'];
$driver_id_gen = 'DR'.'-'.rand(10000000,99999999);
$veh_name = $_POST['veh_name'];
$veh_num = $_POST['veh_num'];
$veh_type = $_POST['veh_type'];
$regis_num = $_POST['regis_num'];
$veh_driver = $_POST['veh_driver'];
$veh_joinDt = $_POST['veh_joinDt'];
$dl_num = $_POST['dl_num'];
$added_date=  date("d/m/Y");

$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($veh_num)){
			$errorMsg = 'Please input name';
		}elseif(empty($veh_name)){
			$errorMsg = 'Please input contact';
		}elseif(empty($veh_type)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $veh_num.'_'.rand(100,999).'.'.$imgExt;
			if(in_array($imgExt, $allowExt)){
				if($imgSize < 50000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}
		if(!isset($errorMsg)){
			$sql = "insert into add_vehicle (vehicle_id,driver_id,veh_name,veh_num,veh_type,regis_num,veh_driver,veh_joinDt,added_date,dl_num,image)
					values('".$vehicle_id_gen."','".$driver_id_gen."','".$veh_name."','".$veh_num."','".$veh_type."','".$regis_num."','".$veh_driver."','".$veh_joinDt."','".$added_date."','".$dl_num."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="addedSuccessVehicle.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>