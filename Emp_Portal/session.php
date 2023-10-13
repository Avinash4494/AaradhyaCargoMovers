<?php
session_start();
if($_SESSION["employees_id"]){
}
else {
header("location: ../emp_Auth/index.php");
}
?>
<?php
 
$employees_id = $_SESSION['employees_id'];
$query = mysqli_query($connect,"SELECT * FROM employee_login WHERE employees_id='$employees_id'");
$row = mysqli_fetch_assoc($query);
?> 