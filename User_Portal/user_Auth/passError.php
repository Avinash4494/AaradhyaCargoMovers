<body style="background-color: transparent;">
  
      <?php include_once '../../Header_Links/header_links.php' ?>
  <div class="bigBox" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
          <div class="well">
            <h5>Oops!!</h5>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6"></div>
        <div class="col-lg-6">
         <h1>Sorry ! </h1> Your password do not match <a href="Register.php">Go Back</a> </h3>
        </div>
      </div>
    </div>
  </div>
</body>
	<style>
   .bigBox .well
{
    background-color:red;
    color: white;
    border:1px solid red;
    padding: 5px;
    text-align: center;
} 
  </style> 
	<?php 
	echo '<script>
				
				setTimeout(function(){ window.location.href="ForgotPassword.php"; }, 1500);

</script>';
	 ?>