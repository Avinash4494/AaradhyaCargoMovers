<!DOCTYPE html>
<html lang="en">
<title>Aaradhya Cargo Movers - Login</title>
<?php include_once 'navAdminLinks.php'?>
<body>
<div id="AuthSectionRegister">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-lg-12"></div>
		<div class="col-lg-6 col-lg-12">
			<div class="RegisterComponent">
				<div class="well">
		<div class="row">
			<div class="col-lg-12">
				<div class="sectionHead">
				 	 <h2>Sign In</h2>
				</div>
			</div>
		</div>
<div class="formSection">
<p id="AllFields" style="color: white;text-align: center;"></p>
<form method="POST" name ="register" class="templatemo-login-form" action="reg.php" onsubmit="return myvalidate();">
	<div class="row">
		<div class="col-lg-6 col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" id="fullname" name="Fullname" class="form-control" placeholder="FullName" >     
		            </div>	
	        	</div>
		</div>
		<div class="col-lg-6 col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" id="username" name="USN" class="form-control" placeholder="Username" >           
		          	</div>	
	        	</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-phone fa-fw"></i></div>

		              	<input type="text" id="phone" id="password" name="mobile" class="form-control" placeholder="Phone Number" >           
		          	</div>	
	        	</div>
		</div>
		<div class="col-lg-6 col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></div>	        		
		              	<input type="text" id="email" name="Email" class="form-control" placeholder="Email*" >           
		          	</div>					
	        	</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6  col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" id="pass" name="PASSWORD" class="form-control" placeholder="******" >           
		          	</div>	
	        	</div>
		</div>
		<div class="col-lg-6 col-xs-6">
			<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>	        		
		              	<input type="password" id="repass" name="repassword" class="form-control" placeholder="Confirm Password" >           
		          	</div>	
				</div>
		</div>
	</div>
	<div class="form-group">
	        		<div class="input-group"> 
		        		<div class="input-group-addon"><i class="fa fa-list-alt fa-fw"></i></div>	        		
		              	<select type="text" name="Question" class="form-control" placeholder="Security Question*" > 
								<option value="What is your nickname?">What is your nickname ?</option>
								<option value="What is your fav spot?">What is your favourite sport ?</option>
							<option value="What is your fav dish?">What is your favourite dish ?</option>
							<option value="What is your dream land address?">What is your dream land address ?</option>							
		          	<option value="What is your first mobile number?">What is your first mobile number ?</option>	
						<option value="What is your one truth which ohers donot know?">What is your one truth which ohers donot know ?</option>
								<option value="What is your detained years in life?">What is your detained years in life ?</option>
					 
						<option value="What is your pet name?">What is your petname ?</option>
					</div>	
					
	        	</div>
				<div class="form-group">
	        		<div class="input-group">
		        		<div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>	        		
		              	<input type="text" id="answer" name="Answer" class="form-control" placeholder="Answer*" >           
		          	</div>	
	        	</div>
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<button type="submit" name="submit" class="signButton">Register</button>
					</div>
					<div class="col-lg-4"></div>
				</div>

	        </form>
				</div>
				<div class="row">
					<div class="col-lg-6">
					<h4>Already Registered<a href="index.php"> Login</a></h4>
					</div>
					<div class="col-lg-6">
						<h4><a href="ResetCodeProcess.php">Forgot Password</a></h4>
					</div>
				</div>
				</div>
				<div class="HomeComponent"  >
				<div class="well" style="padding:0px;">
				<div class="row">
					<div class="col-lg-12">
					<a href="../index.php"><button class="homeButton"><i class="fa fa-home"></i> Back To Home</button></a>
					</div>
					 
				</div>
				</div>
				</div>
				
			</div>
		</div>
		<div class="col-lg-3 col-lg-12"></div>
		 
	</div>
</div>
</div>
</body>
</html>
<script>
		function myvalidate()
{
	  var fullname=document.getElementById("fullname").value;;
	  var username=document.getElementById("username").value;
	  var email=document.getElementById("email").value;;
	  var phone=document.getElementById("phone").value; ;
	  var pass=document.getElementById("pass").value;;
	  var repass=document.getElementById("repass").value;;
	  var answer=document.getElementById("answer").value;;

   if(fullname.length==0||username.length==0||email.length==0||phone.length==0||pass.length==0||repass.length==0||answer.length==0)
     {
      
     document.getElementById("AllFields").innerHTML="* All Fields are required"; 

     return false;
     }
   else
   {
    document.getElementById("OkFields").innerHTML="Valid name";

     return true;
   }
}
</script>
 