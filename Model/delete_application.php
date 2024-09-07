<?php
  session_start();
  require '../Model/connection.php';
  $user = $_SESSION['token'];
  $sql = "SELECT `id` FROM `users` WHERE `email` = '$user';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $uuid = $row['id'];
  $application_id = $_SERVER['QUERY_STRING'];
  $sql = "UPDATE `application` SET `is_deleted` = '1' WHERE `application`.`application_of` = '$uuid' AND `application_id` = '$application_id';";
  $conn->query($sql);
  header('Location: ../View/myApplications.php');
?>