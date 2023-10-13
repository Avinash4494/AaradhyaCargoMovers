
<?php
require_once('db.php');
session_start();
if($_SESSION["user_id"]){
}
else {
header("location: user_Auth/index.php");
}
?>
 
<?php
$user_id = $_SESSION['user_id'];
$sqlQuery = "SELECT courier_id,invoice_date FROM member_add_courier Where user_id = '$user_id'";
$result = mysqli_query($connect,$sqlQuery);

$data = array();
foreach ($result as $row) {
     $data[] = $row;
}

mysqli_close($connect);

echo json_encode($data);
?>