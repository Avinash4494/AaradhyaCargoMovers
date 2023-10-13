<!DOCTYPE html>
<html>
<title>Login</title>
<head>
<?php include_once 'headerLinks.html' ?>
 
<body onload="myFunction()" style="margin:0;" id="tothetop">      
  <div id="loader">
    <div class="container">
          <div class="row">
            <div class="col-lg-4 col-xs-2"></div>
            <div class="col-lg-4 col-xs-8">
              <div class="loader_logo" style="margin-top: 150px;">
                 <img class="loaderlogoimg" src="image/aa logo.jpg" width="100%" ><br><br>
               </div>
            </div>
            <div class="col-lg-4 col-xs-2"></div>
          </div>
          <div class="row hidden-lg">
            <div class="col-lg-4 col-xs-4"></div>
            <div class="col-lg-4  col-xs-4">
                <img class="loadergif" src="image/51.gif">
              </div>
            <div class="col-lg-4 col-xs-4"></div>
          </div>
          <div class="row hidden-xs">
            <div class="col-lg-5 col-xs-4"></div>
            <div class="col-lg-2  col-xs-4">
                <img class="loadergif" src="image/51.gif" style="margin-left: 40px;">
              </div>
            <div class="col-lg-5 col-xs-4"></div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <h2 style="text-align: center;font-family: acme; color: #F90A03;font-size: 20px;">Loading...Please Wait</h2>
            </div>
          </div>
          </div>
        </div>
<div style="display:none;" id="myDiv" class="animate-bottom"> 
  <div class="section_login">
    <div class="container">
    	<div class="row">
    		<div class="col-lg-2"></div>
    		<div class="col-lg-8">
          <div class="user_login_well">
            <div class="well" style="border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                <div class="row hidden-xs">
                  <div class="col-lg-6 col-xs-6 " style="background-color: #F90A03;border-top-left-radius: 0px;border-bottom-left-radius: 20px;">
                    <div class="whole_image">
                      <img src="image/06.png" width="100%">
                   
                    <h2 style="color:white">Aaradhya Cargo Movers</h2>
                     </div>

                  </div>

                  <div class="col-lg-6 col-xs-6" style="background-color:transparent;padding-bottom: 22px;border-top-right-radius: 
                  20px;border-bottom-right-radius: 20px;" >
                  <div class="row">
                         <div class="login_theme_img">
                        <div class="col-lg-2 col-xs-2">
                         
                            <div class="well" style="background-color:transparent;border-radius: 50%;border:none;height: 70px;width: 70px;">
                              <img src="image/93.jpg" width="100%" >
                            </div>
                          </div>
                       
                         <div class="col-lg-10 col-xs-10" style="background-color:;">
                           <h4>Hello Dushyant Singh</h4>
                         </div>
                          </div>
                      </div>
                     <div class="login_themes">
                    <h2 class="login_head">Login Your Account</h2>
                   
                    <div class="row">
                      <div class="col-lg-1"></div>
                      <div class="col-lg-10">
                        <form action="admin_dashboard.php" method="post">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" required="" name="uname">
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Password" required="" name="pwd">
                      </div>
                      <p id="worng_cred" style="color: orange;font-family: times new roman"></p>
 
                         
                      
                       
                     <div class="row">
                       <div class="col-lg-6 col-xs-6">
                         <button class="btn btn-info btn-block" name="login" type="submit" onclick="valid();">Login</button>
                       </div>
                       <div class="col-lg-6 col-xs-6"> 
                        <button class="btn btn-danger btn-block" type="reset">Reset</button>
                       </div>
                     </div>

                    </form>
                      </div>
                      <div class="col-lg-1"></div>
                    </div>
                  </div>
                  </div>
                </div>
              <div class="loginThemeOnSmall">
                <div class="row hidden-lg">
                  <div class="col-lg-12">
                      <div class="row">
                            <div class="col-lg-4 col-xs-12">
                                 <h4>Hello Dushyant Singh</h4>
                            </div> 
                      </div>
                       <h2 class="login_head">Login Your Account</h2>
                      <div class="row">
                          <div class="col-lg-1"></div>
                          <div class="col-lg-10">
                            <form action="admin_dashboard.php" method="post">
                              <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Username" required="" name="uname">
                              </div>
                              <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" required="" name="pwd">
                              </div>

                               <div class="row">
                                 <div class="col-lg-6 col-xs-6">
                                   <button class="btn btn-info btn-block" name="login" type="submit" onclick="valid();">Login</button>
                                 </div>
                                 <div class="col-lg-6 col-xs-6"> 
                                  <button class="btn btn-danger btn-block" type="reset">Reset</button>
                                 </div>
                               </div>

                            </form>
                          </div>
                          <div class="col-lg-1"></div>
                      </div>
                  </div>
                  </div>
                </div>
            </div>
          </div>
    			
    		</div>
    		<div class="col-lg-2"></div>
    	</div>
  </div>
