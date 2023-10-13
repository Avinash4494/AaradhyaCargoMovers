
<?php
require_once('db.php'); 
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from renew_member where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$packAmt=$rowMember['packgeAmount'];$amtPaid=$rowMember['amountPaid'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Admin Dashboard -  </title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <h4>Fee Payments</h4>
        <table class="css-serial table table-hover" width="100%">
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
                              $per_page_record = 10;
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
            <td><i class="fa fa-inr"></i> <?php echo $rowMember['packgeAmount'] ?>/-</td>
            <td><span style="color: green;"><i class="fa fa-inr"></i> <?php echo $rowMember['amountPaid'] ?>/- </span></td>
            <td><?php echo $rowMember['paymentMode'] ?></td>
            <td><?php echo $rowMember['receiptDate'] ?></td>
             <?php $amountPaid=0;$totalPaid; $totalPaid+=(int)$rowMember['amountPaid'];
            $pendingAmount = (int)$rowMember['packgeAmount'] - (int)$totalPaid;
             
             ?>    
            <td><span style="color: red;"><i class="fa fa-inr"></i> <?php echo $pendingAmount ?>/-</span></td>         
            <td><?php echo $rowMember['remarks'] ?></td>
            <td><a href="receipt_Member_fee.php?id=<?php echo $rowMember['id'] ?>" ><button class="actionButtonIcons-center" type="submit"><i class="fa fa-file-text-o"></i></button></a></td>
          </tr>
          <?php
                            }}
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
          </tbody>
          
        </table>
        <!-- <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                  <a href="profile_History_Receipt.php?id=<?php echo $rowMember['id'] ?>" >
                      <button class="actionButton" type="submit">View All</button>
                    </a>
                </div>
                <div class="col-lg-4"></div>
              </div> -->
  </body>
  </html>
