
<?php
  include_once '../db.php';
   
   
if(isset($_POST['submit']))
{ 
  
 $Name = $_POST['Fullname'];
 $employees_id = $_POST['employees_id'];
  $mobile = $_POST['mobile'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];
  $Question = $_POST['Question'];
   $Answer = $_POST['Answer'];
  $random_id = $_POST['random_user_id'];
$random_id_gen = 'EV'.'-'.rand(100000,999999);
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $alternate_phone = $_POST['alternate_phone'];
  $present_address = $_POST['present_address'];
$present_state = $_POST['present_state'];
$present_pincode = $_POST['present_pincode'];
$permanent_address = $_POST['permanent_address'];
$permanent_state = $_POST['permanent_state'];
$permanent_pincode = $_POST['permanent_pincode'];
$profile_image = $_POST['profile_image'];

 $check = mysqli_query($connect,"SELECT * FROM admin_login WHERE employees_id='".$employees_id."'") or die("Check Query");
 if(mysqli_num_rows($check) == 0) 
 {
  if($repassword == $password)
  {
    if($query = mysqli_query($connect,"INSERT INTO admin_login(Fullname, employees_id ,mobile,PASSWORD,Email,Question,Answer,random_user_id,dob,gender,alternate_phone,present_address,present_state,present_pincode,permanent_address,permanent_state,permanent_pincode,profile_image) VALUES ('$Name', '$employees_id','$mobile', '$password','$Email','$Question','$Answer','$random_id_gen','$dob','$gender','$alternate_phone','$present_address','$present_state','$present_pincode','$permanent_address','$permanent_state','$permanent_pincode','$profile_image')"))
    {
  echo '<script>
        
        setTimeout(function(){ window.location.href="addedSuccessReg.php"; }, 1000);

</script>';
 }
  }
   else
    {
  echo '<script>
        
        setTimeout(function(){ window.location.href="passError.php"; }, 500);

</script>';    
    }
   }
   else
   {
        echo '<script>
        
        setTimeout(function(){ window.location.href="name_error.php"; }, 500);

</script>'; 
  }
}
?>
 