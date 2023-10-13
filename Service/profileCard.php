<div class="col-lg-3">
  <div class="detailsWell">
  <div class="well">
    <div class="row">
       
       <div class="col-lg-2"></div>
        <div class="col-lg-8">
          <div class="profileImage">
          <img src="<?php echo $upload_dir.$row['image'] ?>">
        </div>
        </div>
      <div class="col-lg-2"></div>
          
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="detailsData">
          <p hidden=""><?php echo $row['id'] ?></p>
         <p>Designation : <?php echo $row['uid'] ?></p>
         <p>Name : <?php echo $row['name'] ?></p>
         <p>Contact : <?php echo $row['contact'] ?> </p>
         <p>Email : <?php echo $row['email'] ?></p>
         
         <div class="actionSection">
            <div class="row">                      
              <div class="col-lg-4 col-md-4 col-xs-4 ">
                <a href="show.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
                  <span class=" glyphicon glyphicon-eye-open"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info btn-block">
                <span class="glyphicon glyphicon-edit"></span></a></div>
              <div class="col-lg-4 col-md-4 col-xs-4 "><a href="index.php?delete=<?php echo $row['id'] ?>" class="btn btn-info btn-block" onclick="return confirm('Are you sure to delete this record?')">
                <span class="glyphicon glyphicon-trash"></span> </a></div>
            </div>
          </div>
        </div>

         
      </div>
    </div>
    
  </div>
</div>
</div>