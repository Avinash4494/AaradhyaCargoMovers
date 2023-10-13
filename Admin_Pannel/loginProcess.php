<?php include_once 'navAdminLinks.php' ?>
<?php
	session_start();
	$username = $_POST['username'];
	$password  = $_POST['password'];
	
	if ($username&&$password)
	{
		include_once 'db.php';
		
		$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='$username'");
		
		$numrows = mysqli_num_rows($query);
		
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['USN'];
				$dbpassword = $row['PASSWORD'];
				
			}
			if ($username==$dbusername&& $password==$dbpassword)
			{
				  echo '<script>
        
        window.location.href="loginSuccess.php";

</script>';
 
			  // echo "<meta http-equiv='refresh' content ='5; url=index.php'>";
				$_SESSION['username'] = $username;
				//$_SESSION['Name'] = mysql_query("SELECT Name FROM slogin WHERE USN='$username'");
			} else{
				$message = "Username and/or Password incorrect.";
  			echo "<script type='text/javascript'>alert('$message');</script>";
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