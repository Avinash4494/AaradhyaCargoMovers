<?php include_once '../db.php'; ?>
<?php include_once "../session.php" ?>
	<?php 
		if(isset($_POST['sendmail'])) {
$quote_id = $_POST['quote_id'];
$quote_id_gen = 'QT'.'-'.rand(100000,999999);
$sender_names = $_POST['sender_names'];
$sender_email = $_POST['sender_email'];
$sender_phone = $_POST['sender_phone'];
$sender_weight = $_POST['sender_weight'];
$sender_fstate = $_POST['sender_fstate'];
$sender_tstate = $_POST['sender_tstate'];
$sender_message = $_POST['sender_message'];
$last_follow = $_POST['last_follow'];
$next_follow = $_POST['next_follow'];
$status_priority = $_POST['status_priority'];
$update_by = $_POST['update_by'];
$status = $_POST['status'];
$status_msg = $_POST['status_msg'];
$sender_freight_type = $_POST['sender_freight_type'];
$status = $_POST['status'];
$sender_time=  date("D M d");
//$qcoment = $_POST['qcoment'];



// sql query for inserting data into database

mysqli_query($connect,"insert into quote(quote_id,sender_names,sender_email,sender_phone,sender_weight,sender_fstate,sender_tstate,sender_message,last_follow,next_follow,status_priority,update_by,status_msg,sender_freight_type,status,sender_time) 
	values ('$quote_id_gen','$sender_names','$sender_email','$sender_phone','$sender_weight','$sender_fstate','$sender_tstate','$sender_message','$last_follow','$next_follow','$status_priority','$update_by','$status_msg',
	'$sender_freight_type','$status','$sender_time')") or die(mysqli_error());
 
echo '<script>
				
				setTimeout(function(){ window.location.href="quoteSuccess.php"; }, 1000);

</script>'; 
			 
		}
	 ?>
 