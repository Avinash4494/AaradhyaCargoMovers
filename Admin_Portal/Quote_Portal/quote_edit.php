<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from quote where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$rowedit = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
if(isset($_POST['Submit'])){
$follow_status = $_POST['follow_status'];
$last_follow=  date("d/m/Y");
$next_follow = $_POST['next_follow'];
$status_priority = $_POST['status_priority'];
$update_by = $_POST['update_by'];
$follow_mode = $_POST['follow_mode'];
$status_msg = $_POST['status_msg'];
if(!isset($errorMsg)){
$sql = "update quote
set
follow_status = '".$follow_status."',
last_follow = '".$last_follow."',
next_follow = '".$next_follow."',
status_priority = '".$status_priority."',
update_by = '".$update_by."',
follow_mode = '".$follow_mode."',
status_msg = '".$status_msg."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="updatedSuccess.php"; }, 500);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>
<?php include_once '../session.php' ?>
<!DOCTYPE html>
<html>
  <title>Quote Portal</title>
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
              <?php include_once 'toLeftQuote.php' ?>
            </div>
          </div>
          <div class="col-lg-10">
            <div class="rightPannel">
              <div class="paggignation">
                <h5><a href="../AdminDashboard.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Dashboard</a> / <a href="quote_index.php" data-toggle="tooltip" title="Dashboard!" data-placement="top">Quote Portal</a> / <span class="activePage">Update Quote</span></h5>
              </div>
              <div id="print_setion">
                <!-- Your Code Here -->
                <div class="bodyComponent">
                  <div class="row">
                    <div class="col-lg-12">
                      
                      <div class="profileDisplayComponent">
                        <div class="well">
                          <div class="row">
                            <div class="col-lg-2 col-xs-12" >
                              <p>Quote Id : <?php echo $rowedit['quote_id'] ?></p>
                              <p>Contact : <?php echo $rowedit['sender_phone'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p>Requested By : <?php echo $rowedit['sender_names'] ?></p>
                              <p>Email : <?php echo $rowedit['sender_email'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p>Requested On : <?php echo $rowedit['sender_time'] ?></p>
                              <p>Last Updated On : <?php echo $rowedit['last_follow'] ?></p>
                            </div>
                            <div class="col-lg-3 col-xs-12" >
                              <p>Current Status : <?php echo $rowedit['follow_status'] ?></p>
                              <p>Last Updated By : <?php echo $rowedit['update_by'] ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="profileDisplayComponent">
                        <div class="well">
                          <div class="formSection">
                            <form name ="register" onsubmit="return quotevalidate();" method="post" enctype="multipart/form-data" action="">
                            
                              <input type="text" id="next_follow" name="next_follow" hidden="">
                              
                              
                              <div class="row">
                                <div class="col-lg-4 col-xs-12" >
                                  <label for="usr"><b>Follow Up Mode<span>*</span> </b></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="follow_mode" name="follow_mode" placeholder="Follwed by Call/Mail" value="<?php echo $rowedit['follow_mode'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <label for="usr"><b>Priority <span>*</span></b></label>
                                  <div class="form-group">
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="weight" name="status_priority" placeholder="Priority" value="<?php echo $rowedit['status_priority'] ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <label for="usr"><b>Next Follow Up <span>*</span></b></label>
                                  <div class="form-group">
                                    <div class="form-group">
                                      <input type="text" placeholder="dd//mm/yyyy" class="form-control" id="weight" name="next_follow" value="<?php echo $rowedit['next_follow'] ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-lg-4 col-xs-12" >
                                  <label for="usr"><b>Updated By <span>*</span> </b></label>
                                  <div class="form-group">
                                    <input type="text" class="form-control" id="weight" placeholder="Update By" name="update_by" value="<?php echo $rowedit['update_by'] ?>">
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <label for="usr"><b>Update Status <span>*</span></b></label>
                                  <div class="form-group">
                                    <div class="form-group">
                                      <select name="follow_status" id="" class="form-control">
                                        <option value="Null">Update Status </option>
                                        <option value="Active">Active</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Resolved">Resolved</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-4 col-xs-12">
                                  <label for="usr"><b>Conclusion <span>*</span></b></label>
                                  <div class="form-group">
                                    <div class="form-group">
                                      <input type="text" class="form-control" id="weight" placeholder="Conclusion" name="status_msg" value="<?php echo $rowedit['status_msg'] ?>">
                                    </div>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-lg-4 "></div>
                                <div class="col-lg-4 col-xs-12" style="background-color:;">
                                  <div class="form-group">
                                    <button type="submit" name="Submit" class="actionButtonProfile">Sumit</button>
                                  </div>
                                </div>
                                <div class="col-lg-4"></div>
                              </div>
                            </form>
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
      </div>
    </div>
  </body>
</html>