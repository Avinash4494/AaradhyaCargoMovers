<?php
require_once('db.php');
$upload_dir = 'uploads/employees-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from apply_leave where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
$employees_id = $rowMember['employees_id'];
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
  <head>
  </head>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Food Claim Summary </span> </h5>
              </div>
              
              <div class="bodyComponent">
                <div id="print_setion">
                  <div class="row">
                    <div class="col-lg-9">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#foodClaims">Food Claims </a></li>
                        <li><a data-toggle="tab" href="#foodPending">Pending</a></li>
                        <li><a data-toggle="tab" href="#foodApproved">Approved</a></li>
                        <li><a data-toggle="tab" href="#foodRejected">Rejected</a></li>
                      </ul>
                    </div>
                    <div class="col-lg-3">
                      <div class="searchBar">
                        <form action="" method="post">
                          <div class="row">
                            <div class="col-lg-8">
                              <div class="form-group">
                                <input type="text" class="form-control" style="margin-left: 30px;" id="word"  name="request_id"  autocomplete="off" placeholder="Enter Request ID"  required>
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <button style="text-align: center;padding: 10px;border-radius: 0px;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <style>
                  .searchBar input
                  {
                  border-radius: 0px;
                  border:1px solid #1c2833;
                  }
                   .css-serial {
                              
                            margin-top: -25px; 
                            }
                  </style>
                  



                  
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