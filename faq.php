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
            <h2>FAQ's</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>FAQ's</span></h4>
          </div>
        </div>
      </div>
      
    </section>
    
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>