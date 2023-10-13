<?php
  include('db.php');
 

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "select * from raise_feedback where id = ".$id;
    $result = mysqli_query($connect, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $sql = "delete from raise_feedback where id=".$id;
      if(mysqli_query($connect, $sql)){
        echo '<script>
        setTimeout(function(){ window.location.href="feedback_index.php"; }, 100);

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
  <title>Feedback Portal</title>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <div class="wrapper">
<?php include_once 'rightTopPannel.php' ?>
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-lg-2">
          <div class="leftPannel">
            <div class="empty-left-Index-comTop"></div>
            <div class="left-compTop">
              <a href="enquiry_index.php">
                <button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>
              </a>
             <a href="all_Enquiry_List.php">
              <button class="actionButtonIcons" type="submit"><i class="fa fa-user-plus"></i> &nbsp All Enquiries</button>
             </a>
             <a href="enquiry_followUpsReport.php">
              <button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp Follow Ups</button>
             </a>
             <a href="todayFollowUps.php">
              <button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp Latest Follow Ups</button>
             </a>
             <a href="member_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button></a>
            </div>
          </div>
        </div> -->
        <div class="col-lg-12">
          <div class="rightPannel">
            <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Feedback Portal</span></h5>
            </div>
            <div id="print_setion">
               <div class="row">
               <div class="col-lg-11">
                  <h4>Feedbacks</h4>
               </div>
               <div class="col-lg-1">
                 <button class="actionButtonIcons-center" onclick="printDivSection('print_setion')" type="submit"><i class="fa fa-print"></i></button>
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
                                <th>Feedback Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Message</th>
                                <th>Date</th>
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
                              $query = "SELECT * FROM raise_feedback  LIMIT $start_from, $per_page_record ";
                              $rs_result = mysqli_query ($connect, $query);
                              ?>
                              <?php
                              if(mysqli_num_rows($rs_result)){
                              while ($rowMember = mysqli_fetch_array($rs_result)) {
                              ?>
                              <tr>
                                
                                <p hidden=""><?php echo $rowMember['id'] ?></p>
                                <td ></td>
                                <td><?php echo $rowMember['feedback_id'] ?></td>
                                <td><?php echo $rowMember['firstName'] ?></td>
                                <td><?php echo $rowMember['email'] ?></td>
                                <td><?php echo $rowMember['phone'] ?></td>
                                <td><?php echo $rowMember['message'] ?></td>
                                 <td><?php echo $rowMember['feedback_Date'] ?></td>
                                
                              <td ><div class="actionIcon">
                      
                     <a href="feedback_index.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
                <button class="actionButtonIcons-center" type="submit"><i class="fa fa-trash-o"></i></button>
              </a> 
                    </div>  
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

