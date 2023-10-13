<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Maintenance Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMaint.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">Add Network</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  <div class="formPannel">
                    <div class="row">
                      <div class="col-lg-11">
                        <h5 style="margin-top: 0px;">Add Network</h5>
                      </div>
                      <div class="col-lg-1">
                        <a href="network_index.php"><button class="actionButtonIcons-center">Back</button></a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="network_process.php" method="post" enctype="multipart/form-data">
                          <input type="text" id="network_id" name="network_id"  hidden="">
                          <input type="date" id="uploadDate" name="uploadDate"  hidden="">
                          <input type="date" id="updateDate" name="updateDate"  hidden="">
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Office Name<span>*</span></label>
                                  <input type="text" class="form-control" name="net_offName" id="news_source" placeholder="Office Name" value="Aaradhya Cargo Movers">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Mobile<span>*</span></label>
                                  <input type="text" class="form-control" name="net_mobile" id="net_mobile" placeholder="Mobile Number">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Pincode<span>*</span></label>
                                <input type="text" class="form-control" name="net_pin" id="news_source" placeholder="Pincode">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="">Area,Street,Sector<span>*</span></label>
                                <input type="text" name="net_address" class="form-control" placeholder="Area,Street,Sector" >
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Landmark<span>*</span></label>
                                <input type="text" class="form-control" name="net_landmark" id="news_source" placeholder="Landmark">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Town/City<span>*</span></label>
                                <input type="text" class="form-control" name="net_townCity" id="news_source" placeholder="Town/City">
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">State<span>*</span></label>
                                <select class="form-control" class="col-lg-9" id="fromstate" required="" name="net_State" style="text-transform:;">
                                  <option>Select state</option>
                                  <option value="Andhra Pradesh">Andhra Pradesh</option>
                                  <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                  <option value="Assam">Assam</option>
                                  <option value="Bihar">Bihar</option>
                                  <option value="Chhatisgarh">Chhatisgarh</option>
                                  <option value="Goa">Goa</option>
                                  <option value="Gujarat">Gujarat</option>
                                  <option value="Haryana">Haryana</option>
                                  <option value="Himachal Pradesh">Himachal Pradesh</option>
                                  <option value="Jammu and kashmir">Jammu and Kashmir</option>
                                  <option value="Jharkhand">Jharkhand</option>
                                  <option value="Karnataka">Karnataka</option>
                                  <option value="Kerala">Kerala</option>
                                  <option value="Madhya Pradesh">Madhya Pradesh</option>
                                  <option value="Maharashtra">Maharashtra</option>
                                  <option value="Manipur">Manipur</option>
                                  <option value="Meghalaya">Meghalaya</option>
                                  <option value="Mizoram">Mizoram</option>
                                  <option value="Nagaland">Nagaland</option>
                                  <option value="Orissa">Orissa</option>
                                  <option value="Punjab">Punjab</option>
                                  <option value="Rajasthan">Rajasthan</option>
                                  <option value="Sikkim">Sikkim</option>
                                  <option value="Tamil Nadu">Tamil Nadu</option>
                                  <option value="Telagana">Telagana</option>
                                  <option value="Tripura">Tripura</option>
                                  <option value="Uttranchal">Uttranchal</option>
                                  <option value="Uttar Pradesh">Uttar Pradesh</option>
                                  <option value="West Bengal">West Bengal</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <div class="form-group">
                                <label for="image">Address Type<span>*</span></label>
                                <select class="form-control" name="net_addressType" id="">
                                  <option value="Select and address type">Select and address type</option>
                                  <option value="Office/Commercial (10AM-6PM)">Office/Commercial (10AM-6PM)</option>
                                  <option value="Warehouse (10AM-6PM)">Warehouse (10AM-6PM)</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-3 col-xs-12">
                              <button type="submit" name="Submit" style="margin-top: 0px;" class="actionButtonIcons-center">Save</button>
                            </div>
                          </div>
                        </form>
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