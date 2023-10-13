
<?php
require_once('db.php');
$upload_dir = 'uploads/'; 
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$packAmt=$rowMember['packgeAmount'];$amtPaid=$rowMember['amountPaid'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
  include('db.php');
  $upload_dir = 'uploads/';

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
  <title></title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <a href="../AdminDashboard.php">Dashboard</a>
    <div id="print_setion">
    <h3>Member Profile</h3>
    <div class="row">
      <div class="col-lg-12">

              
              
              <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
              Member Id : <?php echo $rowMember['id'] ?>
              Name : <?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?>
              Membership Id<?php echo $rowMember['membership_id'] ?>
              Email<?php echo $rowMember['email'] ?>
              Mobile Number<?php echo $rowMember['phone'] ?>
              Alternate Number<?php echo $rowMember['alternate_phone'] ?>
              Gender<?php echo $rowMember['gender'] ?>
              Age<?php echo $rowMember['age'] ?> Yrs
              Date of Birth<?php echo $rowMember['dob'] ?>
              Joining Date<?php echo $rowMember['joiningDate'] ?>
              Membership Expiry Date<?php echo $rowMember['expiryDate'] ?>
              Package Type<?php echo $rowMember['membershipType'] ?>
              Martial Status<?php echo $rowMember['martialStatus'] ?>
              Shift Timing<?php echo $rowMember['shiftTiming'] ?>
              Aadhar Number<?php echo $rowMember['aadharNo'] ?>
              Address <?php echo $rowMember['present_address'] ?>,<?php echo $rowMember['state'] ?>,<?php echo $rowMember['present_pincode'] ?>
              <?php echo $rowMember['discountAmount'] ?>.00 Rs
              Medical History<?php echo $rowMember['medicalHistory'] ?>
              Remarks<?php echo $rowMember['remarks'] ?>
              Total <?php echo $rowMember['packgeAmount'] ?>.00 Rs
              Paid <?php echo $rowMember['amountPaid'] ?>.00 Rs
              Pending <?php echo $pending = $packAmt-$amtPaid;?>.00 Rs
   
 
          </div>
        </div>
        <h3>Renewal Membership</h3>
        <table class="css-serial">
          <style type="text/css">
                      .css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}
          </style>
          <thead>
            <th>Sr. No.</th>
          <th>Name</th>
          <th>Membership Id</th>
          <th>Joining Date</th>
          <th>Expiry Date</th>
          <th>Package Type</th>
          <th>Shift Timing</th>
          <th>Package Amount</th>
          <th>Paid Amount</th>
          <th>Discount</th>
          <th>Remarks</th>
          </thead>
          <tbody>
            <?php
                              require_once "db.php";
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $membership_id = $rowMember['membership_id'];
                              $query = "SELECT * FROM renew_member LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              // Display each field of the records.
                                if ($membership_id==$rowMember['membership_id']) {
                                  # code...
                                

                              ?>
            <tr>
            <td></td>
            <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
            <td><?php echo $rowMember['membership_id'] ?></td>
            <td><?php echo $rowMember['joiningDate'] ?></td>
            <td><?php echo $rowMember['expiryDate'] ?></td>
            <td><?php echo $rowMember['membershipType'] ?></td>
            <td><?php echo $rowMember['shiftTiming'] ?></td>
            <td><?php echo $rowMember['packgeAmount'] ?>.00 Rs</td>
            <td><?php echo $rowMember['amountPaid'] ?>.00 Rs</td>
            <td><?php echo $rowMember['discountAmount'] ?>.00 Rs</td>            
            <td><?php echo $rowMember['remarks'] ?></td>

          </tr>
          <?php
                            }}
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
          </tbody>
          
        </table>

         <h3>Fee Payments</h3>
        <table class="css-serial">
          <style type="text/css">
                      .css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}
          </style>
          <thead>
            <th>Sr. No.</th>
          <th>Order Id</th>
          <th>Trans. Id</th>
          <th>Membership Id</th>
          <th>Name</th>
          <th>Month</th>
          <th>Package Amount</th>
          <th>Amount Paid</th>
          <th>Payment Mode</th>
          <th>Paid On</th>
          <th>Pending</th>
          <th>Remarks</th>
          <th>Action</th>
          </thead>
          <tbody>
            <?php
                              require_once "db.php";
                              $per_page_record = 5;
                              error_reporting(0);
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                    
                              $query = "SELECT * FROM fees_member LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              // Display each field of the records.
                               if ($membership_id==$rowMember['membership_id']) {
                                

                              ?>
            <tr>
            <td></td>
            <td><?php echo $rowMember['order_id'] ?></td>
            <td><?php echo $rowMember['fees_id'] ?></td>
             <td><?php echo $rowMember['membership_id'] ?></td>
            <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>           
            <td><?php echo $rowMember['feesMonthly'] ?></td>
            <td><?php echo $rowMember['packgeAmount'] ?>.00 Rs</td>
            <td><?php echo $rowMember['amountPaid'] ?>.00 Rs</td>
            <td><?php echo $rowMember['paymentMode'] ?></td>
            <td><?php echo $rowMember['receiptDate'] ?></td>
             <?php $amountPaid=0;$totalPaid; $totalPaid+=(int)$rowMember['amountPaid'];
            $pendingAmount = (int)$rowMember['packgeAmount'] - (int)$totalPaid;
             
             ?>    
            <td><?php echo $pendingAmount ?>.00 Rs </td>         
            <td><?php echo $rowMember['remarks'] ?></td>
          </tr>
          <?php
                            }}
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
          </tbody>
          
        </table>
        </div> 
        <button class="btn btn-info btn-block" onclick="printDivSection('print_setion')" class="" type="submit">Print</button>
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