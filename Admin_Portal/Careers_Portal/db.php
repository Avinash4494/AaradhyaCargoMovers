<link rel="icon" href="../../image/logo_A.png">

<?php 

                      $host = "localhost:3306";
                      $dbusername = "root";
                      $dbpassword = "";
                      $dbname = "aaradhyacargo_db";
                      $connect = new mysqli ($host,$dbusername,$dbpassword,$dbname);
                if (mysqli_connect_error()) 
                {
                  die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
                }
                
?>


  

 
