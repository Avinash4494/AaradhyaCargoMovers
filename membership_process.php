
<!DOCTYPE html>
<html>
  <title>Aaradhya Cargo Movers</title>
  <head>
    <?php include_once 'Header_Links/header_links.php' ?>
  </head>
  <body id="tothetop" onload = "getFunction()">
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
                    <h5 style="line-height: 20px;">Need dependable, cost effective transportation of your commodities? <br>Fill out our easy Quote Request Form below to get a fast quote on your job.</h5>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-3 col-xs-6"><a href="quote.php"><button class="universalButtonRed">Get A Quote</button></a></div>
                <div class="col-lg-3 col-xs-6"><a href="contactUs.php"><button class="universalButtonRed">Find Out More</button></a></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Membership</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Membership</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    <section id="sectionTitle" class="container-fluid">
      <h2>Membership</h2>
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
          <div class="MembershipComp">
<?php echo $_GET["plan_type"];
echo $_GET['plan_price']; ?>
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>
<script>
  function getFunction(){
  window.onload = localStorage.getItem("storageName");
}
</script>