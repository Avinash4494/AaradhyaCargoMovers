<?php include_once 'navAdminLinks.php' ?>
	<div class="bigBox">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3"></div>
				<div class="col-lg-3">
					<div class="well">
						<h5>Disconnected !!</h5>
					</div>
				</div>
			</div>
		</div>
			 <div class="container">  
       	<div class="row">
       		<div class="col-lg-3"></div>
       		<div class="col-lg-6">
          </div>
       		 <div id="commonProcess" class="container-fluid" >
            <div class="row">
              <div class="col-lg-5 col-xs-4"></div>
              <div class="col-lg-2 col-xs-4">
                <div class="iconComponent">
                <img src="image/L-1.gif" width="100%"> 
                </div>
              </div>
              <div class="col-lg-5 col-xs-4"></div>
            </div>
            <h1>Oops ! Toggle your internet connection on/off.</h1>
  			<h4>Aaradhya Cargo Movers</h4>
          </div>
       		<div class="col-lg-3"></div>
       	</div>
  </div>
	</div>
  <style>


 
  </style>
 <script>
       function updateConnectionStatus() {  
        var status = document.getElementById("status");
        if(navigator.onLine) {
          setTimeout(function(){ window.location.href="AdminDashboard.php"; }, 1000);
            status.classList.add("online");
            status.classList.remove("offline");                        
        } else {
            status.classList.add("offline");
            status.classList.remove("online");            
        }
    }
     // Attaching event handler for the load event
    window.addEventListener("load", updateConnectionStatus);
    
    // Attaching event handler for the online event
    window.addEventListener("online", function(e) {
        updateConnectionStatus();
        hint.innerHTML = "And we're back!";
        
    });
    
    // Attaching event handler for the offline event
    window.addEventListener("offline", function(e) {        
        updateConnectionStatus();
        hint.innerHTML = "Hey, it looks like you're offline.";
        console.log("Hey, it looks like you're offline.")
    });
 </script>