<html>
<?php include_once '../../Header_Links/auth_Header_Links.php' ?>
  <body onload="getLocation(),fnBrowserDetect(),userLocation(),userLogTime(),submitform();">
                  <?php

  $ipaddress = $_SERVER['REMOTE_ADDR'];
  $getHostname  = gethostname();
  $getDate = date("d-m-Y");
  //  $ip_address = gethostbyname("www.google.com");  
  // echo "IP Address of Google is - ".$ip_address; 
//  foreach($_SERVER as $key => $value){
// echo '$_SERVER["'.$key.'"] = '.$value."<br />";
// }
  // $test_HTTP_proxy_headers = array('GATEWAY_INTERFACE','SERVER_ADDR','SERVER_NAME','SERVER_SOFTWARE','SERVER_PROTOCOL','REQUEST_METHOD','DOCUMENT_ROOT','HTTP_ACCEPT_ENCODING','HTTP_ACCEPT_LANGUAGE','HTTP_CONNECTION','HTTP_HOST','REMOTE_ADDR','REMOTE_PORT','SCRIPT_FILENAME','SERVER_ADMIN','SERVER_PORT','SERVER_SIGNATURE');
 //    foreach($test_HTTP_proxy_headers as $header){
 //        echo $header . ": " . $_SERVER[$header] . "<br/>";
 //    }
  include_once '../db.php';
  session_start();
if($_SESSION["user_id"]){
}
else {
header("location: user_Auth/index.php");
}
$user_id = $_SESSION['user_id'];
$query = mysqli_query($connect,"SELECT * FROM user_login WHERE user_id='$user_id'");
$row = mysqli_fetch_assoc($query);
  $user_id = $row['user_id'];
?>

<div class="well hidden">
      <form  action="log_activity_process.php" name="myForm" id="myForm" method="POST"  >
      <input type="text" name="log_activity_id" value="" id="log_activity_id"><br>
      <input type="text" name="auth_type" value="User" id="auth_type"><br>
      <input type="text" name="login_id" id="user_id" value="<?php echo $user_id; ?>"><br>      
      <input type="text" name="log_time" value="" id="log_time" /><br>
      <input type="text" name="log_date" value="<?php echo $getDate; ?>" /><br>
      <input type="text" name="log_ip_address" value="" id="ipaddress" /><br>
      <input type="text" name="logLocation" value="" id="log_user_loc" /><br>
      <input type="text" name="log_browser" value="" id="log_browser"/><br>
      <input type="text" name="log_hostname" value="<?php echo $getHostname; ?>" id="log_browser"/>
    </form>
</div>
  </body>
</html>
<script>
      function submitform()
    {
      document.myForm.submit();
    }
  function userLogTime()
  {
    var now = new Date();
  var getTheDate = now.toString().slice(0, 25);
    document.getElementById("log_time").innerHTML = getTheDate;
  }
  function fnBrowserDetect(){
                 
         let userAgent = navigator.userAgent;
         let browserName;
         if(userAgent.match(/chrome|chromium|crios/i)){
             browserName = "chrome";
           }else if(userAgent.match(/firefox|fxios/i)){
             browserName = "firefox";
           }  else if(userAgent.match(/safari/i)){
             browserName = "safari";
           }else if(userAgent.match(/opr\//i)){
             browserName = "opera";
           } else if(userAgent.match(/edg/i)){
             browserName = "edge";
           }else{
             browserName="No browser detection";
           }
          document.getElementById("log_browser").value=browserName;         
  }

 function userLogTime()
  {
    var now = new Date();
      var getTheDate = now.toString().slice(0, 25);
    document.getElementById("log_time").value = getTheDate;
  }
function userLocation()
  {
    var getIpAddress = '<?php echo $ipaddress; ?>';
    document.getElementById("ipaddress").value = getIpAddress;  
  }

var log_user_location = document.getElementById("log_user_loc");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            showPosition, 
            null, 
            {
               enableHighAccuracy: true,
               timeout: 5000,
               maximumAge: 0
            });
    } else { 
        log_user_location.value = "Geolocation is not supported by this browser.";
    }
}
function showPosition(position) {
    log_user_location.value="Lat: " + position.coords.latitude +" "+ "Long: " + position.coords.longitude; 
}
</script>