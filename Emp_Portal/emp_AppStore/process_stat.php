
<?php
  require_once('../db.php');
  if (isset($_POST['Submit'])) {
  	$request_id = $_POST['request_id'];
	  $request_id_gen = 'SR'.'-'.rand(100000,999999);
  	$employees_id = $_POST['employees_id'];
  	$location = $_POST['location'];
    $raised_by = $_POST['raised_by'];
    $sta_item = $_POST['sta_item'];
    $quantity = $_POST['quantity'];
    $comments = $_POST['comments'];
    $req_status = $_POST['req_status'];
     $updated_on = $_POST['updated_on'];
      $remarks = $_POST['remarks'];
    $raised_on = date("Y-m-d"); 

		if(!isset($errorMsg)){
		 
					$sql = "insert into raise_stat(request_id,employees_id,location,raised_by,sta_item,quantity,comments,req_status,updated_on,remarks,raised_on)
					values('".$request_id_gen."','".$employees_id."','".$location."','".$raised_by."','".$sta_item."','".$quantity."', '".$comments."','".$req_status."','".$updated_on."','".$remarks."', '".$raised_on."')";
			$result = mysqli_query($connect, $sql);
			if($result){
				echo '<script>
        
        setTimeout(function(){ window.location.href="addedSuccess.php"; }, 150);

</script>';
 
			  
				 
				 
			}else{
				$errorMsg = 'Error '.mysqli_error($connect);
			}
		}
  }
?>
