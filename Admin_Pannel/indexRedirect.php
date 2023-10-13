<?php 
	session_start();
  	if (isset($_SESSION['username'])){
		header("location: AdminDashboard.php");
	}	 
 ?>