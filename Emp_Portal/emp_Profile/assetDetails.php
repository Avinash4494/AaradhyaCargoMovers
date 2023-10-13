<div class="row">
  <div class="col-lg-12">
    <div class="row">
      <div class="col-lg-6">
        <h4>My Tagged Asset </h4>
      </div>
      <div class="col-lg-6">
      </div>
    </div>
    <div class="personalData">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Asset Name :</b> <?php echo $row['asset_name'] ?></li>
                <li class="list-group-item"><b>Asset Number :</b> <?php echo $row['asset_no'] ?></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Asset Serial Number :</b> <?php echo $row['asset_serial'] ?></li>
                <li class="list-group-item"><b>Asset Status :</b> <?php echo $row['asset_status'] ?></li>
              </ul>
            </div>
            <div class="col-lg-4">
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Asset Location : </b> <?php echo $row['asset_location']?></li>
                <li class="list-group-item"><b>Asset Provider :</b> <?php echo $row['asset_provider']  ?></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h4>Asset Summary</h4>
    <style>
    .summaryDetails h5
    {
    font-weight: bold;
    }
    </style>
    <div class="summaryDetails">
      <div class="row">
        <div class="col-lg-3">
          <h5>Host Name </h5>
          <h4> <?php echo $row['asset_hostName'] ?></h4><br>
          <h5>Allocation Date</h5>
          <h4><?php echo $row['asset_alloc_date'] ?></h4><br>
        </div>
        <div class="col-lg-3">
          <h5>Asset Serial</h5>
          <h4><?php echo $row['asset_serial'] ?></h4><br>
          <h5>Asset Status </h5>
          <h4><?php echo $row['asset_status'] ?></h4><br>
        </div>
        <div class="col-lg-3">
          <h5>Asset Description</h5>
          <h4><?php echo $row['asset_desc'] ?></h4><br>
          <h5>End of Eligibility Date</h5>
          <?php
          $datetime1 = date_create($row["asset_alloc_date"]);
          $datetime2 = date_create($row["asset_end_date"]);
          $interval = date_diff($datetime1, $datetime2);
          ?>
          <h4> <?php echo $interval->format('%y years %m months %d days'); ?></h4><br>
        </div>
        <div class="col-lg-3">
          <h5>Asset Type</h5>
          <h4><?php echo $row['asset_type'] ?></h4><br>
          <h5>Asset Location</h5>
          <h4><?php echo $row['asset_location'] ?></h4><br>
        </div>
      </div>
    </div>
  </div>
</div>