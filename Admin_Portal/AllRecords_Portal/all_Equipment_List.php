<?php
include('db.php');
$upload_equip = 'uploads/equipments-uploads/';
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from add_member where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$image = $row['image'];
unlink($upload_direct.$image);
$sql = "delete from add_member where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="deleteAllEvent.php"; }, 1000);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Equipments Portal</title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
      <?php include_once 'rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <div class="leftPannel">
              <div class="empty-left-comTop"></div>
            <?php include_once 'toLeftEquipments.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Equipments Portal!" data-placement="top" >Equipments Portal</a> / <span class="activePage"> Equipments List</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Equipments List</h4>
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
                        <th>Image</th>
                        <th>Equipment Id</th>
                        <th>Invoice Number</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Quantity</th>
                        <th>Purchase Date</th>
                        <th>Mode</th>                       
                        <th>Amount</th>
                        <th>Branch</th>
                        <th>Update</th>
                        <th>Delete</th>
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
                      $query = "SELECT * FROM add_equipments  LIMIT $start_from, $per_page_record ";
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
                        <td width="60px">
                            <div class="listImage">
                              <img src="<?php echo $upload_equip.$rowMember['image'] ?>" class="img-responsive">
                            </div>
                          </td>
                        <td><a href="equipments_View.php?id=<?php echo $rowMember['id'] ?>" data-toggle="tooltip" title="View" data-placement="left"><?php echo $rowMember['equipment_id'] ?></a></td>
                        <td><?php echo $rowMember['invoice_number'] ?></td>
                        <td><?php echo $rowMember['equipment_name'] ?></td>
                        <td><?php echo $rowMember['equipment_type'] ?></td>
                        <td><?php echo $rowMember['equipment_quantity'] ?></td>
                        <td><?php echo $rowMember['purchase_date'] ?></td>
                        <td><?php echo $rowMember['paymentMode'] ?></td>
                        <td><i class="fa fa-inr"></i><?php echo $rowMember['paidAmount'] ?>/-</td>
                        <td><?php echo $rowMember['located_branch'] ?></td>
                        
                        
                        <!-- 
                        <td><span style="color: green"><i class="fa fa-inr"></i><?php echo $rowMember['amountPaid'] ?></span>/-</td>
                        <td><span style="color: red"><i class="fa fa-inr"></i><?php echo $pending = $packAmt-$amtPaid;
                        ?>/-</span></td> -->
                        <!-- <td> <a href="member_Renew.php?id=<?php echo $rowMember['id'] ?>" class="btn btn-info btn-block">
                          <p style="color: #5F0A82;">Renew</p></a>
                        </td> -->
                        <td >
                          <a href="equipments_Edit.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                            <button class="actionButtonIcons-center" type="submit"><i class="fa fa-pencil-square-o"></i></button>                            
                          </a>
                        </td>
                        <td>
                          <a href="equipments_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
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
<script>
function printDivSection(setion_id) {
var Contents_Section = document.getElementById(setion_id).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = Contents_Section;
window.print();
document.body.innerHTML = originalContents;
}
</script>