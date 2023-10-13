<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Maintenance Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftMaint.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Maintenance Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <div class="row">
                        <div class="col-lg-10">
                          <h5>Gallery Index</h5>
                        </div>
                        <div class="col-lg-2">
                          <a href="gallery_index.php"><button style="margin-top: 10px; margin-bottom: 10px;" class="actionButtonIcons-center">View More</button></a>
                        </div>
                      </div>
                      <?php
                      $upload_direct = '../uploads/gallery-upload/';
                      $per_page_record = 4;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM web_gallery_upload LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                      <style>
                      .showDocumentEmp .well
                      {
                      background-color: transparent;
                      border-radius: 0px;
                      padding: 0px;
                      border:none;
                      height: 150px;
                      }
                      </style>
                      <div class="col-lg-3">
                        <div class="showDocumentEmp">
                          <div class="well">
                            <img src="<?php echo $upload_direct.$rowMember['image1'] ?>" class="img-responsive">
                          </div>
                          <p><?php echo $rowMember["image_name"]; ?></p>
                        </div>
                      </div>
                      <?php
                      }
                      }
                      else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Records Found</h3>';}
                      ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-10">
                      <h5>News Index</h5>
                    </div>
                    <div class="col-lg-2">
                      <a href="news_index.php"><button style="margin-top: 10px; margin-bottom: 10px;" class="actionButtonIcons-center">View More</button></a>
                    </div>
                  </div>
                  <div class="row">
                    <?php
                    $upload_direct = '../uploads/news-upload/';
                    $per_page_record = 2;
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
                    <div class="col-lg-12">
                      <div class="newsComp" style="padding-top: 5px;" >
                        <div class="well" style="border:1px solid red;border-radius: 5px;">
                          <div class="row">
                            <div class="col-lg-2">
                              <style>
                              .sideImage img
                              {
                              height: 90px;
                              }
                              </style>
                              <div class="sideImage" style="margin-top: 5px;margin-left: 5px;">
                                <img src="<?php echo $upload_direct.$rowMember['image1'] ?>" class="img-responsive">
                                
                              </div>
                            </div>
                            <div class="col-lg-9">
                              <div class="row">
                                <div class="col-lg-9">
                                  <h3 style="font-size: 1.3em;padding:5px 0px 5px 0px;margin: 0px; "><?php echo $rowMember["news_title"]; ?></h3>
                                </div>
                                <div class="col-lg-3">
                                  <p style="float: right;">Posted On <?php echo $rowMember["uploadDate"]; ?></p>
                                </div>
                              </div>
                              <p><?php $news_descp =  $rowMember["news_descp"];
                                $news_split = substr($news_descp,0,360);
                                echo $news_split;
                                ?>........ <a href="news_View.php?id=<?php echo $rowMember['id'] ?>">Read More</a></p>
                              </div>
                              <div class="col-lg-1">
                                <div class="sideButton" style="padding-top: 12px;padding-right: 10px;">
                                  <div class="row">
                                    <div class="col-lg-12">
                                      <a href="news_View.php?id=<?php echo $rowMember['id'] ?>">
                                        <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-eye"></i></button>
                                      </a>
                                      <a href="news_edit.php?id=<?php echo $rowMember['id'] ?>">
                                        <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                      </a>
                                      <a href="news_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                        <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                      }
                      }
                      else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                      ?>
                    </div>
                                      <div class="row">
                    <div class="col-lg-10">
                      <h5>Office Locations Index</h5>
                    </div>
                    <div class="col-lg-2">
                      <a href="network_index.php"><button style="margin-top: 10px; margin-bottom: 10px;" class="actionButtonIcons-center">View More</button></a>
                    </div>
                  </div>
                  <div class="row">
                    <?php
                    $per_page_record = 2;
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
                    <div class="col-lg-12">
                      <div class="newsComp" style="padding-top: 5px;" >
                        <div class="well" style="border:1px solid red;border-radius: 5px;padding: 10px;">
                          <style>
                            .newsComp p{margin: 3px;}
                          </style>
                          <div class="row">
                            <div class="col-lg-3">
                              <p> Office Name : <?php echo $rowMember["net_offName"]; ?></p>
                              <p> Office Id. : <?php echo $rowMember["network_id"]; ?></p>
                              <p> Contact : <?php echo $rowMember["net_mobile"]; ?></p>
                            </div>
                            <div class="col-lg-2">
                              <p>Pincode : <?php echo $rowMember["net_pin"]; ?></p>
                              <p>Town/City : <?php echo $rowMember["net_townCity"]; ?></p>
                              <p>State : <?php echo $rowMember["net_State"]; ?></p>
                            </div>
                            <div class="col-lg-5">
                              
                               <p>Landmark : <?php echo $rowMember["net_landmark"]; ?></p>
                               <p>Area,Street,Sector : <?php echo $rowMember["net_address"]; ?></p>
                              <p>Address Type : <?php echo $rowMember["net_addressType"]; ?></p>
                            </div>
                            <div class="col-lg-2">
                              <div class="sideButton" style="padding-top: 12px;">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <a href="network_edit.php?id=<?php echo $rowMember['id'] ?>">
                                      <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                    </a>
                                  </div>
                                  <div class="col-lg-6">
                                    <a href="network_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                      <button style="margin-bottom: 10px;" class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
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
    </body>
  </html>