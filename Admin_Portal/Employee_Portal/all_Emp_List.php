 
<?php 
include('db.php');
include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Employees Portal</title>
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
              <?php include_once 'toLeftMembers.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="emp_Index.php" data-toggle="tooltip" title="Employees Portal!" data-placement="top" >Employees Portal</a> / <span class="activePage">All Employees </span> </h5>
              </div>
              <div class="bodyComponent">
                <div id="print_setion">
                  
                  <div class="row">
                    <div class="col-lg-11">
                      
                    </div>
                    <div class="col-lg-1">
                      <a href="AllemployeesReport.php">
                        <button class="actionButtonIcons-center" style="margin-top: -25px;" type="submit"><i class="fa fa-print"></i></button>
                      </a>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12">
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
                            <th>Emp Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Experience</th>
                            <th>PAN Number</th>
                            <th>Gender</th>
                            <th>Aadhar Number</th>
                            <th>Joining Date</th>
                            <th>Degree</th>
                             
<!--                             <th>Edit</th> -->
<!--                             <th>Delete</th> -->
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
                          $query = "SELECT * FROM employee_login  LIMIT $start_from, $per_page_record ";
                          $rs_result = mysqli_query ($connect, $query);
                          ?>
                          <?php
                          if(mysqli_num_rows($rs_result)){
                          while ($rowMember = mysqli_fetch_array($rs_result)) {
                          ?>
                          <tr>
                            
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td ></td>
                            <td><b><a style="color: black;" href="emp_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['employees_id'] ?></a></b></td>
                            <td><?php echo $rowMember['Fullname'] ?></td>
                            <td><?php echo $rowMember['mobile'] ?></td>
                            <td><?php echo $rowMember['Email'] ?></td>
                            <td><?php echo $rowMember['dob'] ?></td>
                            <td><?php echo $rowMember['pan_num'] ?></td>
                            <td><?php echo $rowMember['gender'] ?></td>
                            <td><?php echo $rowMember['aadhar_num'] ?></td>
                            <td><?php echo $rowMember['joiningDate'] ?></td>
                            <td><?php echo $rowMember['col_degree'] ?></td>
                              
                          </tr>
                          <?php
                          }
                          }
                          else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                          ?>
                        </tbody>
                      </table>
                      <div class="row" >
                        <div class="col-lg-8 col-xs-12"  >
                          <div class="pagination" >
                            <?php
                            $query = "SELECT COUNT(*) FROM employee_login";
                            $rs_result = mysqli_query($connect, $query);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];
                            // Number of pages required.
                            $total_pages = ceil($total_records / $per_page_record);
                            $pagLink = "";
                            if($page>=2){
                            echo "<a style='border:none;' href='all_Emp_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                            }
                            for ($i=1; $i<=$total_pages; $i++) {
                            if ($i == $page) {
                            $pagLink .= "<a class = 'active' href='all_Emp_List.php?page="
                            .$i."'>".$i." </a>";
                            }
                            else  {
                            $pagLink .= "<a href='all_Emp_List.php?page=".$i."'>
                            ".$i." </a>";
                            }
                            };
                            echo $pagLink;
                            if($page<$total_pages){
                            echo "<a style='border:none;' href='all_Emp_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>