<?php
session_start();
if($_SESSION["admin_id"]){
}
else {
header("location: ../Auth/index.php");
}
?>
<?php
 
$admin_id = $_SESSION['admin_id'];
$query = mysqli_query($connect,"SELECT * FROM admin_login WHERE admin_id='$admin_id'");
$row = mysqli_fetch_assoc($query);
?> 