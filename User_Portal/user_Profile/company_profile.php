<?php
include_once '../db.php';
include_once "../session.php";
$upload_dir = 'uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Company Profile</span></h5>
              </div>
              <div class="createWidget" style="margin-top:-30px;">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-2">
                      <a href="company_profile.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-building"></i> Company Profile</button></a>
                    </div>
                    <div class="col-lg-2">
                      <a href="change_pwd.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-unlock-alt"></i> Change Password</button></a>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-2">
                      <a href="../user_AppStore/raise_shipment.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Shipment</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <style>
              .widgetShipmentComp .well
              {
              padding: 20px;
              }
              .widgetShipmentComp .well h4
              {
              margin: 0px;
              padding-bottom: 10px;
              }

              </style>
              <div class="widgetShipmentComp">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="dashWidgetTop">
                        <div class="well">
                          <div class="coy_profile_logo">
                            <?php
                            if ($profile_image=='')
                            {
                            ?>
                            <img src="../image/emp.png" class="img-responsive">
                            <?php
                            }
                            else {
                            ?>
                            <img src="<?php echo $upload_dir.$row['profile_image'] ?>" class="img-responsive">
                            <?php
                            }
                            ?>
                            <h5 style="text-align: center;"><?php echo $row["coy_name"]; ?> </h5>
                          </div>
                          <p style="font-size: 0.8em;text-align: center;">Last updated on <?php echo $row['pic_upDate']; ?> </p>
                          <a href="update_photo.php?id=<?php echo $row['id'] ?>"> <button class="actionButtonCreate" >Update Logo</button></a>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="row">
                        <div class="col-lg-11">
                          <h4>Basic Information</h4>
                        </div>
                        <div class="col-lg-1">
                          <a href="update_profile.php?id=<?php echo $row['id'] ?>"> <button class="actionButtonCreate" ><i class="fa fa-pencil"></i></button></a>
                        </div>
                      </div>
                      <div class="basicInfo">
                        <div class="row">
                          <div class="col-lg-9">
                            <h5><b>Company Information</b></h5>
                          </div>
                          <div class="col-lg-3">
                            <p style="font-size: 0.8em;text-align: right;">Last updated on <?php echo $row['profile_upDate']; ?> </p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group">
                              <li class="list-group-item"><?php echo $row['coy_name']; ?> </li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group">
                              <li class="list-group-item"><?php echo $row['coy_gstin']; ?> </li>
                            </ul>
                          </div>
                        </div>
                        <h5><b>Contact Information</b></h5>
                        <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group">
                              <li class="list-group-item">Email Address : <?php echo $row['coy_email']; ?> </li>
                              <li class="list-group-item">Phone : <?php echo $row['coy_phone']; ?> </li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group">
                              <li class="list-group-item">Mobile : <?php echo $row['coy_mobile']; ?> </li>
                              <li class="list-group-item">Fax Number : <?php echo $row['coy_fax']; ?> </li>
                            </ul>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-11">
                            <h5><b>Address Information</b></h5>
                          </div>
                          <div class="col-lg-1">
                            <button data-toggle="collapse" data-target="#addressInfo" class="actionButtonCreate" style="margin-top: 5px;"><i class="fa fa-angle-down"></i></button>
                          </div>
                        </div>
                        <div id="addressInfo" class="collapse">
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group">
                                <li class="list-group-item">Address Line 1 : <?php echo $row['coy_address_1']; ?> </li>
                                <li class="list-group-item">City : <?php echo $row['coy_city']; ?> </li>
                                <li class="list-group-item">Zipcode / Pincode : <?php echo $row['coy_pin']; ?> </li>
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group">
                                <li class="list-group-item">Address Line 2 : <?php echo $row['coy_address_2']; ?> </li>
                                <li class="list-group-item">State : <?php echo $row['coy_state']; ?> </li>
                                <li class="list-group-item">Country : <?php echo $row['coy_country']; ?> </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-lg-11">
                            <h5><b>Your Information</b></h5>
                          </div>
                          <div class="col-lg-1">
                            <button data-toggle="collapse" data-target="#yourInfo" class="actionButtonCreate" style="margin-top: 5px;"><i class="fa fa-angle-down"></i></button>
                          </div>
                        </div>
                        <div id="yourInfo" class="collapse">
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group">
                                <li class="list-group-item">Fullname : <?php echo $row['Fullname']; ?> </li>
                                <li class="list-group-item">User Id. : <?php echo $row['user_id']; ?> </li>
                                <li class="list-group-item">Mobiel Number : <?php echo $row['mobile']; ?> </li>
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group">
                                <li class="list-group-item">Email Address : <?php echo $row['Email']; ?> </li>
                                <li class="list-group-item">Security Question : <?php echo $row['Question']; ?> </li>
                                <li class="list-group-item">Security Answer : <?php echo $row['Answer']; ?> </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-11">
                            <h5><b>Bank Information</b></h5>
                          </div>
                          <div class="col-lg-1">
                            <button data-toggle="collapse" data-target="#bankInfo" class="actionButtonCreate" style="margin-top: 5px;"><i class="fa fa-angle-down"></i></button>
                          </div>
                        </div>
                        <div id="bankInfo" class="collapse">
                          <div class="row">
                            <div class="col-lg-6">
                              <ul class="list-group">
                                <li class="list-group-item">Account Number : <?php echo $row['bankAccNum']; ?> </li>
                                <li class="list-group-item">Account Type : <?php echo $row['bankBenAccType']; ?> </li>
                                <li class="list-group-item">Beneficiary Name : <?php echo $row['bankBenName']; ?> </li>
                                
                                
                              </ul>
                            </div>
                            <div class="col-lg-6">
                              <ul class="list-group">
                               <li class="list-group-item">IFSC Code : <?php echo $row['bankIfsc']; ?> </li>
                                <li class="list-group-item">Branch Name : <?php echo $row['bankBranch']; ?> </li>
                                <li class="list-group-item">Bank Name : <?php echo $row['bankName']; ?> </li>
                              </ul>
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
</body>
</html>