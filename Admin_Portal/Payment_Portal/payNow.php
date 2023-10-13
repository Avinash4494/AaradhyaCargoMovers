<?php
include('member_Renew_Process.php');
require_once('db.php');
$upload_dir = 'uploads/';
$sql = "select * from renew_member";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
  <title>Renew Member</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <a href="../AdminDashboard.php">Dashboard</a>
    <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
      <input type="text" id="payment_id" name="payment_id" hidden="">
      <div class="row">
        <div class="col-lg-3 col-xs-12">
           <div class="form-group">
            <label for="">Membership ID<span>*</span></label>
            <input type="text" id="membership_id" name="membership_id" class="form-control" value="<?php echo $row['membership_id']?>" >
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">First Name<span>*</span></label>
            <input type="text" id="firstName" name="firstName" class="form-control"  value="<?php echo $row['firstName']?>">
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Last Name<span>*</span></label>
            <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row['lastName']?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-12">
           <div class="form-group">
            <label for="">Payment Mode<span>*</span></label>
            <input type="text" id="paymentMode" name="paymentMode" class="form-control"value="<?php echo $row['paymentMode']?>" >
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
           <div class="form-group">
            <label for="">Package Amount<span>*</span></label>
            <input type="text" id="membership_id" name="packgeAmount" class="form-control"value="<?php echo $row['packgeAmount']?>" >
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Discount Amount<span>*</span></label>
            <input type="text" id="firstName" name="firstName" class="form-control" placeholder="FirstName" value="<?php echo $row['discountAmount']?>">
          </div>
        </div>
        
      </div>
      Total Payable Amount :<?php echo $discount = $row['packgeAmount']-$row['discountAmount']?>.00 Rs 
       <div class="row">
            <div class="col-lg-6">
              <button type="submit" name="Submit" class="signButton">Collect Payment</button>
            </div>
            <div class="col-lg-6">
              <button type="reset" class="signButton">Cancel</button>
            </div>
          </div>
    </form>
  </body>
  </html>