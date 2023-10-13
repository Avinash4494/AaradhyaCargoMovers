<style>
.leftPannel
{
margin-top: 8px;
}
.empty-left-comTop{
  margin-top: -35px;
}
</style>
<div class="empty-left-comTop"></div>
<div class="left-compTop accounts hidden-xs">
  <a href="index.php">
    <button class="actionButtonIcons" type="submit">
    <i class="fa fa-home"></i> &nbsp Home</button>
    <div class="actionBox"></div>
  </a>
  <a href="profile_view.php?id=<?php echo $row['id'] ?>">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-user"></i> &nbsp MyInformation</button>
    <div class="actionBox"></div>
  </a>
  <a href="leaves_historyProfile.php" >
    <button class="actionButtonIcons" type="submit"><i class="fa fa-calendar"></i> &nbsp MyLeaves</button>
    <div class="actionBox"></div>
  </a>
  <a href="office_index.php">
    <button class="actionButtonIcons"><i class="fa fa-building"></i> &nbsp MyOffice 
    </button>
    <div class="actionBox"></div>
  </a>
    <a href="asset_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-desktop"></i> &nbsp MyAsset</button>
    <div class="actionBox"></div>
  </a>
  <a href="bank_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-inr"></i> &nbsp MyBank</button>
    <div class="actionBox"></div>
  </a>
  <a href="travel_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-car"></i> &nbsp MyTravel</button>
    <div class="actionBox"></div>
  </a>
  <a href="col_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-graduation-cap"></i> &nbsp MyCollege</button>
    <div class="actionBox"></div>
  </a>
      <a href="career_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-briefcase"></i> &nbsp MyCareer</button>
    <div class="actionBox"></div>
  </a>
  <a href="doc_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-file-o"></i> &nbsp MyDocuments</button>
    <div class="actionBox"></div>
  </a>
    <a href="certificate_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-certificate"></i> &nbsp MyCertificates</button>
    <div class="actionBox"></div>
  </a>
</div>




<div class="left-compTop accounts hidden-lg">
  <a href="index.php">
    <button class="actionButtonIcons" type="submit">
    <i class="fa fa-home"></i> &nbsp Home</button>
  </a>
  <a href="profile_view.php?id=<?php echo $row['id'] ?>">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-user"></i> &nbsp My Information</button>
  </a>
  <a href="leave_index.php" >
    <button class="actionButtonIcons" type="submit"><i class="fa fa-calendar"></i> &nbsp Leaves</button>
  </a>
  <a href="office_index.php">
    <button class="actionButtonIcons"><i class="fa fa-building"></i> &nbsp My Office Details
    </button>
  </a>
  <a href="bank_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-inr"></i> &nbsp Bank Details</button>
  </a>
  <a href="work_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-briefcase"></i> &nbsp Experience Details</button>
  </a>
  <a href="col_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-graduation-cap"></i> &nbsp College Details</button>
  </a>
  <a href="doc_index.php">
    <button class="actionButtonIcons" type="submit"><i class="fa fa-file-o"></i> &nbsp My Documents</button>
  </a>
</div>


 