                <div class="statusComp">
                  <div class="StatusComp">
                    <div class="well">
                      <div class="row">
                        <div class="col-lg-4">
                          <h5 style="margin-top: 0px;">Courier Status</h5>
                          <?php
                          require_once "db.php";
                          $per_page_record = 3;
                          if (isset($_GET["page"])) {
                          $page  = $_GET["page"];
                          }
                          else {
                          $page=1;
                          }
                          $start_from = ($page-1) * $per_page_record;
                          $user_id = $row['user_id'];
                          $query = "SELECT * FROM member_add_courier Where user_id = '$user_id'  LIMIT $start_from, $per_page_record";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          
                          ?>
                          <style>
                          .pannelWidget .well{
                          margin-bottom: 7px;
                          padding-bottom: 0px;
                          }
                          .pannelWidget .well p{
                          line-height: 10px;
                          }
                          </style>
                          <div class="pannelWidget">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-8">
                                  <p>Docket No. : <?php echo $rowMember['docketNumber'] ?>
                                  </p>
                                  <p>Dkt. Date : <?php echo $rowMember['courierdate'] ?>
                                  </p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Status <br>
                                    <?php
                                    $courStatus = $rowMember['order_status'];
                                    $ordered = "Ordered";
                                    $dispatched = "Dispatched";
                                    $shipping = "Shipping";
                                    $delivered = "Delivered";
                                    if ($courStatus==$ordered) {
                                    ?>
                                    <h6  style="margin:0px;"><i class="fa fa-circle" style="color: #FF940B ;"></i>&nbsp Ordered</h6>
                                    <?php
                                    }
                                    else if($courStatus == $dispatched)
                                    {
                                    ?>
                                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0BFFCB ;"></i> &nbsp Dispatched</h6>
                                    <?php
                                    }
                                    else if($courStatus == $shipping)
                                    {
                                    ?>
                                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0CFDA9;"></i> &nbsp Shipping</h6>
                                    <?php
                                    }
                                    else if($courStatus == $delivered)
                                    {
                                    ?>
                                    <h6><i class="fa fa-circle" style="color: green ;"></i> &nbsp Delivered</h6>
                                    <?php
                                    } else if($courStatus == " ")
                                    {
                                    ?>
                                    <h6><i class="fa fa-circle" style="color: #D2F707 ;"></i> &nbsp Pending</h6>
                                    <?php
                                    }
                                    ?>
                                  </p>
                                  
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                          <?php
                          }
                          else{
                          ?>
                          <div class="emptyBox">
                            <h4>No records found!</h4>
                          </div>
                          <?php
                          }
                          ?>
                          <h5>Shipment Status</h5>
                          <?php
                          require_once "db.php";
                          $per_page_record = 3;
                          if (isset($_GET["page"])) {
                          $page  = $_GET["page"];
                          }
                          else {
                          $page=1;
                          }
                          $start_from = ($page-1) * $per_page_record;
                          $user_id = $row['user_id'];
                          $query = "SELECT * FROM schedule_pickup Where user_id = '$user_id'  LIMIT $start_from, $per_page_record";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          
                          ?>
                          <style>
                          .pannelWidget .well{
                          margin-bottom: 7px;
                          padding-bottom: 0px;
                          }
                          .pannelWidget .well p{
                          line-height: 10px;
                          }
                          </style>
                          <div class="pannelWidget">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-8">
                                  <p>Pickup Id. : <?php echo $rowMember['pickup_id'] ?>
                                  </p>
                                  <p>Last Update : <?php echo $rowMember['updated_on'] ?>
                                  </p>
                                </div>
                                <div class="col-lg-4">
                                  <p>Status <br>
                                    <?php
                                    $courStatus = $rowMember['pick_status'];
                                    $Active = "Active";
                                    $inProg  = "In Progress";
                                    $Resolved = "Resolved";
                                    if ($courStatus==$Active) {
                                    ?>
                                    <h6  style="margin:0px;"><i class="fa fa-circle" style="color: #FF940B ;"></i>&nbsp Active</h6>
                                    <?php
                                    }
                                    else if($courStatus == $inProg)
                                    {
                                    ?>
                                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0BFFCB ;"></i> &nbsp In Progress</h6>
                                    <?php
                                    }
                                    else if($courStatus == $Resolved)
                                    {
                                    ?>
                                    <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0CFDA9;"></i> &nbsp Resolved</h6>
                                    <?php
                                    }
                                    else if($courStatus == "")
                                    {
                                    ?>
                                    <h6><i class="fa fa-circle" style="color: #D2F707 ;"></i> &nbsp Pending</h6>
                                    <?php
                                    }else{}
                                    ?>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                          }
                          ?>
                          <?php
                          }
                          else{
                          ?>
                          <div class="emptyBox">
                            <h4>No records found!</h4>
                          </div>
                          <?php
                          }
                          ?>
                          
                        </div>
                        <div class="col-lg-8">
                        <style>
                        .progressiveComp{background-color: white;margin-top: 10px;padding: 15px;border-radius: 5px;}
                      
                        .progressiveComp p{color: #1c2833;padding-top: 15px;text-align: center;font-size: 0.9em;}
                        .circlechart{margin-left: 30px; font-size: 1em;color: white;}
.success-stroke {
  stroke: red;
}

.warning-stroke {
  stroke: #F98834 ;
}

.danger-stroke {
  stroke: #ff4444;
}
                        </style>
                        <h5><b>Courier Analysis</b></h5>
                        <div class="progressiveComp">

                          <div class="row">
                            <div class="col-lg-4">
                              <?php

                              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  member_add_courier  Where user_id = '$user_id' ");
                              while($rowUser = mysqli_fetch_array($resultUser))  {
                              $getNum = $rowUser[0];
                             $setNum =100;$getPer = ($getNum/$setNum)*100; ?>
                              <div class="circlechart" data-percentage="<?php echo $getPer; ?>">Total Couriers</div>
                               <p><?php echo round($getNum,1); ?>  of 200 Dockets</p>
                              <?php } ?>
                            </div>
                            
                            <div class="col-lg-4">
                             <?php
                            $query_Amt = mysqli_query($connect,"SELECT * FROM member_add_courier  Where user_id = '$user_id' ");
                            $AmtPerVar= 0;
                            while ($Amt = mysqli_fetch_array($query_Amt)) {
                            $AmtPerVar +=(int)$Amt['grand_total'];
                            }
                             $getAmt = $AmtPerVar;
                            $setAmt = 300000;
                            $getAmtPer = ($getAmt/$setAmt)*100;
                            ?>
                            <div class="circlechart" data-percentage="<?php echo round($getAmtPer,1); ?>">Payments</div>
                            <p>Rs. <?php echo round($AmtPerVar,1);  ?> of Rs. 3,00,000.00 </p>
                            </div>
                            
                            <div class="col-lg-4">
                               <?php
                            $query_weight = mysqli_query($connect,"SELECT * FROM member_add_courier  Where user_id = '$user_id' ");
                            $weightPerVar=0;
                            while ($weight = mysqli_fetch_array($query_weight)) {
                            $weightPerVar +=(int)$weight['total_weight'];
                              }
                           
                            $getWeight = $weightPerVar;
                            $setWeight = 30000;
                            $getWeightPer = ($getWeight/$setWeight)*100;
                            ?>
                              <div class="circlechart" data-percentage="<?php echo round($getWeightPer,1); ?>">Weights</div>
                              <p><?php echo round($weightPerVar,1); ?>Kg  of 30,000 Kg</p>
                               
                            </div>
                          </div>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>