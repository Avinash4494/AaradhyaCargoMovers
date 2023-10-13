<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from quote where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from quote where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="courier_index.php"; }, 100);
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
  <title>Finder Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftFinder.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Applicants Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Applicants Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <!-- <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="trace_careers.php" method="post">
                  <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                      <p>Search by Applicants Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="word"  name="registration_id"  autocomplete="off" placeholder="Enter Registration ID"  required="">
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </form>
                <br>
                <div id="priint_setion">
                  <div class="row">
                    <div class="col-lg-12">
                      <?php
                      include('db.php');
                      if(isset($_POST['click'])){
                      $registration_id = $_POST['registration_id'];
                      $q = "SELECT * FROM apply_now_careers where (registration_id = '$registration_id')";
                      $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                      if(mysqli_num_rows($result)>=1){
                      while($rowMember = mysqli_fetch_assoc($result)){
                      ?>
              <div class="row">
                <div class="col-lg-12">
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Job ID : </b><?php echo $rowMember['job_id'] ?> </li>
                              <li class="list-group-item"><b>Registration Id : </b><?php echo $rowMember['registration_id'] ?></li>
                              <li class="list-group-item"><b>Career Id : </b><?php echo $rowMember['career_id'] ?></li>
                              <li class="list-group-item"><b>Name : </b><?php echo $rowMember['fname'] ?></li>
                              <li class="list-group-item"><b>Email : </b><?php echo $rowMember['email'] ?></li>
                              <li class="list-group-item"><b>Contact : </b><?php echo $rowMember['contact'] ?></li>
                              
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">  <b>College : </b><?php echo $rowMember['college'] ?></li>
                              <li class="list-group-item"><b>Skills : </b><?php echo $rowMember['skills'] ?></li>
                              <li class="list-group-item">  <b>highest Qualification : </b>
                              <?php echo $rowMember['highestQualification'] ?></li>
                              <li class="list-group-item">  <b>Experienced : </b><?php echo $rowMember['exp'] ?> Yrs</li>
                              <li class="list-group-item"><b>About : </b><?php echo $rowMember['about'] ?></li>
                              <li class="list-group-item"><b>Applied On : </b><?php echo $rowMember['applied_time'] ?></li>
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6">
                  <h5><b>Documents</b></h5>
                </div>
                <div class="col-lg-6">
                  <h5><a href="<?php echo $upload_applicant.$rowMember['image']; ?>" target="blank">
                   
                <b><i class="fa fa-download"></i>&nbsp &nbsp Download Resume</b></a></h5>
                </div>
              </div>
                      <?php
                      }
                      }
                      else{
                      ?>
                      
                      <?php
                      echo "<h1 style='color:red;text-align:center;font-size:1em; font-family: Asap;'>Sorry...No Record Found!!</h1>";?>
                      
                      
                      <?php
                      }
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