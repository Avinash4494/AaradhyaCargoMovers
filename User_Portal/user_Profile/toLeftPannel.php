                <div class="dashWidgetTop">
                  <div class="well">
                    <div class="coy_profile">
                      <?php
                      if ($profile_image=='')
                      {
                      ?>
                      <img src="../image/emp.png" class="img-responsive">
                      <?php
                      }
                      else {
                      ?>
                      <img src="<?php echo $upload_direct.$row['profile_image'] ?>" class="img-responsive">
                      <?php
                      }
                      ?>
                      <h5 style="text-align: center;"><?php echo $row["coy_name"]; ?> </h5>
                    </div>
                  </div>
                </div>
                  <div class="contentComp">
                    <a href="../UserDashboard.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-dashboard"></i>&nbsp Dashboard</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="../user_AppStore/index_couriers.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-truck"></i>&nbsp Couriers</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="../user_AppStore/billing_index.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-money"></i>&nbsp Billing</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="../user_AppStore/trace_courier.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-search"></i>&nbsp Track</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                    <a href="../user_AppStore/shipment_index.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-cart-plus"></i>&nbsp Shipment</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                  <a href="../user_AppStore/analysis.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-calculator"></i>&nbsp Analysis</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                  <a href="company_profile.php">
                      <div class="listItemsNav">
                        <h5><i class="fa fa-cogs"></i>&nbsp Settings</h5>
                        <div class="listSliderComp"></div>
                      </div>
                    </a>
                  </div>