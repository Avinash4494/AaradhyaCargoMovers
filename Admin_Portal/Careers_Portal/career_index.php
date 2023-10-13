<?php
include('db.php');
$upload_dir = 'uploads/employees-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from create_job where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from create_job where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="career_index.php"; }, 1000);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
 </title>
  <head>
  </head>
    <title>Careers Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
    <?php include_once 'rightTopPannel.php' ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-2">
          <div class="leftPannel">
            <div class="empty-left-Index-comTop"></div>
<?php include_once 'toLeftCareers.php' ?>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="rightPannel">
            <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Careers Portal</span></h5>
            </div>
            <div class="row">
               
                 <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  create_job ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                    <div class="col-lg-6 col-xs-6">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                           <h4 id="total"><?php echo $rowUser[0] ?></h4>
                           <p>Total Openings</p>
                            <a href="all_Employees_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Openings Report</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  create_job ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                     <div class="col-lg-6 col-xs-6">
                      <div class="widgetsReport">
                        <div class="well">
                          <div class="rectContent">
                            <h4 id="total"><?php echo $rowUser[0] ?></h4>
                            <p>All Jobs</p>
                            <a href="all_Members_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Jobs Report</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
            </div>
            <div id="print_setion">
              <h4>Employees List</h4>
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
                        <th>Job Id</th>
                        <th>Location</th>
                        <th>Job Title</th>
                        <th>Total Post</th>
                        <th>Starts On</th>
                        <th>Ends_On</th>
                        <th>Published On</th>
                        <th>Experience</th>                        
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require_once "db.php";
                      $upload_dir = 'uploads/employees-uploads/';
                      $per_page_record = 5;
                      if (isset($_GET["page"])) {
                      $page  = $_GET["page"];
                      }
                      else {
                      $page=1;
                      }
                      $start_from = ($page-1) * $per_page_record;
                      $query = "SELECT * FROM create_job  LIMIT $start_from, $per_page_record ";
                      $rs_result = mysqli_query ($connect, $query);
                      ?>
                      <?php
                      if(mysqli_num_rows($rs_result)){
                      while ($rowMember = mysqli_fetch_array($rs_result)) {
                      ?>
                      <tr>
                        
                        <p hidden=""><?php echo $rowMember['id'] ?></p>
                        <td ></td>
                          
                        <td><b><a style="color: black;" href="career_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['job_id'] ?></a></b></td>
                        <td><?php echo $rowMember['job_location'] ?></td>
                        <td><?php echo $rowMember['job_title'] ?></td>
                        <td><?php echo $rowMember['total_post'] ?></td>
                        <td><?php echo $rowMember['starts_on'] ?></td>
                        <td><?php echo $rowMember['ends_on'] ?></td>
                        <td><?php echo $rowMember['published_on'] ?></td>
                         <td><?php echo $rowMember['experience'] ?> Yrs</td>
                      
                        <td>
                          <a href="employees_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                            <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                          </a>
                        </td>
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
 