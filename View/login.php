<?php
session_start();
if (isset($_SESSION['token']) && isset($_COOKIE['loginFlag'])) {
  header('Location: ../View/dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../Components/StyleSheets/form_style.css">
</head>
<body>
  <div class="container form-container">
  <div class="heading">
    <h3>Login</h3>
  </div>
<form action="../Controller/login_auth.php" method="post">
  <div class="form-group">
    <label>Email</label>
    <input type="text" name="userEmail" class="form-control" placeholder="Enter email">
    <span class="errText"></span>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" name="userPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
    <span class="errText"><?php ?></span>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 btn-div">
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 btn-div">
      <a href="./registration.php">I'm new user</a>
    </div>
  </div>
</div>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>