<?php
  session_start();
  if ($_SESSION['urole'] != 1) {
    echo "Unauthorized access detected !";
  }
  else{
    require './admin_panel.php';
    require '../Model/connection.php';
    $sql = "SELECT `application_id`,`profile_photo`,`first_name`,`last_name`,`email`,`contact`,`applied_on` FROM `users` INNER JOIN application ON application_of = users.id WHERE `status` <> 'Rejected' AND `application`.`is_deleted` = '0';";
    $result = $conn->query($sql);
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
    <th>Application No.</th>
    <th>Profile Photo</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Applied On</th>
    <th>View Application</th>
    <th>Approve Application</th>
    <th>Edit Application</th>
    <th>Reject Application</th>
    ";
    while($row = $result->fetch_assoc()){
      $application_id = $row['application_id'];
      $img = '..' . $row['profile_photo'];
      $fname = $row['first_name'];
      $lname = $row['last_name'];
      $email = $row['email'];
      $contact = $row['contact'];
      $dt = $row['applied_on'];
      echo "<tr>
        <td>{$application_id}</td>
        <td><img src='{$img}' height='60' width='60'></td>
        <td>{$fname}</td>
        <td>{$lname}</td>
        <td>{$email}</td>
        <td>{$contact}</td>
        <td>{$dt}</td>
        <td><a href='./view_application.php?{$application_id}'>View</a></td>
        <td><a href='./update_application_status.php?{$application_id}:APPROVE'>Approve</a></td>
        <td><a href='./edit_application.php?{$application_id}'>Edit</a></td>
        <td><a href='./update_application_status.php?{$application_id}:REJECT'>Reject</a></td>
      ";
    }
  }
?>