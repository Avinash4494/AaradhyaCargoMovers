<?php
require_once('db.php');
$upload_dir = '../uploads/gallery-upload/';
if (isset($_POST['Submit'])) {
	$document_id = $_POST['document_id'];
	$document_id_gen = 'ACM'.'-'.rand(1000000,9999999);
	$image_name=$_POST['image_name'];
	$uploadDate = date("d-m-Y");

	$imgName1 = $_FILES['image1']['name'];
		$imgTmp1 = $_FILES['image1']['tmp_name'];
		$imgSize1 = $_FILES['image1']['size'];


if(empty($image_name)){
			$errorMsg = 'Please input name';
		} 
		else{
			$imgExt1 = strtolower(pathinfo($imgName1, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic1 = rand(1000,9999).'_'.rand(100,999).'.'.$imgExt1;
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
			$sql = "insert into web_gallery_upload(document_id,image_name,uploadDate,image1)
					values('".$document_id_gen."','".$image_name."','".$uploadDate."','".$userPic1."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>
setTimeout(function(){ window.location.href="gallery_index.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>