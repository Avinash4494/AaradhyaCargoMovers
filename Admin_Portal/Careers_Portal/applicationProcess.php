
<?php
require_once('db.php');
$upload_dir = '../uploads/job-upload/';
if (isset($_POST['Submit'])) {
    $registration_id = $_POST['registration_id'];
  $registration_id_gen = 'AF'.rand(100000000,999999999);
  $fname = $_POST['fname'];
$exp = $_POST['exp'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$highestQualification = $_POST['highestQualification'];
$college = $_POST['college'];
$skills = $_POST['skills'];
$about = $_POST['about'];

$department = $_POST['department'];
$present_ctc = $_POST['present_ctc'];
$expected_ctc = $_POST['expected_ctc'];

$applied_time=  date("d/m/Y");
$imgName = $_FILES['image']['name'];
    $imgTmp = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
if(empty($fname)){
      $errorMsg = 'Please input name';
    }elseif(empty($contact)){
      $errorMsg = 'Please input contact';
    }elseif(empty($email)){
      $errorMsg = 'Please input email';
    }else{
      $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));
      $allowExt  = array('jpeg', 'jpg', 'png', 'gif' , 'pdf' ,'doc','docx');
      $userPic = $registration_id_gen.'_'.$fname.'.'.$imgExt;
      if(in_array($imgExt, $allowExt)){
        if($imgSize < 50000000){
          move_uploaded_file($imgTmp ,$upload_dir.$userPic);
        }else{
          $errorMsg = 'Image too large';
        }
      }else{
        $errorMsg = 'Please select a valid image';
      }
    }
    if(!isset($errorMsg)){
    
          $sql = "insert into application_form(registration_id,fname,exp,contact,email,highestQualification,college,skills,about,department,present_ctc,expected_ctc,applied_time,image)
          values('".$registration_id_gen."','".$fname."','".$exp."','".$contact."','".$email."', '".$highestQualification."','".$college."','".$skills."','".$about."','".$department."','".$present_ctc."','".$expected_ctc."','".$applied_time."', '".$userPic."')";
      $result = mysqli_query($connect, $sql);
      if($result){
echo '<script>
setTimeout(function(){ window.location.href="appliedSuccess.php"; }, 100);
</script>';
}else{
$errorMsg = 'Error '.mysqli_error($connect);
}
}
}
?>