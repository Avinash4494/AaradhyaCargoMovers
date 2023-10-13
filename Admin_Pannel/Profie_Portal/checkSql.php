<?php
session_start();
error_reporting(0);
if($_SESSION["username"]){
}
else {
header("location: index.php");
}
?>

<?php
include_once 'db.php';
$username = $_SESSION['username'];
$query = mysqli_query($connect,
	"SELECT a.USN,a.Fullname,a.mobile,a.Email,u.USN_id,u.dob,u.gender
	From admin_login as a
	join admin_info as u
	on a.USN = u.USN_id
	WHERE USN='$username'");
$row = mysqli_fetch_assoc($query)
?>
<div class="col-lg-4">
                <div class="shootComponent">
                  <p hidden=""><?php echo $row['id'] ?></p>
                  <h4>Name : <?php echo $row['Fullname'] ?></h4>
                  <h4>Username : <?php echo $row['USN'] ?></h4>
                  <h4>Mobile Number : <?php echo $row['mobile'] ?></h4>
                  <h4>Email : <?php echo $row['Email'] ?></h4>
                   <h4>Date Of Birth : <?php echo $row['dob'] ?></h4>
                   <h4>Gender : <?php echo $row['gender'] ?></h4>
            </div>
          </div>