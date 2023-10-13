<?php
include_once '../db.php';
include_once "../session.php";
$upload_direct = 'user_Profile/uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
     <script src="validation.js"></script>
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
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Create Shipment</span></h5>
              </div>
              <div class="widgetShipmentComp">
                <div class="well">
                  <div class="widgetShipmentDiv">
                    <p id="AllFields"></p>
                    <form name ="register" onsubmit="return shipmentValidate();" method="post" enctype="multipart/form-data" action="pickup_process.php">
                      <input type="text" id="quote_id" name="pickup_id" hidden="">
                      <input type="text" id="quote_id" name="pick_request_date" hidden="">
                      <input type="text" id="quote_id" name="pick_status" hidden="" value="">
                      <input type="text" id="quote_id" name="update_by" hidden="">
                      <input type="text" id="quote_id" name="follow_mode" hidden="">
                      <input type="text" id="quote_id" name="status_msg" hidden="">
                      <input type="text" id="quote_id" name="updated_on" hidden="">
                      <input type="text" id="user_id" name="user_id" hidden="" value="<?php echo $row["user_id"]; ?>">
                      <style>
                      .widgetShipmentDiv input
                      {
                      margin-bottom: -10px;
                      }
                      .widgetShipmentDiv label
                      {
                      padding:0px 7px;
                      margin-left: 5px;
                      }
                      .widgetShipmentDiv h6
                      {
                      padding-top: 10px;
                      margin-bottom: 10px;
                      font-size: 0.8em;
                      margin: 0px;
                      color: red;
                      
                      }
                      </style>
                      <div class="row">
                        <div class="col-lg-9">
                          <h4>Select Pickup Time & Date</h4>
                          <div class="row">
                            <div class="col-lg-4 col-xs-12">
                              <label for="usr">Date <span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pick_date" name="pick_date" placeholder="dd/mm/yyyy">
                                <h6 id='dateError'></h6>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <label for="usr">Time <span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pick_time" name="pick_time" placeholder="Time">
                                <h6 id='timeError'></h6>
                              </div>
                            </div>
                          </div> 
                          <h4 style="margin-bottom: 12px;"> Shipment Details</h4>
                          <div class="row">
                            <div class="col-lg-6">
                              <h5 style="text-align: center; margin-top: 0px;">Pickup Address</h5>
                              <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                  <label for="usr">Shipment Pickup Address<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_address" name="pick_address" placeholder="Shipment Pickup Address" >
                                    <h6></h6>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-xs-12" >
                                  <label for="usr">City<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_city" name="pick_city" placeholder="City" >
                                     <h6></h6>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                  <label for="usr">Pincode<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_pincode" name="pick_pincode" placeholder="Pincode" >
                                    <h6></h6>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-xs-12" >
                                  <label for="usr">State<span>*</span></label>
                                  <div class="form-group">
                                    <select class="form-control" class="col-lg-9" id="pick_state" required="" name="pick_state" >
                                      <option>Pickup  At</option>
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
                                    <h6></h6>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                  <label for="usr">Contact No.<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_phone" name="pick_phone" placeholder="Mobile Number">
                                     <h6></h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <h5 style="text-align: center;margin-top: 0px;">Delivery Address</h5>
                              <div class="row">
                                <div class="col-lg-12 col-xs-12">
                                  <label for="usr">Delivery Address<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_deliAddress" name="pick_deliAddress" placeholder="Delivery Address" >
                                     <h6></h6>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-xs-12" >
                                  <label for="usr">City<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_deliCity" name="pick_deliCity" placeholder="City" >
                                     <h6></h6>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                  <label for="usr">Pincode<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_deliPincode" name="pick_deliPincode" placeholder="Pincode" >
                                     <h6></h6>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-6 col-xs-12" >
                                  <label for="usr">State<span>*</span></label>
                                  <div class="form-group">
                                    <select class="form-control" class="col-lg-9" id="pick_deliState" required="" name="pick_deliState" style="text-transform:;">
                                      <option>Delivery At</option>
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
                                    <h6></h6>
                                  </div>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                  <label for="usr">Contact No.<span>*</span></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="pick_deliPhone" name="pick_deliPhone" placeholder="Mobile Number" >
                                  <h6></h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="col-lg-8 col-xs-12" >
                              <label for="usr">Special Info</label>
                              <div class="form-group">
                                <input class="form-control" type="text" id="pick_message" name="pick_message" placeholder="Your Message Here">
                              </div>
                            </div>
                            <div class="col-lg-4">
                              <label for="usr">Mode By<span>*</span></label>
                              <div class="form-group">
                                <select class="form-control" class="col-lg-9" id="pick_freight_type" required="" name="pick_freight_type" >
                                  <option>Mode By</option>
                                  <option value="Roadways ">Roadways</option>
                                  <option value="Railways ">Railways </option>
                                  <option value="Airways ">Airways </option>
                                </select>
                                
                              </div>
                            </div>
                          </div>
                        </div>
 
                        <div class="col-lg-3">
                          <h4 >Company Information</h4>
                         <div class="disableInputs">
                            <div class="row">
                            <div class="col-lg-12 col-xs-12">
                              <label for="usr">Name<span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pick_personal_names" name="pick_personal_names" placeholder="Company's Name" value="<?php echo $row["coy_name"]; ?>" >
                                <h6 id='NameError'></h6>
                              </div>
                              <label for="usr">Email<span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pick_personal_email" name="pick_personal_email" placeholder="Email" onkeyup="emailValidate()" value="<?php echo $row["coy_email"]; ?>">
                                <h6 id='emailError'></h6>
                              </div>
                              <label for="usr">Mobile No.<span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="pick_personal_phone" name="pick_personal_phone" placeholder="Mobile Number" onkeyup="coyContact()" value="<?php echo $row["coy_mobile"]; ?>">
                                <h6 id='contactError'></h6>
                              </div>
                              <label for="usr">GSTIN Number<span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN Number" onkeyup="coyGstin()" style="text-transform: uppercase;"value="<?php echo $row["coy_gstin"]; ?>">
                                <h6 id='gstinError'></h6>
                              </div>
                              <label for="usr">Address<span>*</span></label>
                              <div class="form-group">
                                <input type="text" class="form-control" id="company_address" name="company_address" placeholder="Address" value="<?php echo $row["coy_address_1"]; ?>,<?php echo $row["coy_city"]; ?>,<?php echo $row["coy_state"]; ?>" >
                              </div>
                            </div>
                          </div>
                         </div>
                          <div class="row">
                            <div class="col-lg-12 col-xs-12">
                              <div class="form-group">
                                <button style="margin-top:22px;padding: 10px;" type="submit" name="sendmail" class="ButtonCreate">Create</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                  <h5 style="font-size: 0.8em;text-align: right;margin-top: -10px;">You can edit <b>"Company Information"</b> on Profile Portal <a href="../user_Profile/company_profile.php">Click Here</a></h5>
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
