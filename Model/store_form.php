<?php
session_start();

  function storeForm($payload){
    $payload = array_filter($payload);
    include '../Model/connection.php';
    $user = $_SESSION['token'];
    $sql = "SELECT `id` FROM `users` WHERE `email` = '$user';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
    $uuid = $row['id'];
    
    $sql = "INSERT INTO `application` (`application_of`) VALUES ('$uuid')";
    $conn->query($sql);

    $a_id = $conn->insert_id;
    
    $ssc_nob = $payload['nameOfBoardSSC'];
    $ssc_year = $payload['passingYearSSC'];
    $ssc_per = $payload['percentageSSC'];
    $sql = "INSERT INTO `education_details_ssc` (`application_id`,`id`, `name_of_board`, `passing_year`, `percentage`) VALUES ('$a_id','$uuid', '$ssc_nob', '$ssc_year', '$ssc_per')";
    $conn->query($sql);

    if (isset($payload['nameOfBoardHSC'])) {
      $hsc_nob = $payload['nameOfBoardHSC'];
      $hsc_year = $payload['passingYearHSC'];
      $hsc_per = $payload['percentageHSC'];
      $sql = "INSERT INTO `education_details_hsc` (`application_id`,`id`, `name_of_board`, `passing_year`, `percentage`) VALUES ('$a_id','$uuid', '$hsc_nob', '$hsc_year', '$hsc_per')";
      $conn->query($sql);
    }

    if (isset($payload['courseBE'])) {
      $be_course = $payload['courseBE'];
      $be_university = $payload['universityBE'];
      $be_year = $payload['passingYearBE'];
      $be_per = $payload['percentageBE'];
      $sql = "INSERT INTO `education_details_be` (`application_id`,`id`, `university`, `course`, `cgpa`, `passing_year`) VALUES ('$a_id','$uuid', '$be_university', '$be_course', '$be_per', '$be_year');";
      $conn->query($sql);
    }

    if (isset($payload['courseME'])) {
      $me_course = $payload['courseME'];
      $me_university = $payload['universityME'];
      $me_year = $payload['passingYearME'];
      $me_per = $payload['percentageME'];
      $sql = "INSERT INTO `education_details_me` (`application_id`,`id`, `university`, `course`, `cgpa`, `passing_year`) VALUES ('$a_id','$uuid', '$me_university', '$me_course', '$me_per', '$me_year')";
      $conn->query($sql);
    }

    if (isset($payload['companyName1'])) {
      $companyName1 = $payload['companyName1'];
      $pastDesignation1 = $payload['pastDesignation1'];
      $fromDate1 = $payload['fromDate1'];
      $toDate1 = $payload['toDate1'];
      $sql = "INSERT INTO `work_experience_main` ( `application_id`, `experience_of`, `company_name`, `designation`, `from_date`, `to_date`) VALUES ('$a_id','$uuid', '$companyName1', '$pastDesignation1', '$fromDate1', '$toDate1')";
      $conn->query($sql);
    }

    if (isset($payload['companyName2'])) {
      $companyName2 = $payload['companyName2'];
      $pastDesignation2 = $payload['pastDesignation2'];
      $fromDate2 = $payload['fromDate2'];
      $toDate2 = $payload['toDate2'];
      $sql = "INSERT INTO `work_experience_main` ( `application_id` ,`experience_of`, `company_name`, `designation`, `from_date`, `to_date`) VALUES ('$a_id','$uuid', '$companyName2', '$pastDesignation2', '$fromDate2', '$toDate2')";
      $conn->query($sql);
    }


    if (isset($payload['companyName3'])) {
      $companyName3 = $payload['companyName3'];
      $pastDesignation3 = $payload['pastDesignation3'];
      $fromDate3 = $payload['fromDate3'];
      $toDate3 = $payload['toDate3'];
      $sql = "INSERT INTO `work_experience_main` ( `application_id` ,`experience_of`, `company_name`, `designation`, `from_date`, `to_date`) VALUES ($a_id,'$uuid', '$companyName3', '$pastDesignation3', '$fromDate3', '$toDate3')";
      $conn->query($sql);
    }

    if (isset($payload['hindi']) && isset($payload['english']) && isset($payload['gujarati'])) {
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id' ,'$uuid', '1', '1', '1');";
      $conn->query($sql);
    }else if(isset($payload['hindi']) && isset($payload['english'])){
      $sql = "INSERT INTO `language_known` (`application_id` ,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id' ,'$uuid', '1', '1', '0');";
      $conn->query($sql);
    }else if(isset($payload['hindi']) && isset($payload['gujarati'])){
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id','$uuid', '1', '0', '1');";
      $conn->query($sql);
    }else if(isset($payload['english']) && isset($payload['gujarati'])){
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id','$uuid', '0', '1', '1');";
      $conn->query($sql);
    }else if(isset($payload['hindi'])){
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id','$uuid', '1', '0', '0');";
      $conn->query($sql);
    }else if(isset($payload['english'])){
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id','$uuid', '0', '1', '0');";
      $conn->query($sql);
    }else if(isset($payload['gujarati'])){
      $sql = "INSERT INTO `language_known` (`application_id`,`id`, `Hindi`, `English`, `Gujarati`) VALUES ('$a_id','$uuid', '0', '0', '1');";
      $conn->query($sql);
    }
    if (isset($payload['english'])) {
      $sql = "UPDATE `language_known` SET `English` = '1' WHERE `language_known`.`id` = `$uuid` AND `application_id` = '$a_id';
      ";
    }
    if (isset($payload['hindi'])) {
      array_shift($payload['hindi']);
      $sql = "INSERT INTO `hindi_lang` (`application_id`,`id`, `hread`, `hwrite`, `hspeak`) VALUES ('$a_id','$uuid', '0', '0', '0');";
      $conn->query($sql);
      foreach($payload['hindi'] as $key => $val){
        switch($val){
          case 'read':
            $sql = "UPDATE `hindi_lang` SET `hread` = '1' WHERE `hindi_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
          case 'write':
            $sql = "UPDATE `hindi_lang` SET `hwrite` = '1' WHERE `hindi_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
          break;
          case 'speak':
            $sql = "UPDATE `hindi_lang` SET `hspeak` = '1' WHERE `hindi_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
        }
      }
    }
    if (isset($payload['english'])) {
      array_shift($payload['english']);
      $sql = "INSERT INTO `english_lng` (`application_id`,`id`, `eread`, `ewrite`, `espeak`) VALUES ('$a_id','$uuid', '0', '0', '0')";
      $conn->query($sql);
      foreach($payload['english'] as $key => $val){
        switch($val){
          case 'read':
            $sql = "UPDATE `english_lng` SET `eread` = '1' WHERE `english_lng`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
          case 'write':
            $sql = "UPDATE `english_lang` SET `ewrite` = '1' WHERE `english_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
          break;
          case 'speak':
            $sql = "UPDATE `english_lang` SET `espeak` = '1' WHERE `english_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
        }
      }
    }
    if (isset($payload['gujarati'])) {
      array_shift($payload['gujarati']);
      $sql = "INSERT INTO `gujarati_lng` (`application_id`,`id`, `gread`, `gwrite`, `gspeak`) VALUES ('$a_id','$uuid', '0', '0', '0')";
      $conn->query($sql);
      foreach($payload['gujarati'] as $key => $val){
        switch($val){
          case 'read':
            $sql = "UPDATE `gujarati_lng` SET `gread` = '1' WHERE `gujarati_lng`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
          case 'write':
            $sql = "UPDATE `gujarati_lang` SET `gwrite` = '1' WHERE `gujarati_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
          break;
          case 'speak':
            $sql = "UPDATE `gujarati_lang` SET `gspeak` = '1' WHERE `gujarati_lang`.`id` = '$uuid' AND `application_id` = '$a_id';";
            $conn->query($sql);
            break;
        }
      }
    }

    if (isset($payload['php']) && isset($payload['mysql']) && isset($payload['laravel'])) {
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '1', '1', '1')";
      $conn->query($sql);
    }else if(isset($payload['php']) && isset($payload['mysql'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '1', '1', '0')";
      $conn->query($sql);
    }else if(isset($payload['php']) && isset($payload['laravel'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '1', '0', '1')";
      $conn->query($sql);
    }else if(isset($payload['mysql']) && isset($payload['laravel'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '0', '1', '1')";
      $conn->query($sql);
    }else if(isset($payload['php'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '1', '0', '0')";
      $conn->query($sql);
    }else if(isset($payload['mysql'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '0', '1', '0')";
      $conn->query($sql);
    }else if(isset($payload['laravel'])){
      $sql = "INSERT INTO `technology_known` (`application_id`,`id`, `php`, `mysql`, `laravel`) VALUES ('$a_id','$uuid', '0', '0', '1')";
      $conn->query($sql);
    }
    if (isset($payload['php'])) {
      $php_level = $payload['phpLevel'];
      switch ($php_level) {
        case 'beginner':
          $php_level = 1;
          break;
        case 'mideator':
          $php_level = 2;
          break;
        case 'expert':
          $php_level = 3;
          break;
      }
      $sql = "INSERT INTO `php_level` (`application_id`,`id`, `level`) VALUES ('$a_id','$uuid', '$php_level')";
      $conn->query($sql);
    }
    if (isset($payload['mysql'])) {
      $mysql_level = $payload['mysqlLevel'];
      switch ($mysql_level) {
        case 'beginner':
          $mysql_level = 1;
          break;
        case 'mideator':
          $mysql_level = 2;
          break;
        case 'expert':
          $mysql_level = 3;
          break;
      }
      $sql = "INSERT INTO `mysql_level` (`application_id`,`id`, `level`) VALUES ('$a_id','$uuid', '$mysql_level')";
      $conn->query($sql);
    }
    if (isset($payload['laravel'])) {
      $laravel_level = $payload['laravel'];
      switch ($laravel_level) {
        case 'beginner':
          $laravel_level = 1;
          break;
        case 'mideator':
          $laravel_level = 2;
          break;
        case 'expert':
          $laravel_level = 3;
          break;
      }
      $sql = "INSERT INTO `laravel_level` (`application_id`,`id`, `level`) VALUES ('$a_id','$uuid', '$laravel_level')";
      $conn->query($sql);
    }

    if (isset($payload['referenceName1'])) {
      $ref1_name = $payload['referenceName1'];
      $ref1_contact = $payload['referenceContact1'];
      $ref1_relation = $payload['referenceRelation1'];
      $sql = "INSERT INTO `refrence_contact_main` (`application_id`,`refrence_of`, `name`, `contact`, `relation`) VALUES ('$a_id','$uuid', '$ref1_name', '$ref1_contact', '$ref1_relation')";
      $conn->query($sql);
    }
    if (isset($payload['referenceName2'])) {
      $ref2_name = $payload['referenceName2'];
      $ref2_contact = $payload['referenceContact2'];
      $ref2_relation = $payload['referenceRelation2'];
      $sql = "INSERT INTO `refrence_contact_main` (`application_id`,`refrence_of`, `name`, `contact`, `relation`) VALUES ('$a_id','$uuid', '$ref2_name', '$ref2_contact', '$ref2_relation')";
      $conn->query($sql);
    }
    header('Location: ../View/myApplications.php');
  }


  function updateForm($payload){
    include '../Model/connection.php';
    $application = $_SERVER['QUERY_STRING'];
    $user = $_SESSION['token'];
    $sql = "SELECT `id` FROM `users` WHERE `email` = '$user';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $uuid = $row['id'];
    $fname = $payload['fname'];
    $lname = $payload['lname'];
    $email = $payload['email'];
    $phone = $payload['phone'];
    $address = $payload['address'];
    // $sql = "UPDATE `users` SET `first_name`='$fname',`last_name`='$lname',`email`='$email',`contact`='$phone',`address`='$address' WHERE `id` = '$uuid';";    
    // $conn->query($sql);
    print_r($payload);
    $ssc_nob = $payload['nameOfBoardSSC'];
    $ssc_year = $payload['passingYearSSC'];
    $ssc_per = $payload['percentageSSC'];

    $hsc_nob = $payload['nameOfBoardHSC'];
    $hsc_year = $payload['passingYearHSC'];
    $hsc_per = $payload['percentageHSC'];
    // $sql = "UPDATE `education_details_ssc` SET `name_of_board`='$ssc_nob',`passing_year`='$ssc_year',`percentage`='$ssc_per' WHERE `application_id` = '$application'";
    // $conn->query($sql);

    $sql = "UPDATE `education_details_hsc` SET `name_of_board`='$hsc_nob',`passing_year`='$hsc_year',`percentage`='$hsc_per' WHERE `application_id` = '$application';";
      $conn->query($sql);


      $be_course = $payload['courseBE'];
      $be_university = $payload['universityBE'];
      $be_year = $payload['passingYearBE'];
      $be_per = $payload['percentageBE'];

      $sql = "UPDATE `education_details_be` SET `university`='$be_university',`course`='$be_course',`cgpa`='$be_per',`passing_year`='$be_year' WHERE `application_id` = '$application';";
      $conn->query($sql);

      $me_course = $payload['courseME'];
      $me_university = $payload['universityME'];
      $me_year = $payload['passingYearME'];
      $me_per = $payload['percentageME'];
      
      $sql = "UPDATE `education_details_me` SET `university`='$me_university',`course`='$me_course',`cgpa`='$me_per',`passing_year`='$me_year' WHERE `application_id` = '$application';";
      $conn->query($sql);

      $companyName1 = $payload['companyName1'];
      $pastDesignation1 = $payload['pastDesignation1'];
      $fromDate1 = $payload['fromDate1'];
      $toDate1 = $payload['toDate1'];

      $sql = "UPDATE `work_experience_main` SET `company_name`='$companyName1',`designation`='$pastDesignation1',`from_date`='$fromDate1',`to_date`='$toDate1' WHERE `application_id` = '$application';";
      $conn->query($sql);

      $companyName2 = $payload['companyName2'];
      $pastDesignation2 = $payload['pastDesignation2'];
      $fromDate2 = $payload['fromDate2'];
      $toDate2 = $payload['toDate2'];

      $sql = "UPDATE `work_experience_main` SET `company_name`='$companyName2',`designation`='$pastDesignation2',`from_date`='$fromDate2',`to_date`='$toDate2' WHERE `application_id` = '$application';";
      $conn->query($sql);

      $companyName3 = $payload['companyName3'];
      $pastDesignation3 = $payload['pastDesignation3'];
      $fromDate3 = $payload['fromDate3'];
      $toDate3 = $payload['toDate3'];

      $sql = "UPDATE `work_experience_main` SET `company_name`='$companyName3',`designation`='$pastDesignation3',`from_date`='$fromDate3',`to_date`='$toDate3' WHERE `application_id` = '$application';";
      $conn->query($sql);
  }
  function display($payload){
    print_r(array_filter($payload));
  }
?>