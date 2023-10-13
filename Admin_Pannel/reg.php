<?php include_once 'navAdminLinks.php' ?>
<?php
  include_once 'db.php';
   
   
if(isset($_POST['submit']))
{ 
  
 $Name = $_POST['Fullname'];
 $USN = $_POST['USN'];
  $mobile = $_POST['mobile'];
 $password = $_POST['PASSWORD'];
 $repassword = $_POST['repassword'];
 $Email = $_POST['Email'];
  $Question = $_POST['Question'];
   $Answer = $_POST['Answer'];
   

 $check = mysqli_query($connect,"SELECT * FROM admin_login WHERE USN='".$USN."'") or die("Check Query");
 if(mysqli_num_rows($check) == 0) 
 {
  if($repassword == $password)
  {
    
    
    if($query = mysqli_query($connect,"INSERT INTO admin_login(Fullname, USN ,mobile,PASSWORD,Email,Question,Answer) VALUES ('$Name', '$USN','$mobile', '$password','$Email','$Question','$Answer')"))
    {
                       echo '


 <div class="container">  
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
          </div>
           <div id="commonProcess" class="container-fluid" >
            <div class="row">
              <div class="col-lg-5 col-xs-4"></div>
              <div class="col-lg-2 col-xs-4"  >
                <div class="iconComponent">
                <img src="../image/comLogo.png" width="100%">
                <div class="verticalComponent"></div> 

                </div>
              </div>
              <div class="col-lg-5 col-xs-4"></div>
            </div>
            <h1>Congratulations ! </h1><br><h3>Registered Successfull..!!! <br>Redirecting you to Login Page ! </br>If not Goto <a href="index.php"> Here </a></h3>
  <h4>Ballia Tent House</h4>
          </div>
          <div class="col-lg-3"></div>
        </div>
  </div>
';
  echo "<meta http-equiv='refresh' content ='3; url=index.php'>";
 }
  }
   else
    {
       echo '

 <div class="container">  
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
          </div>
           <div id="commonProcess" class="container-fluid" >
            <div class="row">
              <div class="col-lg-5 col-xs-4"></div>
              <div class="col-lg-2 col-xs-4"  >
                <div class="iconComponent">
                <img src="../image/comLogo.png" width="100%">
                <div class="verticalComponent"></div> 

                </div>
              </div>
              <div class="col-lg-5 col-xs-4"></div>
            </div>
             <h1>Sorry ! </h1> Your password do not match <a href="Register.php">Go Back</a> </h3>
  <h4>Ballia Tent House</h4>
          </div>
          <div class="col-lg-3"></div>
        </div>
  </div>
 '  ;
  echo "<meta http-equiv='refresh' content ='3; url=Register.php'>";
        
    }
   }
   else
   {
       echo "<center>This Username already exists</center>"; 
  }
}
?>
 