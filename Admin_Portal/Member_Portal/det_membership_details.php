<div class="widgetShipmentComp" style="padding: 0px;">
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
      </div>
    </div>
  </div>
</div>
</div>