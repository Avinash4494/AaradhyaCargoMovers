<?php
require_once('db.php');
$upload_dir = 'uploads/';
if (isset($_POST['Submit'])) {
	$event_id = $_POST['random_user_id'];
$event_id_gen = 'EV'.'-'.rand(100000,999999);
	$username = $_POST['USN_id'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
	$alternate_phone = $_POST['alternate_phone'];
	$user_present_address = $_POST['present_address'];
$user_present_state = $_POST['present_state'];
$user_present_pincode = $_POST['present_pincode'];
$user_permanent_address = $_POST['permanent_address'];
$user_permanent_state = $_POST['permanent_state'];
$user_permanent_pincode = $_POST['permanent_pincode'];


$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($username)){
			$errorMsg = 'Please input name';
		}elseif(empty($dob)){
			$errorMsg = 'Please input contact';
		}elseif(empty($gender)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $username.'_'.rand(1000,9999).'.'.$imgExt;
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
			$sql = "insert into admin_info (random_user_id, USN_id,dob,gender,alternate_phone,present_address,present_state,present_pincode,permanent_address,permanent_state,permanent_pincode,image)
					values('".$event_id_gen."','".$username."','".$dob."','".$gender."','".$alternate_phone."','".$user_present_address."','".$user_present_state."','".$user_present_pincode."','".$user_permanent_address."','".$user_permanent_state."','".$user_permanent_pincode."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>

setTimeout(function(){ window.location.href="addedSuccess.php"; }, 1000);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>