<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from employee_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from employee_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="emp_Index.php"; }, 1000);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  </title>
  <head>
  </head>
  <title>Employees Portal</title>
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Employees Portal</span></h5>
              </div>
              <div class="bodyComponent">
                <div class="row">
                  
                  <?php
                  include_once 'db.php';
                  $resultUser = mysqli_query($connect,"SELECT COUNT(id) FROM  employee_login ");
                  while($rowUser = mysqli_fetch_array($resultUser))  {
                  ?>
                  <div class="col-lg-4 col-xs-6">
                    <div class="widgetsReport">
                      <div class="well">
                        <div class="rectContent">
                          <h4 id="total"><?php echo $rowUser[0] ?></h4>
                          <p>Employees</p>
                          <a href="all_Emp_List.php"><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp Employees Report</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php
                  }
                  ?>
                  <div class="col-lg-8"></div>
 
                </div><br>
                <style>
                  .widgetsReport .well
                  {
                    padding-bottom: 5px;
                    margin-bottom: 0px;
                  }
                </style>
                <div id="print_setion">
                  <div class="courierAddComponent">
                    <?php
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
                    ?> <style>
                    .rectLongContent .rectWidget .well p{text-align: left;line-height: 20px;}
                    .rectLongContent .rectWidget .well i{font-size: 0.8em;margin-top: 0px;}
                    </style>
                    <div class="rectLongContent">
                      <div class="rectWidget">
                        <div class="well">
                          <div class="row">
                             <div class="col-lg-1">
                                <span> 
                                  <a  class="actionIcon" href="emp_View.php?id=<?php echo $rowMember['id'] ?>">
                                    <i class="fa fa-eye"></i>
                                  </a></span>
                                </div>
                            <div class="col-lg-2">
                              <a href="emp_view.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><p>Emp Id. - <?php echo $rowMember['employees_id'] ?>
                              </p></a>
                            </div>
                            <div class="col-lg-3">
                              <p>Name- <?php echo $rowMember['Fullname'] ?></p>
                              <p>D.O.B. - <?php echo $rowMember['dob'] ?> </p>
                              
                            </div>
                            <div class="col-lg-2">
                              <p>Contact - <?php echo $rowMember['mobile'] ?></p>
                              <p>Joining Date - <?php echo $rowMember['joiningDate'] ?></p>
                            </div>
                            <div class="col-lg-3">
                              <p>Aadhar No. - <?php echo $rowMember['aadhar_num'] ?></p>
                              <p>PAN No. - <?php echo $rowMember['pan_num'] ?></p>
                            </div>
                           
                              <div class="col-lg-1">
                                <span> 
                                  <a  class="actionIcon" href="emp_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                                    <i class="fa fa-trash-o"></i>
                                  </a></span>
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
                              echo "<a style='border:none;' href='emp_Index.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                              }
                              for ($i=1; $i<=$total_pages; $i++) {
                              if ($i == $page) {
                              $pagLink .= "<a class = 'active' href='emp_Index.php?page="
                              .$i."'>".$i." </a>";
                              }
                              else  {
                              $pagLink .= "<a href='emp_Index.php?page=".$i."'>
                              ".$i." </a>";
                              }
                              };
                              echo $pagLink;
                              if($page<$total_pages){
                              echo "<a style='border:none;' href='emp_Index.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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