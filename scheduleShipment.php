<!DOCTYPE html>
<html>
  <title>Aaradhya Cargo Movers</title>
  <head>
    <?php include_once 'Header_Links/header_links.php' ?>
  </head>
  <body id="tothetop">
    <?php include_once 'Header/headerHome.php' ?>
    <div class="aboutHeader"></div>
    <section id="sectionAboutHead" class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="sectionTitleHead">
            <div class="well">
              <div class="topImag">
                <div class="row" >
                  <div class="col-lg-12 col-xs-8">
                    <h4>Welcome to </h4>
                    <h2>Aaradhya Cargo Movers</h2>
                    <h5>We’re always interested in new projects, big or small.</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3"><a href="quote.php"><button class="universalButtonRed">Get A Quote</button></a></div>
                <div class="col-lg-3"><a href="contactUs.php"><button class="universalButtonRed">Find Out More</button></a></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Schedule A Pickup</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Schedule A Pickup</span></h4>
          </div>
        </div>
      </div>
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>Schedule A Pickup</h2>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:;">
            <div class="container">
              <div class="row">
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
                <div class="col-lg-2 col-xs-2" style="background-color:red"></div>
                <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <p>Aaradhya Cargo Movers has an extensive network of branches and hubs throughout India <br>
        that acts as a pick-up and delivery location. You will also receive your parcel from your address. <br>Fill out the
      form to arrange the pickup of the cargo.</p>
    </section>
    <section id="sectionGetQuote">
      <div class="widgetQuoteRight">
        <div class="container">
          <div class="widgetQuote">
            <p id="AllFields"></p>
            <form name ="register" onsubmit="return quotevalidate();" method="post" enctype="multipart/form-data" action="Admin_Portal/SchedulePickup_Portal/pickup_process.php">
              <input type="text" id="quote_id" name="pickup_id" hidden="">
              <input type="text" id="quote_id" name="pick_request_date" hidden="">
               <input type="text" id="quote_id" name="pick_status" hidden="" value="">
               <input type="text" id="quote_id" name="update_by" hidden="">
               <input type="text" id="quote_id" name="follow_mode" hidden="">
               <input type="text" id="quote_id" name="status_msg" hidden="">
               <input type="text" id="quote_id" name="updated_on" hidden="">
               
              <h4>Select Pickup Time & Date</h4>
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <label for="usr"><b>Date <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="pick_date" name="pick_date" placeholder="Your Name" >
                    <span id='NameError'></span>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-12" >
                  <label for="usr"><b>Time <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="pick_time" name="pick_time" placeholder="Your email">
                    <span id='emailError'></span>
                  </div>
                </div>
              </div>
              <h4>Shipment Details</h4>
              <div class="row">
                <div class="col-lg-6">
                  <h5 style="text-align: center;font-weight:bold;">Pickup Address</h5>
                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <label for="usr"><b>Shipment Pickup Address <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pick_address" name="pick_address" placeholder="Your Name" >
                        <span id='NameError'></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-xs-12" >
                      <label for="usr"><b>City <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pick_city" name="pick_city" placeholder="Your email" >
                        <span id='emailError'></span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                      <label for="usr"><b>Pincode <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pick_pincode" name="pick_pincode" placeholder="Your Mobile Number" >
                        <span id='contactError'></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-xs-12" >
                      <label for="usr"><b>State <span>*</span></b></label>
                      <div class="form-group">
                            <select class="form-control" class="col-lg-9" id="fromstate" required="" name="pick_state" >
                          <option>Loading Place</option>
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
                    <div class="col-lg-6 col-xs-12">
                      <label for="usr"><b>Contact No. <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="contact" name="pick_phone" placeholder="Your Mobile Number">
                        <span id='contactError'></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <h5 style="text-align: center;font-weight:bold;">Delivery Address</h5>
                  <div class="row">
                    <div class="col-lg-12 col-xs-12">
                      <label for="usr"><b>Delivery Address <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="fname" name="pick_deliAddress" placeholder="Your Name" >
                        <span id='NameError'></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-xs-12" >
                      <label for="usr"><b>City <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="email" name="pick_deliCity" placeholder="Your email" >
                        <span id='emailError'></span>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                      <label for="usr"><b>Pincode <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="contact" name="pick_deliPincode" placeholder="Your Mobile Number" >
                        <span id='contactError'></span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6 col-xs-12" >
                      <label for="usr"><b>State <span>*</span></b></label>
                      <div class="form-group">
                        <select class="form-control" class="col-lg-9" id="fromstate" required="" name="pick_deliState" style="text-transform:;">
                          <option>Loading Place</option>
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
                    <div class="col-lg-6 col-xs-12">
                      <label for="usr"><b>Contact No. <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="contact" name="pick_deliPhone" placeholder="Your Mobile Number" >
                        <span id='contactError'></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <h4>Your Information</h4>
              <div class="row">
                <div class="col-lg-4 col-xs-12">
                  <label for="usr"><b>Fullname <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="" name="pick_personal_names" placeholder="Your Name" >
                    <span id='NameError'></span>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-12" >
                  <label for="usr"><b>Email <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="email" name="pick_personal_email" placeholder="Your email" >
                    <span id='emailError'></span>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                  <label for="usr"><b>Phone <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="contact" name="pick_personal_phone" placeholder="Your Mobile Number" >
                    <span id='contactError'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 col-xs-12" >
                  <label for="usr"><b>Special Info</b></label>
                  <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="pick_message" placeholder="Your Message Here" maxlength="6000" rows="4"> </textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for="usr"><b>Mode By <span>*</span></b></label>
                  <div class="form-group">
                    <select class="form-control" class="col-lg-9" id="frieght" required="" name="pick_freight_type" >
                      <option>Mode By</option>
                      <option value="Roadways ">Roadways</option>
                      <option value="Railways ">Railways </option>
                      <option value="Airways ">Airways </option>
                    </select>
                    <span id='FrieghtError'></span>
                  </div>
                  <div class="checkboxQuote" >
                    <div class="row">
                      
                      <div class="col-lg-1 col-xs-1">
                        <input type="checkbox" id="check" name="time" >
                      </div>
                      <div class="col-lg-11 col-xs-10">
                        <p>I hereby allow Aaradhya Cargo Movers. </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-xs-12" style="background-color:;">
                      <div class="form-group">
                        <button type="submit" name="sendmail" class="universalButtonRedQuote">Send</button>
                      </div>
                    </div>
                    <div class="col-lg-6 col-xs-6" style="background-color:;">
                      <!-- <div class="form-group">
                        <button type="reset" class="universalButtonRed">Reset</button>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>