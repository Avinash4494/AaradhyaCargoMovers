<?php
  require_once('db.php');
  if (isset($_POST['Submit'])) {
  	$job_id = $_POST['job_id'];
	$job_id_gen = 'JD'.'-'.rand(100000,999999);

  	$job_title = $_POST['job_title'];
  	$skills = $_POST['skills'];
    $job_location = $_POST['job_location'];
    $timings = $_POST['timings'];
    $starts_on = $_POST['starts_on'];
    $ends_on = $_POST['ends_on'];
     $total_post = $_POST['total_post'];
    $salary = $_POST['salary'];
    $requirments = $_POST['requirments'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $speical_info = $_POST['speical_info'];
    $role_resp = $_POST['role_resp'];
    $published_on = date("D M d, Y H:i:s a"); 

		if(!isset($errorMsg)){
		 
					$sql = "insert into create_job(job_id,job_title,skills,job_location,timings,starts_on,ends_on,total_post,salary,requirments,education,experience,speical_info,role_resp,published_on)
					values('".$job_id_gen."','".$job_title."','".$skills."','".$job_location."','".$timings."','".$starts_on."', '".$ends_on."', '".$total_post."','".$salary."','".$requirments."','".$education."','".$experience."','".$speical_info."','".$role_resp."','".$published_on."')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo '<script>
        
        setTimeout(function(){ window.location.href="addedSuccess.php"; }, 1500);

</script>';
 
			  echo "<meta http-equiv='refresh' content ='3; url=../careers.php'>";
				 
				 
			}else{
				$errorMsg = 'Error '.mysqli_error($connect);
			}
		}
  }
?>
