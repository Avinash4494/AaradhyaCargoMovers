<?php 
	session_start();
  	if (isset($_SESSION['employees_id'])){
		header("location: ../AdminDashboard.php");
	}	 
 ?>