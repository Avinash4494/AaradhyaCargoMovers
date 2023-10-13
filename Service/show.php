<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from contacts where id=".$id;
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
    }else {
      $errorMsg = 'Could not Find Any Record';
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>PHP CRUD</title> 
  </head>
  <body>
    <?php include_once 'header.php'; ?>
     <div id="section_head_show">
   
 </div>
 <div class="container">
      <div class="headerWell">
        <div class="well">
          <div class="row">
            <div class="col-lg-3 col-xs-3"></div>
            <div class="col-lg-6 col-xs-6 "><h4>Contact Details</h4></div>
            <div class="col-lg-3 col-xs-3 "><a href="index.php"><h4>Back</h4></a></div>
          </div>
        </div>
      </div>
    </div>
<div class="showData">
  <div class="container">
    <div class="row">
      <div class="col-lg-1"></div>
      <div class="col-lg-10">
            <div class="well">
      <div class="row">
        <div class="col-lg-4"><img src="<?php echo $upload_dir.$row['image'] ?>" width="100%">
          <hr />
          <div class="actionSection">
            <div class="row">                      
              <div class="col-lg-4 col-md-4 col-xs-4 ">
                <a href="show.php?id=<?php echo $row['id'] ?>" class="btn btn-info  btn-block">
                  <span class=" glyphicon glyphicon-eye-open"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
                <span class="glyphicon glyphicon-edit"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-info btn-block" onclick="return confirm('Are you sure to delete this record?')">
                <span class="glyphicon glyphicon-trash"></span> </a></div>
            </div>
          </div>
          <br>

        </div>
        <style>
             .btn-info{background-color:#2c37a0;color:white;border:none;}
       .btn-info:hover{background-color:#2c37a0;color:white;border:none;}
          </style>
        <div class="col-lg-8">
          <ul class="list-group">
            <li class="list-group-item"><h5>Name : <?php echo $row['name'] ?></h5></li>
            <li class="list-group-item"><h5>Designation : <?php echo $row['uid'] ?></h5></li>
            <li class="list-group-item"><h5>Contact Number : <?php echo $row['contact'] ?></h5></li>
            <li class="list-group-item"><h5>Email : <?php echo $row['email'] ?></h5></li>
            <li class="list-group-item"><h5>PAN Number : <?php echo $row['pan'] ?></h5></li>
            <li class="list-group-item"><h5>Aadhar Number : <?php echo $row['aadhar'] ?></h5></li>
            <li class="list-group-item"><h5>Address line 1 : <?php echo $row['addressline1'] ?></h5></li>
            <li class="list-group-item"><h5>Address Line 2 : <?php echo $row['addressline2'] ?></h5></li>
            
             
          </ul>
        </div>
      </div>
    </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>
</body>
</html>
