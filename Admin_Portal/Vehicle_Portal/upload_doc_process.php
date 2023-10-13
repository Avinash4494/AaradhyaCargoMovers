<?php
require_once('db.php');
$upload_dir = '../uploads/vehicle-upload/';
if (isset($_POST['Submit'])) {
	$document_id = $_POST['document_id'];
	$document_id_gen = 'DO'.'-'.rand(1000000,9999999);
	$vehicle_id = $_POST['vehicle_id'];
	$fullname=$_POST['fullname'];
	$uploadDate = date("d-m-Y");

	$imgName1 = $_FILES['image1']['name'];
		$imgTmp1 = $_FILES['image1']['tmp_name'];
		$imgSize1 = $_FILES['image1']['size'];


if(empty($vehicle_id)){
			$errorMsg = 'Please input name';
		}elseif(empty($fullname)){
			$errorMsg = 'Please input contact';
		}elseif(empty($uploadDate)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt1 = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic1 = $vehicle_id.'_'.rand(100,999).'.'.$imgExt1;
			if(in_array($imgExt1, $allowExt)){
				if($imgSize1 < 50000000){
					move_uploaded_file($imgTmp1, $upload_dir.$userPic1);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}

		
		if(!isset($errorMsg)){
			$sql = "insert into veh_upload_doc(document_id,vehicle_id,fullname,uploadDate,image1)
					values('".$document_id_gen."','".$vehicle_id."','".$fullname."','".$uploadDate."','".$userPic1."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="updateSuceess.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>