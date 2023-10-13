<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from admin_info where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$rowAllStud = mysqli_fetch_assoc($result);
$sql = "delete from admin_info where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="Courier_Portal/deleteSuccess.php"; }, 1000);
</script>';
}
}
}
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-11">
      <h4>Personal Details</h4>
    </div>
    <div class="col-lg-1">
      <!-- <a href="editProfile.php"><button class="universalButton">Edit</button></a> -->
    </div>
  </div>
  <div class="accountDisplayComponent">
    <div class="well">
      <div class="row">
        <div class="col-lg-2 col-xs-12">
          <div class="squareProfile">
           <div class="row">
             <div class="col-xs-4"></div>
             <div class="col-lg-12 col-xs-4 ">
                <img src="<?php echo $upload_dir.$row['image'] ?>" class="img-responsive">
             </div>
             <div class="col-xs-2"></div>
           </div>
          
          </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-8">
          <div class="profileData">
            <div class="row hidden-lg">
            <div class="col-lg-6 col-xs-6">
              <a href="editProfile.php">
                <button class="universalButton">Update profile
                <i class="fa fa-pencil"></i>
                </button>
              </a>
            </div>
            <div class="col-lg-6 col-xs-6">
              <a href="create.php">
                <button class="universalButton">Create profile
                <i class="fa fa-user-plus"></i>
                </button>
              </a>
            </div>
          </div>
            <div class="row">
              <p hidden=""><?php echo $row['id'] ?></p>
              <div class="col-lg-6">
                <h6><b>Name : </b><?php echo $row['Fullname'] ?></h6>
                <h6><b>Mobile Number : </b><?php echo $row['mobile'] ?>&nbsp &nbsp &nbsp
                <span>
                  <a href="update_contact.php" data-toggle="tooltip" title="Update Contact" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Alternate Number : </b><?php echo $row['alternate_phone'] ?></h6>
                <h6><b>Date Of Birth : </b><?php echo $row['dob'] ?></h6>
                <h6><b>Username : </b><?php echo $row['USN'] ?></h6>
                <h6><b>Email : </b><?php echo $row['Email'] ?>&nbsp &nbsp &nbsp
                <span>
                  <a href="update_email.php" data-toggle="tooltip" title="Update Email" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Gender : </b><?php echo $row['gender'] ?></h6>
              </div>
              <div class="col-lg-6">
                <h6><b>Present Address</b></h6>
                <h6><?php echo $row['present_address'] ?>, <?php echo $row['present_state'] ?>,<?php echo $row['present_pincode'] ?></h6>
                <h6><b>Permanent Address</b></h6>
                <h6><?php echo $row['permanent_address'] ?>,<?php echo $row['permanent_state'] ?><?php echo $row['permanent_pincode'] ?></h6>
                <h6><b>Reset Password</b>&nbsp &nbsp &nbsp
                  <span><a href="Forgot Password.php" data-toggle="tooltip" title="Reset Password" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                </h6>
              </div>
            </div>
            
          </div>
          <div class="row hidden-xs">
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
              <a href="editProfile.php">
                <button class="universalButton">Update profile
                <i class="fa fa-pencil"></i>
                </button>
              </a>
            </div>
          </div><br>
        </div>
      </div>
    </div>
  </div>
</div>