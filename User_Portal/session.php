<?php
session_start();
if($_SESSION["user_id"]){
}
else {
header("location: ../user_Auth/index.php");
}
?>
<?php
 
$user_id = $_SESSION['user_id'];
$query = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($query);
?> 