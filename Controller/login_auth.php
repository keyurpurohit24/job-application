<?php
  if (isset($_POST["submit"])) {
    $emailErr = $passwordErr = '';
    $flag = 0;
    if (empty($_POST['userEmail'])) {
      $emailErr = '* Please fill this field';
      $flag++;
    }
    if(empty($_POST['userPassword'])){
      $passwordErr = '* Please fill this field';
      $flag++;
    }

    if ($flag === 0) {
      $userEmail = $_POST['userEmail'];
      $userPassword = md5($_POST['userPassword']);

      $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'job_application';
  
    $conn = new mysqli($server,$user,$password,$database);
  
    if ($conn->connect_error) {
      die('Database connection failed ! ' . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM `users` WHERE `email` = '$userEmail';"; 
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
    $urole = $row['role'];
    if (!empty($row['email'])) {
      $uid = $row['id'];
      $sql = "SELECT * FROM `user_cred` WHERE `id` = '$uid';";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);
      if ($row['password'] == $userPassword) {
        session_start();
        $_SESSION['token'] = $userEmail;
        setcookie('loginFlag',true,0,'/');
        $_SESSION['urole'] = $urole;
        header('Location: ../View/dashboard.php');
      }
      else{
        echo "Authentication failed";
      }
    }
    else{
      echo "Not found";
    }

    }
  }
?>