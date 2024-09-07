<?php
  session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
      $errArray = array('ssc_nob_err'=>'','ssc_year_err'=>'','ssc_per_err'=>'','hsc_nob_err'=>'','hsc_year_err'=>'','hsc_per_err'=>'','be_course_err'=>'','be_university_err'=>'','be_year_err'=>'','be_per_err'=>'','me_course_err'=>'','me_university_err'=>'','me_year_err'=>'','me_per_err'=>'','experience1_cname_err'=>'','experience1_des_err'=>'','experience1_from_err'=>'','experience1_to_err'=>'','experience2_cname_err'=>'','experience2_des_err'=>'','experience2_from_err'=>'','experience2_to_err'=>'','experience3_cname_err'=>'','experience3_des_err'=>'','experience3_from_err'=>'','experience3_to_err'=>'','hindi_err'=>'','english_err'=>'','gujarati_err'=>'','php_err'=>'','mysql_err'=>'','laravel_err'=>'','referenceName1_err'=>'','referenceContact1_err'=>'','referenceRelation1_err'=>'','referenceName2_err'=>'','referenceContact2_err'=>'','referenceRelation2_err'=>'');

      $ssc_nob_err = $ssc_year_err = $ssc_per_err = $hsc_nob_err = $hsc_year_err = $hsc_per_err = $be_course_err = $be_university_err = $be_year_err = $be_per_err = $me_course_err = $me_university_err = $me_year_err = $me_per_err = $experience1_cname_err = $experience1_des_err = $experience1_from_err = $experience1_to_err = $experience2_cname_err = $experience2_des_err = $experience2_from_err = $experience2_to_err = $experience3_cname_err = $experience3_des_err = $experience3_from_err = $experience3_to_err = $hindi_err = $english_err = $gujarati_err = $php_err = $mysql_err = $laravel_err = $referenceName1_err = $referenceContact1_err = $referenceRelation1_err = $referenceName2_err = $referenceContact2_err = $referenceRelation2_err = '';


      $flag = 0;

      //Education Details validation
      if (empty($_POST['nameOfBoardSSC'])) {
        $ssc_nob_err = '* This field is required';
        $errArray['ssc_nob_err'] = $ssc_nob_err;
        $flag++;
      }
      if (empty($_POST['passingYearSSC'])) {
        $ssc_year_err = '* This field is required';
        $errArray['ssc_year_err'] = $ssc_year_err;
        $flag++;
      }
      if(empty($_POST['percentageSSC'])){
        $ssc_per_err = '* This field is required';
        $errArray['ssc_per_err'] = $ssc_per_err;
        $flag++;
      }

      if(!empty($_POST['nameOfBoardHSC']) || !empty($_POST['passingYearHSC']) || !empty($_POST['percentageHSC'])){
        if(empty($_POST['nameOfBoardHSC'])){
          $hsc_nob_err = '* This field is required';
          $errArray['hsc_nob_err'] = $hsc_nob_err;
          $flag++;
        }
        if (empty($_POST['passingYearHSC'])) {
          $hsc_year_err = '* This field is required';
          $errArray['hsc_year_err'] = $hsc_year_err;
          $flag++;
        }
        if(empty($_POST['percentageHSC'])){
          $hsc_per_err = '* This field is required';
          $errArray['hsc_per_err'] = $hsc_per_err;
          $flag++;
        }
      }

      if(!empty($_POST['courseBE']) || !empty($_POST['universityBE']) || !empty($_POST['passingYearBE']) || !empty($_POST['percentageBE'])){
        if (empty($_POST['courseBE'])) {
          $be_course_err = '* This field is required';
          $errArray['be_course_err'] = $be_course_err;
          $flag++;
        }
        if(empty($_POST['universityBE'])){
          $be_university_err = '* This field is required';
          $errArray['be_university_err'] = $be_university_err;
          $flag++;
        }
        if(empty($_POST['passingYearBE'])){
          $be_year_err = '* This field is required';
          $errArray['be_year_err'] = $be_year_err;
          $flag++;
        }
        if(empty($_POST['percentageBE'])){
          $be_per_err = '* This field is required';
          $errArray['be_per_err'] = $be_per_err;
          $flag++;
        }
      }

      if(!empty($_POST['courseME']) || !empty($_POST['universityME']) || !empty($_POST['passingYearME'])){
        if (empty($_POST['courseME'])) {
          $me_course_err = '* This field is required';
          $errArray['me_course_err'] = $me_course_err;
          $flag++;
        }
        if(empty($_POST['universityME'])){
          $me_university_err = '* This field is required';
          $errArray['me_university_err'] = $me_university_err;
          $flag++;
        }
        if(empty($_POST['passingYearME'])){
          $me_year_err = '* This field is required';
          $errArray['me_year_err'] = $me_year_err;
          $flag++;
        }
        if(empty($_POST['percentageME'])){
          $me_per_err = '* This field is required';
          $errArray['me_per_err'] = $me_per_err;
          $flag++;
        }
      }

      //Work Experience Validation
      if(!empty($_POST['companyName1']) || !empty($_POST['pastDesignation1']) || !empty($_POST['fromDate1']) || !empty($_POST['toDate1'])){
        if(empty($_POST['companyName1'])){
          $experience1_cname_err = '* Please fill company name';
          $errArray['experience1_cname_err'] = $experience1_cname_err;
          $flag++;
        }
        if (empty($_POST['pastDesignation1'])) {
          $experience1_des_err = '* Please fill designation';
          $errArray['experience1_des_err'] = $experience1_des_err;
          $flag++;
        }
        if(empty($_POST['fromDate1'])){
          $experience1_from_err = '* Please provide valid date';
          $errArray['experience1_from_err'] = $experience1_from_err;
          $flag++;
        }
        if(empty($_POST['toDate1'])){
          $experience1_to_err = '* Please provide valid date';
          $errArray['experience1_to_err'] = $experience1_to_err;
          $flag++;
        }
      }

      if(!empty($_POST['companyName2']) || !empty($_POST['pastDesignation2']) || !empty($_POST['fromDate2']) || !empty($_POST['toDate2'])){
        if(empty($_POST['companyName2'])){
          $experience2_cname_err = '* Please fill company name';
          $errArray['experience2_cname_err'] = $experience2_cname_err;
          $flag++;
        }
        if (empty($_POST['pastDesignation2'])) {
          $experience2_des_err = '* Please fill designation';
          $errArray['experience2_des_err'] = $experience2_des_err;
          $flag++;
        }
        if(empty($_POST['fromDate2'])){
          $experience2_from_err = '* Please provide valid date';
          $errArray['experience2_from_err'] = $experience2_from_err;
          $flag++;
        }
        if(empty($_POST['toDate2'])){
          $experience2_to_err = '* Please provide valid date';
          $errArray['experience2_to_err'] = $experience2_to_err;
          $flag++;
        }
      }

      if(!empty($_POST['companyName3']) || !empty($_POST['pastDesignation3']) || !empty($_POST['fromDate3']) || !empty($_POST['toDate3'])){
        if(empty($_POST['companyName3'])){
          $experience3_cname_err = '* Please fill company name';
          $errArray['experience3_cname_err'] = $experience3_cname_err;
          $flag++;
        }
        if (empty($_POST['pastDesignation3'])) {
          $experience3_des_err = '* Please fill designation';
          $errArray['experience3_des_err'] = $experience3_des_err;
          $flag++;
        }
        if(empty($_POST['fromDate3'])){
          $experience3_from_err = '* Please provide valid date';
          $errArray['experience3_from_err'] = $experience3_from_err;
          $flag++;
        }
        if(empty($_POST['toDate3'])){
          $experience3_to_err = '* Please provide valid date';
          $errArray['experience3_from_err'] = $experience3_from_err;
          $flag++;
        }
      }

      //Language Known Validation
      if (isset($_POST['hindi'])) {
        if (count($_POST['hindi']) < 2) {
          $hindi_err = '* Please choose option';
          $errArray['hindi_err'] = $hindi_err;
          $flag++;
        }
      }
      if (isset($_POST['english'])) {
        if (count($_POST['english']) < 2) {
          $english_err = '* Please choose option';
          $errArray['english_err'] = $english_err;
          $flag++;
        }
      }
      if (isset($_POST['gujarati'])) {
        if (count($_POST['gujarati']) < 2) {
          $gujarati_err = '* Please choose option';
          $errArray['gujarati_err'] = $gujarati_err;
          $flag++;
        }
      }

      //Tech known Validation
      if (isset($_POST['php'])) {
        if(empty($_POST['phpLevel'])){
          $php_err = '* Please choose option';
          $errArray['php_err'] = $php_err;
          $flag++;
        }
      }
      if (isset($_POST['mysql'])) {
        if(empty($_POST['mysqlLevel'])){
          $mysql_err = '* Please choose option';
          $errArray['mysql_err'] = $mysql_err;
          $flag++;
        }
      }
      if (isset($_POST['laravel'])) {
        if(empty($_POST['laravelLevel'])){
          $laravel_err = '* Please choose option';
          $errArray['laravel_err'] = $laravel_err;
          $flag++;
        }
      }

      //Preference contact Validation
      if(!empty($_POST['referenceName1']) || !empty($_POST['referenceContact1']) || !empty($_POST['referenceRelation1'])){
        if(empty($_POST['referenceName1'])){
          $referenceName1_err = '* This field is required';
          $errArray['referenceName1_err'] = $referenceName1_err;
          $flag++;
        }
        if (empty($_POST['referenceContact1'])) {
          $referenceContact1_err = '* This field is required';
          $errArray['referenceContact1_err'] = $referenceContact1_err;
          $flag++;
        }
        if(empty($_POST['referenceRelation1'])){
          $referenceRelation1_err = '* This field is required';
          $errArray['referenceRelation1_err'] = $referenceRelation1_err;
          $flag++;
        }
      }

      if(!empty($_POST['referenceName2']) || !empty($_POST['referenceContact2']) || !empty($_POST['referenceRelation2'])){
        if(empty($_POST['referenceName2'])){
          $referenceName2_err = '* This field is required';
          $errArray['referenceName2_err'] = $referenceName2_err;
          $flag++;
        }
        if (empty($_POST['referenceContact2'])) {
          $referenceContact2_err = '* This field is required';
          $errArray['referenceContact2_err'] = $referenceContact2_err;
          $flag++;
        }
        if(empty($_POST['referenceRelation2'])){
          $referenceRelation2_err = '* This field is required';
          $errArray['referenceRelation2_err'] = $referenceRelation2_err;
          $flag++;
        }
      }
      if ($flag != 0) {
        foreach($errArray as $key => $val){
          setcookie($key,$val,0,'/');
        }
        if (empty($_SERVER['QUERY_STRING'])) {
          // header('Location: ..View/edit_application.php?}');
        }
        header('Location: ../View/user_form.php');
      }else{
        // require '../Model/store_form.php';
        // header('Location: ../View/myApplications.php');
        require '../Model/store_form.php';
        if(empty($_SERVER['QUERY_STRING'])){
          print_r($_SERVER);
          storeForm($_POST);
        }
        else{
          print_r($_SERVER);
          updateForm($_POST);
          header('Location: ../View/manage_applications.php');
        }
        // display($_POST);
      }
    }
?>