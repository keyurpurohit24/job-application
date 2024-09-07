<?php
  session_start();
  require '../Model/connection.php';
  $user = $_SESSION['token'];
    $sql = "SELECT `id` FROM `users` WHERE `email` = '$user';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uuid = $row['id'];
  $sql = "SELECT `application_id`,`applied_on`, `status` FROM `application` WHERE `application_of` = '$uuid' AND `is_deleted` = '0';";
  $result = $conn->query($sql);
  echo "
  <div class='container form-container'>
  <table>
    <th>Applications</th>
    <th>Status</th>
    <th>Action</th>
  ";
  while($row = $result->fetch_assoc()){
    echo "<tr>";
    if ($row['status'] == 'Pending') {
      echo "<td>{$row['applied_on']}</td>
      <td class='text-decor'>{$row['status']}</td>
      <td><a href='../Model/delete_application.php?{$row['application_id']}'>Delete</a></td>
      ";
    }
    elseif($row['status'] == 'Approved'){
      echo "<td>{$row['applied_on']}</td>
      <td class='text-decor'>{$row['status']}</td>
      <td></td>
      ";
    }
    elseif($row['status'] == 'Rejected'){
      echo "<td>{$row['applied_on']}</td>
      <td class='text-decor'>{$row['status']}</td>
      <td></td>
      ";
    }
    echo "
    </tr>";
  }
  echo "</table>
    </div>
  ";
?>