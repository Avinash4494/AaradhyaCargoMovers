<div class="container-fluid">
  <div class="profileDisplayComponent">
    <div class="well">
      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <div class="squareProfile">
            <div class="row">
              <div class="col-lg-12 col-xs-4 ">
                <?php
                $profile_image = $row['profile_image'];
                
                if ($profile_image=='Null')
                {
                ?>
                <div class="nullImage">
                  <img src="../../image/empWhite.png" class="img-responsive">
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
                <?php
                }
                ?>
                <style>
                .personalData .nullImage
                {
                padding-bottom: 22px;
                text-align: center;
                }
                .personalData .nullImage img{
                margin-left: 30px;
                height: 150px;
                width: 150px;
                }
                .personalData .fullImage img{
                margin-left: 10px;
                height: 180px;
                border-radius: 50%;
                width: 180px;
                }
                </style>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="profileData">
            <div class="row hidden-lg">
              <div class="col-lg-6 col-xs-6">
                <a href="editProfile.php">
                  <button class="actionButtonIcons">Update profile
                  <i class="fa fa-pencil"></i>
                  </button>
                </a>
              </div>
              <div class="col-lg-6 col-xs-6">
                <a href="create.php">
                  <button class="actionButtonIcons">Create profile
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
                  <a href="update_contact.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Contact" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Date Of Birth : </b><?php echo $row['dob'] ?></h6>
                <h6><b>Gender : </b><?php echo $row['gender'] ?></h6>
                <br>
                <h6><b>Present Address</b></h6>
                <h6><?php echo $row['present_address'] ?>, <?php echo $row['present_state'] ?>,<?php echo $row['present_pincode'] ?></h6>
              </div>
              <div class="col-lg-6">
                <h6><b>Username : </b><?php echo $row['employees_id'] ?></h6>
                <h6><b>Alternate Number : </b><?php echo $row['alternate_phone'] ?></h6>
                <h6><b>Email : </b><?php echo $row['Email'] ?>&nbsp &nbsp &nbsp
                <span>
                  <a href="update_email.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Email" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a>
                </span>
                </h6>
                <h6><b>Reset Password</b>&nbsp &nbsp &nbsp
                <span><a href="Forgot Password.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Password" class="red-tooltip" data-placement="top"><i class="fa fa-pencil"></i></a></span>
                </h6><br>
                <h6><b>Permanent Address</b></h6>
                <h6><?php echo $row['permanent_address'] ?>,<?php echo $row['permanent_state'] ?><?php echo $row['permanent_pincode'] ?></h6>
                
              </div>
            </div>
            
          </div>
          <div class="row hidden-xs">
            <style>
              .buttonDirect
              {
                padding-top: 20px;
              }
            </style>
            <div class="col-lg-4">
             <div class="buttonDirect">
                <a href="editProfile.php?id=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                <button class="actionButtonIcons-center">Update profile
                &nbsp <i class="fa fa-pencil"></i>
                </button>
              </a>
             </div>
            </div>
            <div class="col-lg-8"></div>
          </div><br>
        </div>
      </div>
    </div>
  </div>
</div>