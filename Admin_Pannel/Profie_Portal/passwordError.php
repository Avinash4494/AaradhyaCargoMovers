<?php include_once '../navAdminLinks.php'?>
  <div class="bigBox" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
          <div class="well">
            <h5>Oops !!! </h5>
          </div>
        </div>
      </div>
    </div>
     <div class="container">  
        <div class="row">
          <div class="col-lg-2"></div>
          <div class="col-lg-8">
          </div>
           <div id="commonProcess" class="container-fluid" >
            <h3>Enter Correct Username or Security question</h3><br><h4>Redirecting you back to Login Page! If not Goto <a href="index.php"> Here </a></h4>
          </div>
          <div class="col-lg-2"></div>
        </div>
  </div>
  </div>
  <?php 
  echo '<script>
        
        setTimeout(function(){ window.location.href="Forgot Password.php"; }, 3000);

</script>';
   ?>