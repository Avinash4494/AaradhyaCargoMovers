<?php
$host = "localhost";
$username = "aaradhya";
$password = "9454767811";
$dbname = "aaradhyacargo";

$conn = mysqli_connect($host, $username, $password, $dbname);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

?>
