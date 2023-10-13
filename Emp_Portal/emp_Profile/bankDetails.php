                         <?php
                        $bank_record_name = $row['bank_record_name'];
                        $bank_name = $row['bank_name'];
                        $bank_code = $row['bank_code'];
                        $bank_ifsc_code = $row['bank_ifsc_code'];
                        $bank_type = $row['bank_type'];
                        $bank_record_name = $row['bank_record_name'];
                        $bank_account_num = $row['bank_account_num'];
                        $bank_city = $row['bank_city'];
                        $bank_country = $row['bank_country'];
                        
                        if ($bank_record_name==''||$bank_name==''||$bank_code==''||$bank_ifsc_code==''||$bank_type==''||$bank_record_name==''||$bank_account_num==''||$bank_city==''||$bank_country=='')
                        {
                        ?>
                                                   <style>
                          .actionButtonIcons-center
                          {
                            font-size: 0.8em;
                          }
                        </style>
                        <div class="row">
                          <div class="col-lg-10">
                            <div class="nullAddress" style="text-align:
                              center;padding-bottom: 10px;">
                              <p>Oops!! Bank details are not yet updated. Click on edit to update your bank details.</p>
                            </div>
                          </div>
                          <div class="col-lg-2">
                              <h4> <a href="update_bank.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                                <button class="actionButtonIcons-center">
                                  <i class="fa fa-pencil"></i> &nbsp Edit
                                </button>
                              </a></h4>
                            </div>
                        </div>
                        <?php
                        }
                        else {
                        ?>
                   <div class="row">
                     <div class="col-lg-10">
                            <div class="row">
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Name as per record :</b> <?php echo $row['bank_record_name'] ?></li>
                              <li class="list-group-item"><b>Bank Name :</b> <?php echo $row['bank_name'] ?></li>
                              <li class="list-group-item"><b>Bank Code :</b> <?php echo $row['bank_code'] ?></li>
                              <li class="list-group-item"><b>IFSC Code :</b> <?php echo $row['bank_ifsc_code'] ?></li>
                              <li class="list-group-item"><b>Account Type :</b> <?php echo $row['bank_type'] ?></li>
                              <li class="list-group-item"><b>Please confirm wheather the account number belongs to you :</b> <?php echo $row['bank_confirm'] ?></li>
                            </ul>
                          </div>
                          <div class="col-lg-6">
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item"><b>Name as per bank :</b> <?php echo $row['bank_record_name'] ?></li>
                              <li class="list-group-item"><b>Account Number :</b> <?php echo $row['bank_account_num'] ?></li>
                              <li class="list-group-item"><b>City :</b> <?php echo $row['bank_city'] ?></li>
                              <li class="list-group-item"><b>Country :</b> <?php echo $row['bank_country'] ?></li>
                              <li class="list-group-item"><b>Please confirm wheather this is a joint account :</b> <?php echo $row['bank_joint_confirm'] ?></li>
                            </ul>
                          </div>
                        </div>
                     </div>
                      <div class="col-lg-2">
                <a href="update_bank.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                  <button class="actionButtonIcons-center">Edit &nbsp
                  <i class="fa fa-pencil"></i>
                  </button>
                </a>
              </div>
                   </div>
                        <?php
                        }
                        ?>