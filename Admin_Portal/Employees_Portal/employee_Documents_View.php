<?php
require_once('db.php');
$upload_dir = 'uploads/employees-uploads/';
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from add_employees where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowMember = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
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
              <div class="empty-left-View"></div>
<?php include_once 'employee_left_pannel.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="employees_index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage"> Documents Details </span> </h5>
              </div>
              <div class="row">
                <div class="col-lg-12" >
                  <h4>Documents Details</h4>
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
                        </div><br>
                        <a href="addEmployeeReview.php"><button class="actionButton" type="submit"><i class="fa fa-plus"></i> &nbsp Add Review</button></a>
                      </div>
                      <div class="col-lg-10">
                        <?php
              $upload_dir = '../User_Portal/uploads/emp-doc-upload/';
              $query = 'SELECT * FROM upload_doc where employees_id = "'.$employees_id.'"';
              $rs_result = mysqli_query ($connect, $query);
              if(mysqli_num_rows($rs_result)){
              while ($rowMember = mysqli_fetch_array($rs_result)) {
              
              $employees_id = $rowMember['employees_id'];
              if ($employees_id==$employees_id) {
              ?>
                  <div class="col-lg-3">
                    <div class="widgetsDoc">
                     <h5 style="padding-bottom: 10px;text-align: center;"> <?php echo $rowMember["fullname"]; ?></h5>
                      <div class="well">
                        <img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive">
                      </div>
                      
                    </div>
                  </div>
              <?php
              }}
              }
              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
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