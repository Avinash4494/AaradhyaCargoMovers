
				<div class="sideNavWellAdmin"> 
					<div class="well" data-toggle="modal" data-target="#myModal">
            <a href="AdminDashboard.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                  <i class="fa fa-home"></i>
                </div>
                <div class="col-lg-10">
                  <p>Home</p>
                </div>
              </div> 
               </h4>
            </a>
            <a href="Profie_Portal/index.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                  <i class="fa fa-users"></i>
                </div>
                <div class="col-lg-10">
                  <p>Manage Accounts</p>
                </div>
              </div> 
               </h4>
            </a>
            <a href="Courier_Portal/quote_report.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                  <i class="fa fa-address-card-o" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Quotes</p>
                </div>
              </div> 
               </h4>
            </a>
<!--             <?php
              include_once 'db.php';
              $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM addcourier");
              while($rowUser = mysqli_fetch_array($resultUser))  {
              ?> -->
            <a href="Courier_Portal/index.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                 <i class="fa fa-cart-plus" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Couriers <span><!-- <?php echo $rowUser[0] ?> --></span></p>
                </div>
              </div> 
               </h4>
            </a>
           <!--    <?php
              }
              ?> -->
            <a href="Feedback_Portal/feedback_report.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                 <i class="fa fa-comments-o" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Feedbacks</p>
                </div>
              </div> 
               </h4>
            </a>
            <a href="Careers_Portal/index.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Careers</p>
                </div>
              </div> 
               </h4>
            </a>
            <a href="Blog_Portal/blogs_report.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                  <i class="fa fa-book" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Blogs</p>
                </div>
              </div> 
               </h4>
            </a>
            <a href="logout.php">
              <h4>
              <div class="row">
                <div class="col-lg-2">
                <i class="fa fa-sign-out" aria-hidden="true"></i>
                </div>
                <div class="col-lg-10">
                  <p>Log Out</p>
                </div>
              </div> 
               </h4>
            </a>
					</div>
				</div>