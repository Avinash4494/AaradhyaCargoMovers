  
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
            <h3>Congratulations ! </h3><br><h4>Login Successfull..!!! <br>Redirecting you to Admin Dashboard! If not Goto <a href="index.php"> Here </a></h4>
          </div>
          <div class="col-lg-2"></div>
        </div>
  </div>
  </div>
  <?php 
  echo '<script>
        
        setTimeout(function(){ window.location.href="index.php"; }, 1000);

</script>';
   ?>