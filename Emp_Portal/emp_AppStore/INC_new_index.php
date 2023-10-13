<?php
require_once('../db.php');
include_once '../session.php' ?>
<?php
require_once('../db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from raise_inc_infra where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowStat = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>
<?php
if(isset($_GET['delete'])){
$id = $_GET['delete'];
$sql = "select * from raise_inc_infra where id = ".$id;
$result = mysqli_query($connect, $sql);
if(mysqli_num_rows($result) > 0){
$row = mysqli_fetch_assoc($result);
$sql = "delete from raise_inc_infra where id=".$id;
if(mysqli_query($connect, $sql)){
echo '<script>
setTimeout(function(){ window.location.href="request_status.php"; }, 1000);
</script>';
}
}
}
?>
<!DOCTYPE html>
<html>
  <title>Service Portal</title>
  <head>
  </head>
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    
    <?php include_once '../rightTopPannel.php' ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="paggignation">
            <h5><a href="../EmpDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> /<a href="myHelpline_index.php" data-toggle="tooltip" title="My Helpline!" data-placement="top">myHelpline</a> / <span class="activePage">Ticket Details</span></h5>
          </div>
        </div>
        <div class="col-lg-7">
          <?php include_once 'topLeftService.php' ?>
        </div>
      </div>
    </div>
        <div class="container">
      <div class="wrapper-incident">
        <form class="" name ="register" onsubmit="return myvalidate();" action="INC_process_infra.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-7">
              <div class="bodyComponent">
              	<div class="tktPaggignation">
              		
              	</div>
              	<div class="tktHeadText">
              		<h5><?php echo $rowStat['issue_reason'] ?></h5>
              	</div>
                <h4>Ticket Details (<?php echo $rowStat['request_id'] ?>)</h4>
                 
                <div class="profileDisplayComponent">
                  <div class="well">
                    <div class="formSection">
                      
                      <input type="text" id="request_id" name="request_id" hidden="" >
                      <input type="text" id="req_status" name="req_status" hidden="" value="Active">
                      <input type="text" id="raised_on" name="raised_on" hidden="" >
                      <input type="text" id="updated_on" name="updated_on" hidden="" >
                      <input type="text" id="remarks" name="remarks" hidden="" >
                      <input type="text" id="employees_id" name="employees_id" hidden="" value="<?php echo $row['employees_id'] ?>">
                      <div class="row">
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Requested By</label>
                            <input type="text" id="username" name="raised_for" class="form-control" placeholder="Raised For" value="<?php echo $row['Fullname'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Designation</label>
                            <input type="text" id="offc_desig" name="offc_desig" class="form-control" placeholder="Designation" value="<?php echo $row['offc_desig'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Mobile Phone</label>
                            <input type="text" id="mobile" name="mobile" class="form-control" placeholder="Mobile Phone" value="<?php echo $row['mobile'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" id="Email" name="Email" class="form-control" placeholder="Email" value="<?php echo $row['Email'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">State</label>
                            <input type="text" id="tktState" name="tktState" class="form-control" placeholder="Ticket State" value="New">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Office Location</label>
                            <input type="text" id="offc_location" name="offc_location" class="form-control" placeholder="Location" value="<?php echo $row['offc_location'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Sub Location</label>
                            <input type="text" id="subLocation" name="subLocation" class="form-control" placeholder="Sub Location" value="<?php echo $row['offc_location'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Tower</label>
                            <input type="text" id="offc_tower" name="offc_tower" class="form-control" placeholder="Location" value="<?php echo $row['offc_tower'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Floor</label>
                            <input type="text" id="offc_floor" name="offc_floor" class="form-control" placeholder="Floor" value="<?php echo $row['offc_floor'] ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Wing</label>
                            <input type="text" id="offc_wing" name="offc_wing" class="form-control" placeholder="Wing" value="<?php echo $row['offc_wing'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">Cubicle Number</label>
                            <input type="text" id="offc_cubicle" name="offc_cubicle" class="form-control" placeholder="Cubicle Number" value="<?php echo $row['offc_cubicle'] ?>">
                          </div>
                        </div>
                        <div class="col-lg-4 col-xs-12">
                          <div class="form-group">
                            <label for="">OS Type</label>
                            <select name="osType" id="osType" class="form-control">
                              <option value="Select">Select Any</option>
                              <option value="Windows OS">Windows OS</option>
                              <option value="MAC">MAC</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        
                        <div class="col-lg-7 col-xs-12">
                          <div class="form-group">
                            <label for="">Please describe your issue below</label>
                            <input type="text" id="issue_reason" name="issue_reason" class="form-control" placeholder="Please describe your issue below">
                          </div>
                        </div>
                        <div class="col-lg-3 col-xs-12">
                          <div class="form-group">
                            <label for="">Add attachments</label>
                            <input type="file" class="form-control" name="infra_image" id="infra_image">
                          </div>
                        </div>
                        <div class="col-lg-2">
                          <div class="sideBarButton">
                            
                            <button type="submit" name="Submit" class="actionButtonProfile-center">Submit</button>
                            
                            
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2">
              
            </div>
          </div>
        </form>
      </div>
    </div>
    
    
  </body>
</html>
