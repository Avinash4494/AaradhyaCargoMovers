<?php
include('db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from admin_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from admin_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="approval_access.php"; }, 1000);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Accounts Portal</title>
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
              <?php include_once 'toLeftAccounts.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignationComp">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="paggignation">
                      <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="admin_index.php" data-toggle="tooltip" title="Accounts Portal!" data-placement="top" ></a>Accounts Portal /<span class="activePage"> Admin Access</span> </h5>
                    </div>
                  </div>
                  <style>
                  .paggignationComp h5{margin: 0px;padding-top: 15px;}
                  .paggignationComp .actionButtonIcons
                  {
                  text-align: center;
                  margin-top: 7px;
                  }
                  </style>
                  <div class="col-lg-2">
                      <button class="actionButtonIcons" style="background-color: white;color: #1c2833;border:1px solid #1c2833;" type="submit"><i class="fa fa-user"></i>&nbsp &nbsp Admin Access</button>
                  </div>
                  <div class="col-lg-2">
                    <a href="emp_access.php">
                      <button class="actionButtonIcons" style="border:1px solid #1c2833;" type="submit"><i class="fa fa-briefcase"></i>&nbsp &nbsp Employee Access</button>
                    </a>
                  </div>
                </div>
              </div>
              <div id="print_setion">
                <div class="bodyComponent">
                  <!--                   <div class="row">
                    <div class="col-lg-11 col-xs-9">
                      
                    </div>
                    <div class="col-lg-1 col-xs-3">
                      <a href="receipt_report_quote.php">
                        <button class="actionButtonIcons-center" type="submit"><i class="fa fa-print"></i></button>
                      </a>
                    </div>
                  </div> -->
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
                            <th>Username</th>
                            <th>Admin Id</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>D.O.B.</th>
                            <th>Access Type</th>
                            <th>Login Access</th>
                            <th>Edit</th>
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
                          $query = "SELECT * FROM admin_login  LIMIT $start_from, $per_page_record ";
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
                            <td><b><a style="color: black;" href="account_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['random_user_id'] ?></a></b></td>
                            <td><?php echo $rowMember['admin_id'] ?></td>
                            <td><?php echo $rowMember['Fullname'] ?></td>
                            <td><?php echo $rowMember['mobile'] ?></td>
                            <td><?php echo $rowMember['Email'] ?></td>
                            <td><?php echo $rowMember['dob'] ?></td>
                            <td><?php echo $rowMember['auth_type'] ?></td>
                            
                            <td><button class="actionButtonIcons-center" type="submit"><?php echo $rowMember['auth_status'] ?></button></td>
                            <td>
                              
                              <a href="approval_edit.php?id=<?php echo $rowMember['id'] ?>">
                                <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-pencil" style="padding: 3px;"></i></button>
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
                  <div class="row" >
                    <div class="col-lg-8 col-xs-12"  >
                      <div class="pagination" >
                        <?php
                        $query = "SELECT COUNT(*) FROM admin_login";
                        $rs_result = mysqli_query($connect, $query);
                        $row = mysqli_fetch_row($rs_result);
                        $total_records = $row[0];
                        // Number of pages required.
                        $total_pages = ceil($total_records / $per_page_record);
                        $pagLink = "";
                        if($page>=2){
                        echo "<a style='border:none;' href='All_Couriers_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                        }
                        for ($i=1; $i<=$total_pages; $i++) {
                        if ($i == $page) {
                        $pagLink .= "<a class = 'active' href='All_Couriers_List.php?page="
                        .$i."'>".$i." </a>";
                        }
                        else  {
                        $pagLink .= "<a href='All_Couriers_List.php?page=".$i."'>
                        ".$i." </a>";
                        }
                        };
                        echo $pagLink;
                        if($page<$total_pages){
                        echo "<a style='border:none;' href='All_Couriers_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>