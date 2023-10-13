 
<?php
require_once('db.php');
$upload_dir = '../uploads/courier-uploads/';
if (isset($_POST['Submit'])) {
$courier_id = $_POST['courier_id'];
$courier_id_gen = 'CO'.rand(100000,999999);
$cus_name = $_POST['cus_name'];
$cus_address = $_POST['cus_address'];
$cus_contact = $_POST['cus_contact'];
$cus_gstin = $_POST['cus_gstin'];
$invoice_date = $_POST['invoice_date'];
$invoice_no = "2021-22/ACM/".$_POST['invoice_no'];
$courierdate = $_POST['courierdate'];
$docketNumber = $_POST['docketNumber'];
$nofpkts = $_POST['nofpkts'];
$mode = $_POST['mode'];
$payment_process = $_POST['payment_process'];
$order_status = $_POST['order_status'];
$order_date = $_POST['order_date'];
$package_from = $_POST['package_from'];
$package_to = $_POST['package_to'];
$total_weight = $_POST['total_weight'];
$rate = $_POST['rate'];
$frieght_charge = $_POST['frieght_charge'];
$pickup_charge = $_POST['pickup_charge'];
$docket_charge = $_POST['docket_charge'];
$gst = $_POST['gst'];
$gst_range = $_POST['gst_range'];
$grand_total = $_POST['grand_total'];
$added_date=  date("d/m/Y");

$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($docketNumber)){
			$errorMsg = 'Please input name';
		}elseif(empty($mode)){
			$errorMsg = 'Please input contact';
		}elseif(empty($package_to)){
			$errorMsg = 'Please input email';
		}else{
			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
		$allowExt  = array('jpeg', 'jpg', 'png', 'gif', 'pdf' , 'docx','doc', 'xls' ,'webp');
			$userPic = $docketNumber.'_'.rand(1000,9999).'.'.$imgExt;
			if(in_array($imgExt, $allowExt)){
				if($imgSize < 50000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}
		if(!isset($errorMsg)){
			$sql = "insert into addcourier (courier_id,cus_name,cus_address,cus_contact,cus_gstin,invoice_date,invoice_no,courierdate,docketNumber,nofpkts,mode,payment_process,order_status,order_date,package_from,package_to,rate,total_weight,frieght_charge,pickup_charge,docket_charge,gst,gst_range,grand_total,added_date,image)
					values('".$courier_id_gen."','".$cus_name."','".$cus_address."','".$cus_contact."','".$cus_gstin."','".$invoice_date."','".$invoice_no."','".$courierdate."','".$docketNumber."','".$nofpkts."','".$mode."','".$payment_process."','".$order_status."','".$order_date."','".$package_from."','".$package_to."','".$rate."','".$total_weight."','".$frieght_charge."','".$pickup_charge."','".$docket_charge."','".$gst."','".$gst_range."','".$grand_total."','".$added_date."','".$userPic."')";
			$result = mysqli_query($connect, $sql);
			echo $result;
			if($result){
				$successMsg = 'New record added successfully';
echo '<script>

setTimeout(function(){ window.location.href="addedSuccessCourier.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>