<!-- <?php
include_once 'add_courier_database.php';
$result = mysqli_query($conn,"SELECT * FROM  usercoment");
?> -->
<!DOCTYPE html>
<html>
  <title>Aaradhya Cargo Movers</title>
  <head>
    <?php include_once 'header_links.php' ?>
  </head>
  <body onload="myFunction()" style="margin:0;" id="tothetop" onmouseover="showtime();">
    <?php include_once 'headerHome.php' ?>
    <div class="aboutHeader"></div>
    <section id="sectionAboutHead" >
      <h2>About Us</h2>
      <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>About Us</span></h4>
    </section>
    <section id="sectionTitle" class="container-fluid">
        <h2>What Customers Say About Our Services ?</h2>
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
        <p>Aaradhya Cargo Movers is more than logistics. <br>
        We can also optimize your packaging, manage your materials sourcing, and so much more.</p>
      </section>
 
 
  <section id="JoinUsComp">
    <h3>We’re always looking for talented workers, creative directors <br>and anyone has a
    passion for the logistic service <a href="">join our team.</a> </h3>
  </section>
  <?php include_once 'Footer/footerHome.php' ?>
</body>
</html>