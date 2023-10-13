<?php
require_once('../db.php');
$upload_dir = '../../Admin_Portal/uploads/emp-claims-upload/';
if (isset($_POST['Submit'])) {
$claim_id = $_POST['claim_id'];
$claim_id_gen = 'CL'.'-'.rand(100000,999999);
$req_status = $_POST['req_status'];
$raised_on=  date("Y-m-d");
$employees_id = $_POST['employees_id'];
$declareTerms = $_POST['declareTerms'];
$total_claimed = $_POST['total_claimed'];
$currency = $_POST['currency'];
$raised_by = $_POST['raised_by'];
$claim_amount = $_POST['claim_amount'];
$bill_date = $_POST['bill_date'];
$misceCategory = $_POST['misceCategory'];
$reason = $_POST['reason'];

$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];

$imgName = $_FILES['misce_image']['name'];
		$imgTmp = $_FILES['misce_image']['tmp_name'];
		$imgSize = $_FILES['misce_image']['size'];
if(empty($misceCategory)){
			$errorMsg = 'Please input name';
		}elseif(empty($raised_by)){
			$errorMsg = 'Please input contact';
		}elseif(empty($currency)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $claim_id_gen.'_'.$employees_id.'.'.$imgExt;
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
			$sql = "insert into  raise_misceclaim (claim_id,total_claimed,employees_id,currency,raised_by,misceCategory,bill_date,claim_amount,reason,req_status,raised_on,declareTerms,updated_on,remarks,misce_image)
					values('".$claim_id_gen."','".$total_claimed."','".$employees_id."','".$currency."','".$raised_by."','".$misceCategory."','".$bill_date."','".$claim_amount."','".$reason."','".$req_status."','".$raised_on."','".$declareTerms."','".$updated_on."','".$remarks."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="addedSuccess.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>