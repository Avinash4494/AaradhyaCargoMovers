<?php include_once 'navAdminLinks.php' ?>
<?php
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	$USN2 = ($_SESSION['reset']);
	
	include_once 'db.php';
	
			if($USN1 && $password && $confirm ){
		
	
	if($password == $confirm) {
		
		if($USN2 == $USN1){
		if($sql = mysqli_query($connect,"UPDATE `aaradhyacargo_db`.`admin_login` SET `PASSWORD` ='$password' WHERE `admin_login`.`USN` = '$USN1'")){
		   echo '<script>
        
        setTimeout(function(){ window.location.href="passwordSuccess.php"; }, 100);

</script>';
 
		// echo "<meta http-equiv='refresh' content ='3; url=../index.php'>";
		session_unset();
		}
		} else {
			session_unset();
			die("Enter Your Username only");
  		
			
			} 
	} else
	{
	echo "Update Failed";
	session_unset();
	}
	}
	else
	{
	echo "Field cannot be left blank";
	session_unset();
	}
?>