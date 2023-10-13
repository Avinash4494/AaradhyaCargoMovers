<?php
include('member_Enquiry_Process.php')
?>
 
<?php
require_once('db.php');
$upload_dir = 'uploads/'; 
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from follow_ups where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}?>
 

 
<!DOCTYPE html>
<html>
  <title>Member Enquiry</title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <form class="" name ="register" onsubmit="return myvalidate();" action="enquiry_followUps_Process.php" method="post" enctype="multipart/form-data">
      <input type="text" id="followUp_id" name="followUp_id" hidden="">
     
      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Enquiry ID<span>*</span></label>
            <input type="text" id="enquiry_id" name="enquiry_id" value="<?php echo $row['enquiry_id']?>">
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">First Name<span>*</span></label>
            <input type="text" id="firstName" name="firstName" class="form-control" value="<?php echo $row['firstName']?>">
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Last Name<span>*</span></label>
            <input type="text" id="lastName" name="lastName" class="form-control" value="<?php echo $row['lastName']?>" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Email<span>*</span></label>
            <input type="email" id="email" name="email" class="form-control" value="<?php echo $row['email']?>">
          </div>
        </div>
        <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Mobile Number<span>*</span></label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row['phone']?>">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-12">
            <div class="form-group">
              <label for="">Follow Up Date </label>
              <input type="date" id="lastFollow" name="lastFollow" class="form-control" >

            </div>
          </div>
          <div class="col-lg-3 col-xs-12">
            <div class="form-group">
              <label for="">Next Follow Up</label>
              <input type="date" id="remarks" name="nextFollow" class="form-control" value="">
               <span>Last Follow Up (<?php echo $row['lastFollow']?>)</span>
            </div>
          </div>
          <div class="col-lg-3 col-xs-12">
            <div class="form-group">
              <label for="">Message</label>
              <input type="text" id="followMsg" name="followMsg" class="form-control" value="<?php echo $row['followMsg']?>">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ">
          <div class="row">
            <div class="col-lg-6">
              <button type="submit" name="Submit" class="signButton">Submit</button>
            </div>
            <div class="col-lg-6">
              <button type="reset" class="signButton">Cancel</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </body>
</html>
