<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from admin_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from admin_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="trace_admin.php"; }, 100);
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="trace_index.php" data-toggle="tooltip" title="Finder Portal!" data-placement="top">Finder Portal</a> / <span class="activePage">Admin Search</span></h5>
              </div>
              <div class="Mainheading">
                <div class="row">
                  <div class="col-lg-11 col-xs-10" >
                    <h5><b>Admin Search</b></h5>
                  </div>
                  <div class="buttonTop">
                    <div class="col-lg-1 col-xs-2" >
                      <!-- <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit" data-toggle="tooltip" title="Print" data-placement="top"><i class="fa fa-print"></i></button> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="bodyComponent">
                <form action="trace_admin.php" method="post">
                  <div class="row">
                    <div class="col-lg-2">
                    </div>
                    <div class="col-lg-8">
                      <p>Search by Admin Id</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="word"  name="admin_id"  autocomplete="off" placeholder="Enter Admin ID"  required="">
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
                    
                    <div class="col-lg-12">
                      <?php
                      
                      include('db.php');
                      $upload_dir = '../uploads/courier-uploads/';
                      if(isset($_POST['click'])){
                      $admin_id = $_POST['admin_id'];
                      $q = "SELECT * FROM admin_login where (admin_id = '$admin_id')";
                      $result = mysqli_query($connect, $q) or die(mysqli_error($connect));
                      if(mysqli_num_rows($result)>=1){
                      while($rowMember = mysqli_fetch_assoc($result)){
                      ?>
                      <div class="bodyComponent viewComp">
                        <div class="row">
                          <div class="col-lg-11 col-xs-9">
                            <div class="accountComponent">
                              <h4>Admin Account Details</h4>
                              <div class="profileData">
                                <div class="row">
                                  <p hidden=""><?php echo $rowMember['id'] ?></p>
                                  <div class="col-lg-3">
                                    <?php
                                    $profile_image = $rowMember['profile_image'];
                                    
                                    if ($profile_image=='Null')
                                    {
                                    ?>
                                    <div class="nullImage">
                                      <img src="../image/empWhite.png" class="img-responsive">
                                    </div>
                                    <?php
                                    }
                                    else {
                                    ?>
                                    <div class="fullImage">
                                      <img src="<?php echo $upload_direct.$rowMember['profile_image']; ?>" class="img-responsive">
                                    </div>
                                    <h4 style="text-align: center;padding-top: 5px;letter-spacing: 1.5px;"><?php echo $rowMember['Fullname'] ?></h4>
                                    <?php
                                    }
                                    ?>
                                  </div>
                                  <div class="col-lg-3">
                                    <h6><b>Name : </b><?php echo $rowMember['Fullname'] ?></h6>
                                    <h6><b>Date Of Birth : </b><?php echo $rowMember['dob'] ?></h6>
                                    <h6><b>Gender : </b><?php echo $rowMember['gender'] ?></h6>
                                    <h6><b>Aadhar Number : </b><?php echo $rowMember['aadhar_num'] ?></h6>
                                    <h6><b>Name on Aadhar : </b><?php echo $rowMember['aadhar_name'] ?></h6>
                                    <h6><b>Pan Number : </b><?php echo $rowMember['pan_num'] ?></h6>
                                    <h6><b>Blood Group : </b><?php echo $rowMember['blood_grp'] ?></h6>
                                    <h6><b>Country : </b><?php echo $rowMember['country_birth'] ?></h6>
                                  </div>
                                  <div class="col-lg-4">
                                    <h6><b>Username : </b><?php echo $rowMember['admin_id'] ?></h6>
                                    <h6><b>Alternate Number : </b><?php echo $rowMember['alternate_phone'] ?></h6>
                                    <h6><b>Martial Status : </b><?php echo $rowMember['martial_status'] ?></h6>
                                    <h6><b>Birth Place : </b><?php echo $rowMember['birth_place'] ?></h6>
                                    <h6><b>Nationality : </b><?php echo $rowMember['nationality'] ?></h6>
                                    <h6><b>Mobile Number : </b><?php echo $rowMember['mobile'] ?></h6>
                                    <h6><b>Email : </b><?php echo $rowMember['Email'] ?></h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-1 col-xs-3">
                            <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
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