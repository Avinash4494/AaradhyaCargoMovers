<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3">
      <div class="profileDisplayComponent">
        <div class="well">
          <div class="squareProfile accountInfo">
            <div class="row">
              <div class="col-lg-12 col-xs-12 ">
                <?php
                $profile_image = $row['profile_image'];
                
                if ($profile_image=='Null')
                {
                ?>
                <div class="nullImage">
                  <img src="../image/empWhite.png" class="img-responsive">
                </div>
                <a href="update_photo.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                  <button class="actionButtonIcons-center"><i class="fa fa-pencil-square-o"></i> &nbsp Change Photo
                  </button>
                </a>
                <?php
                }
                else {
                ?>
                <div class="fullImage">
                  <img src="<?php echo $upload_direct.$row['profile_image']; ?>" class="img-responsive">
                </div>
                <h4 style="text-align: center;padding-top: 5px;letter-spacing: 1.5px;"><?php echo $row['Fullname'] ?></h4>
                <a href="update_photo.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                  <button class="actionButtonIcons-center"><i class="fa fa-pencil-square-o"></i> &nbsp Change Photo
                  </button>
                </a>
                <?php
                }
                ?>
              </div>
            </div>
          </div>
          <div class="buttonDirect" style="margin-bottom: 15px;">
            <a href="addProfile.php?id=<?php echo $row['id'] ?>" >
              <button class="actionButtonProfile-center">Update profile
              &nbsp <i class="fa fa-pencil"></i>
              </button>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9">
      <div class="profileDisplayComponent">
        <div class="well">
        
          <div class="row">
                        <div class="col-lg-6">
                            <h5>My Information</h5>
                        </div>
                        <div class="col-lg-6">
                          <h6 style="float: right;">Your Information was last updated on : <?php echo $row['profile_upDate'] ?></h6>
                        </div>
                      </div>
          <?php
          $dob = $row['dob'];
          $gender = $row['gender'];
          $alternate_phone = $row['alternate_phone'];
          $pan_num = $row['pan_num'];
          $aadhar_num = $row['aadhar_num'];
          $aadhar_name = $row['aadhar_name'];
          $aadhar_dob = $row['aadhar_dob'];
          $country_birth = $row['country_birth'];
          $blood_grp = $row['blood_grp'];
          $birth_place = $row['birth_place'];
          $martial_status = $row['martial_status'];
          
          if ($dob==''||$gender==''||$alternate_phone==''||$pan_num==''||$aadhar_num==''||$aadhar_name==''||$aadhar_dob==''||$country_birth==''||$blood_grp==''||$birth_place==''||$martial_status=='')
          {
          ?>
          <div class="row">
            <div class="col-lg-10">
              <div class="nullAddress" style="text-align:
                center">
                <p>Personal details are not yet updated. Please click on "Edit" to Update </p>
              </div>
            </div>
            <div class="col-lg-2">
              <a href="addProfile.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                <button class="actionButtonProfile-center">Edit &nbsp
                <i class="fa fa-pencil"></i>
                </button>
              </a>
            </div>
          </div>
          
          <?php
          }
          else {
          ?>
          <div class="profileData">
            <div class="row">
              <p hidden=""><?php echo $row['id'] ?></p>
              <div class="col-lg-5">
                <h6><b>Name : </b><?php echo $row['Fullname'] ?></h6>
                
                <h6><b>Date Of Birth : </b><?php echo $row['dob'] ?></h6>
                <h6><b>Gender : </b><?php echo $row['gender'] ?></h6>
                <h6><b>Aadhar Number :</b> <span id="aadharNum"></span></h6>
                <script>
                  function  aadharSplit()
                  {
                    var str = "<?php echo $row['aadhar_num'] ?>";
var results = str.match(/\d{4}/g);
var final_cc_str = results.join(" ");
document.getElementById('aadharNum').innerHTML= final_cc_str;
                  }
                </script>
                <h6><b>Name on Aadhar : </b><?php echo $row['aadhar_name'] ?></h6>
                <h6><b>Pan Number : </b><?php echo $row['pan_num'] ?></h6>
                <h6><b>Blood Group : </b><?php echo $row['blood_grp'] ?></h6>
                <h6><b>Country : </b><?php echo $row['country_birth'] ?></h6>
              </div>
              <div class="col-lg-5">
                <h6><b>Employee Id : </b><?php echo $row['employees_id'] ?></h6>
                <h6><b>Alternate Number : </b>+91 <?php echo $row['alternate_phone'] ?></h6>
                <h6><b>Martial Status : </b><?php echo $row['martial_status'] ?></h6>
                <h6><b>Birth Place : </b><?php echo $row['birth_place'] ?></h6>
                <h6><b>Nationality : </b><?php echo $row['nationality'] ?></h6>
                <h6><b>Mobile Number : </b>+91 <?php echo $row['mobile'] ?>&nbsp &nbsp &nbsp
                <span>
                  <a href="update_contact.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Contact" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Email : </b><?php echo $row['Email'] ?>&nbsp &nbsp &nbsp
                <span>
                  <a href="update_email.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Email" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Reset Password</b>&nbsp &nbsp &nbsp
                <span><a href="Forgot Password.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Password" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                </h6>
              </div>
              <div class="col-lg-2">
                <a href="addProfile.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                  <button class="actionButtonProfile-center">Edit &nbsp
                  <i class="fa fa-pencil"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="profileDisplayComponent">
        <div class="well">
          <div class="row">
                        <div class="col-lg-5">
                            <h5>My Address</h5>
                        </div>
                        <div class="col-lg-7">
                          <h6 style="float: right;">Your Address was last updated on : <?php echo $row['address_upDate'] ?></h6>
                        </div>
                         
                      </div>
          <div class="profileDataAddress">
            <div class="row">
              <div class="col-lg-5">
                <h4>Communication Address</h4>
              </div>
              <div class="col-lg-5">
                <h4>Permanent Address</h4>
              </div>
              <div class="col-lg-2">
                <span>
                  <a href="update_address.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Address" class="red-tooltip" data-placement="top"><button class="actionButtonProfile-center">
                    Edit &nbsp <i class="fa fa-pencil"></i>
                  </button></a>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <?php
                $present_address = $row['present_address'];
                
                if ($present_address=='')
                {
                ?>
                <div class="nullAddress" style="text-align:
                  center">
                  <p>Address details are not yet updated. Please click on "Edit" to Update </p>
                </div>
                <?php
                }
                else {
                ?>
                <style>
                  .fullAddress h6
                  {
                    line-height: 20px;
                  }
                </style>
                <div class="fullAddress">
                  <div class="row">
                    <div class="col-lg-5">
                      <h6><?php echo $row['present_address'] ?>,<br> <?php echo $row['present_state'] ?>, <br><?php echo $row['present_pincode'] ?><br></h6>
                    </div>
                    <div class="col-lg-5">
                      <h6><?php echo $row['permanent_address'] ?>,<br> <?php echo $row['permanent_state'] ?>, <br> <?php echo $row['permanent_pincode'] ?></h6>
                    </div>
                  </div>
                </div>
                <?php
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