<!DOCTYPE html>
<html lang="en">
<title>Reset Password</title>
<?php include_once 'navbarHomelinks.php' ?>
<body>
<div id="AuthSection">
	<div class="container">
	<div class="row">
		<div class="col-lg-8 col-lg-12">
			<div class="sectionHeadLeft">
				<h3>Welcome Admin</h3>
			<h4>Join the family of <br>Agnitio</h4>
			</div>
			 
		</div>
		<div class="col-lg-4 col-lg-12">
			<div class="loginComponent" style="margin-top: 20%;"  >
				<div class="well" style="background-image: url(image/c-5.png);background-size: cover;background-position: center;">

					 <h1>Reset Password</h1>
					 				 <h3 style="font-family:Alegreya Sans SC;color: white; text-align: center;">Enter your mobile number below !!!<br> </h3>

				<div class="formSection">
					 <form action="action_otp.php" method="post">
				          
				         <label>Phone Number:</label><br>
				         <input type="text" name="phone" value="" class="form-control">
				         <br><br>
				         <input type="submit" value="Reset Password" class="buttonLogin">
				      </form>
					<!--<form action="Forgot Password.php" onsubmit="return Validate();">
						<div class="form-group">
							<input type="text" class="form-control" id="resetPass" placeholder="Enter Reset Code" >				
						</div>
              
              <button class="buttonLogin" type="Submit">
                Submit
              </button>
              <p id="ErrorCode"></p>
              <p id="CorrectCode"></p>
            </form>-->
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<style>
	#ErrorCode{text-align: center;font-family: Alegreya Sans SC;color:red;padding-top: 20px;font-size: 1.5em; }
	#CorrectCode{text-align: center;font-family: Alegreya Sans SC;color:green;padding-top: 20px;font-size: 1.5em; }
</style>
</body>
</html>
<script>
  function Validate()

  {
    var checkCode = 258;
    var code = document.getElementById("resetPass").value;
    if(code==checkCode)
    {
      var msg="Correct Code"
    document.getElementById("CorrectCode").innerHTML = msg;
    return true;
    }
  else
  {
    var msg="Please Enter Valid Code"
    document.getElementById("ErrorCode").innerHTML = msg;
    return false;

  }

  }
</script>