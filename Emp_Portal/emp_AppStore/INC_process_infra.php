<?php
require_once('../db.php');
$upload_dir = '../../Admin_Portal/uploads/emp-INC-upload/';
if (isset($_POST['Submit'])) {
$request_id = $_POST['request_id'];
$request_id_gen = 'INC'.rand(1000000,9999999);
$employees_id = $_POST['employees_id'];
$req_status = $_POST['req_status'];
$raised_for = $_POST['raised_for'];
$offc_desig = $_POST['offc_desig'];
$mobile = $_POST['mobile'];
$Email = $_POST['Email'];
$tktState = $_POST['tktState'];
$offc_location = $_POST['offc_location'];
$subLocation = $_POST['subLocation'];
$offc_tower = $_POST['offc_tower'];
$offc_floor = $_POST['offc_floor'];
$offc_wing = $_POST['offc_wing'];
$offc_cubicle = $_POST['offc_cubicle'];
$osType = $_POST['osType'];
$issue_reason = $_POST['issue_reason'];
$raised_on=  date("Y-m-d");
$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];

$imgName = $_FILES['infra_image']['name'];
		$imgTmp = $_FILES['infra_image']['tmp_name'];
		$imgSize = $_FILES['infra_image']['size'];
if(empty($offc_location)){
			$errorMsg = 'Please input name';
		}elseif(empty($offc_tower)){
			$errorMsg = 'Please input contact';
		}elseif(empty($offc_floor)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $request_id_gen.'_'.$employees_id.'.'.$imgExt;
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
			$sql = "insert into raise_inc_infra (request_id,raised_for,employees_id,req_status,offc_desig,mobile,Email,tktState,offc_location,subLocation,offc_tower,offc_floor,offc_wing,offc_cubicle,osType,issue_reason,raised_on,updated_on,remarks,infra_image)
					values('".$request_id_gen."','".$raised_for."','".$employees_id."','".$req_status."','".$offc_desig."','".$mobile."','".$Email."','".$tktState."','".$offc_location."','".$subLocation."','".$offc_tower."','".$offc_floor."','".$offc_wing."','".$offc_cubicle."','".$osType."','".$issue_reason."','".$raised_on."','".$updated_on."','".$remarks."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
	if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="INC_new_index.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>