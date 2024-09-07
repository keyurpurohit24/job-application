<?php
  include './Components/CommonComponents/common_funcations.php';
  // require './Model/connection.php';
  include './Model/register.php';
  include './Controller/password_algo.php';


  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $fnameErr = $lnameErr = $emailErr = $contactErr = $genderErr = $addressErr = $profilePhotoErr = $passwordErr = '';
    $userFirstName = $userLastName = $userEmail = $userContact = $userGender = $userAddress = $userProfilePhoto = '';
    $errArray = array('fnameErr'=>'','lnameErr'=>'','emailErr'=>'','contactErr'=>'','genderErr'=>'','addressErr'=>'','profilePhotoErr'=>'','passwordErr'=>'');
    $flag = 0;

    //First Name Validation
    if (!empty($_POST['userFirstName'])) {
      setcookie('temp_fname',$_POST['userFirstName'],0,'/');
      if (strlen($_POST['userFirstName']) > 32) {
        $fnameErr = '* Length should be within 32 characters';
        $errArray['fnameErr'] = $fnameErr;
        $flag++;
      }
      $userFirstName = preg_match('/^[a-zA-Z ]*$/',test_input($_POST['userFirstName']));
      if ($userFirstName) {
        $userFirstName = $_POST['userFirstName'];
        $userFirstName = $_POST['userFirstName'];
      }
      else{ 
        $fnameErr = '* Only alphabets are allowed';
        $errArray['fnameErr'] = $fnameErr;
        $flag++;
      }
    }else{ 
      $fnameErr = '* Please fill this field'; 
      $errArray['fnameErr'] = $fnameErr;
      $flag++; 
    }

    //Last Name Validation
    if (!empty($_POST['userLastName'])) {
      setcookie('temp_lname',$_POST['userLastName'],0,'/');
      if (strlen($_POST['userLastName']) > 32) {
        $lnameErr = '* Length should be within 32 characters';
        $errArray['lnameErr'] = $lnameErr;
        $flag++;
      }
      $userLastName = preg_match('/^[a-zA-Z ]*$/',test_input($_POST['userLastName']));
      if ($userLastName) {
        $userLastName = $_POST['userLastName'];
      }
      else{ 
        $lnameErr = '* Only alphabets are allowed'; 
        $errArray['lnameErr'] = $lnameErr;
        $flag++; 
      }
    }else{
       $lnameErr = '* Please fill this field'; 
      $errArray['lnameErr'] = $lnameErr;
       $flag++; 
      }

    //Email Validation
    if (!empty($_POST['userEmail'])) {
      setcookie('temp_email',$_POST['userEmail'],0,'/');
      if (strlen($_POST['userEmail']) > 255) {
        $emailErr = '* Length should be within 255 characters';
        $errArray['emailErr'] = $emailErr;
        $flag++;
      }
      $userEmail = test_input($_POST['userEmail']);
      if (!(filter_var($userEmail,FILTER_VALIDATE_EMAIL))) {
        $emailErr = '* Invalid email';
        $errArray['emailErr'] = $emailErr;
        $flag++;
      }
    }else{
       $emailErr = '* Please fill this field'; 
      $errArray['emailErr'] = $emailErr;
       $flag++; 
      }


    //Contact Validation
    if (!empty($_POST['userContact'])) {
      setcookie('temp_contact',$_POST['userContact'],0,'/');
      if (strlen($_POST['userContact']) > 10) {
        $contactErr = '* Please enter valid mobile number';
        $errArray['contactErr'] = $contactErr;
        $flag++;
      }
      $userContact = $_POST['userContact'];
      if (!(filter_var($userContact,FILTER_SANITIZE_NUMBER_INT))) {
        $contactErr = '* Invalid mobile number';
        $errArray['contactErr'] = $contactErr;
        $flag++;
      }
    }else{ 
      $contactErr = '* Please fill this field'; 
      $errArray['contactErr'] = $contactErr;
      $flag++; 
    }

    //Gender Validation
    if(empty($_POST['userGender'])){
      $genderErr = '* Please choose option';
      $errArray['genderErr'] = $genderErr;
      $flag++;
    }else{
      $userGender = $_POST['userGender'];
      switch($userGender){
        case 'Male':
          setcookie('genMaleFlag','checked',0,'/');
          break;
        case 'Female';
        setcookie('genFemaleFlag','checked',0,'/');
        break;
      }
    }

    //Address Validation
    if(!empty($_POST['userAddress'])){
      setcookie('temp_address',$_POST['userAddress'],0,'/');
      if(strlen($_POST['userAddress'])>255){
        $addressErr = '* Length should be within 255 characters';
        $errArray['addressErr'] = $addressErr;
        $flag++;
      }
      $userAddress = test_input($_POST['userAddress']);
    }else{
      $addressErr = '* Please fill this field'; 
      $errArray['addressErr'] = $addressErr;
       $flag++; 
    }

    //Profile Photo Validation
    if(empty($_FILES['userProfilePhoto']['name'])){
      $profilePhotoErr = '* Please select file to be upload';
      $errArray['profilePhotoErr'] = $profilePhotoErr;
      $flag++;
    }else{
      if($_FILES['userProfilePhoto']['size'] > 1000000){
        $profilePhotoErr = '* File size must be less than 1 mb';
        $errArray['profilePhotoErr'] = $profilePhotoErr;
        $flag++;
      }
      $allowed_type = array('image/jpg','image/jpeg','image/png');
      if(!(in_array($_FILES['userProfilePhoto']['type'],$allowed_type))){
        $profilePhotoErr = '* File must be an image';
        $errArray['profilePhotoErr'] = $profilePhotoErr;
        $flag++;
      }
      else{
        $path = '../upload/' . basename($_FILES['userProfilePhoto']['name']);
        move_uploaded_file($_FILES['userProfilePhoto']['tmp_name'],$path);
        $userProfilePhoto = '/upload/' . basename($_FILES['userProfilePhoto']['name']);
      }
    }

    //Password Validation
    if(!empty($_POST['userPassword'])){
      if (strlen($_POST['userPassword']) < 8 || strlen($_POST['userPassword']) > 20) {
        $passwordErr = '* Password must have atleast 8 letters long';
        $errArray['passwordErr'] = $passwordErr;
        $flag++;
      }else if(!(preg_match("/\d/",$_POST['userPassword']))){
        $passwordErr = '* Password must has atleast one digit';
        $errArray['passwordErr'] = $passwordErr;
        $flag++;
    }else if(!(preg_match('/[A-Z]/',$_POST['userPassword']))){
      $passwordErr = '* Password must has atleast one capital letter';
      $errArray['passwordErr'] = $passwordErr;
      $flag++;
    }
    else if(!(preg_match("/\w/",$_POST['userPassword']))){
      $passwordErr = "* Password should contain atleast one special chracter";
      $errArray['passwordErr'] = $passwordErr;
      $flag++;
    }
    else if($_POST['userPassword'] !== $_POST['usercPassword']){
      $passwordErr = '* Password not match';
      $errArray['passwordErr'] = $passwordErr;
      $flag++;
    }

  }else{
    $passwordErr = "* Please fill this field";
    $errArray['passwordErr'] = $passwordErr;
    $flag++;
  }
  }
  if (!empty($errArray)) {
    foreach($errArray as $key => $val){
      setcookie($key,$val,0,'/');
    }
    header('Location: ../View/registration.php');
   } 
  if ($flag == 0) {
    require '../Model/connection.php'; 
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `contact`, `gender`, `address`, `profile_photo`) VALUES ('$userFirstName', '$userLastName', '$userEmail', '$userContact', '$userGender', '$userAddress' , '$userProfilePhoto');";
    $conn -> query($sql);
    $last_id = $conn->insert_id;
    $enc_pass = md5($_POST['userPassword']);
    $sql = "INSERT INTO `user_cred` (`id`, `password`) VALUES ('$last_id', '$enc_pass');";
    if($conn->query($sql)){
      header('Location: ../View/login.php');
    }
  }
  function test_input($input){
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
  }
  
?>