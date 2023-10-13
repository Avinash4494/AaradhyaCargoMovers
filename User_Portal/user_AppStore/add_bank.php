<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from user_login where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){

$bankAccNum = $_POST['bankAccNum'];
$bankBenAccType = $_POST['bankBenAccType'];
$bankBenName = $_POST['bankBenName'];
$bankBranch = $_POST['bankBranch'];
$bankReAccNum = $_POST['bankReAccNum'];
$bankIfsc = $_POST['bankIfsc'];
$bankName = $_POST['bankName'];
$bank_upDate = date("d-m-Y");
if(!isset($errorMsg)){
$sql = "update user_login
set
bankAccNum = '".$bankAccNum."',
bankBenAccType = '".$bankBenAccType."',
bankBenName = '".$bankBenName."',
bankBranch = '".$bankBranch."',
bankReAccNum = '".$bankReAccNum."',
bankIfsc = '".$bankIfsc."',
bankName = '".$bankName."',
bank_upDate = '".$bank_upDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="bankUpdate.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <script src="validation.js"></script>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Add Bank</span></h5>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <style>
                  .widgetShipmentComp .well
                  {
                  padding: 20px;
                  background-color: white;
                  }
                  .widgetShipmentComp .well h4
                  {
                  margin: 0px;
                  padding-bottom: 10px;
                  }
                  .formUpdat input
                  {
                    border:1px solid red;
                    padding: 20px;
                  }
                   .formUpdat select
                  {
                    border:1px solid red;
                    padding: 20px;
                  }
                   .formUpdat label
                  {
                    font-weight: bold;
                  }
                  .actionButtonCreate{padding: 10px;}
                  </style>
                  <div class="widgetShipmentComp">
                    <div class="well">
                      <div class="basicInfoUpdate">
                        <div class="formUpdat">
<form action="" class="templatemo-login-form" method="POST" enctype="multipart/form-data" name ="register">
  <div class="row">
    <div class="col-lg-6">
      <div class="form-group">
        <label for="">Beneficiary Account Number <span>*</span></label>
        <input type="text" id="email"  onkeyup="emailValidate()" name="bankAccNum" placeholder="Account Number" class="form-control" value="<?php echo $row['bankAccNum']?>" >
        <span id='emailError'></span>
        <div class="form-group">
          <label for="">Beneficiary Accont Type<span>*</span></label>
          <input type="text" id="email"  onkeyup="emailValidate()" name="bankBenAccType" class="form-control" placeholder="Beneficiary Account Type" value="<?php echo $row['bankBenAccType']?>" >
          <span id='emailError'></span>
          <div class="form-group">
            <label for="">Beneficiary Name <span>*</span></label>
            <input type="text" id="email"  onkeyup="emailValidate()" name="bankBenName" placeholder="Beneficiary Name" class="form-control"  value="<?php echo $row['bankBenName']?>" >
            <span id='emailError'></span>
            <div class="form-group">
              <label for="">Branch Name <span>*</span></label>
              <input type="text" id="email"  onkeyup="emailValidate()" name="bankBranch" placeholder="Brance Name" class="form-control"  value="<?php echo $row['bankBranch']?>" >
              <span id='emailError'></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="form-group">
        <label for="">Re-enter Beneficiary Account Number <span>*</span></label>
        <input type="text" id="email"  onkeyup="emailValidate()" name="bankReAccNum" class="form-control" placeholder="Re-enter Account Number"  value="<?php echo $row['bankReAccNum']?>" >
        <span id='emailError'></span>
        <div class="form-group">
          <label for="">IFSC Code <span>*</span></label>
          <input type="text" id="email"  onkeyup="emailValidate()" name="bankIfsc" class="form-control" placeholder="IFSC Code"  value="<?php echo $row['bankIfsc']?>" >
          <span id='emailError'></span>
          <div class="form-group">
            <label for="">Bank Name <span>*</span></label>
            <input type="text" id="email"  onkeyup="emailValidate()" name="bankName" class="form-control" placeholder="Bank Name"  value="<?php echo $row['bankName']?>" >
            <span id='emailError'></span>
            <div class="form-group">
              <button type="submit" name="Submit" class="actionButtonCreate" style="margin-top: 25px;">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>

</body>
</html>