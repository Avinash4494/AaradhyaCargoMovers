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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="maintenance_index.php" data-toggle="tooltip" title="Maintenance Portal!" data-placement="top">Maintenance Portal</a> / <span class="activePage">News Update</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="bodyComponent">
                  <div class="formPannel">
                    <div class="row">
                      <div class="col-lg-11">
                         <h5 style="margin-top: 0px;">News Update</h5>
                      </div>
                       <div class="col-lg-1">
                        <a href="news_index.php"><button class="actionButtonIcons-center">Back</button></a>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12">
                        <form class="" name ="register" onsubmit="return myvalidate();" action="news_process.php" method="post" enctype="multipart/form-data">
                          <input type="text" id="news_id" name="news_id"  hidden="">
                          <input type="date" id="uploadDate" name="uploadDate"  hidden="">
                          <div class="row">
                            <div class="col-lg-12 col-xs-12">
                              <div class="form-group">
                                <label for="">Title<span>*</span></label>
                                <input type="text" name="news_title" class="form-control" placeholder="News Title">
                              </div>
                            </div>
                            
                            <div class="col-lg-12 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Uploaded By<span>*</span></label>
                                  <input type="text" class="form-control" name="news_uploadeBy" id="image">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Source<span>*</span></label>
                                  <input type="text" class="form-control" name="news_source" id="news_source">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-xs-12">
                              <div class="form-group">
                                <label for="">Description<span>*</span></label>
                                <textarea name="news_descp" id="" class="form-control" cols="10" rows="5"></textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-9 col-xs-12">
                              <div class="updateProfilePic">
                                <div class="form-group">
                                  <label for="image">Choose Image</label>
                                  <input type="file" class="form-control" name="image1" id="image1">
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                              <button type="submit" name="Submit" style="margin-top: 25px;" class="actionButtonIcons-center">Save</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
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