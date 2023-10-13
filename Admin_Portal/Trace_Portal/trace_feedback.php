<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from adduser_feedback where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from adduser_feedback where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="trace_index.php"; }, 100);
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Feedback Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Feedback Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="trace_feedback.php" method="post">
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                      <p>Search by Feedback Id.</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <input type="text" class="form-control" id="word"  name="feedback_id"  autocomplete="off" placeholder="Enter Feedback ID"  required>
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <button style="text-align: center;" type="submit" class="actionButtonIcons" name="click"><i class="fa fa-search"></i>&nbsp &nbsp Search</button>
                    </div>
                    <div class="col-lg-2"></div>
                  </div>
                </form>
                <br>
                <div id="print_setion">
                  <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                      <?php
                      include('db.php');
                      if(isset($_POST['click'])){
                      $feedback_id = $_POST['feedback_id'];
                      $q = "SELECT * FROM adduser_feedback where (feedback_id = '$feedback_id')";
                      $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                      if(mysqli_num_rows($result)>=1){
                      while($rowMember = mysqli_fetch_assoc($result)){
                      ?>
                      
                      <div class="rectLongContent" style="margin-top: -30px;margin-bottom: 35px;">
                        <div class="rectWidge" >
                          
                          <h5 style="text-align: center;font-weight: bold;">Feedback Id : <?php echo $rowMember['feedback_id'] ?></h5>
                          <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                            
                            <div class="row">
                              <div class="col-xs-12">
                              <h5><b>Name</b> - <?php echo $rowMember['fname'] ?></h5>
                              <h5><b>Email</b> - <?php echo $rowMember['email'] ?></h5>
                              <h5><b>Contact </b> - <?php echo round($rowMember['phone']) ?></h5>
                              <h5><b>Posted On</b> - <?php echo $rowMember['feedback_Date'] ?></h5>
                              <h5 ><b>Message</b> - <?php echo $rowMember['message'] ?></h5>
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
                    <div class="col-lg-3"></div>
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