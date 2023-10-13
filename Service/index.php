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
    <title>Services Profiles</title>
    <link rel="icon" href="logo_A.png" height="10px">

  </head>
  <body>
    <?php include_once 'header.php'; ?>
 <div id="section_head_show">
   
 </div>

<?php
    $sql = "select * from contacts";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)){
    while($row = mysqli_fetch_assoc($result)){
?>
<div class="col-lg-3">
  <div class="detailsWell">
  <div class="well">
    <div class="row">
       
       <div class="col-lg-2 col-xs-2"></div>
        <div class="col-lg-8 col-xs-8">
          <div class="profileImage">
          <img src="<?php echo $upload_dir.$row['image'] ?>">
        </div>
        </div>
      <div class="col-lg-2 col-xs-2"></div>
          
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="detailsData">

          <p hidden=""><?php echo $row['id'] ?></p>
         <p>Designation : <?php echo $row['uid'] ?></p>
         <p>Name : <?php echo $row['name'] ?></p>
         <p>Contact : <?php echo $row['contact'] ?> </p>
         <p>Email : <?php echo $row['email'] ?></p>
         <hr />
          <div class="actionSection">
            <div class="row">                      
              <div class="col-lg-4 col-md-4 col-xs-4 ">
                <a href="show.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
                  <span class=" glyphicon glyphicon-eye-open"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
                <span class="glyphicon glyphicon-edit"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-info btn-block" onclick="return confirm('Are you sure to delete this record?')">
                <span class="glyphicon glyphicon-trash"></span> </a></div>
            </div>
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
                          ?>
     

 
 <style> .btn-info{background-color:white;color:#2c37a0;border:none;}
       .btn-info:hover{background-color:white;color:#2c37a0;border:none;}</style>
   <!-- https://pdfcrowd.com/#convert_by_url-->
  </body>
</html>
