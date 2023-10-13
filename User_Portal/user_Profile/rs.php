
<?php
session_start();

include_once 'db.php';
 
  $user_id = $_POST['user_id'];
  $Question = $_POST['Question'];
  $Answer = $_POST['Answer'];
  $check = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='".$user_id."'") or die("Check Query");
 if(mysqli_num_rows($check) != 0) 
 {
	 $row = mysqli_fetch_assoc($check);
	 $dbQuestion = $row['Question'];
	 $dbAnswer = $row['Answer'];
  if($dbQuestion == $Question && $dbAnswer==$Answer) 
  {
     $_SESSION['reset'] = $user_id;
	   header("location: ResetPassword.php");
	   
  }
  else 
echo '<script>
        
        setTimeout(function(){ window.location.href="passError.php"; }, 100);

</script>';
	  echo "<center></center>";
 } else
 echo '<script>
        
        setTimeout(function(){ window.location.href="passError.php"; }, 100);

</script>';
 
?>