<?php
require_once('db.php');
 $upload_dir = 'uploads/emp_certi/';
if (isset($_POST['Submit'])) {
	$document_id = $_POST['document_id'];
	$document_id_gen = 'CE'.'-'.rand(1000000,9999999);
	$employees_id = $_POST['employees_id'];
	$certi_num=$_POST['certi_num'];
	$comp_date=$_POST['comp_date'];
	$certi_name=$_POST['certi_name'];
	$uploadDate = date("d-m-Y");

	$imgName1 = $_FILES['image1']['name'];
		$imgTmp1 = $_FILES['image1']['tmp_name'];
		$imgSize1 = $_FILES['image1']['size'];


if(empty($employees_id)){
			$errorMsg = 'Please input name';
		}elseif(empty($comp_date)){
			$errorMsg = 'Please input contact';
		}elseif(empty($uploadDate)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt1 = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic1 = $employees_id.'_'.rand(100,999).'.'.$imgExt1;
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
			$sql = "insert into emp_upload_certi(document_id,employees_id,certi_num,comp_date,certi_name,uploadDate,image1)
					values('".$document_id_gen."','".$employees_id."','".$certi_num."','".$comp_date."','".$certi_name."','".$uploadDate."','".$userPic1."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="certi_upload.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>