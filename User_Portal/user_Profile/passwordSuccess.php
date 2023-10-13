  <?php include_once '../../Header_Links/header_links.php' ?>
  <div class="bigBox" >
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
          <div class="well">
            <h5>Success!!</h5>
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
            <h3>Congratulations..!! </h3><h4> Password Reset Complete..!! <br><br>Redirecting you to Login Page! </br>If not Goto <a href="../index.php"> Here </a> </h4>
          </div>
          <div class="col-lg-2"></div>
        </div>
  </div>
  </div>
  <?php 
  echo '<script>
        
        setTimeout(function(){ window.location.href="company_profile.php"; }, 1500);

</script>';
   ?>