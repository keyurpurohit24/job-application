<?php
  session_start();
  require '../Model/connection.php';
  if ($_SESSION['urole'] != 1) {
    echo "Unauthorized access detected !";
  }
  else{
    $a_id = strtok($_SERVER['QUERY_STRING'],':');
    $operation = strtok(':');
    if ($operation == 'APPROVE') {
      $sql = "UPDATE `application` SET `status` = 'Approved' WHERE `application`.`application_id` = '$a_id'";
      $conn->query($sql);
    }
    if ($operation == 'REJECT') {
      $sql = "UPDATE `application` SET `status` = 'Rejected' WHERE `application`.`application_id` = '$a_id'";
      $conn->query($sql);
    }
    require '../View/manage_applications.php';
  }
?>