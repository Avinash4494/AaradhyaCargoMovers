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
                <div class="col-lg-3 col-xs-6"><a href="quote.php"><button class="universalButton">Get A Quote</button></a></div>
                <div class="col-lg-3 col-xs-6"><button class="universalButton">Find Out More</button></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Contact Us</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Contact Us</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>Contact Us</h2>
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
      <p>If you have any questions about what we offer for consumers <br>or for business, you can always email us or call us via the below details. We’ll reply within 24 hours.</p>
    </section>
    <section id="sectionContactComp">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="widgetContact" >
              <div class="row">
                <div class="col-lg-3 col-xs-12">
                  <div class="row">
                    <div class="col-lg-3 col-xs-3">
                      <div class="widgetFeedbackIcon">
                        <i class="fa fa-envelope"></i>
                      </div>
                    </div>
                    <div class="col-lg-9 col-xs-9">
                      <div class="widgetContactText">
                        <h3>Email Us</h3>
                        <h5>aaradhyacargomovers@gmail.com</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-xs-12">
                  <div class="row">
                    <div class="col-lg-3 col-xs-3">
                      <div class="widgetFeedbackIcon">
                        <i class="fa fa-phone"></i>
                      </div>
                    </div>
                    <div class="col-lg-9 col-xs-9">
                      <div class="widgetContactText">
                        <h3>Contact Us</h3>
                        <h5>9113855664/9743866386</h5>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-xs-12">
                  <div class="row">
                    <div class="col-lg-2 col-xs-3">
                      <div class="widgetFeedbackIcon">
                        <i class="fa fa-map"></i>
                      </div>
                    </div>
                    <div class="col-lg-10 col-xs-9">
                      <div class="widgetContactText">
                        <h3>Visit our office</h3>
                        <h5>#26, 1st Floor,Yeshwanthpura 1st Main Road, Mathikere, Opp. to Coffee Santhe Hotel, Bangalore, 560054</h5>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        <br>
        <section id="sectionTitle" class="container-fluid">
          <h2>Leave Your Message</h2>
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
          <p>If you have any questions about the services we provide <br>simply use the form below. We try and respond to all
          queries and comments within 24 hours.</p>
        </section>
        <div class="row">
          <div class="col-lg-12">
            <div class="widgetFeedbackRight">
              <div class="widgetQuote"><p id="AllFields"></p>
                <form name ="register" onsubmit="return feedbackvalidate();" method="post" enctype="multipart/form-data" action="Admin_Pannel/Feedback_Portal/feedback_process.php">
                  <input type="text" id="feedback_id" name="feedback_id" hidden="">
                  <div class="row">
                    <div class="col-lg-6 col-xs-12">
                      <label for="usr"><b>Name <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="fname" name="names" placeholder="Your Name" onkeyup="NameValidate()">
                         <span id='NameError'></span>
                      </div>
                      <label for="usr"><b>Email <span>*</span></b></label>
                      <div class="form-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email" onkeyup="emailValidate()">
                        <span id='emailError'></span>
                      </div>
                      <label for="usr"><b>Phone <span>*</span></b></label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="contact" name="cphone" placeholder="Your Mobile Number" onkeyup="contactValidate()">
                        <span id='contactError'></span>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <label for="usr"><b>Special Info</b></label>
                      <div class="form-group">
                        <textarea class="form-control" type="textarea" id="message" name="ccoment" placeholder="Your Message Here" maxlength="6000" rows="5"> </textarea>
                      </div>
                      <div class="row">
                        <div class="col-lg-12 col-xs-12" style="background-color:;">
                          <div class="form-group">
                            <button type="submit" name="Submit" class="universalButtonRedFeedback">Send</button>
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
        </div>
      </div>
    </section>
    <section id="sectionLocation">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7774.245838559514!2d77.55477517709956!3d13.027843530236263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae3d3d87bf3dcd%3A0xee03d662112070a3!2sCoffee%20Santhe!5e0!3m2!1sen!2sin!4v1588649693543!5m2!1sen!2sin" width="100%" height="350px;" frameborder="0" style="border:0" allowfullscreen></iframe>
    </section>
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>
<div style="display:none;" id="myDiv" class="animate-bottom">
  <?php include_once 'headerHome.html' ?>
  <div id="section_above"> </div>
  <div id="vision_mission_main" class="container-fluid">
    <div class="container" id="aboutUs">
      <div class="row">
        <div class="col-lg-12 col-xs-12" style="background-color:;">
          <h2>Contact Us</h2>
        </div>
        
      </div>
    </div>
  </div>
  <div id="section9" class="container-fluid">
    <h2>Contact Us</h2>
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
        <div class="col-lg-2 col-xs-2" style="background-color:#F90A03;"></div>
        <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
      </div>
    </div><br><br>
    <div class="row">
<div class="col-lg-6 col-xs-12" style="background-color:;">
        <h5><i class="fa fa-user-o"></i>&nbsp Our Profile</h5>
        <div class="contact_us_well">
          <div class="well"><br>
            <div class="row">
              <div class="col-lg-12">
                <h4><i class="fa fa-envelope"></i> <b>Mail Us</b> </h4>
                <h4><i class="fa fa-phone-square"></i> <b>Call Us</b> </h4>
                <h4><i class="fa fa-"></i> <b>Address</b> <b>Aaradya Cargo Movers</b><br></h4>
              </div>              
            </div>           
            </div><!--well-->
            </div><!--contact_us Well-->
          </div>
          <div class="col-lg-6 col-xs-12" style="background-color:;">
            <h5><i class="fa fa-map-marker"></i>&nbsp Our Location</h5>
            <!--location Well-->
          </div>         
        </div>        
      </div>
    </body>
  </html>
  <script>
      function feedbackvalidate()
{
  var fname=document.getElementById("fname").value;
  var mail=document.getElementById("email").value;
  var contact=document.getElementById("contact").value;
  
   if(fname.length==0||mail.length==0||contact.length==0)
     {
     alert("* All Fields are required");
     document.getElementById("AllFields").innerHTML="* All Fields are required"; 
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
  </script>