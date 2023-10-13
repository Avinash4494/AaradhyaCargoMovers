<?php
require_once('db.php');
$upload_dir = 'uploads/';
if (isset($_POST['Submit'])) {
$courier_id = $_POST['courier_id'];
$courier_id_gen = 'CO'.'-'.rand(100000,999999);
$docketNumber = $_POST['docketNumber'];
$sname = $_POST['sname'];
$smobile = $_POST['smobile'];
$semail = $_POST['semail'];
$saddress = $_POST['saddress'];
$tofpkts = $_POST['tofpkts'];
$actualwt = $_POST['actualwt'];
$courierdate = $_POST['courierdate'];
$rname = $_POST['rname'];
$rmobile = $_POST['rmobile'];
$remail = $_POST['remail'];
$raddress = $_POST['raddress'];
$cost = $_POST['cost'];
$nofpkts = $_POST['nofpkts'];
$chargewt = $_POST['chargewt'];
$descri = $_POST['descri'];
$added_date=  date("D M d, Y H:i:s a");

$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];
if(empty($sname)){
			$errorMsg = 'Please input name';
		}elseif(empty($remail)){
			$errorMsg = 'Please input contact';
		}elseif(empty($rname)){
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
			$sql = "insert into addcourier (courier_id,docketNumber,sname,smobile,semail,saddress,tofpkts,actualwt,courierdate,rname,rmobile,remail,raddress,cost,nofpkts,chargewt,descri,added_date,image)
					values('".$courier_id_gen."','".$docketNumber."','".$sname."','".$smobile."','".$semail."','".$saddress."','".$tofpkts."','".$actualwt."','".$courierdate."','".$rname."','".$rmobile."','".$remail."','".$raddress."','".$cost."','".$nofpkts."','".$chargewt."','".$descri."','".$added_date."','".$userPic."')";
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