<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'abhigyan');
   define('DB_PASSWORD', 'mariadb');
   define('DB_DATABASE', 'rideitmain');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE,3306);
   if(mysqli_connect_error())
      {echo "Connection failed";}
?>