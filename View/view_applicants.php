<?php
  session_start();
  if ($_SESSION['urole'] != 1) {
    echo "Unauthorized Access detected !";
  }
  else{
    require './admin_panel.php';
    require '../Model/connection.php';
    $sql = "SELECT DISTINCT `application_of` FROM `application` WHERE `is_deleted` = '0';";
    $result = $conn->query($sql);
    $totalApplicants = array();
    while($row = $result->fetch_assoc()){
      array_push($totalApplicants,$row['application_of']);
    }

    echo "
    <html>
    <head>
    <link rel='stylesheet' href='../Components/StyleSheets/form_style.css'>
    <link rel='stylesheet' href='../Components/StyleSheets/navbar.css'>
    </head>
    ";
   echo " 
   <body>
    <div class='container form-container'>
  <table>
    <th>Profile Photo</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Address</th>
    <th>Action</th>
    ";
    foreach($totalApplicants as $val){
      $sql = "SELECT `profile_photo`,`first_name`,`last_name`,`email`,`contact`,`gender`,`address` FROM `users` WHERE `id` = '$val';";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();

      echo "<tr>";
      $img =  '..' . $row['profile_photo'];
      echo "<td><img src='{$img}' height='50' width='50'></td>";
      foreach($row as $key => $val){
        if($key != 'profile_photo'){
          echo "<td>" . $val . "</td>";
        }
      }
      echo "<td><a href=''>View</a></td>";
      echo "</tr>";
    }    
  }
?>