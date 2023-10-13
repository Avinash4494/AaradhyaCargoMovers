<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from create_job where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from create_job where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="trace_job.php"; }, 100);
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Job Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Job Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <!-- <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="trace_job.php" method="post">
                  <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                      <p>Search by Job Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="word"  name="job_id"  autocomplete="off" placeholder="Enter Job ID"  required="">
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
                      $job_id = $_POST['job_id'];
                      $q = "SELECT * FROM create_job where (job_id = '$job_id')";
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
                                      <li class="list-group-item"><b>Skills : </b><?php echo $rowMember['skills'] ?></li>
                                      <li class="list-group-item"><b>Location : </b><?php echo $rowMember['job_location'] ?></li>
                                      <li class="list-group-item"><b>Shif Timing : </b><?php echo $rowMember['timings'] ?></li>
                                      <li class="list-group-item"><b>Published On : </b><?php echo $rowMember['starts_on'] ?> Yrs</li>
                                      <li class="list-group-item"><b>Last Date : </b><?php echo $rowMember['ends_on'] ?></li>
                                      <li class="list-group-item"><b>Total Post : </b><?php echo $rowMember['total_post'] ?></li>
                                      <li class="list-group-item">  <b>Salary : </b><?php echo $rowMember['salary'] ?></li>
                                      
                                    </ul>
                                  </div>
                                  <div class="col-lg-6">
                                    <ul class="list-group list-group-flush">
                                      <li class="list-group-item">  <b>Degree : </b><?php echo $rowMember['education'] ?></li>
                                      <li class="list-group-item">  <b>Experienced : </b><?php echo $rowMember['experience'] ?> Yrs</li>
                                      <li class="list-group-item"><b>Note : </b><?php echo $rowMember['speical_info'] ?></li>
                                      <li class="list-group-item"><b>Requirments : </b><?php echo $rowMember['requirments'] ?></li>
                                      
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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