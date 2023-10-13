<div class="widgetShipmentComp" style="padding: 0px;">
  <style>
    .dashWidgetTo .well
    {
      background-color: #f5f5f5;
      padding-top: 
    }
  </style>
          <div class="row">
            <div class="col-lg-3">
              <div class="dashWidgetTo">
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
                    <img src="<?php echo $upload_dire.$rowMember['profile_image'] ?>" class="img-responsive">
                    <?php
                    }
                    ?>
                   
                  </div>
                   <div class="coy_profile">
                     <h5 ><?php echo $rowMember["coy_name"]; ?> </h5>
                   </div>
                   <p style="font-size: 0.8em;text-align: center;">Last updated on <?php echo $rowMember['pic_upDate']; ?> </p>
                </div>
              </div>
            </div>
            <style>
              .basicInfo .actionButtonCreate
              {
                background-color: #1c2833;
              }
            </style>
            <div class="col-lg-9">
              <div class="basicInfo">
                <div class="row">
                  <div class="col-lg-9">
                    <h5><b>Company Information</b></h5>
                  </div>
                  <div class="col-lg-3">
                    <p style="font-size: 0.8em;text-align: right;">Last updated on <?php echo $rowMember['profile_upDate']; ?> </p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <ul class="list-group">
                      <li class="list-group-item"><?php echo $rowMember['coy_name']; ?> </li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-group">
                      <li class="list-group-item">GSTIN : <?php echo $rowMember['coy_gstin']; ?> </li>
                    </ul>
                  </div>
                </div>
                <h5><b>Contact Information</b></h5>
                <div class="row">
                  <div class="col-lg-6">
                    <ul class="list-group">
                      <li class="list-group-item">Email Address : <?php echo $rowMember['coy_email']; ?> </li>
                      <li class="list-group-item">Phone : <?php echo $rowMember['coy_phone']; ?> </li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <ul class="list-group">
                      <li class="list-group-item">Mobile : <?php echo $rowMember['coy_mobile']; ?> </li>
                      <li class="list-group-item">Fax Number : <?php echo $rowMember['coy_fax']; ?> </li>
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
                        <li class="list-group-item">Address Line 1 : <?php echo $rowMember['coy_address_1']; ?> </li>
                        <li class="list-group-item">City : <?php echo $rowMember['coy_city']; ?> </li>
                        <li class="list-group-item">Zipcode / Pincode : <?php echo $rowMember['coy_pin']; ?> </li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-group">
                        <li class="list-group-item">Address Line 2 : <?php echo $rowMember['coy_address_2']; ?> </li>
                        <li class="list-group-item">State : <?php echo $rowMember['coy_state']; ?> </li>
                        <li class="list-group-item">Country : <?php echo $rowMember['coy_country']; ?> </li>
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
                        <li class="list-group-item">Fullname : <?php echo $rowMember['Fullname']; ?> </li>
                        <li class="list-group-item">User Id. : <?php echo $rowMember['user_id']; ?> </li>
                        <li class="list-group-item">Mobiel Number : <?php echo $rowMember['mobile']; ?> </li>
                      </ul>
                    </div>
                    <div class="col-lg-6">
                      <ul class="list-group">
                        <li class="list-group-item">Email Address : <?php echo $rowMember['Email']; ?> </li>
                        <li class="list-group-item">Security Question : <?php echo $rowMember['Question']; ?> </li>
                        <li class="list-group-item">Security Answer : <?php echo $rowMember['Answer']; ?> </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    
    </div>
