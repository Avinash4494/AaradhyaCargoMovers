<?php
require_once('../../Database/db.php');
$upload_dir = 'uploads/employees-uploads/';
if (isset($_POST['Submit'])) {
	$employees_id = $_POST['employees_id'];
	$employees_id_gen = 'EM'.'-'.rand(1000000,9999999);
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$dob = $_POST['dob'];
	$gender= $_POST['gender'];
	$age = $_POST['age'];
	$martialStatus = $_POST['martialStatus'];
	$department = $_POST['department'];
	$shiftTiming = $_POST['shiftTiming'];
	$medicalHistory = $_POST['medicalHistory'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$alternate_phone = $_POST['alternate_phone'];
	$highestQual = $_POST['highestQual'];
	$degree = $_POST['degree'];
	$colUniversity = $_POST['colUniversity'];
	$passingDate = $_POST['passingDate'];
	$aadharNo = $_POST['aadharNo'];
	$panNumber = $_POST['panNumber'];
	$joiningDate = $_POST['joiningDate'];
	$updatedDate = date("d-m-Y");
	$remarks = $_POST['remarks'];
	$present_address = $_POST['present_address'];
	$state = $_POST['state'];
	$present_pincode = $_POST['present_pincode'];
	$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($firstName)){
			$errorMsg = 'Please input name';
		}elseif(empty($dob)){
			$errorMsg = 'Please input contact';
		}elseif(empty($gender)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $firstName.' '.$lastName.'_'.$employees_id_gen.'.'.$imgExt;
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
			$sql = "insert into add_employees (employees_id,firstName,lastName,dob,gender,age,martialStatus,department,shiftTiming,medicalHistory,email,phone,alternate_phone,highestQual,degree,colUniversity,passingDate,aadharNo,panNumber,joiningDate,updatedDate,remarks,present_address,state,present_pincode,image)
					values('".$employees_id_gen."','".$firstName."','".$lastName."','".$dob."','".$gender."','".$age."','".$martialStatus."','".$department."','".$shiftTiming."','".$medicalHistory."','".$email."','".$phone."','".$alternate_phone."','".$highestQual."','".$degree."','".$colUniversity."','".$passingDate."','".$aadharNo."','".$panNumber."','".$joiningDate."','".$updatedDate."','".$remarks."','".$present_address."','".$state."','".$present_pincode."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="employees_index.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>