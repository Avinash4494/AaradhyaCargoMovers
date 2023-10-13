 
<?php
	session_start();
	
	$USN1 = $_POST['user_id'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	$USN2 = ($_SESSION['reset']);
	
	include_once 'db.php';
	
			if($USN1 && $password && $confirm ){
		
	
	if($password == $confirm) {
		
		if($USN2 == $USN1){
		if($sql = mysqli_query($connect,"UPDATE `aaradhyacargo_db`.`user_login` SET `PASSWORD` ='$password' WHERE `user_login`.`user_id` = '$USN1'")){
		   echo '<script>
        
        setTimeout(function(){ window.location.href="passwordSuccess.php"; }, 100);

</script>';
 
		// echo "<meta http-equiv='refresh' content ='3; url=../index.php'>";
		 
		}
		} else {
			echo '<script>
        
        setTimeout(function(){ window.location.href="resetError.php"; }, 100);

</script>';
  		
			
			} 
	} else
	{
	echo '<script>
        
        setTimeout(function(){ window.location.href="resetError.php"; }, 100);

</script>';
	
	}
	}
	else
	{
	echo '<script>
        
        setTimeout(function(){ window.location.href="resetError.php"; }, 100);

</script>';

	}
?>