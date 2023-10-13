<?php
require_once('../db.php');
$upload_dir = '../../Admin_Portal/uploads/emp-claims-upload/';
if (isset($_POST['Submit'])) {
$claim_id = $_POST['claim_id'];
$claim_id_gen = 'CL'.'-'.rand(100000,999999);

$employees_id = $_POST['employees_id'];
$currency = $_POST['currency'];
$total_claimed = $_POST['total_claimed'];
$raised_by = $_POST['raised_by'];
$travelCategory = $_POST['travelCategory'];
$bill_date = $_POST['bill_date'];
$expenceType = $_POST['expenceType'];
$distance = $_POST['distance'];
$perm_limit = $_POST['perm_limit'];
$claim_amount = $_POST['claim_amount'];
$from_location = $_POST['from_location'];
$to_location = $_POST['to_location'];
$reason = $_POST['reason'];
$req_status = $_POST['req_status'];
$declareTerms = $_POST['declareTerms'];
$raised_on=  date("Y-m-d");

$updated_on = $_POST['updated_on'];
$remarks = $_POST['remarks'];

$imgName = $_FILES['travel_image']['name'];
		$imgTmp = $_FILES['travel_image']['tmp_name'];
		$imgSize = $_FILES['travel_image']['size'];
if(empty($travelCategory)){
			$errorMsg = 'Please input name';
		}elseif(empty($raised_by)){
			$errorMsg = 'Please input contact';
		}elseif(empty($distance)){
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
			$sql = "insert into raise_convclaim (claim_id,total_claimed,employees_id,currency,raised_by,travelCategory,bill_date,expenceType,distance,perm_limit,claim_amount,from_location,to_location,reason,req_status,raised_on,declareTerms,updated_on,remarks,travel_image)
					values('".$claim_id_gen."','".$total_claimed."','".$employees_id."','".$currency."','".$raised_by."','".$travelCategory."','".$bill_date."','".$expenceType."','".$distance."','".$perm_limit."','".$claim_amount."','".$from_location."','".$to_location."','".$reason."','".$req_status."','".$raised_on."','".$declareTerms."','".$updated_on."','".$remarks."','".$userPic."')";
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