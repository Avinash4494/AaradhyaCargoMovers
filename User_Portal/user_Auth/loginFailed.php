  
      <?php include_once '../../Header_Links/header_links.php' ?>
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
            <h3>Username or Password is incorrect.</h3><br><h4>Redirecting you back to Login Page! If not Goto <a href="../Admin_Portal/index.php"> Here </a></h4>
          </div>
          <div class="col-lg-2"></div>
        </div>
  </div>
  </div>
    <?php 
  echo '<script>
        
        setTimeout(function(){ window.location.href="index.php"; }, 2000);

</script>';
   ?>
 