<!DOCTYPE html>
<html lang="en">
<head>
<title>Session Time Out</title>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<?php include_once 'navHomeLinks.php' ?>
 <div id="timeout">
    <div class="bigBox">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="well">
                        <h5>Oops...Session Time Out</h5>
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
                <img src="../image/comLogo.png" width="100%"> 
                </div>
              </div>
              <div class="col-lg-5 col-xs-4"></div>
            </div>
           <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                 <img src="../image/20.png" alt="" width="100%"> 
            </div>
            <div class="col-lg-4"></div>
           </div>
            <<h1>Session is about to timeout</h1>
    <h4>You will be automatically logged out and redirected to login page in <span id="countdown"></span>.</h4>
            <h4>Ballia Tent House</h4>
          </div>
            <div class="col-lg-3"></div>
        </div>
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            .
          </div>
          <div class="col-lg-4"></div>
        </div>
  </div>
    </div>
</div>      
</body>
</html>                                                       
<style>
     #countdown { font-size: 1.4em;
        color:#A0144F; }
</style>
<script>
    // Set timeout variables.
var timoutWarning = 10000; // Display warning in 14 Mins.
var timoutNow = 10500; // Timeout in 15 mins.
var logoutUrl = ''; // URL to logout page.
var warningTimer;
var timeoutTimer;

// Start timers.
function StartTimers() {
    warningTimer = setTimeout("IdleWarning()", timoutWarning);
    timeoutTimer = setTimeout("IdleTimeout()", timoutNow);
}

// Reset timers.
function ResetTimers() {
    clearTimeout(warningTimer);
    clearTimeout(timeoutTimer);
    StartTimers();
    $("#timeout").dialog('close');
}

// Show idle timeout warning dialog.
function IdleWarning() {
    $("#timeout").dialog({
        modal: true

    });
}
function IdleTimeout() {
    window.location = logoutUrl;
}
var timeleft = 10;
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    document.getElementById("countdown").innerHTML = "";
  } else {
    document.getElementById("countdown").innerHTML = timeleft + " Seconds";
  }
  timeleft -= 1;
}, 1000);
</script>