<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from quote where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row_profile = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?> 

<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Quote Report</title>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="quote_index.php" data-toggle="tooltip" title="Quote Portal!" data-placement="top">Quote Portal</a> / <span class="activePage">Quote View</span></h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent viewComp">
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      <h4>Requested Quote</h4>
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3">
                      <p><b>Quote Id -</b> <?php echo $row_profile['quote_id'] ?></p>
                      <p><b>Reqested On -</b> <?php echo $row_profile['sender_time'] ?></p>
                    </div>
                    <div class="col-lg-3">
                      <p><b>Name -</b> <?php echo $row_profile['sender_names'] ?></p>
                       <p><b>Email -</b> <?php echo $row_profile['sender_email'] ?></p>
                     
                    </div>
                    <div class="col-lg-2">
                      <p><b>Mode By -</b> <?php echo $row_profile['sender_freight_type'] ?></p>
                      <p><b>Weight -</b> <?php echo $row_profile['sender_weight'] ?>.00 Kg</p>
                    </div>
                    <div class="col-lg-2">
                      <p><b>From -</b> <?php echo $row_profile['sender_fstate'] ?></p>
                      <p><b>To -</b> <?php echo $row_profile['sender_tstate'] ?></p>
                    </div>
                    <div class="col-lg-2">
                      <p><b>Contact -</b> <?php echo $row_profile['sender_phone'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
                      <p><b>Message -</b> <?php echo $row_profile['sender_message'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      <h4>Quote Status</h4>
                    </div>
                     
                    <div class="col-lg-1 col-xs-3">

                                  <?php
                          $courCheck = $row_profile['follow_status'];
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
                            
                            <a href="quote_edit.php?id=<?php echo $row_profile['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                            </a>
                          
                          <?php }?>
 
                    </div>
                  </div>
                  <?php
                  $per_page_record = 8;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                      $quote_id = $row_profile['quote_id'];
                       $query = 'SELECT * FROM quote where quote_id = "'.$quote_id.'" ' ;
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowFollow = mysqli_fetch_array($rs_result)) {
                  // Display each field of the records.
                   $quote_id = $rowFollow['quote_id'];
                  if ($quote_id==$quote_id) {
                  ?>
                <div class="row">
                            <div class="col-lg-2 col-xs-12" >
                              <p><b>Quote Id :</b> <?php echo $rowFollow['quote_id'] ?></p>
                              <p><b>Contact :</b> <?php echo $rowFollow['sender_phone'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p><b>Requested By : </b><?php echo $rowFollow['sender_names'] ?></p>
                              <p><b>Email : </b><?php echo $rowFollow['sender_email'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p><b>Requested On : </b><?php echo $rowFollow['sender_time'] ?></p>
                              <p><b>Last Updated On : </b><?php echo $rowFollow['last_follow'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p><b>Current Status :</b> <?php echo $rowFollow['follow_status'] ?></p>
                              <p><b>Last Updated By : </b><?php echo $rowFollow['update_by'] ?></p>
                            </div>
                          </div>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
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