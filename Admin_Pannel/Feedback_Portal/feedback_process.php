
<?php include_once 'db.php'; ?>

	<?php 
		if(isset($_POST['Submit'])) {
$feedback_id = $_POST['feedback_id'];
$feedback_id_gen = 'FE'.'-'.rand(100000,999999);
$names = $_POST['names'];
$email = $_POST['email'];
$cphone= $_POST['cphone'];
$ccoment = $_POST['ccoment'];
$sender_time=  date("D M d, Y H:i:s a");
//$qcoment = $_POST['qcoment'];

mysqli_query($connect,"insert into usercoment(feedback_id,names,email,cphone,ccoment,cdate) 
	values ('$feedback_id_gen','$names','$email','$cphone','$ccoment','$sender_time')") or die(mysqli_error());

echo '<script>
				
				setTimeout(function(){ window.location.href="Success.php"; }, 1000);

</script>'; 
			 
		}
	 ?>
