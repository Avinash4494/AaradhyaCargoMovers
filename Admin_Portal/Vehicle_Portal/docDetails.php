<?php
include_once 'db.php';
$query = mysqli_query($connect,"SELECT a.vehicle_id,a.fullname,a.image1,a.document_id
From veh_upload_doc as a
inner join add_vehicle as u
on a.vehicle_id = u.vehicle_id");
$rowDoc = mysqli_fetch_assoc($query);
?>
<?php
$image1 = $rowDoc['image1'];
$vehicle_id = $rowDoc['vehicle_id'];
echo $vehicle_id;
if ($image1=='')
{
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="profileDisplayComponent">
        <div class="well">
          <div class="row">
            <div class="col-lg-10">
              <div class="nullAddress" style="text-align:
                center">
                <p>Documents details are not yet updated. Please click on "Upload" to Update </p>
              </div>
            </div>
            <div class="col-lg-2">
              <a href="doc_upload.php?id=<?php echo $row['id'] ?>" data-toggle="tooltip" title="Update Profile" class="red-tooltip">
                <button class="actionButtonProfile-center">Upload &nbsp
                <i class="fa fa-upload"></i>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
  else {
  ?>
  <div class="row">
    <div class="col-lg-10">
      <h5>Vehicle Documents</h5>
    </div>
    <div class="col-lg-2">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <?php
      require_once "db.php";
      $upload_dire = '../uploads/vehicle-upload/';
      $query_profile = mysqli_query($connect,
      "SELECT a.vehicle_id,a.fullname,a.image1,a.document_id
      From veh_upload_doc as a
      inner join add_vehicle as u
      on a.vehicle_id = u.vehicle_id");
      while ($row_profile = mysqli_fetch_assoc($query_profile)) {
      $flag = $row_profile['vehicle_id'];
      if($flag==$vehicle_id){
      ?>
      <div class="col-lg-3">
        <div class="showDocument">
          <div class="well">
            <img src="<?php echo $upload_dire.$row_profile['image1'] ?>" class="img-responsive">
          </div>
          <h5 style="text-align: center;"><?php echo $row_profile["fullname"]; ?></h5>
        </div>
        <!-- <a href="doc_upload.php?delete=<?php echo $row['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
          <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
        </a> -->
      </div>
      <?php
      }}
      ?>
    </div>
  </div>
  
  <?php
  }
  ?>
</div>