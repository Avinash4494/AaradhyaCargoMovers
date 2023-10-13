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
                <div class="col-lg-3 col-xs-6"><a href="contactUs.php"><button class="universalButton">Find Out More</button></a></div>
                <div class="col-lg-6"></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4" >
          <div class="animateComp">
            <h2>Gallery</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Gallery</span></h4>
          </div>
        </div>
      </div>
      
    </section>
<section id="sectionTitle" class="container-fluid">
      <h2>Our Gallery</h2>
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
    <section id="sectionGallery">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4 col-xs-12">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-4.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal1"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-4.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-3.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-3.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-2.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal3"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-2.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-7.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal4"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal4" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-7.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-3.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal5"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal5" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-3.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <div class="col-lg-4">
            <div class="widgetGalleryImage">
              <div class="well">
                <img src="image/a-2.jpg" alt="" class="img-responsive">
              </div>
            </div>
            <div class="container">
              <button type="button" class="universalButtonOpen hidden-xs" data-toggle="modal" data-target="#myModal6"><i class="fa fa-search"></i> </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal6" role="dialog">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content" >
                    <div class="modal-header">
                      <button type="button" class="universalButtonClose" data-dismiss="modal"><i class="fa fa-close"></i> </button>
                    </div>
                    <div class="modal-body">
                      <img src="image/a-2.jpg" alt="" class="img-responsive">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         
      </div>
    </section>
    
    <?php include_once 'Footer/footerHome.php' ?>
  </body>
</html>