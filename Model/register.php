<?php
  function insertNewUser($conn,$userFirstName,$userLastName,$userEmail,$userContact,$userGender,$userAddress,$userProfilePhoto){
    $sql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `contact`, `gender`, `address`, `profile_photo`) VALUES ('$userFirstName', '$userLastName', '$userEmail', '$userContact', '$userGender', '$userAddress' , '$userProfilePhoto')";
    if($conn->query($sql)){
      header('Location: ./Dashboard');
    }
  }
  
?>