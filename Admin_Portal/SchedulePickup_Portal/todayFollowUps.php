<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Pickup Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-Index-comTop"></div>
              <?php include_once 'toLeftQuote.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="quote_index.php" data-toggle="tooltip" title="Quote Portal!" data-placement="top">Quote Portal</a> / <span class="activePage">Today's Follow Ups</span></h5>
              </div>
              
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-8">
                      
                    </div>
                    <div class="col-lg-4" >
                      <div class="menuTabs">
                        <ul class="nav nav-tabs">
                          <li class="active"><a data-toggle="tab" href="#allLeaves">All Request</a></li>
                          <li><a data-toggle="tab" href="#Active">Active</a></li>
                          <li><a data-toggle="tab" href="#Pending">Pending</a></li>
                          <li><a data-toggle="tab" href="#Resolved">Resolved</a></li>
                        </ul>
                      </div>
                      
                    </div>
                     
                  </div>
                  
                  <style>
                  .css-serial {
                  counter-reset: serial-number;  /* Set the serial number counter to 0 */
                  }
                  .css-serial td:first-child:before {
                  counter-increment: serial-number;  /* Increment the serial number counter */
                  content: counter(serial-number);  /* Display the counter */
                  }
                  </style>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="tab-content">
                        <div id="allLeaves" class="tab-pane fade in active">
                          <table class="css-serial table table-hover" width="100%">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Quote Id</th>
                                <th>Requested By</th>
                                <th>Request On</th>
                                <th>Last Followed</th>
                                <th>Next Follow </th>
                                <th>Status</th>
                                <th>Update By</th>
                                <th>View</th>
                                <th>Update</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM  quote order by next_follow ASC LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $todaysDate = date("d/m/Y");
                              $sender_time = $rowMember['next_follow'];
                              if ($todaysDate == $sender_time) {
                               
                           
                              
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                               <td><b><?php echo $rowMember['quote_id'] ?></b></td>
                                <td><?php echo $rowMember['sender_names'] ?></td>
                                <td><?php echo $rowMember['sender_time'] ?></td>
                                <td><?php echo $rowMember['last_follow'] ?></td>
                                <td><?php echo $rowMember['next_follow'] ?></td>
                                <td><?php echo $rowMember['follow_status'] ?></td>
                                <td><?php echo $rowMember['update_by'] ?></td>
                                <td>
                                  <a href="followView.php?id=<?php echo $rowMember['id'] ?>" >
                                    <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                                  </a>
                                </td>
                                <td>
                                  <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                  </a>
                                </td>
                              </tr>
                              <?php
                              }   }
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                          <div class="row" >
                            <div class="col-lg-8 col-xs-12"  >
                              <div class="pagination" >
                                <?php
                                $query = "SELECT COUNT(*) FROM quote";
                                $rs_result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";
                                if($page>=2){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                                }
                                for ($i=1; $i<=$total_pages; $i++) {
                                if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='todayFollowUps.php?page="
                                .$i."'>".$i." </a>";
                                }
                                else  {
                                $pagLink .= "<a href='todayFollowUps.php?page=".$i."'>
                                ".$i." </a>";
                                }
                                };
                                echo $pagLink;
                                if($page<$total_pages){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <div class="pagination" style="float: right;">
                                <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Report Code Here -->
                        
                        <div id="Active" class="tab-pane">
                          <table class="css-serial table table-hover" width="100%">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Quote Id</th>
                                <th>Requested By</th>
                                <th>Request On</th>
                                <th>Last Followed</th>
                                <th>Next Follow </th>
                                <th>Status</th>
                                <th>Update By</th>
                                <th>View</th>
                                <th>Update</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM  quote order by next_follow ASC LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $flag="Active";
                              $approval = $rowMember["follow_status"];
                                 $todaysDate = date("d/m/Y");
                              $sender_time = $rowMember['next_follow'];
                              if($approval==$flag && $todaysDate==$sender_time){
                              
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                                <td><b><?php echo $rowMember['quote_id'] ?></b></td>
                                <td><?php echo $rowMember['sender_names'] ?></td>
                                <td><?php echo $rowMember['sender_time'] ?></td>
                                <td><?php echo $rowMember['last_follow'] ?></td>
                                <td><?php echo $rowMember['next_follow'] ?></td>
                                <td><?php echo $rowMember['follow_status'] ?></td>
                                <td><?php echo $rowMember['update_by'] ?></td>
                                <td>
                                  <a href="followView.php?id=<?php echo $rowMember['id'] ?>" >
                                    <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                                  </a>
                                </td>
                                <td>
                                  <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                  </a>
                                </td>
                              </tr>
                              <?php
                              }}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                          <div class="row" >
                            <div class="col-lg-8 col-xs-12"  >
                              <div class="pagination" >
                                <?php
                                $query = "SELECT COUNT(*) FROM quote";
                                $rs_result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";
                                if($page>=2){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                                }
                                for ($i=1; $i<=$total_pages; $i++) {
                                if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='todayFollowUps.php?page="
                                .$i."'>".$i." </a>";
                                }
                                else  {
                                $pagLink .= "<a href='todayFollowUps.php?page=".$i."'>
                                ".$i." </a>";
                                }
                                };
                                echo $pagLink;
                                if($page<$total_pages){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <div class="pagination" style="float: right;">
                                <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="Pending" class="tab-pane">
                          <table class="css-serial table table-hover" width="100%">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Quote Id</th>
                                <th>Requested By</th>
                                <th>Request On</th>
                                <th>Last Followed</th>
                                <th>Next Follow </th>
                                <th>Status</th>
                                <th>Update By</th>
                                <th>View</th>
                                <th>Update</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM  quote order by next_follow ASC LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $flag="In Progress";
                              $approval = $rowMember["follow_status"];
                               $todaysDate = date("d/m/Y");
                              $sender_time = $rowMember['next_follow'];
                              if($approval==$flag && $todaysDate==$sender_time){
                              
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                               <td><b><?php echo $rowMember['quote_id'] ?></b></td>
                                <td><?php echo $rowMember['sender_names'] ?></td>
                                <td><?php echo $rowMember['sender_time'] ?></td>
                                <td><?php echo $rowMember['last_follow'] ?></td>
                                <td><?php echo $rowMember['next_follow'] ?></td>
                                <td><?php echo $rowMember['follow_status'] ?></td>
                                <td><?php echo $rowMember['update_by'] ?></td>
                                <td>
                                  <a href="followView.php?id=<?php echo $rowMember['id'] ?>" >
                                    <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                                  </a>
                                </td>
                                <td>
                                  <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                  </a>
                                </td>
                              </tr>
                              <?php
                              }}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                          <div class="row" >
                            <div class="col-lg-8 col-xs-12"  >
                              <div class="pagination" >
                                <?php
                                $query = "SELECT COUNT(*) FROM quote";
                                $rs_result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";
                                if($page>=2){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                                }
                                for ($i=1; $i<=$total_pages; $i++) {
                                if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='todayFollowUps.php?page="
                                .$i."'>".$i." </a>";
                                }
                                else  {
                                $pagLink .= "<a href='todayFollowUps.php?page=".$i."'>
                                ".$i." </a>";
                                }
                                };
                                echo $pagLink;
                                if($page<$total_pages){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <div class="pagination" style="float: right;">
                                <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div id="Resolved" class="tab-pane">
                          <table class="css-serial table table-hover" width="100%">
                            <thead>
                              <tr>
                                <th>Sr. No.</th>
                                <th>Quote Id</th>
                                 
                                <th>Requested By</th>
                                <th>Request On</th>
                                <th>Last Followed</th>
                                <th>Next Follow </th>
                                <th>Status</th>
                                <th>Update By</th>
                                <th>View</th>
                                <th>Update</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM  quote order by next_follow ASC LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              $flag="Resolved";
                              $approval = $rowMember["follow_status"];
                               $todaysDate = date("d/m/Y");
                              $sender_time = $rowMember['next_follow'];
                              if($approval==$flag && $todaysDate==$sender_time){
                              
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                               <td><b><?php echo $rowMember['quote_id'] ?></b></td>
                                 
                                <td><?php echo $rowMember['sender_names'] ?></td>
                                <td><?php echo $rowMember['sender_time'] ?></td>
                                <td><?php echo $rowMember['last_follow'] ?></td>
                                <td><?php echo $rowMember['next_follow'] ?></td>
                                <td><?php echo $rowMember['follow_status'] ?></td>
                                <td><?php echo $rowMember['update_by'] ?></td>
                                <td>
                                  <a href="followView.php?id=<?php echo $rowMember['id'] ?>" >
                                    <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                                  </a>
                                </td>
                                <td>
                                  <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                                    <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil"></i></button>
                                  </a>
                                </td>
                              </tr>
                              <?php
                              }}
                              }
                              else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                              ?>
                            </tbody>
                          </table>
                          <div class="row" >
                            <div class="col-lg-8 col-xs-12"  >
                              <div class="pagination" >
                                <?php
                                $query = "SELECT COUNT(*) FROM quote";
                                $rs_result = mysqli_query($connect, $query);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];
                                // Number of pages required.
                                $total_pages = ceil($total_records / $per_page_record);
                                $pagLink = "";
                                if($page>=2){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                                }
                                for ($i=1; $i<=$total_pages; $i++) {
                                if ($i == $page) {
                                $pagLink .= "<a class = 'active' href='todayFollowUps.php?page="
                                .$i."'>".$i." </a>";
                                }
                                else  {
                                $pagLink .= "<a href='todayFollowUps.php?page=".$i."'>
                                ".$i." </a>";
                                }
                                };
                                echo $pagLink;
                                if($page<$total_pages){
                                echo "<a style='border:none;' href='todayFollowUps.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-lg-4 col-xs-12" >
                              <div class="pagination" style="float: right;">
                                <h6>Total Pages : <?php echo $page." / ".$total_pages; ?></h6>
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
          </div>
        </div>
      </div>
    </body>
  </html>
  <script>
  function printDivSection(setion_id) {
  var Contents_Section = document.getElementById(setion_id).innerHTML;
  var originalContents = document.body.innerHTML;
  document.body.innerHTML = Contents_Section;
  window.print();
  document.body.innerHTML = originalContents;
  }
  </script>