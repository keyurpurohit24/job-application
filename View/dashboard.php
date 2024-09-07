<?php
 session_start();
 if (isset($_SESSION['token']) && isset($_COOKIE['loginFlag'])) {
  if ($_SESSION['urole'] == 1) {
    require '../Model/connection.php';
    require './user_grid.php';
    $sql = "SELECT `profile_photo`,`first_name`,`last_name`,`email`,`contact`,`gender`,`address` from `users` WHERE `role` = '2' AND `is_deleted` = '0';";
    $result = $conn->query($sql);
    require './admin_panel.php';
    fetchGrid($result);
  }
  else{
    // require '../Model/connection.php';
    // // require './user_form.php';
    // $user = $_SESSION['token'];
    // $sql = "SELECT `profile_photo`, `first_name`, `last_name`, `email`, `contact`, `address`, `gender` FROM `users` WHERE `email` = '$user';";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    require './user_panel.php';
    
  }
}
else{
  header('Location: ./login.php');
 }
?>