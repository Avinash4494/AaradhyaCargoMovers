<?php include_once '../../Header_Links/header_links.php' ?>
<?php 
include('../db.php');
include_once '../session.php' ?>
<div class="bigBox" >
	<div class="container">
		<div class="appliedWell">
			<div class="well">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-lg-4">
						<img src="../image/cong02.png" class="img-responsive" alt="">
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="row">
					<div class="col-lg-3"></div>
					<div class="col-lg-6">
					</div>
					<div id="commonProcess" class="container-fluid" >
						<h3>Thank You!! Your Feedback has been saved.</h3>
						<h5>Aaradhya Cargo Movers</h5>
					</div>
					<div class="col-lg-3"></div>
				</div><br>
				
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<a href="../../index.php"><button class="actionButtonIcons-center">
					Back to Home
				</button></a>

			</div>
			<div class="col-lg-4"></div>
		</div>
	</div>
</div>
<script>
setTimeout(function(){ window.location.href="../../index.php"; }, 2000);
</script>'