<!DOCTYPE html>
<html>
  <title>Admin Dashboard -  </title>
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
            <div class="left-compTop">
              <a href="member_Index.php"><button class="actionButtonIcons" type="submit">Home</button></a>
             <a href="member_Add.php"><button class="actionButtonIcons" type="submit">Add Member</button></a>
             <a href="all_Members_List.php"><button class="actionButtonIcons" type="submit">All Member Lists</button></a>
             <a href="member_search.php"><button class="actionButtonIcons" type="submit">Search</button></a>
            </div>
          </div>
        </div>
        <div class="col-lg-10">
          <div class="rightPannel">
            <div class="paggignation">
              <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Change</span> </h5>
            </div>
 
            <div id="print_setion">
<!-- Your Code Here -->
 
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