<!DOCTYPE html>
<html>
  <title>Complaints Portal</title>
  <head>
  </head>
  <body onload="myFunction()">
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
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="complaint_index.php" data-toggle="tooltip" title="Complaints Portal!" data-placement="top" >Complaints Portal</a> / <span class="activePage">All Complaints</span> </h5>
              </div>
              
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="row">
                  <div class="col-lg-11">
                    <h4>Complaints Report Details</h4>
                  </div>
                  <div class="col-lg-1">
                    <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-lg-12">
                    <!-- Report Code Here -->
                    <table class="table table-hover" width="100%">
                      <thead >
                        <tr>
                          <th>Complaint Id</th>
                          <th>Member Id</th>
                          <th>Complaint By</th>
                          <th>Complaint Date</th>
                          <th>Complaint Type</th>
                          <th>Priority</th>
                          <th>Message</th>
                          <th>Status</th>
                          <th>Comments</th>
                          <th>Updated On</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once "db.php";
                        $per_page_record = 20;
                        if (isset($_GET["page"])) {
                        $page  = $_GET["page"];
                        }
                        else {
                        $page=1;
                        }
                        $start_from = ($page-1) * $per_page_record;
                        $todaysDate = date("d-m-Y");
                        $query = "SELECT * FROM raise_complaint  LIMIT $start_from, $per_page_record ";
                        $rs_result = mysqli_query ($connect, $query);
                        ?>
                        <?php
                        if(mysqli_num_rows($rs_result)){
                        while ($rowMember = mysqli_fetch_array($rs_result)) {
                        $statusType=$rowMember['status'];
                        
                        
                        ?>
                        <tr>
                          
                          <p hidden=""><?php echo $rowMember['id'] ?></p>
                          
                          <td><a href="update_INC.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" ><?php echo $rowMember['complaint_id'] ?></a></td>
                          <td><?php echo $rowMember['membership_id'] ?></td>
                          <td><?php echo $rowMember['firstName'] ?> <?php echo $rowMember['lastName'] ?></td>
                          <td><?php echo $rowMember['complaint_Date'] ?></td>
                          <td><?php echo $rowMember['complaint_type'] ?></td>
                          <td><?php echo $rowMember['complaint_priority'] ?></td>
                          <td><?php echo $rowMember['message'] ?></td>
                          <td ><span id="statusColor"><?php echo $rowMember['status'] ?></span></td>
                          <td width="200px"><?php echo $rowMember['status_Message'] ?></td>
                          <td><?php echo $rowMember['resolve_date'] ?></td>
                          <td >
                            <a href="update_INC.php?id=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to update this record?')" >
                              <button class="actionButtonIcons-center"><i class="fa fa-pencil-square-o"></i></button>
                            </a>
                            
                            
                          </td>
                          <td><a href="complaint_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                            <button class="actionButtonIcons-center"><i class="fa fa-trash-o"></i></button>
                            
                          </a></td>
                        </tr>
                        
                        
                        <?php
                        
                        
                        }
                        }
                        else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
                        ?>
                      </tbody>
                    </table>
                    <div class="row" >
                      <div class="col-lg-4 col-xs-8" >
                        <div class="pagination" >
                          <?php
                          $query = "SELECT COUNT(*) FROM raise_complaint";
                          $rs_result = mysqli_query($connect, $query);
                          $row = mysqli_fetch_row($rs_result);
                          $total_records = $row[0];
                          // Number of pages required.
                          $total_pages = ceil($total_records / $per_page_record);
                          $pagLink = "";
                          if($page>=2){
                          echo "<a style='border:none;' href='all_Complaints.php?page=".($page-1)."'>  <button class='actionButtonIcons-center'><i class='fa fa-backward'></i></button></a>";
                          }
                          for ($i=1; $i<=$total_pages; $i++) {
                          if ($i == $page) {
                          $pagLink .= "<a class = 'active' href='all_Complaints.php?page="
                          .$i."'>".$i." </a>";
                          }
                          else  {
                          $pagLink .= "<a href='all_Complaints.php?page=".$i."'>
                          ".$i." </a>";
                          }
                          }
                          if($page<$total_pages){
                          echo "<a style='border:none;' href='all_Complaints.php?page=".($page+1)."'>
                          <button class='actionButtonIcons-center'><i class='fa fa-forward'></i></button></a>";
                          }
                          ?>
                        </div>
                      </div>
                      <div class="col-lg-8 col-xs-4" >
                        <div class="pagination-data-bottom" style="float: right;" >
                          <h5>Showing 1 to <?php echo $per_page_record?> of <?php echo $row[0]; ?> entries / Total Pages : <?php echo $page." / ".$total_pages; ?></h5>
                          
                          <h5 class="hidden-lg">Pages : <?php echo $page." / ".$total_pages; ?></h5>
                        </div>
                      </div>
                      
                      
                    </div>
                    
                    <script>
                    function go2Page()
                    {
                    var page = document.getElementById("page").value;
                    page = ((page><?php echo $total_pages; ?>)?<?php echo $total_pages; ?>:((page<1)?1:page));
                    window.location.href = 'all_Complaints.php?page='+page;
                    }
                    </script>
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
function myFunction() {
var getStatus =  '<?php echo $statusType; ?>';

var active = "Active";
var InProgress = "In Progress";
var Resolved = "Resolved";
if (getStatus==active) {
document.getElementById("statusColor").style.color = 'red';
console.log(getStatus);
}
else if (getStatus==InProgress) {
document.getElementById("statusColor").style.color = 'orange';
console.log(getStatus);
}
else if (getStatus==Resolved) {
document.getElementById("statusColor").style.color = 'green';
console.log(getStatus);
}
}
</script>