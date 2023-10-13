<?php
require_once "db.php";
$per_page_record = 2;
if (isset($_GET["page"])) {
$page  = $_GET["page"];
}
else {
$page=1;
}
$start_from = ($page-1) * $per_page_record;
$query = "SELECT * FROM admin_login  LIMIT $start_from, $per_page_record ";
$rs_result = mysqli_query ($connect, $query);
?>
<?php
if(mysqli_num_rows($rs_result)){
while ($rowMember = mysqli_fetch_array($rs_result)) {
?>
<div class="container-fluid">
  <div class="profileDisplayComponent">
    <div class="well">
      <div class="row">
        <div class="col-lg-2 col-xs-12">
          <div class="squareProfile">
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <?php
                $profile_image = $row['profile_image'];                
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
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="profileData">
            <div class="row">
              <p hidden=""><?php echo $rowMember['id'] ?></p>
              <div class="col-lg-6">
                <h6>Name : <?php echo $rowMember['Fullname'] ?></h6>
                <h6>Mobile Number : <?php echo $rowMember['mobile'] ?></h6>
                <h6>Date Of Birth : <?php echo $rowMember['dob'] ?></h6>
                <h6>Gender : <?php echo $rowMember['gender'] ?></h6>
                <h6>Security Question : <?php echo $rowMember['Question'] ?></h6>
              </div>
              <div class="col-lg-6">
                <h6>Username : <?php echo $rowMember['random_user_id'] ?></h6>
                <h6>Alternate Number : <?php echo $rowMember['alternate_phone'] ?></h6>
                <h6>Email : <?php echo $rowMember['Email'] ?></h6>
                <h6>Permanent Address : <?php echo $rowMember['permanent_address'] ?>,<?php echo $rowMember['permanent_state'] ?>
                <?php echo $rowMember['permanent_pincode'] ?></h6>
                <h6>Present Address : <?php echo $rowMember['present_address'] ?>, <?php echo $rowMember['present_state'] ?>,<?php echo $rowMember['present_pincode'] ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>          <?php
}
}
else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
?>
