<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from renew_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
    $renewal_id = $_POST['renewal_id'];
  $renewal_id_gen = 'MR'.'-'.rand(1000000,9999999);
  $membership_id = $_POST['membership_id'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$membershipType = $_POST['membershipType'];
$shiftTiming = $_POST['shiftTiming'];
$packgeAmount = $_POST['packgeAmount'];
$discountAmount = $_POST['discountAmount'];
$amountPaid = $_POST['amountPaid'];
$medicalHistory = $_POST['medicalHistory'];
$joiningDate = $_POST['joiningDate'];
$expiryDate = $_POST['expiryDate'];
$paymentMode = $_POST['paymentMode'];
$remarksRenew = $_POST['remarksRenew'];
$receiptDate = $_POST['receiptDate'];

 
if(!isset($errorMsg)){
$sql = "update renew_member
set renewal_id = '".$renewal_id_gen."', 
membership_id = '".$membership_id."', 
firstName = '".$firstName."',
lastName = '".$lastName."',
email = '".$email."',
phone = '".$phone."',
membershipType = '".$membershipType."',
shiftTiming = '".$shiftTiming."',
packgeAmount = '".$packgeAmount."',
discountAmount = '".$discountAmount."',
amountPaid = '".$amountPaid."',
medicalHistory = '".$medicalHistory."',
joiningDate = '".$joiningDate."',
expiryDate = '".$expiryDate."',
paymentMode = '".$paymentMode."',
remarksRenew = '".$remarksRenew."',
receiptDate = '".$receiptDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="member_index.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Member Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'topPannelEdit.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
              <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Renew Member</span> </h5>
              </div>
              <div id="print_setion">
                <div class="row">
                  <div class="col-lg-10">
                    <h4>Renew Member</h4>
                  </div>
                  <div class="col-lg-2">
                    
                  </div>
                </div>
                <!-- Your Code Here -->
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
                     <input type="date" id="receiptDate" name="receiptDate" hidden="">
                    <div class="row">
                       <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Renewal ID<span>*</span></label>
                          <input type="text" id="renewal_id" name="renewal_id" class="form-control" value="<?php echo $row['renewal_id']?>" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Membership ID<span>*</span></label>
                          <input type="text" id="membership_id" name="membership_id" class="form-control" value="<?php echo $row['membership_id']?>" >
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">First Name<span>*</span></label>
                          <input type="text" id="firstName" name="firstName" class="form-control" placeholder="FirstName"  value="<?php echo $row['firstName']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Last Name<span>*</span></label>
                          <input type="text" id="lastName" name="lastName" class="form-control" placeholder="lastName"  value="<?php echo $row['lastName']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Email<span>*</span></label>
                          <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Phone<span>*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control"  value="<?php echo $row['phone']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Membership Type<span>*</span></label>
                          <select name="membershipType" id="membershipType" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="3 Months">3 Months</option>
                            <option value="6 Months">6 Months</option>
                            <option value="9 Months">9 Months</option>
                            <option value="1 Year">1 Year</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Shift Timing<span>*</span></label>
                          <select name="shiftTiming" id="shiftTiming" class="form-control">
                            <option value="null">Select Any</option>
                            <option value="5:00-6:00 AM">5:00-6:00 AM</option>
                            <option value="6:00-7:00 AM">6:00-7:00 AM</option>
                            <option value="7:00-8:00 AM">7:00-8:00 AM</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Package Amount</label>
                          <input type="text" id="packgeAmount" name="packgeAmount" class="form-control" placeholder="Package Amount" value="<?php echo $row['packgeAmount']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Discount Amount</label>
                          <input type="text" id="discountAmount" name="discountAmount" class="form-control" placeholder="Discount Amount" value="<?php echo $row['discountAmount']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Amount Paid</label>
                          <input type="text" id="amountPaid" name="amountPaid" class="form-control"  value="<?php echo $row['amountPaid']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Medical History</label>
                          <input type="text" id="medicalHistory" name="medicalHistory" class="form-control" placeholder="Medical History" value="<?php echo $row['medicalHistory']?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Joining Date<span>*</span></label>
                          <input type="date" id="joiningDate" name="joiningDate" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Expiry Date<span>*</span></label>
                          <input type="date" id="expiryDate" name="expiryDate" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Payment Mode<span>*</span></label>
                          <select name="paymentMode" id="paymentMode" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="Cash">Cash</option>
                            <option value="UPI">UPI</option>
                            <option value="Credit/Debit Card">Credit/Debit Card</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                          <div class="form-group">
                            <label for="">Remarks</label>
                            <input type="text" id="remarksRenew" name="remarksRenew" class="form-control" placeholder="Remarks" value="<?php echo $row['remarksRenew']?>">
                          </div>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6"></div>
                      <div class="col-lg-3">
                        <button type="reset" class="actionButton">Cancel</button>
                      </div>
                      <div class="col-lg-3">
                        <button type="submit" name="Submit" class="actionButton">Submit</button>
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
  </body>
</html>
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>