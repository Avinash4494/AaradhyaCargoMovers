<!-- <?php
include_once 'add_courier_database.php';
$result = mysqli_query($conn,"SELECT * FROM  usercoment");
?> -->
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
                <div class="col-lg-3"><a href="quote.php"><button class="universalButton">Get A Quote</button></a></div>
               <div class="col-lg-3"><a href="contactUs.php"><button class="universalButton">Find Out More</button></a></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Request A Quote</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Request A Quote</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>Request A Quote</h2>
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
      <p>We’re always interested in new projects, big or small. <br> Send us an email and we’ll get in touch shortly, or phone between 8:00 am and 7:00 pm Monday to Saturday.</p>
    </section>
    <section id="sectionGetQuote">
      <div class="widgetQuoteRight">
        <div class="container">
          <div class="widgetQuote">
            <p id="AllFields"></p>
            <form name ="register" onsubmit="return quotevalidate();" method="post" enctype="multipart/form-data" action="Admin_Pannel/Courier_Portal/quote_process.php">
               <input type="text" id="quote_id" name="quote_id" hidden="">
              <div class="row">
                <div class="col-lg-4 col-xs-6">
                  <label for="usr"><b>Name <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="fname" name="sender_names" placeholder="Your Name" onkeyup="NameValidate()">
                         <span id='NameError'></span>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6" >
                  <label for="usr"><b>Email <span>*</span></b></label>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="sender_email" placeholder="Your email" onkeyup="emailValidate()">
                        <span id='emailError'></span>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6">
                  <label for="usr"><b>Phone <span>*</span></b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="contact" name="sender_phone" placeholder="Your Mobile Number" onkeyup="contactValidate()">
                        <span id='contactError'></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 col-xs-6" >
                  <label for="usr"><b>Weight (Kg) </b></label>
                  <div class="form-group">
                    <input type="text" class="form-control" id="weight" name="sender_weight" placeholder="Enter Weight" maxlength="50">
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6" >
                  <label for="usr"><b>Departure </b></label>
                  <div class="form-group">
                    <select class="form-control" class="col-lg-9" id="fromstate" required="" name="sender_fstate" style="text-transform:;">
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
                <div class="col-lg-4 col-xs-6" >
                  <label for="usr"><b>Delivery Destination</b></label>
                  <div class="form-group">
                    <select class="form-control" class="col-lg-9" id="tostate" required="" name="sender_tstate" style="text-transform:;">
                      <option>Unloading Place</option>
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
              </div>
              <div class="row" hidden="">
                <div class="col-lg-3 col-xs-3" style="background-color:;">
                  <label for="usr"><b>Subject:</b></label>
                </div>
                <div class="col-lg-9 col-xs-9" style="background-color:;">
                  <div class="form-group">
                    <input type="text" class="form-control" id="subject" name="subject" value="Welome to Aaradhya Cargo Movers" maxlength="50">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 col-xs-12" >
                  <label for="usr"><b>Special Info</b></label>
                  <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="sender_message" placeholder="Your Message Here" maxlength="6000" rows="4"> </textarea>
                  </div>
                </div>
                <div class="col-lg-4">
                  <label for="usr"><b>Freight Type <span>*</span></b></label>
                  <div class="form-group">
                    <select class="form-control" class="col-lg-9" id="frieght" required="" name="sender_freight_type" onchange="frieghtValidate()">
                      <option>Freight Type</option>
                      <option value="Road Transportation">Road Transportation</option>
                      <option value="Railways Transportation">Railways Transportation</option>
                      <option value="Air Transportation">Air Transportation</option>
                    </select>
                      <span id='FrieghtError'></span>
                  </div>
                  <div class="checkboxQuote" >
                    <div class="row">
                       
                      <div class="col-lg-1 col-xs-3">                     
                        <input type="checkbox" id="check" name="time" >
                      </div>                    
                      <div class="col-lg-11 col-xs-7">
                        <p>I hereby allow Aaradhya Cargo Movers. </p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 col-xs-6" style="background-color:;">
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
  <script>
      function quotevalidate()
{
  var fname=document.getElementById("fname").value;
  var mail=document.getElementById("email").value;
  var contact=document.getElementById("contact").value;
  var frieght=document.getElementById("frieght").value;
  
   if(fname.length==0||mail.length==0||contact.length==0||frieght.length==0)
     {
     alert("* Fields are required");
     document.getElementById("AllFields").innerHTML="* Fields are required"; 
     return false;
     }
   else
   {
    document.getElementById("AllFields").innerHTML=""; 
     return true;
   }
}
function NameValidate()
{
var fname = document.forms["register"]["fname"]; 
if (fname.value == "")                                  
{ 
    document.getElementById("NameError").innerHTML="Please enter valid name"; 
    fname.focus(); 
    return false; 
}
else
  {
  document.getElementById("NameError").innerHTML=""; 
  }
}

function contactValidate()
{
var contact = document.forms["register"]["contact"]; 
if (contact.value == "")                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be empty."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
if (contact.value.length<10)                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be less than 10 digits."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
if (contact.value.length>10)                               
{ 
   document.getElementById("contactError").innerHTML="Contact Number shouldn't be more than 10 digits."; 
    contact.focus(); 
    return false; 
}
else
{
document.getElementById("contactError").innerHTML=""; 
}
}
function emailValidate()
{
var mail = document.forms["register"]["email"];  
if (mail.value == "")                                   
{ 
   document.getElementById("emailError").innerHTML="Please enter valid email id";  
    mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}
if (mail.value.indexOf("@", 0) < 0)                 
{ 
  document.getElementById("emailError").innerHTML="@ is missing";      
  mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}

if (mail.value.indexOf(".", 0) < 0)                 
{ 
  document.getElementById("emailError").innerHTML=".com is missing";     
  mail.focus(); 
    return false; 
} 
else
{
document.getElementById("emailError").innerHTML=""; 
}
}
function frieghtValidate()
{
var frieght = document.forms["register"]["frieght"]; 
if (frieght.value == "")                                  
{ 
    document.getElementById("FrieghtError").innerHTML="Please enter valid name"; 
    frieght.focus(); 
    return false; 
}
else
  {
  document.getElementById("FrieghtError").innerHTML=""; 
  }
}
  </script>