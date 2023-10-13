<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Quote Portal</title>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Quote Portal</span></h5>
              </div>
              <div class="courierAddComponent">
                <div class="row">
                  <?php
                  include_once '../db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  quote ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
              <a href="All_Quote_List.php">
                    <div class="col-lg-6 col-xs-12">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Total Quote</p>
                          <p> <a href="All_Quote_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Quote Report</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
              </a>
                  <?php
                  }
                  ?>
                  <?php
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  quote ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
<a href="todayRequest.php">
                    <div class="col-lg-6 col-xs-12">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Latest Follow Ups</p>
                          <p><a href="followUpsReport.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Follow Ups Report</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
</a>
                  <?php
                  }
                  ?>
                </div>
                <div class="bodyComponent hidden-xs">
                  <div id="print_setion">
                    <div class="row">
                      <div class="col-lg-12">
                        <?php
                        $per_page_record = 4;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM quote  LIMIT $start_from, $per_page_record ";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMember = mysqli_fetch_array($rs_result)) {
                        ?>
                        <div class="rectLongContent">
                          <div class="rectWidget">
                            <div class="well">
                              <div class="row">
                                <div class="col-lg-11 col-xs-9">
                                  <div class="row">
                                    <div class="col-lg-2">
                                      <a href="quote_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><p class="quote_id">Quote Id - <?php echo $rowMember['quote_id'] ?>
                                      </p></a>
                                      
                                      
                                    </div>
                                    <div class="col-lg-2">
                                      <p>Name - <?php echo $rowMember['sender_names'] ?></p>
                                      <p>Contact - <?php echo $rowMember['sender_phone'] ?></p>
                                      
                                    </div>
                                    <div class="col-lg-3">
                                      
                                      <p>Mode By - <?php echo $rowMember['sender_freight_type'] ?></p>
                                      <p>Weight - <?php echo $rowMember['sender_weight'] ?>.00 Kg</p>
                                      
                                    </div>
                                    <div class="col-lg-2">
                                      
                                      <p>From - <?php echo $rowMember['sender_fstate'] ?></p>
                                      <p>To - <?php echo $rowMember['sender_tstate'] ?></p>
                                      
                                    </div>
                                    <div class="col-lg-3">
                                      <p>Email - <?php echo $rowMember['sender_email'] ?></p>
                                      <p>Status - <?php echo $rowMember['follow_status'] ?></p>
                                      
                                    </div>
                                    
                                    
                                  </div>
                                </div>
                                <div class="col-lg-1 col-xs-3">
                                  <?php
                                  $courCheck = $rowMember['follow_status'];
                                  $ActiveCheck = "Active";
                                  $inProgCheck  = "In Progress";
                                  $resolvedCheck  = "Resolved";
                                  if ($courCheck==$resolvedCheck) {
                                  ?>
                                  <a href="javascript: void(0)">
                                    <button style="background-color: green;" class="actionButtonIcons-center"  type="submit">  <i class="fa fa-check" style="color: white;"></i></button>
                                  </a>
                                  <?php
                                  }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                                  
                                
                                    <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                      <button  class="actionButtonIcons-center"  type="submit"><i class="fa fa-pencil"></i></button>
                                    </a> 
                                    <style>
                                      .actionButtonIcons-center{
                                        background-color: white;
                                        color: #1c2833;
                                      }
                                    </style>
                                    <?php }?>
                                    
                                  </div>
                                </div>
                                
                                <div class="row">
                                  <div class="col-lg-2">
                                    <p>Reqested On - <?php echo $rowMember['sender_time'] ?></p>
                                  </div>
                                  <div class="col-lg-10">
                                    <p>Message - <?php echo $rowMember['sender_message'] ?></p>
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
                          echo "<a style='border:none;' href='quote_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                          }
                          for ($i=1; $i<=$total_pages; $i++) {
                          if ($i == $page) {
                          $pagLink .= "<a class = 'active' href='quote_index.php?page="
                          .$i."'>".$i." </a>";
                          }
                          else  {
                          $pagLink .= "<a href='quote_index.php?page=".$i."'>
                          ".$i." </a>";
                          }
                          };
                          echo $pagLink;
                          if($page<$total_pages){
                          echo "<a style='border:none;' href='quote_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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