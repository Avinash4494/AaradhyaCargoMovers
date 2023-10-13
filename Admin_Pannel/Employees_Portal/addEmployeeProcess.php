
<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
  	$career_id = $_POST['career_id'];
	$career_id_gen = 'AP'.'-'.rand(100000,999999);
	$job_id = $_POST['job_id'];
  	$fname = $_POST['fname'];
    $exp = $_POST['exp'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $highestQualification = $_POST['highestQualification'];
    $college = $_POST['college'];
    $skills = $_POST['skills'];
     
    $about = $_POST['about'];
    $applied_time=  date("D M d, Y H:i:s a");

    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($fname)){
			$errorMsg = 'Please input name';
		}elseif(empty($contact)){
			$errorMsg = 'Please input contact';
		}elseif(empty($email)){
			$errorMsg = 'Please input email';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif' , 'pdf' ,'doc','docx');

			$userPic = $career_id_gen.'_'.$fname.'.'.$imgExt;

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
		 
					$sql = "insert into apply_now_careers(career_id,job_id,fname,exp,contact,email,highestQualification,college,skills,about,applied_time,image)
					values('".$career_id_gen."','".$job_id."','".$fname."','".$exp."','".$contact."','".$email."', '".$highestQualification."','".$college."','".$skills."','".$about."','".$applied_time."', '".$userPic."')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo '<script>
        
        setTimeout(function(){ window.location.href="appliedSuccess.php"; }, 1500);

</script>';
 
			  echo "<meta http-equiv='refresh' content ='3; url=../careers.php'>";
				 
				 
			}else{
				$errorMsg = 'Error '.mysqli_error($connect);
			}
		}
  }
?>
