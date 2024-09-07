<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registeration</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../Components/StyleSheets/form_style.css">
</head>
<body>
  <div class="container form-container">
  <div class="heading">
    <h3>Register</h3>
  </div>
  <form action= "../Controller/validator.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label>First Name</label>
      <input type="text" name="userFirstName" class="form-control" placeholder="First Name" value="<?php echo $_COOKIE['temp_fname'] ?>">
      <span class="errText"><?php echo $_COOKIE['fnameErr']; ?></span>
    </div>
    <div class="form-group col-md-6">
      <label>Last Name</label>
      <input type="text" name="userLastName" class="form-control" placeholder="Last Name" value="<?php echo $_COOKIE['temp_lname'] ?>">
      <span class="errText"><?php echo $_COOKIE['lnameErr']; ?></span>
    </div>
  </div>

  <div class="form-row">
  <div class="form-group col-md-6">
    <label>Email</label>
    <input type="text" name="userEmail" class="form-control" placeholder="example@abc.com" value="<?php echo $_COOKIE['temp_email'] ?>">
    <span class="errText"><?php echo $_COOKIE['emailErr']; ?></span>
  </div>
  <div class="form-group col-md-6">
    <label>Contact</label>
    <input type="text" name="userContact" class="form-control" placeholder="Your mobile number" value="<?php echo $_COOKIE['temp_contact'] ?>">
    <span class="errText"><?php echo $_COOKIE['contactErr']; ?></span>
  </div>
  </div>

  <fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="userGender" id="gridRadios1" value="Male" <?php echo $_COOKIE['genMaleFlag']; ?>>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="userGender" id="gridRadios2" value="Female" <?php echo $_COOKIE['genFemaleFlag']; ?>>
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        <span class="errText"><?php echo $_COOKIE['genderErr']; ?></span>
      </div>

      </div>
      
  </fieldset>
  <div class="form-group">
    <label>Address</label>
    <textarea class="form-control" name="userAddress" id="exampleFormControlTextarea1" rows="3"><?php echo $_COOKIE['temp_address']; ?></textarea>
    <span class="errText"><?php echo $_COOKIE['addressErr']; ?></span>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label>Create Password</label>
      <input type="password" name="userPassword" class="form-control">
      <small id="passwordHelpBlock" class="form-text text-muted">
  Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
</small>
      <span class="errText"><?php echo $_COOKIE['passwordErr']; ?></span>
    </div>
    <div class="form-group col-md-6">
      <label>Confirm Password</label>
      <input type="password" name="usercPassword" class="form-control">
    </div>
  </div>

  
  <div class="form-group row">
    <label for="profilePhoto">Profile Photo</label>
    <div class="col-sm-10 btn-div">
      <input type="file" name="userProfilePhoto" id="">
      <span class="errText"><?php echo $_COOKIE['profilePhotoErr']; ?></span>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 btn-div">
      <button type="submit" name="submit" class="btn btn-primary">Register</button>
    </div>
  </div>

  <div class="form-group row">
    <div class="col-sm-10 btn-div">
      <a href="./login.php">Already Registered</a>
    </div>
  </div>
</form>
    
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>