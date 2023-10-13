<!DOCTYPE html>
<html>
  <title>Enquiry Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
<?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <!-- <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
              <div class="left-compTop">
                <a href="member_Index.php"><button class="actionButtonIcons" type="submit">Home</button></a>
                <a href="member_Add.php"><button class="actionButtonIcons" type="submit">Add Member</button></a>
                <a href="all_Members_List.php"><button class="actionButtonIcons" type="submit">All Member Lists</button></a>
                <a href="member_search.php"><button class="actionButtonIcons" type="submit">Search</button></a>
              </div>
            </div>
          </div> -->
          <div class="col-lg-12">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="enquiry_index.php" data-toggle="tooltip" title="Enquiry Portal!" data-placement="top" >Enquiry Portal</a> / <span class="activePage"> Enquiry Report</span> </h5>
              </div>
              
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Enquiry Report Details</h4>
                  </div>
                  <div class="col-lg-1">
                    <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
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
                                <th>Enquiry Id</th>
                                <th>Name</th>
                               
                                <th>Email</th>
                                 <th>Mobile Number</th>
                                <th>Enquiry Date</th>
                                <th>Message</th>
<!--                                 <th>Message Update</th> -->
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              require_once "db.php";
                              $per_page_record = 5;
                              if (isset($_GET["page"])) {
                              $page  = $_GET["page"];
                              }
                              else {
                              $page=1;
                              }
                              $start_from = ($page-1) * $per_page_record;
                              $query = "SELECT * FROM enquiry_member order by tDate LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              // Display each field of the records.
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td></td>
                                <td><?php echo $rowMember['enquiry_id'] ?></td>
                                <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
                                <td><?php echo $rowMember['email'] ?></td>
                                <td><?php echo $rowMember['phone'] ?></td>                              <td><?php echo $rowMember['tDate'] ?></td>
                                <td><?php echo $rowMember['remarks'] ?></td>
                               
                                <td><a href="enquiry_View.php?id=<?php echo $rowMember['id'] ?>" ><button class="actionButton" type="submit">View</button></a></td>
                                <!-- <td><a href="enquiry_followUps.php?id=<?php echo $rowMember['id'] ?>" >
                 <button class="actionButton" type="submit">Update</button></a></td> -->
                                    
                               
                            </tr>
                            <?php
                            }
                            }
                            else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                            ?>
                          </tbody>
                    </table>
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