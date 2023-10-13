<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from apply_request where id=".$id;
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }




if(isset($_POST['Submit'])){
  $status= $_POST['status'];
  $remarks = $_POST['remarks'];
  $updatedDate = date("d-m-Y");

 
 
if(!isset($errorMsg)){
$sql = "update apply_request
set status = '".$status."',
remarks = '".$remarks."',
updatedDate = '".$updatedDate."'
where id=".$id;
$result = mysqli_query($connect, $sql);
if($result){
$successMsg = 'New record updated successfully';
echo '<script>
setTimeout(function(){ window.location.href="employees_request.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>

<!DOCTYPE html>
<html>
  <title>Update Request</title>
  <head>
  </head>
  
  <body>
    <?php include_once '../../Header_Links/header_links.php' ?>
    <a href="../AdminDashboard.php">Dashboard</a>
    Request ID : <?php echo $row['request_id']?>
 
    <form class="" name ="register" onsubmit="return myvalidate();" action="" method="post" enctype="multipart/form-data">
       <input type="date" id="updatedDate" name="updatedDate" hidden="">
      <div class="row">
         <div class="col-lg-3 col-xs-12">
          <div class="form-group">
            <label for="">Status<span>*</span></label>
            <select name="status" id="status">
              <option value="Null">Select Any</option>
               <option value="Active">Active</option>
              <option value="Resolved">Resolved</option>
              <option value="In Progress">In Progress</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-3 col-xs-12">
            <div class="form-group">
              <label for="">Conclusion Message <span>*</span></label>
              <input type="text" id="remarks" name="remarks" class="form-control" >
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
