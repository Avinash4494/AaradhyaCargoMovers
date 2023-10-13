<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from user_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from user_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="member_Index.php"; }, 1000);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Member Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Members Portal</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="row">
                  
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  user_login ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-4 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well" style="padding-bottom: 10px;">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Total Members</p>
                          <a href="all_Members_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Members Report</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <style>
                    .membershipExpiry .widgetsExpires{margin-top: -6px;}
                  </style>
                  <div class="col-lg-8">
                    <div class="membershipExpiry">
                      <?php include_once 'member_expiry.php'; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
                        <th>User Id</th>
                        <th>Name</th>
                        <th>GSTIN.</th>
                        <th>Contact</th>
                        <th>Coy. Name</th>
                        <th>Coy, Address</th>
                      </tr>
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
                      $query = "SELECT * FROM user_login  LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                      <tr>
                        
                        <p hidden=""><?php echo $rowMember['id'] ?></p>
                        <td ></td>
                        
                        <td><b><a style="color: black;" href="member_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['user_id'] ?></a></b></td>
                        <td><?php echo $rowMember['Fullname'] ?></td>
                        <td><?php echo $rowMember['coy_gstin'] ?></td>
                        <td><?php echo $rowMember['coy_phone'] ?></td>
                        <td><?php echo $rowMember['coy_name'] ?></td>
                        <td><?php echo $rowMember['coy_address_1'] ?>,
                          <?php echo $rowMember['coy_address_2'] ?>,<?php echo $rowMember['coy_city'] ?>,<?php echo $rowMember['coy_state'] ?>,<?php echo $rowMember['coy_pin'] ?></td>

                      </tr>
                      <?php
                      }
                      }
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