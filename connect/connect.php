<?php
  $host = "localhost";
  $user = "minji2260";
  $pw = "alswl226**";
  $dbName = "minji2260";
  $dbConnect = new mysqli($host, $user, $pw, $dbName);
  $dbConnect -> set_charset("utf8");

  if(mysqli_connect_errno()){
    echo "database connect false";
  }else{
    // echo "database connect good";
  }
?>