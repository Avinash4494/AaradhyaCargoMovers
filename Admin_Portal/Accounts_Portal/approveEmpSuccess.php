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
            <h5>Updated Successfully!!</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

  <?php 
  echo '<script>
        
        setTimeout(function(){ window.location.href="emp_access.php"; }, 500);

</script>';
   ?>