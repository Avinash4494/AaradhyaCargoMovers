<?php include_once '../../Header_Links/auth_Header_Links.php' ?>
<?php
	session_start();
	$user_id = $_POST['user_id'];
	$password  = $_POST['password'];
	
	if ($user_id&&$password)
	{
		include_once '../db.php';
		
		$query = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='$user_id'");
		
		$numrows = mysqli_num_rows($query);
		
		if ($numrows!=0)
		{
			while($row = mysqli_fetch_assoc($query))
			{
				$dbusername = $row['user_id'];
				$dbpassword = $row['PASSWORD'];
				
			}
			if ($user_id==$dbusername&& $password==$dbpassword)
			{
				  echo '<script>
        
        window.location.href="logInitiate.php";

</script>';
 
			  // echo "<meta http-equiv='refresh' content ='5; url=index.php'>";
				$_SESSION['user_id'] = $user_id;
				//$_SESSION['Name'] = mysql_query("SELECT Name FROM slogin WHERE USN='$username'");
			} else{
				 
			  echo '<script>
        
        window.location.href="index.php";

</script>';
			   
			  // echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
			}
		}else
		 
			die('<script>
        
        window.location.href="index.php";

</script>');
			 // echo "<meta http-equiv='refresh' content ='1; url=index.php'>";
	}
	else
	die("Please enter username and Password");
	?>