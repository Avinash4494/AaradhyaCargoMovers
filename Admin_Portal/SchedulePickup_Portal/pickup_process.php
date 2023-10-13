<?php include_once '../db.php'; ?>

	<?php 
		if(isset($_POST['sendmail'])) {
$pickup_id = $_POST['pickup_id'];
$pickup_id_gen = 'SP'.'-'.rand(100000,999999);
$pick_date = $_POST['pick_date'];
$pick_time = $_POST['pick_time'];
$pick_address = $_POST['pick_address'];
$pick_city = $_POST['pick_city'];
$pick_pincode = $_POST['pick_pincode'];
$pick_state = $_POST['pick_state'];
$pick_phone = $_POST['pick_phone'];
$pick_deliAddress = $_POST['pick_deliAddress'];
$pick_deliCity = $_POST['pick_deliCity'];
$pick_deliPincode = $_POST['pick_deliPincode'];
$pick_deliState = $_POST['pick_deliState'];
$pick_deliPhone = $_POST['pick_deliPhone'];
$pick_personal_names = $_POST['pick_personal_names'];
$pick_personal_email = $_POST['pick_personal_email'];
$pick_personal_phone = $_POST['pick_personal_phone'];
$pick_message = $_POST['pick_message'];
$pick_freight_type = $_POST['pick_freight_type'];
$update_by = $_POST['update_by'];
$follow_mode = $_POST['follow_mode'];
$pick_status = $_POST['pick_status'];
$status_msg = $_POST['status_msg'];
$updated_on = date("d/m/Y");
$pick_request_date=  date("d/m/Y");

mysqli_query($connect,"insert into schedule_pickup(pickup_id,pick_date,pick_time,pick_address,pick_city,pick_pincode,pick_state,pick_phone,pick_deliAddress,pick_deliCity,pick_deliPincode,pick_deliState,pick_deliPhone,pick_personal_names,pick_personal_email,pick_personal_phone,pick_message,pick_freight_type,pick_status,update_by,follow_mode,status_msg,updated_on,pick_request_date) 

	values ('$pickup_id_gen','$pick_date','$pick_time','$pick_address','$pick_city','$pick_pincode','$pick_state','$pick_phone','$pick_deliAddress','$pick_deliCity','$pick_deliPincode','$pick_deliState','$pick_deliPhone','$pick_personal_names','$pick_personal_email','$pick_personal_phone','$pick_message','$pick_freight_type','$pick_status','$status_msg','$update_by','$follow_mode','$updated_on','$pick_request_date')") or die(mysqli_error());
 
echo '<script>
				
				setTimeout(function(){ window.location.href="pickup_Success.php"; }, 100);

</script>'; 
			 
		}
	 ?>
 