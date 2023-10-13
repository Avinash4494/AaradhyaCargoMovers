
<?php
	session_start();
	$employees_id = $_POST['employees_id'];
	$password  = $_POST['password'];
	
	if ($employees_id&&$password)
	{
		include_once '../db.php';
		
		$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='$employees_id'");
		
		$numrows = mysqli_num_rows($query);
		
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['employees_id'];
				$dbpassword = $row['PASSWORD'];
				
			}
			if ($employees_id==$dbusername&& $password==$dbpassword)
			{
				  echo '<script>
        
        window.location.href="loginSuccess.php";

</script>';
 
			  // echo "<meta http-equiv='refresh' content ='5; url=index.php'>";
				$_SESSION['employees_id'] = $employees_id;
				//$_SESSION['Name'] = mysql_query("SELECT Name FROM slogin WHERE USN='$username'");
			} else{
				 
			  echo '<script>
        
        window.location.href="loginFailed.php";

</script>';
			   
			  // echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
			}
		}else
		 
			die('<script>
        
        window.location.href="loginFailed.php";

</script>');
			 // echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
	}
	else
	die("Please enter username and Password");
	?>