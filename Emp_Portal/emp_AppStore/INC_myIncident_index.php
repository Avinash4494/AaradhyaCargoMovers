<?php
require_once('../db.php');
include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Service Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <?php include_once '../rightTopPannel.php' ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="paggignation">
            <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> /<a href="myHelpline_index.php" data-toggle="tooltip" title="My Helpline!" data-placement="top">myHelpline</a> / <span class="activePage">My Incidents</span></h5>
          </div>
        </div>
        <div class="col-lg-7">
          <?php include_once 'topLeftService.php' ?>
        </div>
      </div>
      <h3>My Incidents</h3>
      <div class="row">
        <div class="col-lg-12">
          <div class="compLeftApplet">            
               <table class="css-serial table table-hover" width="100%">
                <style>
                .css-serial {
                counter-reset: serial-number;  /* Set the serial number counter to 0 */
                }
                .css-serial td:first-child:before {
                counter-increment: serial-number;  /* Increment the serial number counter */
                content: counter(serial-number);  /* Display the counter */
                }
                </style>
                <thead >
                  <tr>
                    <th>Sr. No.</th>
                    <th>Request Number</th>
                    <th>Ticket Description</th>
                    <th>Requested By</th>
                    <th>State</th>
                    <th>Reason</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Updated On</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $per_page_record = 10;
                  if (isset($_GET["page"])) {
                  $page  = $_GET["page"];
                  }
                  else {
                  $page=1;
                  }
                  $start_from = ($page-1) * $per_page_record;
                  $query = "SELECT * FROM raise_inc_infra  WHERE employees_id='$employees_id' LIMIT $start_from, $per_page_record ";
                  $rs_result = mysqli_query ($connect, $query);
                  ?>
                  <?php
                  if(mysqli_num_rows($rs_result)){
                  while ($rowMember = mysqli_fetch_array($rs_result)) {
                  
                  $employees_id = $rowMember['employees_id'];
                  if ($employees_id==$employees_id) {
                  
                  ?>
                  <tr>
                    <p hidden=""><?php echo $rowMember['id'] ?></p>
                    <td ></td>
                    <td><b><a style="color: black;" href="INC_new_index.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['request_id'] ?></a></b></td>
                    <td width="450px"><?php echo $rowMember['issue_reason'] ?></td>
                    <td><?php echo $rowMember['raised_for'] ?></td>
                    <td><?php echo $rowMember['tktState'] ?></td>
                    <td><?php echo $rowMember['remarks'] ?> Nos</td>
                    <td><?php echo $rowMember['raised_on'] ?></td>
                    
                    <td style="color: #BA4A00;"><b><?php echo $rowMember['req_status'] ?></b></td>
                    <td ><?php echo $rowMember['updated_on'] ?></td>
                  </tr>
                  <?php
                  }}
                  }
                  else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                  ?>
                </tbody>
              </table>
                    
                  <div class="row" >
                    <div class="col-lg-8 col-xs-12"  >
                      <div class="pagination" >
                        <?php
                        $query = "SELECT COUNT(*) FROM raise_inc_infra";
                        $rs_result = mysqli_query($connect, $query);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];
                        // Number of pages required.
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";
                        if($page>=2){
                        echo "<a style='border:none;' href='INC_myIncident_index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                        }
                        for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                        $pagLink .= "<a class = 'active' href='INC_myIncident_index.php?page="
                        .$i."'>".$i." </a>";
                        }
                        else  {
                        $pagLink .= "<a href='INC_myIncident_index.php?page=".$i."'>
                        ".$i." </a>";
                        }
                        };
                        echo $pagLink;
                        if($page<$total_pages){
                        echo "<a style='border:none;' href='INC_myIncident_index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
    
    
  </body>
</html>
