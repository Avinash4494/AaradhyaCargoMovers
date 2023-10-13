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
setTimeout(function(){ window.location.href="all_Members_List.php"; }, 1000);
</script>';
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
      <?php include_once 'rightTopPannel.php' ?>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member List</span> </h5>
              </div>
              <div id="print_setion">
                
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Member List</h4>
                  </div>
                  <div class="col-lg-1">
                    <a href="receipt_reportMember.php">
                      <button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button>
                    </a>
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
                        <th>Image</th>
                        <th>Member Id</th>
                        <th>Name</th>
                        <th>Mobile No.</th>
                        <th>Email</th>
                        <th>D.O.B</th>
                        <th>Joining Date</th>
                        <th>Gender</th>
                        <th>Aadhar No.</th>
                        <th>Martial Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once "db.php";
                      $upload_dir = 'uploads/members-uploads/';
                      $per_page_record = 5;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM add_member  LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      // Display each field of the records.
                      $packAmt=$rowMember['packgeAmount'];
                      $amtPaid=$rowMember['amountPaid'];
                      ?>
                      <tr>
                        
                        <p hidden=""><?php echo $rowMember['id'] ?></p>
                        <td ></td>
                        <td width="60px">
                          <div class="listImage">
                            <img src="<?php echo $upload_dir.$rowMember['image'] ?>" class="img-responsive">
                          </div>
                        </td>
                        <td><b><a style="color: black;" href="member_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['membership_id'] ?></a></b></td>
                        <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
                        <td><?php echo $rowMember['phone'] ?></td>
                        <td><?php echo $rowMember['email'] ?></td>
                        <td><?php echo $rowMember['dob'] ?></td>
                        <td><?php echo $rowMember['receiptDate'] ?></td>
                        <td><?php echo $rowMember['gender'] ?></td>
                        <td><?php echo $rowMember['aadharNo'] ?></td>
                        <td><?php echo $rowMember['martialStatus'] ?></td>
                        <td>
                          <a href="member_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                            <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>
                          </a>
                        </td>
                        <td>
                          <a href="member_Index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                            <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                          </a>
                        </td>
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>