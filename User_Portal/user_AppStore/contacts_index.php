<?php
include_once '../db.php';
include_once "../session.php";
$upload_dir = 'uploads/';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Dashboard - <?php echo $row["Fullname"]; ?></title>
  </head>
  <body>
    <?php include_once '../../Header_Links/auth_Header_Links.php' ?>
    <div class="wrapper">
      <?php include_once '../rightTopPannel.php' ?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2">
            <?php include_once 'toLeftPannel.php' ?>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../UserDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <span class="activePage">Company Profile</span></h5>
              </div>
              <div class="createWidget" style="margin-top:-30px;">
                <div class="well">
                  <div class="row">
                    <div class="col-lg-2">
                      <a href="create_contact.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-user-plus"></i> Create Contacts</button></a>
                    </div>
                    <div class="col-lg-8"></div>
                    <div class="col-lg-2">
                      <a href="../user_AppStore/raise_shipment.php"><button class="actionButtonCreate" type="submit"><i class="fa fa-cart-plus"></i> Create Contacts</button></a>
                    </div>
                  </div>
                </div>
              </div>
              <style>
              .widgetShipmentComp .well
              {
              padding: 20px;
              }
              .widgetShipmentComp .well h4
              {
              margin: 0px;
              padding-bottom: 10px;
              }
              </style>
              <div class="row">
                
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
                $user_id = $row['user_id'];
                $query = "SELECT * FROM user_login Where user_id = '$user_id'  LIMIT $start_from, $per_page_record";
                $rs_result = mysqli_query ($connect, $query);
                ?>
                <?php
                if(mysqli_num_rows($rs_result)){
                while ($rowMember = mysqli_fetch_array($rs_result)) {
                
                ?>
                <div class="col-lg-4">
                  <div class="rectLongContent hidden-xs">
                    <div class="pannelWidget">
                      <div class="well">
                        <div class="row">
                          <div class="col-lg-10"></div>
                          <div class="col-lg-2">
                            <a href="update_contact.php?id=<?php echo $row['id'] ?>"> <button class="actionButtonCreate" ><i class="fa fa-pencil"></i></button></a>
                          </div>
                        </div>
                        <div class="detailsContact">
                          <div class="row">
                            <div class="col-lg-3">
                              <img src="../image/empWhite.png" class="img-responsive">
                            </div>
                            <div class="col-lg-9">
                              <p>Name : <?php echo $row['Fullname']; ?> </p>
                              <p>Email : <?php echo $row['Email']; ?> </p>
                              <p>Phone : <?php echo $row['mobile']; ?> </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
                }
                }
                else{
                ?>
                <div class="emptyBox">
                  <div class="well">
                    <div class="row">
                      <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <img src="../image/empty-box-01.png" class="img-responsive" alt="">
                      </div>
                      <div class="col-lg-4"></div>
                    </div>
                    <h4>No records found!</h4>
                    <h5>You haven't created any orders yet.</h5>
                  </div>
                </div>
                <?php
                }
                ?>
                
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
</body>
</html>