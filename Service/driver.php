<?php
  include('db.php');
  $upload_dir = 'uploads/';

  if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "select * from contacts where id = ".$id;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_assoc($result);
      $image = $row['image'];
      unlink($upload_dir.$image);
      $sql = "delete from contacts where id=".$id;
      if(mysqli_query($conn, $sql)){
        header('location:index.php');
      }
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Driver Details</title>
      <link rel="icon" href="image/logo_A.png" height="10px">

  </head>
  <body>
    <?php include_once 'header.php'; ?>
    <div class="container">
      <div class="headerWell">
        <div class="well"><h3>Driver Data</h3></div>
      </div>
    </div>



<?php
    $sql = "select * from contacts where uid = 'Driver'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
?>
<?php include_once 'profileCard.php'; ?>

                          <?php
                              }
                            }
                          ?>
  </body>
</html>
