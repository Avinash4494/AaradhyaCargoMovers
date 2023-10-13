<?php
require_once('db.php');
include('member_Renew_Process.php');
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member Fees Payment</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Member Fees Payment</h4>
                <!-- Your Code Here -->
                <div class="formPannel">
                  <form class="" name ="register" onsubmit="return myvalidate();" action="member_Fees_Process.php" method="post" enctype="multipart/form-data">
                    <input type="text" id="order_id" name="order_id" hidden="">
                    <input type="text" id="fees_id" name="fees_id" hidden="">
                    <input type="date" id="receiptDate" name="receiptDate" hidden="">
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
                          <input type="text" id="firstName" name="firstName" class="form-control" placeholder="FirstName"  value="<?php echo $row['firstName']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Last Name<span>*</span></label>
                          <input type="text" id="lastName" name="lastName" class="form-control" placeholder="lastName"  value="<?php echo $row['lastName']?>">
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-12">
                        <div class="form-group">
                          <label for="">Email<span>*</span></label>
                          <input type="text" id="email" name="email" class="form-control" value="<?php echo $row['email']?>">
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
                          <label for="">Fees Month<span>*</span></label>
                          <select name="feesMonthly" id="feesMonthly" class="form-control">
                            <option value="Null">Select Any</option>
                            <option value="Others">Others</option>
                            <option value="Janurary">Janurary</option>
                            <option value="Februray">Februray</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
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
                          <label for="">Amount</label>
                          <input type="text" id="amountPaid" name="amountPaid" class="form-control"  placeholder ="Amount">
                          <!-- <?php
                          $sql = "select * from fees_member";
                          $result = mysqli_query($connect, $sql);
                          
                          $rows = mysqli_fetch_assoc($result);
                          $amountPaid=0;$totalPaid=0;
                          while ($rows = mysqli_fetch_array($result)) {
                          ?>
                          <?php  $totalPaid+=(int)$rows['amountPaid'];
                          echo $totalPaid;
                          $pendingAmount = (int)$rows['packgeAmount'] - (int)$totalPaid;
                          ?>
                          <?php
                          }
                          ?>
                          Pending Amount : <?php echo $totalPaid ?>.00 Rs -->
                        </div>
                      </div>
                    </div>
                    <div class="row">
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
                          <input type="text" id="remarks" name="remarks" class="form-control" placeholder="Remarks" >
                        </div>
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