<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_member where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from add_member where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="member_Index.php"; }, 1000);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Member Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
             <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / 
                  <a href="member_Index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top">Members Portal</a> / <span class="activePage">Membership Expires</span></h5>
              </div>
              <div id="print_setion">
                 <?php include_once 'member_expiry.php'; ?>
                <h4>Membership expiring in 15 days</h4>

                <div class="row">
                  <div class="col-lg-12">
                    <table class="css-serial table table-hover" width="100%">
                      <style>
                      .css-serial {
                      counter-reset: serial-number;  /* Set the serial number counter to 0 */
                      }
                      .css-serial td:first-child:before {
                      counter-increment: serial-number;  /* Increment the serial number counter */
                      content: counter(serial-number);  /* Display the counter */
                      }
                      </style>
                      <thead >
                        <tr>
                          <th>Sr. No.</th>
                          <th>Member Id</th>
                          <th>Name</th>
                          <th>Mobile No.</th>
                          <th>Email</th>
                          <th>Membership Type</th>
                          <th>Joining Date</th>
                          <th>Expires On</th>
                          <th>Package Amount</th>
                          <th>Renew</th>
                          <th>Remainig Days</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once "db.php";
                        $query = "SELECT * FROM renew_member";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMember = mysqli_fetch_array($rs_result)) {
                        // Display each field of the records.
                         $date1 = date("Y-m-d");
                                  $date2 = $rowMember["expiryDate"];
                                  $diff = strtotime($date2) - strtotime($date1);
                                  $dateDiff = abs(round($diff / 86400));
                                  $flag=15;
                                  if ($dateDiff<=$flag) {
                                    # code...
                                  
                        ?>

                        <tr>
                          
                          <p hidden=""><?php echo $rowMember['id'] ?></p>
                          <td ></td>
                          <td><b><?php echo $rowMember['membership_id'] ?></b></td>
                          <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
                          <td><?php echo $rowMember['phone'] ?></td>
                          <td><?php echo $rowMember['email'] ?></td>
                          <td><?php echo $rowMember['membershipType'] ?></td>
                          <td><?php echo $rowMember['joiningDate'] ?></td>
                          <td><?php echo $rowMember['expiryDate'] ?></td>

                          <td><?php echo $rowMember['packgeAmount'] ?></td>
                          <td>
                          <span style="font-size: 0.9em;color: red;">Remaining <?php echo $dateDiff ?> days</span></td>
                          <td>
                            <a href="member_Renew.php?id=<?php echo $rowMember['id'] ?>"><button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button></a>
                          </td>
                        </tr>
                        <?php
                        }
                        }}
                        else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                        ?>
                      </tbody>
                    </table>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>