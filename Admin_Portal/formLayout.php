<!DOCTYPE html>
<html>
  <title>Member Portal</title>
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
                <a href="member_Index.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-home"></i> &nbsp Home</button>
                <div class="actionBox"></div></a>
                <a href="member_Add.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-user-plus"></i> &nbsp Add Member</button>
                <div class="actionBox"></div></a>
                <a href="all_Members_List.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp All Member Lists</button>
                <div class="actionBox"></div></a>
                <a href="member_search.php"><button class="actionButtonIcons" type="submit"><i class="fa fa-search"></i> &nbsp Search</button>
                <div class="actionBox"></div></a>
              </div>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="member_index.php" data-toggle="tooltip" title="Members Portal!" data-placement="top" >Members Portal</a> / <span class="activePage"> Renew Member</span> </h5>
              </div>
              <div id="print_setion">
                <h4>Renew Member</h4>
                <!-- Your Code Here -->
                <div class="formPannel">
 
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