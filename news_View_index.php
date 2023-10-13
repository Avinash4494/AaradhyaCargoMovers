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
                  <div class="col-lg-12 col-xs-12">
                    <h4>Welcome to </h4>
                    <h2>Aaradhya Cargo Movers</h2>
                    <h5>We’re always here for you 24x7.</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-xs-6"><a href="quote.php"><button class="universalButtonRed">Get A Quote</button></a></div>
                <div class="col-lg-3 col-xs-6"><button class="universalButtonRed">Find Out More</button></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Blogs</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Blogs</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    <?php
    require_once('db.php');
    $upload_dir = 'Admin_Portal/uploads/news-upload/';
    if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from web_news_upload where id=".$id;
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
    $rowMember = mysqli_fetch_assoc($result);
    }else {
    $errorMsg = 'Could not Find Any Record';
    }
    }
    ?>
    <section id="sectionTitle" class="container-fluid">
      <h2><?php echo $rowMember["news_title"]; ?></h2>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12 col-sm-12 col-lg-12" style="background-color:;">
            
            <div class="row">
              <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
              <div class="col-lg-2 col-xs-2" style="background-color:red"></div>
              <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
            </div>
            
          </div>
        </div>
      </div>
      <p>If you have any questions about what we offer for consumers <br>or for business, you can always email us or call us via the below details. We’ll reply within 24 hours.</p>
    </section>
    <section id="sectionContactComp">
      <div class="container-fluid">
        <div class="col-lg-1"></div>
        <div class="col-lg-7">
          <div class="widgetNewsIndex">
            <div class="well">
              <div class="widgetDateIndex">
                 <h1><?php echo $rowMember["uploadDate"]; ?></h1>
              </div>
              <img src="<?php echo $upload_dir.$rowMember['image1'] ?>" class="img-responsive">
              <h4><?php echo $rowMember["news_source"]; ?> | <?php echo $rowMember["news_uploadeBy"]; ?></h4>
              <h3><?php echo $rowMember["news_title"]; ?></h3>
              <p style="text-align: justify;"><?php echo  $rowMember["news_descp"];
              ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <section id="sectionTitle" class="container-fluid" style="background-color: transparent;">
            <h3 >POPULAR POST</h3>
            <div class="row">
              <div class="col-lg-2 col-xs-5" style="background-color:;"></div>
              <div class="col-lg-2 col-xs-2" style="background-color:red"></div>
              <div class="col-lg-5 col-xs-5" style="background-color:;"></div>
            </div>
          </section>
          <?php
          include('db.php');
          $upload_direct = 'Admin_Portal/uploads/news-upload/';
          $per_page_record = 4;
          if (isset($_GET["page"])) {
          $page  = $_GET["page"];
          }
          else {
          $page=1;
          }
          $start_from = ($page-1) * $per_page_record;
          $query = "SELECT * FROM web_news_upload LIMIT $start_from, $per_page_record ";
          $rs_result = mysqli_query ($connect, $query);
          if(mysqli_num_rows($rs_result)){
          while ($rowMember = mysqli_fetch_array($rs_result)) {
          ?>
          <div class="widgetNews">
           <div class="row">
             <div class="col-lg-4">
                <img src="<?php echo $upload_direct.$rowMember['image1'] ?>" class="img-responsive">
             </div>
             <div class="col-lg-8">
            <h3 style="font-size: 1.1em;margin-bottom: 0px;"><?php echo $rowMember["news_title"]; ?></h3>
            <p style="text-align: justify;"><?php $news_descp =  $rowMember["news_descp"];
              $news_split = substr($news_descp,0,70);
              echo $news_split;
            ?>...... <a href="news_View_index.php?id=<?php echo $rowMember['id'] ?>">Read More</a></p>
             </div>
           </div>
          </div>
          <?php
          }
          }
          else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
          ?>
          <a href="blogs.php"><button class="universalButtonRed" type="submit">Read More</button></a>
        </div>
      </div>
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>LEAVE YOUR MESSAGE</h2>
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
      <div class="container">
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