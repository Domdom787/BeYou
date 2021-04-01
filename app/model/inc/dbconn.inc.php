<?php

  $dbServername = "localhost"; 
  $dbUsername = "root";
  $dbpassword = "";
  $dbName = "beyou";

  $conn = mysqli_connect($dbServername, $dbUsername, $dbpassword, $dbName);

  if(!$conn) {
    die("DB Connection failed: " . mysqli_connect_error());
  }

?>