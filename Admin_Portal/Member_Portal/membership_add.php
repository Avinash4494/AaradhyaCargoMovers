<?php
require_once('db.php');
include('membership_process.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
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
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
              <div class="left-compTop">
                <a href="member_Index.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button></a>
                <a href="member_Add.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-user-plus"></i> &nbsp Add Member</button></a>
                <a href="all_Members_List.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp All Member Lists</button></a>
                <a href="member_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button></a>
              </div>
            </div>
            <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eius -->
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Create Membership</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Renew Member</h4>
                <!-- Your Code Here -->
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="membership_process.php" method="post" enctype="multipart/form-data">
                     <input type="date" id="receiptDate" name="receiptDate" hidden="">
                      <input type="text" id="renewal_id" name="renewal_id" hidden="">
                    <div class="row">
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Email<span>*</span></label>
                          <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']?>">
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
                          <label for="">Phone<span>*</span></label>
                          <input type="text" id="phone" name="phone" class="form-control"  value="<?php echo $row['phone']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Membership Type<span>*</span></label>
                          <input type="text" id="membershipType" name="membershipType" class="form-control"  value="<?php echo $row['membershipType']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Shift Timing<span>*</span></label>
                          <input type="text" id="shiftTiming" name="shiftTiming" class="form-control"  value="<?php echo $row['shiftTiming']?>">
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
                          <input type="text" id="joiningDate" name="joiningDate" class="form-control" value="<?php echo $row['joiningDate']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Expiry Date<span>*</span></label>
                          <input type="text" id="expiryDate" name="expiryDate" class="form-control" value="<?php echo $row['expiryDate']?>">
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
                    </div>
                    <div class="row">
                         <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Amount Paid</label>
                          <input type="text" id="amountPaid" name="amountPaid" class="form-control"  value="<?php echo $row['amountPaid']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Payment Mode<span>*</span></label>
                           <input type="text" id="paymentMode" name="paymentMode" class="form-control"  value="<?php echo $row['paymentMode']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                          <div class="form-group">
                            <label for="">Remarks</label>
                            <input type="text" id="remarksRenew" name="remarksRenew" class="form-control" placeholder="Remarks">
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