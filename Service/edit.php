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

  if(isset($_POST['Submit'])){
    $uid=$_POST['uid'];
		$name = $_POST['name'];
    $contact = $_POST['contact'];
		$email = $_POST['email'];
    $pan = $_POST['pan'];
    $aadhar = $_POST['aadhar'];
    $addressline1 = $_POST['addressline1'];
    $addressline2 = $_POST['addressline2'];

		$imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

		if($imgName){

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					unlink($upload_dir.$row['image']);
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}else{

			$userPic = $row['image'];
		}

		if(!isset($errorMsg)){
			$sql = "update contacts
									set uid = '".$uid."',
                  name = '".$name."',
										contact = '".$contact."',
                    email = '".$email."',
                    pan = '".$pan."',
                    aadhar = '".$aadhar."',
                    addressline1 = '".$addressline1."',
                    addressline2 = '".$addressline2."',
										image = '".$userPic."'
					where id=".$id;
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record updated successfully';
				header('Location:index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}

	}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Profile</title>
    <link rel="icon" href="logo_A.png" height="10px">

  
  </head>
  <body>
    <?php include_once 'header.php'; ?>
        <div class="container">
      <div class="headerWell">
        <div class="well">
            <div class="row">
            
            <div class="col-lg-9 col-xs-9 "><h4>Edit Personal Details</h4></div>
            <div class="col-lg-3 col-xs-3 "><a href="index.php"><h4>Back</h4></a></div>
          </div>
            </div>
      </div>
    </div>

<div class="container">
  <div class="row">
  <div class="col-lg-3"></div>
  <div class="col-lg-6">
    <div class="card">
              <div class="card-body">
                <form class="" action="" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-lg-6">
                       <div class="form-group">
                      <label for="name">UID</label>
                      <input type="text" class="form-control" name="uid"  placeholder="Enter User ID" value="<?php echo $row['uid']; ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" name="name"  placeholder="Enter Name" value="<?php echo $row['name']; ?>">
                    </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="contact">Contact No:</label>
                      <input type="text" class="form-control" name="contact" placeholder="Enter Mobile Number" value="<?php echo $row['contact']; ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                      <label for="email">E-Mail</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']; ?>">
                    </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="pan">PAN Number</label>
                      <input type="text" class="form-control" name="pan" placeholder="Enter PAN Number" value="<?php echo $row['pan']; ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label for="aadhar">Aadhar Number</label>
                      <input type="text" class="form-control" name="aadhar" placeholder="Enter Aadhar Number" value="<?php echo $row['aadhar']; ?>">
                    </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                       <div class="form-group">
                      <label for="addressline1">Address Line 1</label>
                      <input type="text" class="form-control" name="addressline1" placeholder="Enter address " value="<?php echo $row['addressline1']; ?>">
                    </div>
                    </div>
                    <div class="col-lg-6">
                       <div class="form-group">
                      <label for="addressline2">Address Line 2</label>
                      <input type="text" class="form-control" name="addressline2" placeholder="Enter address " value="<?php echo $row['addressline2']; ?>">
                    </div>
                    </div>
                  </div>
                 
                    
                    
                   
                    <div class="form-group">
                      <label for="image">Choose Image</label>
                      <div class="col-md-4">
                        <img src="<?php echo $upload_dir.$row['image'] ?>" width="100">
                        <input type="file" class="form-control" name="image" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="Submit" class="btn btn-primary waves">Submit</button>
                    </div>
                </form>
              </div>
            </div>
  </div>
  <div class="col-lg-3"></div>
</div>
</div>
      
    </body>
</html>
