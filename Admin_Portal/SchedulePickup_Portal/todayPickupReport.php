<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Quote Portal</title>
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
              <?php include_once 'toLeftPickup.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="pickup_index.php" data-toggle="tooltip" title="Pickup Portal!" data-placement="top">Pickup Portal</a> / <span class="activePage">Latest Requests</span></h5>
              </div>
              <div class="smallComp hidden-lg">
                <?php
                $per_page_record = 5;
                if (isset($_GET["page"])) {
                $page  = $_GET["page"];
                }
                else {
                $page=1;
                }
                $start_from = ($page-1) * $per_page_record;
                $query = "SELECT * FROM quote order by sender_time ASC LIMIT $start_from, $per_page_record ";
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowMember = mysqli_fetch_array($rs_result)) {
                $sender_time = $rowMember['sender_time'];
                $todaysDate = date("d/m/Y");
                if($sender_time==$todaysDate){
                // Display each field of the records.
                ?>
                <div class="rectLongContent" style="margin-top: -15px;padding-bottom: 15px;">
                  <div class="rectWidge" >
                    <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
                      <div class="row">
                        <div class="col-xs-7">
                          <b><h6 style="margin:0px;font-size: 1em;"><a style="color: black;" href="courier_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"> Quote Id. : <?php echo $rowMember['quote_id'] ?></a></h6></b>
                        </div>
                        <div class="col-xs-5">
                          <?php
                          $courStatus = $rowMember['follow_status'];
                          $flag = " ";
                          $Active = "Active";
                          $inProg  = "In Progress";
                          $Resolved = "Resolved";
                          if ($courStatus==$Active) {
                          ?>
                          <h6  style="margin:0px;"><i class="fa fa-circle" style="color: #FF940B ;"></i>&nbsp Active</h6>
                          <?php
                          }
                          else if($courStatus == $inProg)
                          {
                          ?>
                          <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0BFFCB ;"></i> &nbsp In Progress</h6>
                          <?php
                          }
                          else if($courStatus == $Resolved)
                          {
                          ?>
                          <h6 style="margin:0px;"><i class="fa fa-circle" style="color: #0CFDA9;"></i> &nbsp Resolved</h6>
                          <?php
                          }
                          else
                          {
                          ?>
                          <h6 style="margin:0px;"><i class="fa fa-circle" style="color: green;"></i> &nbsp Pending</h6>
                          <?php
                          }
                          ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-xs-12">
                          <h5><b>Name</b> - <?php echo $rowMember['sender_names'] ?></h5>
                          <h5><b>Requested On</b> - <?php echo $rowMember['sender_time'] ?></h5>
                          <h5><b>Mobile No.</b> - <?php echo $rowMember['sender_phone'] ?></h5>
                          <h5 ><b>Email</b> - <?php echo $rowMember['sender_email'] ?></h5>
                          <h5><b>From</b> - <?php echo $rowMember['sender_fstate'] ?></h5>
                          <h5><b>To</b> - <?php echo $rowMember['sender_tstate'] ?></h5>
                        </div>
                      </div>
                      
                      <div class="buttonComp" style="margin-top: 10px;">
                        <div class="row">
                          <div class="col-xs-4">
                            <a href="quote_View.php?id=<?php echo $rowMember['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-eye"></i></button>
                            </a>
                          </div>
                         <?php
                          $courCheck = $rowMember['follow_status'];
                          $ActiveCheck = "Active";
                          $inProgCheck  = "In Progress";
                          $resolvedCheck  = "Resolved";
                          if ($courCheck==$resolvedCheck) {
                          ?>
                         <?php
                          }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                            <div class="col-xs-4">
                            <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                            </a>
                          </div>
                          <?php }?>
                           
                          <div class="col-xs-4">
                            <a href="All_Quote_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                              <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                            </a>
                          </div>
                        </div>
                      </div>
                      
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
                      echo "<a style='border:none;' href='todayRequest.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='todayRequest.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='todayRequest.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='todayRequest.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
                <?php
                } 
                }
                }
                else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                ?>
              </div>
              <div id="print_setion" class="hidden-xs">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-11">
                      
                    </div>
                    <div class="col-lg-1">
                      <button style="margin-top: -25px;" class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
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
                      <!-- Report Code Here -->
                      <table class="css-serial table table-hover" width="100%">
                        <thead>
                          <tr>
                            <th>Sr. No.</th>
                            <th>Quote Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Weight</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Reqested On</th>
                            <th>Status</th>
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
                          $query = "SELECT * FROM quote order by sender_time ASC LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          $sender_time = $rowMember['sender_time'];
                          $todaysDate = date("d/m/Y");
                          if($sender_time==$todaysDate){
                          // Display each field of the records.
                          ?>
                          <tr>
                            
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td></td>
                            <td><b><?php echo $rowMember['quote_id'] ?></b></td>
                            <td><?php echo $rowMember['sender_names'] ?></td>
                            <td><?php echo $rowMember['sender_email'] ?></td>
                            <td><?php echo $rowMember['sender_phone'] ?></td>
                            <td><?php echo $rowMember['sender_weight'] ?> Kg</td>
                            <td><?php echo $rowMember['sender_fstate'] ?></td>
                            <td><?php echo $rowMember['sender_tstate'] ?></td>
                            <td><?php echo $rowMember['sender_time'] ?></td>
                            <td><?php echo $rowMember['follow_status'] ?></td>
                            <td>
                              <a href="quote_View.php?id=<?php echo $rowMember['id'] ?>" >
                                <button class="actionButtonIcons-center" type="submit"><i class="fa fa-eye"></i></button>
                              </a>
                            </td>
                            <td>
                                  <?php
                          $courCheck = $rowMember['follow_status'];
                          $ActiveCheck = "Active";
                          $inProgCheck  = "In Progress";
                          $resolvedCheck  = "Resolved";
                          if ($courCheck==$resolvedCheck) {

                          ?>
<a href="javascript: void(0)">
                              <button style="background-color: green;" class="actionButtonIcons-center"  type="submit">  <i class="fa fa-ban" style="color: white;"></i></button>
                            </a>
                         <?php
                          }else if($courCheck=='' || $courCheck==$ActiveCheck || $courCheck==$inProgCheck ){?>
                            
                            <a href="quote_edit.php?id=<?php echo $rowMember['id'] ?>">
                              <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                            </a>
                          
                          <?php }?>
                              
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
                            echo "<a style='border:none;' href='todayRequest.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                            if ($i == $page) {
                            $pagLink .= "<a class = 'active' href='todayRequest.php?page="
                            .$i."'>".$i." </a>";
                            }
                            else  {
                            $pagLink .= "<a href='todayRequest.php?page=".$i."'>
                            ".$i." </a>";
                            }
                            };
                            echo $pagLink;
                            if($page<$total_pages){
                            echo "<a style='border:none;' href='todayRequest.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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