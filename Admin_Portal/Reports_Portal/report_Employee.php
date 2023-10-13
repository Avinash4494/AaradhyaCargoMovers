<?php include('db.php'); ?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Reports Portal</title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="report_index.php" data-toggle="tooltip" title="Reports Portal!" data-placement="top" >Reports Portal</a> / <span class="activePage"> Employees Report</span> </h5>
              </div>
              
              <div class="bodyComponentReport">
                <div class="row">
                  <div class="col-lg-11 col-xs-9">
                  </div>
                  <div class="col-lg-1 col-xs-3">
                    <a href="report_Employee.php">
                      <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                    </a>
                  </div>
                </div>
                <div id="print_setion">
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
                            <th>Emp. Id</th>
                            <th>User Id</th>
                            <th>Designation</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Location</th>
                            <th>D.O.B</th>
                            <th>Joining Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $per_page_record = 15;
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
                          // Display each field of the records.
                          
                          ?>
                          <tr>
                            <p hidden=""><?php echo $rowMember['id'] ?></p>
                            <td ></td>
                            <td><b><a style="color: black;" href="../Employee_Portal/emp_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['employees_id'] ?></a></b></td>
                            <td><?php echo $rowMember['random_user_id'] ?></td>
                            <td><?php echo $rowMember['offc_desig'] ?></td>
                            <td><?php echo $rowMember['Fullname'] ?></td>
                            <td><?php echo $rowMember['mobile'] ?></td>
                            <td><?php echo $rowMember['Email'] ?></td>
                            <td><?php echo $rowMember['offc_location'] ?></td>
                            <td><?php echo $rowMember['dob'] ?></td>
                            <td><?php echo $rowMember['joiningDate'] ?></td>
                        </tr>
                        <?php
                        }
                        }
                        else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1em;">No Record Found</h3>';}
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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
                    echo "<a style='border:none;' href='report_Employee.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                    }
                    for ($i=1; $i<=$total_pages; $i++) {
                    if ($i == $page) {
                    $pagLink .= "<a class = 'active' href='report_Employee.php?page="
                    .$i."'>".$i." </a>";
                    }
                    else  {
                    $pagLink .= "<a href='report_Employee.php?page=".$i."'>
                    ".$i." </a>";
                    }
                    };
                    echo $pagLink;
                    if($page<$total_pages){
                    echo "<a style='border:none;' href='report_Employee.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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