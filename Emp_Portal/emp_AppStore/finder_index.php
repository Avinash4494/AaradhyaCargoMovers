<?php
include('../db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from employee_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
}
}
?><?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>myRequest</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <div class="mainHeadDesc">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-3">
                      <img src="../image/search.png" alt="" style="margin-top: 5px;" class="img-responsive">
                    </div>
                    <div class="col-lg-9">
                      <h4>My Finder</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">My Finder</span></h5>              </div>
              <div class="bodyComponent">
                <div class="profileDisplayComponent">
                  <div class="well">
 <div class="searchBar">
  <h5>Search by Employee ID</h5><br>
                        <form action="" method="post">
                          <div class="row">
                            <div class="col-lg-10">
                              <div class="form-group">
                                <input type="text" class="form-control" style="margin-left: 30px;" id="word"  name="employees_id"  autocomplete="off" placeholder="Enter Employees ID"  required>
                              </div>
                            </div>
                             
                            <div class="col-lg-2">
                              <button style="margin-top:0px;padding: 10px;"  type="submit" class="actionButtonProfile-center" name="click"><i class="fa fa-search"></i></button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
                                          <div class="row">
                            <div class="col-lg-12">
                              <?php
                              
                              include('../db.php');
                              if(isset($_POST['click'])){
                              $dock_num = $_POST['employees_id'];
                              $q = "SELECT * FROM employee_login where (employees_id = '$dock_num')";
                              $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                              if(mysqli_num_rows($result)>=1){
                              while($rowSearch = mysqli_fetch_assoc($result)){
                                 $flag = $rowSearch['employees_id'];
                                if ($dock_num==$flag) {
                                                                     # code...
                                
                              ?>
                              <div class="profileDisplayComponent" style="margin-top: 20px;">
                                <div class="well">
                                  <div id="ConvDetails" style="color: #1c2833;">
                          <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush" >
                               <li class="list-group-item"><b>Employee Id : </b><?php echo $rowSearch['employees_id'] ?></li>
                              <li class="list-group-item"><b>Name : </b><?php echo $rowSearch['Fullname'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowSearch['Email'] ?></li>
                              
                              
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Mobile Number : </b><?php echo $rowSearch['mobile'] ?></li>
                             
                              <li class="list-group-item"><b>Joining Date : </b><?php echo $rowSearch['joiningDate'] ?></li>
                              <li class="list-group-item"><b>Country : </b><?php echo $rowSearch['country_birth'] ?></li>
                               
                            </ul>
                          </div>
                        </div>
                                  </div>
                                </div>
                              </div>
                              <?php
                              }
                              else if($dock_num != $flag){
                                echo "No Data Found";
                                ?>
                                <h5>No Record Found</h5>
                                <?php
                              }
                            }
                              }
                              }
                              ?>
                              
                            </div>
                          </div>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3">
            <div class="aboutPannel">
              <div class="well">
                <h4>About this App</h4>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation.</p>
              </div>
            </div>
            <div class="otherPannel">
              <a href="raise_feedback.php">
                <div class="well">
                  <h4>Share Feedback</h4>
                </div>
              </a>
            </div>
            <div class="otherPannel">
              <a href="helpDesk.php">
                <div class="well">
                  <h4>Help Desk</h4>
                </div>
              </a>
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