
<?php
include_once 'db.php';
error_reporting(0);
$query = mysqli_query($connect,"SELECT * FROM emp_upload_doc WHERE employees_id='$employees_id'");
$rowDoc = mysqli_fetch_assoc($query);
?>
<?php
$image1 = $rowDoc['image1'];
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
   
      
      <?php
       $upload_direct = 'uploads/emp_doc/';
     
      $query = "SELECT * FROM emp_upload_doc WHERE employees_id='$employees_id'";
      $rs_result = mysqli_query ($connect, $query);
      if(mysqli_num_rows($rs_result)){
      while ($rowMember = mysqli_fetch_array($rs_result)) {
      $docName = $rowMember['fullname'];
      $employees_id = $rowMember['employees_id'];
      if ($employees_id==$employees_id) {
      ?>
      <div class="col-lg-3">
        
        <div class="showDocumentEmp">
         <div class="well">
            <img src="<?php echo $upload_direct.$rowMember['image1'] ?>" class="img-responsive">
         </div>
        
        <p><?php echo $rowMember["fullname"]; ?></p>
        </div>
        
        <a href="doc_upload.php?delete=<?php echo $rowMember['id'] ?>" onclick="return confirm('Are you sure to delete this record?')">
          <button class="actionButtonIcons-center" type="submit"> <i class="fa fa-trash-o"></i></button>
        </a>
        
      </div>
      <?php
      }}
      }
      else{echo '<h3 style="color:red;font-family:Asap;text-align:center;font-size:1.2em;">No Record Found</h3>';}
      ?>
     
  </div>
  <?php
  }
  ?>
</div>