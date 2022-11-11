<?php
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'portal';

  $conn = mysqli_connect($server,$username,$password,$database);

  if(!$conn){
    echo '<script>alert("script connectino failed")</script>';
  }
?>