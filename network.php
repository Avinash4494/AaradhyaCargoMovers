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
            <h2>Network</h2>
            <h4><a href="index.php"> <i class="fa fa-home"></i> Home</a> / <span>Network</span></h4>
          </div>
        </div>
      </div>
    </section>
    <section id="serviceSection">
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <?php include_once 'serviceLeftPannel.php' ?>
            <style>
            .serviceSideComp .network
            {
            background-color: red;
            padding: 7px;
            color: white;
            }
            </style>
          </div>
          <div class="col-lg-9">
            <div class="rightServicePannel">
              <div class="topImage">
                <img src="image/net 01.jpg" class="img-responsive" alt="">
              </div>
              <h3>Network</h3>
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-1" style="background-color: red;"></div>
                <div class="col-lg-10"></div>
              </div>
              <div class="descpContent">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="networkContent">
                       <div class="row">
                      <?php
                      include('db.php');
                      $per_page_record = 12;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM web_network_upload LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                        <div class="col-lg-3">
                          <div class="networkComp">
                            <div class="well">
                              <!-- <p><?php echo $rowMember["net_offName"]; ?></p> -->
                              <h5><?php echo $rowMember["net_townCity"]; ?><!-- <?php echo $rowMember["net_address"]; ?>,<?php echo $rowMember["net_State"]; ?>,<?php echo $rowMember["net_pin"]; ?> --></h5>

                            </div>
                          </div>
                        </div>
                      <?php
                      }
                      }
                      else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                      ?>
                       </div>
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