</div>
<style>
  @media screen and (max-width: 992px) 
  {
    .whole_image img{width: 100%;padding-bottom: 0px;margin-bottom: 0px;}
  .whole_image h2{font-size: 16px;padding-bottom: 30px;}
   .login_theme_img h4{font-size: 14px;padding-left: 10px;}
   .login_theme_img img{border-radius: 50%; padding:2px;margin-top: 30px;}
   .user_login_well{margin-top:160px;}
   .section_login{height:400px;}
  
     

  }
   

 .login_theme_img img{border-radius: 50%; height: 60px;width: 60px;padding:2px;margin-top: 30px;}
  .login_theme_img h4{font-family: Acme;color: white;padding-top:40px;margin-left: 20px;padding-left: 5px;letter-spacing: 2px;}
  .section_login{background-image: url(image/21.jpg);background-repeat: no-repeat;background-size: cover; height: 625px;}
  .user_login_well .well{background-color:transparent; border-radius: 0px;padding: 0px;border:none;}
  .user_login_well:hover{box-shadow: 0px 0px 40px 6px rgba(249, 241, 239,0.9);cursor: pointer;transition: 0.8s;}
  .login_themes h2{color: white;text-align: center;font-size: 20px;padding-top: 50px;font-family: Acme;letter-spacing: 2px;}
 
  .login_themes  label{color: white;letter-spacing: 2px;}
  .login_themes input{border-radius: 0px;border:1px solid #F90A03;}
  .whole_image img{padding-top: 90px;padding-bottom: 90px;}
   .whole_image h2{font-family: Acme;text-align: center;color: #F90A03;}
  .user_login_well{margin-top: 90px;}
  .loginThemeOnSmall {padding-top: 60px;padding:20px;margin-top:50px;}
  .loginThemeOnSmall h2{color: white;text-align: center;font-size: 20px;padding-bottom: 20px;font-family: Acme;letter-spacing: 2px;}
  .loginThemeOnSmall h4{color: white;text-align: center;font-size: 20px;font-family: Acme;letter-spacing: 2px;}
     .loginThemeOnSmall input{border-radius: 0px;border:1px solid #2c37a0;}
   
  
  }
  }
</style>

</div><!-- for loader-->
   <script>
var myVar;

function myFunction() {
  
  myVar = setTimeout(showPage, 500);

}

function showPage() {

  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script> 
<script>
  function capt()
  {
     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
          'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z', 
              '0','1','2','3','4','5','6','7','8','9');
           var i;
           for (i=0;i<6;i++){
               var a = alpha[Math.floor(Math.random() * alpha.length)];
               var b = alpha[Math.floor(Math.random() * alpha.length)];
               var c = alpha[Math.floor(Math.random() * alpha.length)];
               var d = alpha[Math.floor(Math.random() * alpha.length)];
               var e = alpha[Math.floor(Math.random() * alpha.length)];
               
                            }
               var code = a + '' + b + '' + '' + c + '' + d + '' + e;
              document.getElementById("demo").innerHTML = code;
               document.getElementById("demo").value=code;
  
  }
  function valid()
    
    {
       var capt1=document.getElementById("demo").value;
         var capt2= document.getElementById("insert_cap").value;
    if(capt1===capt2)
    { 
       alert("");
     return true;
    }
    else{ 
       alert("Kindly Enter Correct Captcha");
       window.location.href='admin_login.php';
     return false;
     }
    }
    

</script>                    
</body>
</html>
