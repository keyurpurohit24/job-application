<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'job_application';
  
    $conn = new mysqli($server,$user,$password,$database);
  
    if ($conn->connect_error) {
      die('Database connection failed ! ' . $conn->connect_error);
    }
?>