
<?php
session_start();

include_once 'db.php';
 
  $employees_id = $_POST['employees_id'];
  $Question = $_POST['Question'];
  $Answer = $_POST['Answer'];
  $check = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='".$employees_id."'") or die("Check Query");
 if(mysqli_num_rows($check) != 0) 
 {
	 $row = mysqli_fetch_assoc($check);
	 $dbQuestion = $row['Question'];
	 $dbAnswer = $row['Answer'];
  if($dbQuestion == $Question && $dbAnswer==$Answer) 
  {
     $_SESSION['reset'] = $employees_id;
	   header("location: ResetPassword.php");
	   
  }
  else 
echo '<script>
        
        setTimeout(function(){ window.location.href="passwordError.php"; }, 100);

</script>';
	  echo "<center></center>";
 } else
 echo "<center> Enter Something Correctly Champ!!! </center>";
 
    /*if($query = mysqli_query("INSERT INTO slogin(Fullname, USN ,PASSWORD,Email,Question,Answer) VALUES ('$Name', '$USN', '$password','$Email','$Question','$Answer')"))
    {
                       echo "<center> You have registered successfully...!! Go back to  </center>";
					             echo "<center><a href='index.php'>Login here</a> </center>";
					   
    }
  }
   else
    {
       echo "<center>Your password do not match</center>";
    }
   }
   else
   {
       echo "<center>This USN already exists</center>"; 
  }
 }*/
?>