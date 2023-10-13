<?php
require_once "db.php";
$query_profile = mysqli_query($connect,
"SELECT a.joiningDate,a.expiryDate,a.membershipType,a.packgeAmount,a.amountPaid,a.discountAmount,a.shiftTiming
From renew_member as a
join add_member as u
on a.membership_id = u.membership_id");
$row_profile = mysqli_fetch_assoc($query_profile);
?>
<?php
require_once('db.php');
$upload_dir = 'uploads/members-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from renew_member where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from renew_member where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="all_Members_List.php"; }, 100);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Member Profile -  </title>
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
              <div class="empty-left-View"></div>
             <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member Profile </span> </h5>
              </div>
              <div class="row">
                <div class="col-lg-10" >
                  <h4>Member Profile</h4>
                </div>
                <div class="buttonTop">
                  <div class="col-lg-1" >
                    <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                  </div>
                  <div class="col-lg-1" >
                    <a href="profile_History_Receipt.php?id=<?php echo $rowMember['id'] ?>" >
                      <button class="actionButtonIcons-center" type="submit" data-toggle="tooltip" title="View" data-placement="top"><i class="fa fa-eye"></i></button>
                    </a>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-lg-12">
                  
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="profileImage">
                          <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
                        </div>
                        <br>
                        <a href="addMemberReview.php"><button class="actionButton" type="submit">Add Review</button></a>
                      </div>
                      <div class="col-lg-10">
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Name : </b><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowMember['email'] ?></li>
                              <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowMember['phone'] ?></li>
                              
<?php
 
  // Creates DateTime objects
  $datetime1 = date_create($rowMember["dob"]);
  $datetime2 = date_create(date('Y-m-d'));
 
  // Calculates the difference between DateTime objects
  $interval = date_diff($datetime1, $datetime2);
 
  // Printing result in years & months format
  
?>
                              <li class="list-group-item"><b>Gender : </b><?php echo $rowMember['gender'] ?></li>
                              <li class="list-group-item"><b>Age : </b><?php echo $interval->format('%y years %m months %d days'); ?></li>
                              <li class="list-group-item"><b>Date of Birth : </b><?php echo $rowMember['dob'] ?></li>
                              <li class="list-group-item"><b>Aadhar Number : </b><?php echo $rowMember['aadharNo'] ?></li>
                              <li class="list-group-item"><b>Membership Date : </b><?php echo $rowMember['receiptDate'] ?></li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Membership Id : </b><?php echo $rowMember['membership_id'] ?></li>
                              <li class="list-group-item"><b>Alternate Number : </b><?php echo $rowMember['alternate_phone'] ?></li>
                              <li class="list-group-item"> <b>Martial Status : </b><?php echo $rowMember['martialStatus'] ?></li>
                              <li class="list-group-item"><b>Address :</b> <?php echo $rowMember['present_address'] ?>,<?php echo $rowMember['state'] ?>,<?php echo $rowMember['present_pincode'] ?></li>
                              <li class="list-group-item"><b>Medical History : </b><?php echo $rowMember['medicalHistory'] ?></li>
                              <li class="list-group-item"><b>Remarks :&nbsp</b><?php echo $rowMember['remarks'] ?></li>

                            </ul>
                          </div>
                        </div>
                         <div class="row">
                      <div class="col-lg-2 col-md-4 col-xs-4 "></div>
                      <div class="col-lg-2 col-md-4 col-xs-4 "></div>
      
                      <div class="col-lg-2 col-md-4 col-xs-4 ">
                       
                      </div>
                      <div class="col-lg-2 col-md-4 col-xs-4 ">
                        <a href="member_Edit.php?id=<?php echo $rowMember['id'] ?>" >
                        <button class="actionButton" type="submit">Edit</button></a>
                      </div>
                      <div class="col-lg-2 col-md-4 col-xs-4 ">
                        <a href="receipt_Member.php?id=<?php echo $rowMember['id'] ?>" >
                        <button class="actionButton" type="submit">Print Profile</button></a>
                      </div>
                      <div class="col-lg-2 col-md-4 col-xs-4 ">
                        <a href="member_ICard.php?id=<?php echo $rowMember['id'] ?>" >
                          <button class="actionButton" type="submit">Id Card</button>
                        </a>
                      </div>
                    </div>
                        <?php
                        require_once "db.php";
                        error_reporting(0);
                        $membership_id = $rowMember['membership_id'];
                        $query = 'SELECT * FROM renew_member where membership_id = "'.$membership_id.'"';
                        $feequery = 'SELECT * FROM fees_member where membership_id = "'.$membership_id.'"';
                        $rs_result = mysqli_query ($connect, $query);
                        $fee_result = mysqli_query ($connect, $feequery);
                        ?>
                        <?php
                         
                        if(mysqli_num_rows($rs_result)){
                        $rowMember = mysqli_fetch_array($rs_result);
                        $rowFees = mysqli_fetch_array($fee_result);
                        $mynum = mysqli_num_rows($fee_result);
                        $totalAt = 0;
                        if(mysqli_num_rows($fee_result)){
                          $totalAt +=$rowFees['amountPaid'];

                        $packAmt=$rowMember['packgeAmount'];
                        $amtPaid=$rowMember['amountPaid'];
                      
                        $discountPaid =$rowMember['discountAmount'];
                              while ($rowOut = mysqli_fetch_array($fee_result)) {
                                $totalAt +=$rowOut['amountPaid'];
      
                              }}
                         
// for ($i=0; $i < $mynum  ; $i++) { 
//    $totalAt +=$rowFees['amountPaid'];
//      echo "Total ".$totalAt;
// }
                        // Display each field of the records.
                        if ($membership_id==$rowMember['membership_id']) {
                        # code...
                        
                        ?><br>
                        <div class="row">
                          <div class="col-lg-9">
                            <h5>Membership Details</h5>
                          </div>
                          <div class="col-lg-1">
                             <a href="member_Fees.php?id=<?php echo $rowMember['id'] ?>">
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-inr"></i></button></a>
                          </div>
                          <div class="col-lg-1">
                            <a href="member_Renew.php?id=<?php echo $rowMember['id'] ?>"><button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button></a>
                          </div>
                          <div class="col-lg-1">
                            <a href="receipt_Member_Renew.php?id=<?php echo $rowMember['id'] ?>"><button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button></a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Renewal Id : </b><?php echo $rowMember['renewal_id'] ?></li>
                              <li class="list-group-item"><b>Memmbership Id : </b><?php echo $rowMember['membership_id'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowMember['email'] ?></li>
                              <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowMember['phone'] ?></li>
                              <li class="list-group-item"><b>Package Type : </b><?php echo $rowMember['membershipType'] ?></li>
                              <li class="list-group-item"><b>Shift Timing : </b><?php echo $rowMember['shiftTiming'] ?></li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <div class="feeStructure">
                              <div class="row">
                                <div class="col-lg-4">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Total</b> <br> <span><i class="fa fa-inr"></i> <?php echo $rowMember['packgeAmount'] ?>/-</span></li>
                                  </ul>
                                </div>
                                <div class="col-lg-4">
                                  <ul class="list-group list-group-flush" >
                                    <li class="list-group-item"><b>Discount</b> <br> <span><i class="fa fa-inr"></i> <?php echo $rowMember['discountAmount'] ?>/-</span></li>
                                  </ul>
                                </div>
                                <div class="col-lg-4">
                                  <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><b>Paid</b> <br> <span style="color: green;"><i class="fa fa-inr"></i> <?php echo $totalAt?>/-</span></li>
                                  </ul>
                                </div>
                              </div>
                            </div>
                           <div class="rightSide">
                              <div class="row">
                              <div class="col-lg-12">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><b>Pending</b> : <span style="color: red;"><i class="fa fa-inr"></i> <?php $pending = $packAmt-$totalAt;
                                    echo $payableAmount = $pending-$discountPaid;
                                  ?>/-</span></li>
                                  <?php
                                  function dateDiffInDays($date1, $date2)
                                  {
                                  $diff = strtotime($date2) - strtotime($date1);
                                  return abs(round($diff / 86400));
                                  }
                                  $date1 = date("Y-m-d");
                                  $date2 = $rowMember["expiryDate"];
                                  $dateDiff = dateDiffInDays($date1, $date2);
                                  ?>
                                  <li class="list-group-item" style="color: red;"> <b>Expiry Date : </b><?php echo $rowMember['expiryDate'] ?> <span style="font-size: 0.9em;">( Membership valid for <?php echo $dateDiff ?> days )</span></li>
                                  <li class="list-group-item"><b>Remarks : </b><?php echo $rowMember['remarksRenew'] ?></li>
                                    <li class="list-group-item"><b>Joining Date : </b><?php echo $rowMember['joiningDate'] ?></li>
                                </ul>
                              </div>
                            </div>
                           </div>
                          </div>
                          <?php
                          }
                          }
                          else{
                            // echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';

?><br>
<div class="row">
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <a href="membership_add.php?id=<?php echo $rowMember['id'] ?>">
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-user-plus"></i> Create Membership</button></a>
  </div>
  <div class="col-lg-4"></div>
</div>
<?php
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-12">
            <?php include_once 'fees_View_Monthly.php' ?>
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