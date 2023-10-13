<?php
include('db.php');
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from user_login where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from user_login where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="member_Index.php"; }, 1000);
</script>';
}
}
}
?>
<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html>
  <title>Member Portal</title>
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
              <div class="row">
                <div class="col-lg-10">
                  <div class="paggignation">
                    <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Member List</span> </h5>
                  </div>
                </div>
                <div class="col-lg-2">
                  <a href="memPrint_All.php">
                    <button class="actionButtonIcons-center" style="margin-top: 5px;" type="submit">View All</button>
                  </a>
                </div>
              </div>
              <div class="bodyComponent">
<div class="tableData">
                  <div class="row">
                  <div class="col-lg-12">
                    <table class="table table-hover" style="margin-top: 0px;" width="100%">
                      <thead >
                        <tr>
                          <th>User Id</th>
                          <th>Username</th>
                          <th>GSTIN.</th>
                          <th>Coy. Contact</th>
                          <th>Coy. Name</th>
                          <th>Coy, Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once "db.php";
                        $per_page_record = 15;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $query = "SELECT * FROM user_login  LIMIT $start_from, $per_page_record ";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMember = mysqli_fetch_array($rs_result)) {
                        ?>
                        <tr>
                          <p hidden=""><?php echo $rowMember['id'] ?></p>
                          <td><b><a style="color: black;" href="member_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['user_id'] ?></a></b></td>
                          <td><?php echo $rowMember['Fullname'] ?></td>
                          <td><?php echo $rowMember['coy_gstin'] ?></td>
                          <td><?php echo $rowMember['coy_phone'] ?></td>
                          <td><?php echo $rowMember['coy_name'] ?></td>
                          <td><?php echo $rowMember['coy_address_1'] ?>,
                          <?php echo $rowMember['coy_address_2'] ?>,<?php echo $rowMember['coy_city'] ?>,<?php echo $rowMember['coy_state'] ?>,<?php echo $rowMember['coy_pin'] ?></td>
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
                <div class="row" >
                  <div class="col-lg-8 col-xs-12"  >
                    <div class="pagination" >
                      <?php
                      $query = "SELECT COUNT(*) FROM user_login";
                      $rs_result = mysqli_query($connect, $query);
                      $row = mysqli_fetch_row($rs_result);
                      $total_records = $row[0];
                      // Number of pages required.
                      $total_pages = ceil($total_records / $per_page_record);
                      $pagLink = "";
                      if($page>=2){
                      echo "<a style='border:none;' href='all_Members_List.php?page=".($page-1)."'>  <i class='fa fa-backward'></i> </a>";
                      }
                      for ($i=1; $i<=$total_pages; $i++) {
                      if ($i == $page) {
                      $pagLink .= "<a class = 'active' href='all_Members_List.php?page="
                      .$i."'>".$i." </a>";
                      }
                      else  {
                      $pagLink .= "<a href='all_Members_List.php?page=".$i."'>
                      ".$i." </a>";
                      }
                      };
                      echo $pagLink;
                      if($page<$total_pages){
                      echo "<a style='border:none;' href='all_Members_List.php?page=".($page+1)."'>  <i class='fa fa-forward'></i> </a>";
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>