<?php
  include('add.php')
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Profiles</title>
    <link rel="icon" href="logo_A.png" height="10px">

  
  </head>
  <body>
    <?php include_once 'header.php'; ?>
    <div class="container">
      <div class="headerWell">
        <div class="well">
            <div class="row">
            <div class="col-lg-9 col-xs-9 "><h4>Add Personal Details</h4></div>
            <div class="col-lg-3 col-xs-3 "><a href="index.php"><h4>Back</h4></a></div>
          </div>
            
            </div>
      </div>
    </div>

      <div class="container">
        <div class="row ">
           <div class="col-md-3"></div>
          <div class="col-md-6">

            <div class="card">
 
              <div class="card-body">
                <form class="" action="add.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                          <label for="email">Designation</label>
                          <input type="text" class="form-control" name="uid" placeholder="Enter Designation" required="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="contact">Contact No</label>
                        <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" value="" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" value="" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="pan">PAN Number</label>
                        <input type="text" class="form-control" name="pan" placeholder="Enter PAN  Number" value="" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="aadhar">Aadhar Number</label>
                        <input type="text" class="form-control" name="aadhar" placeholder="Enter Aadhar Number" value="" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="addressline1">Address Line 1</label>
                        <input type="text" class="form-control" name="addressline1" placeholder="Enter Address" value="" required="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label for="addressline2">Address Line 2</label>
                        <input type="text" class="form-control" name="addressline2" placeholder="Enter Address" value="" required="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label for="contact">Choose Image</label>
                        <input type="file" class="form-control" name="image" value="" required="">
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6 col-xs-6">
                        <div class="form-group">
                          <button type="reset" class="btn btn-danger btn-block">Reset</button>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-6">
                        <div class="form-group">
                          <button type="submit" name="Submit" class="btn btn-danger btn-block">Submit</button>
                        </div>
                    </div>
                  </div>

                    
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>

    <script src="js/bootstrap.min.js" charset="utf-8"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" charset="utf-8"></script>
  </body>
</html>
