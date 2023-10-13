<?php
include('../db.php');
$upload_dir = 'uploads/members-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from addcourier where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_dir.$image);
$sql = "delete from addcourier where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="courier_index.php"; }, 1000);
</script>';
}
}
}
?><?php include_once "../session.php" ?>
<div class="row">
  <div class="col-lg-2">
    <div class="leftPannel">
      <div class="empty-left-Index-comTop"></div>
      <?php include_once 'toLeftCouriers.php' ?>
    </div>
  </div>
  <div class="col-lg-10">
    <?php
    $upload_dir = 'uploads/members-uploads/';
    $per_page_record = 20;
    if (isset($_GET["page"])) {
    $page  = $_GET["page"];
    }
    else {
    $page=1;
    }
    $start_from = ($page-1) * $per_page_record;
    $query = "SELECT * FROM addcourier  LIMIT $start_from, $per_page_record ";
    $rs_result = mysqli_query ($connect, $query);
    ?>
    <?php
    if(mysqli_num_rows($rs_result)){
    while ($rowMember = mysqli_fetch_array($rs_result)) {
    // Display each field of the records.
    ?>
    <div class="rectLongContent hidden-lg"  >
      <div class="rectWidge" >
        <div class="well" style="border:1px solid #1c2833;padding: 5px;margin: 0px;">
          <div class="row">
            <div class="col-xs-5">
              <h6 style="margin: 0px;padding-top: 5px;padding-bottom: 5px;"><b>Docket No. : <?php echo $rowMember['docketNumber'] ?></b></h6>
            </div>
            <div class="col-xs-7">
               <h6 style="margin: 0px;padding-top: 5px;"><b>Inv. No.</b> - <?php echo $rowMember['invoice_no'] ?></h6>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
               <h6 style="margin: 0px;"><b>Customer Name</b> - <?php echo $rowMember['cus_name'] ?></h6>
            </div>
          </div>
 <style type="text/css">
   .actionButtonIcons-center{font-size: 0.8em;}
 </style>
          <div class="buttonComp" style="margin-top: 10px;">
            <div class="row">
              <div class="col-xs-3"></div>
              <div class="col-xs-3">
                <a href="downloadCourier.php?id=<?php echo $rowMember['id'] ?>">
                  <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-download"></i></button>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="courierEdit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')">
                  <button class="actionButtonIcons-center" type="submit">  <i class="fa fa-pencil"></i></button>
                </a>
              </div>
              <div class="col-xs-3">
                <a href="All_Couriers_List.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                  <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
                </a>
              </div>
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
<style>
  .pagination a{font-size: 0.7em;padding: 5px 10px;}
  .pagination h6{font-size: 0.7em;margin-top: 00px;}
  .pagination {
    margin-left: 00px;
    margin-top: -10px;
    margin-bottom: -20px;
}
 
.pagination a.active {
    background-color: white;
    color: black;
    transition: 0.3s;
    border: 1px solid red;
}

.pagination a:hover:not(.active) {
    background-color: red;
    color: white;
    transition: 0.5s;
}

.pagination a:first-child {
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
}

.pagination a:last-child {
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}
</style>
<div class="pagginationPannel" style="padding-top: 20px;">
      <div class="row" >
      <div class="col-lg-8 col-xs-12"  >
        <div class="pagination">
          <?php
          $query = "SELECT COUNT(*) FROM addcourier";
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>