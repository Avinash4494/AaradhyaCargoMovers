<?php include_once 'db.php'; ?>

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
$sender_freight_type = $_POST['sender_freight_type'];
$sender_time=  date("D M d, Y H:i:s a");
//$qcoment = $_POST['qcoment'];



// sql query for inserting data into database

mysqli_query($connect,"insert into quote(quote_id,sender_names,sender_email,sender_phone,sender_weight,sender_fstate,sender_tstate,sender_message,sender_freight_type,sender_time) 
	values ('$quote_id_gen','$sender_names','$sender_email','$sender_phone','$sender_weight','$sender_fstate','$sender_tstate','$sender_message','$sender_freight_type','$sender_time')") or die(mysqli_error());
 
echo '<script>
				
				setTimeout(function(){ window.location.href="quoteSuccess.php"; }, 1000);

</script>'; 
			 
		}
	 ?>
 