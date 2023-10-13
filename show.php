<?php
require_once('db.php');
if (isset($_GET['id'])) {
$id = $_GET['id'];
$sql = "select * from addcourier where id=".$id;
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
$row = mysqli_fetch_assoc($result);
}else {
$errorMsg = 'Could not Find Any Record';
}
}
?>

<!DOCTYPE html>
<html>
  <title>Dashboard -  </title>
  <head>
    <?php include_once '../navAdminLinks.php'?>
  </head>
 
  <body onload="showtime()" >
    <div class="showData">
      <div class="container">
        <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <div class="col-lg-8">
              <ul class="list-group">
                <li class="list-group-item"><h5>Email : <?php echo $row['docketNumber'] ?></h5></li>
                <li class="list-group-item"><h5>Name : <?php echo $row['rname'] ?></h5></li>
                <li class="list-group-item"><h5>Designation : <?php echo $row['rmobile'] ?></h5></li>
                <li class="list-group-item"><h5>Contact Number : <?php echo $row['remail'] ?></h5></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-1"></div>
    </div>
  </div>
</div>
<div class="actionSection">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-xs-4 ">
      <a href="show.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
        <span class=" glyphicon glyphicon-eye-open"></span></a>
        <p style="color: #5F0A82;">Show</p>
      </div>
      <div class="col-lg-4 col-md-4 col-xs-4 "><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
        <span class="glyphicon glyphicon-edit"></span></a>
        <p style="color: #5F0A82;">Edit</p>
      </div>
      <div class="col-lg-4 col-md-4 col-xs-4 "><a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-info btn-block" onclick="return confirm('Are you sure to delete this record?')">
        <span class="glyphicon glyphicon-trash"></span> </a>
        <p style="color: #5F0A82;">Delete</p>
      </div>
    </div>
  </div>
</body>
</html>