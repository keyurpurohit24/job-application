<?php
require '../Model/connection.php';
session_start();
$user = $_SESSION['token'];
$sql = "SELECT `profile_photo`, `first_name`, `last_name`, `email`, `contact`, `address`, `gender` FROM `users` WHERE `email` = '$user';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
if ($_SERVER['SCRIPT_NAME'] == '/PHP Workspace/job-application/View/user_form.php') {
    fetchForm($row);
}
  function fetchForm($row){
    $maleCheckFlag = $femaleCheckFlag = '';
    $row['gender'] = 'Male' ? $maleCheckFlag = 'checked' : $femaleCheckFlag = 'checked';
    $profileImg = '..' . $row['profile_photo'];
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
      <meta charset='UTF-8'>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <title>Document</title>
      <link rel='stylesheet' href='../Components/StyleSheets/job_form_style.css'>
    </head>
    <body>
      <div class='main-container'>
        <div class='heading'>
            <div class='h3'>
                <h3>Job Application</h3>
            </div>
        </div>
        <div class='display-div'>
            <form name='job_application_form' id='demo_form' method='post' action='../Controller/process_job_application_form.php'>
                <fieldset id='fs-1'>
                    <legend>Basic Detail</legend>
                    <table>
                        <tr>
                            <td>
                                <label>First name</label>
                            </td>
                            <td>
                                <input type='text' name='fname' id='fname' placeholder='First name' value='{$row['first_name']}' tabindex='1' disabled><br>
                                <span id='fname-err'></span>
                            </td>
                            <td>
                                <label>Last name</label>
                            </td>
                            <td>
                                <input type='text' name='lname' id='lname' placeholder='Last name' value='{$row['last_name']}' tabindex='1' disabled><br>
                                <span id='lname-err'></span>
                            </td>
                            <td>
                            <div>
                              <img src='{$profileImg}' alt='' height='100' width='100'>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type='text' name='email' id='email' placeholder='123@gmail.com' value='{$row['email']}' tabindex='1' disabled><br>
                                <span id='email-err'></span>
                            </td>
                            <td>
                                <label>Phone Number</label>
                            </td>
                            <td>
                                <input type='text' name='phone' id='phone' placeholder='+91' value='{$row['contact']}' tabindex='1' disabled><br>
                                <span id='phone-err'></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                              <textarea name='address' id='' rows='3' disabled>{$row['address']}</textarea>
                            </td>
                            <td>
                              <label>Gender</label>
                              <td>
                                <label>Male</label><input type='radio' name='gender' id='male' value='male' tabindex='1' {$maleCheckFlag}>
                            <label>Female</label><input type='radio' name='gender' id='female' tabindex='1' {$femaleCheckFlag}>
                        </td>
                          </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
    
                <fieldset id='fs-2' >
                    <legend>Education Detail</legend>
                    <h6>SSC Result</h6>
                    <table> 
                        <tr>
                            <td>
                                <label>Name Of board</label>
                            </td>
                            <td>
                                <input type='text' name='nameOfBoardSSC' id='nameOfBoardSSC' placeholder='GSEB' tabindex='1' value=''><br>
                                <span id='ssc-nob-err'>{$_COOKIE['ssc_nob_err']}</span>
                            </td>
                            <td>
                                <label>Passing Year</label>
                            </td>
                            <td>
                                <input type='number' name='passingYearSSC' id='passingYearSSC' min='2000' max='2023' tabindex='1'><br>
                                <span id='ssc-year-err'>{$_COOKIE['ssc_year_err']}</span>
                            </td>
                            <td>
                                <label>Percentage</label>
                            </td>
                            <td>
                                <input type='number' name='percentageSSC' id='percentageSSC' min='0' max='100' tabindex='1'><br>
                                <span id='ssc-per-err'>{$_COOKIE['ssc_per_err']}</span>
                            </td>
                        </tr>
                    </table>
                    
                    <h6>HSC/Diploma Result</h6>
                    <table>
                        <tr>
                            <td>
                                <label>Name Of board</label>
                            </td>
                            <td>
                                <input type='text' name='nameOfBoardHSC' id='nameOfBoardHSC' placeholder='GTU/GSEB' tabindex='1'><br>
                                <span id='hsc-nob-err'>{$_COOKIE['hsc_nob_err']}</span>
                            </td>
                            <td>
                                <label>Passing Year</label>
                            </td>
                            <td>
                                <input type='number' name='passingYearHSC' id='passingYearHSC min='2000' min='2000' max='2023' tabindex='1'><br>
                                <span id='hsc-year-err'>{$_COOKIE['hsc_year_err']}</span>
                            </td>
                            <td>
                                <label>Percentage</label>
                            </td>
                            <td>
                                <input type='number' name='percentageHSC' id='percentageHSC' min='0' max='100' tabindex='1'><br>
                                <span id='hsc-per-err'>{$_COOKIE['hsc_per_err']}</span>
                            </td>
                        </tr>
                    </table>
                    
                    <h6>Bachlor Degree</h6>
                        <table>
                            <tr>
                                <td>
                                    <label>Course Name</label>
                                </td>
                                <td>
                                    <input type='text' name='courseBE' id='courseBE' placeholder='Information Technology' tabindex='1'><br>
                                    <span id='be-course-err'>{$_COOKIE['be_course_err']}</span>
                                </td>
                                <td>
                                    <label>University</label>
                                </td>
                                <td>
                                    <input type='text' name='universityBE' id='universityBE' placeholder='GTU' tabindex='1'><br>
                                    <span id='be-university-err'>{$_COOKIE['be_university_err']}</span>
                                </td>
                                <td>
                                    <label>Passing Year</label>
                                </td>
                                <td>
                                    <input type='number' name='passingYearBE' id='passingYearBE' min='2000' max='2023' tabindex='1'><br>
                                    <span id='be-year-err'>{$_COOKIE['be_year_err']}</span>
                                </td>
                                <td>
                                    <label>Percentage</label>
                                </td>
                                <td>
                                    <input type='number' name='percentageBE' id='percentageBE' min='0' max='100' tabindex='1'><br>
                                    <span id='be-per-err'>{$_COOKIE['be_per_err']}</span>
                                </td>
                            </tr>
                        </table>
                        
                        <h6>Master Degree</h6>
                        <table>
                            <tr>
                                <td>
                                    <label>Course Name</label>
                                </td>
                                <td>
                                    <input type='text' name='courseME' id='courseME' placeholder='Computer Science' tabindex='1'><br>
                                    <span id='me-course-err'>{$_COOKIE['me_course_err']}</span>
                                </td>
                                <td>
                                    <label>University</label>
                                </td>
                                <td>
                                    <input type='text' name='universityME' id='universityME' placeholder='GTU' tabindex='1'><br>
                                    <span id='me-university-err'>{$_COOKIE['me_university_err']}</span>
                                </td>
                                <td>
                                    <label>Passing Year</label>
                                </td>
                                <td>
                                    <input type='number' name='passingYearME' id='passingYearME' min='2000' max='2023' tabindex='1'><br>
                                    <span id='me-year-err'>{$_COOKIE['me_year_err']}</span>
                                </td>
                                <td>
                                    <label>Percentage</label>
                                </td>
                                <td>
                                    <input type='number' name='percentageME' id='percentageME' min='0' max='100' tabindex='1'><br>
                                    <span id='me-per-err'>{$_COOKIE['me_per_err']}</span>
                                </td>
                            </tr>
                        </table>
                </fieldset>
                <br>
                <fieldset id='fs-3' >
                    <legend>Work Experience</legend>
                    <h6>Experience-1</h6>
                    <table>
                        <tr>
                            <td>
                                <label>Comapany Name</label>
                            </td>
                            <td>
                                <input type='text' name='companyName1' id='companyName1' tabindex='1'><br>
                                <span id='companyName1-err'>{$_COOKIE['experience1_cname_err']}</span>
                            </td>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type='text' name='pastDesignation1' id='pastDesignation1' tabindex='1'><br>
                                <span id='pastDesignation1-err'>{$_COOKIE['experience1_des_err']}</span>
                            </td>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type='date' name='fromDate1' id='fromDate1' tabindex='1'><br>
                                <span id='fromDate1-err'>{$_COOKIE['experience1_from_err']}</span>
                            </td>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type='date' name='toDate1' id='toDate1' tabindex='1'><br>
                                <span id='toDate1-err'>{$_COOKIE['experience1_to_err']}</span>
                            </td>
                        </tr>
                    </table>
                    <h6>Experience-2</h6>
                    <table>
                        <tr>
                            <td>
                                <label>Comapany Name</label>
                            </td>
                            <td>
                                <input type='text' name='companyName2' id='companyName2' tabindex='1'><br>
                                <span id='companyName2-err'>{$_COOKIE['experience2_cname_err']}</span>
                            </td>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type='text' name='pastDesignation2' id='pastDesignation2' tabindex='1'><br>
                                <span id='pastDesignation2-err'>{$_COOKIE['experience2_des_err']}</span>
                            </td>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type='date' name='fromDate2' id='fromDate2' tabindex='1'><br>
                                <span id='fromDate2-err'>{$_COOKIE['experience2_from_err']}</span>
                            </td>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type='date' name='toDate2' id='toDate2' tabindex='1'><br>
                                <span id='toDate2-err'>{$_COOKIE['experience2_to_err']}</span>
                            </td>
                        </tr>
                    </table>
                    <h6>Experience-3</h6>
                    <table>
                        <tr>
                            <td>
                                <label>Comapany Name</label>
                            </td>
                            <td>
                                <input type='text' name='companyName3' id='companyName3' tabindex='1'><br>
                                <span id='companyName3-err'>{$_COOKIE['experience3_cname_err']}</span>
                            </td>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type='text' name='pastDesignation3' id='pastDesignation3' tabindex='1'><br>
                                <span id='pastDesignation3-err'>{$_COOKIE['experience3_des_err']}</span>
                            </td>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type='date' name='fromDate3' id='fromDate3' tabindex='1'><br>
                                <span id='fromDate3-err'>{$_COOKIE['experience3_from_err']}</span>
                            </td>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type='date' name='toDate3' id='toDate3' tabindex='1'><br>
                                <span id='toDate3-err'>{$_COOKIE['experience3_to_err']}</span>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset id='fs-4' >
                    <legend>Language Known</legend>
                    <table>
                        <tr>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hindi' value='hindi' onclick='enable(); disable();' tabindex='1'>
                                <label for='hindi'><i>Hindi</i></label>
                            </td>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hRead' value='read' tabindex='1' disabled>
                                <label for='hRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hWrite' value='write' tabindex='1' disabled>
                                <label for='hWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hSpeak'  value='speak' tabindex='1' disabled>
                                <label for='hSpeak'>Speak</label>
                                <span id='hindi-err'>{$_COOKIE['hindi_err']}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='checkbox' name='english[]' id='english' value='english' onclick='enable(); disable();' tabindex='1'>
                                <label for='english'><i>English</i></label>
                            </td>
                            <td>
                                <input type='checkbox' name='english[]' id='eRead' value='read' tabindex='1' disabled>
                                <label for='eRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='english[]' id='eWrite' value='write' tabindex='1' disabled>
                                <label for='eWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='english[]' id='eSpeak' value='speak' tabindex='1' disabled>
                                <label for='eSpeak'>Speak</label>
                                <span id='english-err'>{$_COOKIE['english_err']}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gujarati' value='gujarati' onclick='enable(); disable();' tabindex='1'>
                                <label for='gujarati'><i>Gujarati</i></label>
                            </td>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gRead' value='read' tabindex='1' disabled>
                                <label for='gRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gWrite' value='write' tabindex='1' disabled>
                                <label for='gWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gSpeak' value='speak' tabindex='1' disabled>
                                <label for='gSpeak'>Speak</label>
                                <span id='gujarati-err'>{$_COOKIE['gujarati_err']}</span>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset id='fs-5' >
                    <legend>Technology You Know</legend>
                    <table>
                        <tr>
                            <td>
                                <input type='checkbox' name='php' id='php' onclick='enable(); disable();' tabindex='1'>
                                <label for='php'><i>PHP</i></label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-b' tabindex='1' value='beginner' disabled>
                                <label for='php-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-m' tabindex='1' value='mideator' disabled>
                                <label for='php-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-e' tabindex='1' value='expert' disabled>
                                <label for='php-e'>Expert</label>
                                <span id='php-err'>{$_COOKIE['php_err']}</span>
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <input type='checkbox' name='mysql' id='mysql' onclick='enable(); disable();' tabindex='1'>
                                <label for='mysql'><i>MySQL</i></label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-b' tabindex='1' value='beginner' disabled>
                                <label for='mysql-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-m' tabindex='1' value='mideator' disabled>
                                <label for='mysql-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-e' tabindex='1' value='expert' disabled>
                                <label for='mysql-e'>Expert</label>
                                <span id='mysql-err'>{$_COOKIE['mysql_err']}</span>
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <input type='checkbox' name='laravel' id='laravel' onclick='enable(); disable();' value='beginner' tabindex='1'>
                                <label for='laravel'><i>Laravel</i></label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-b' tabindex='1' value='mideator' disabled>
                                <label for='laravel-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-m' tabindex='1' value='expert' disabled>
                                <label for='laravel-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-e' tabindex='1' disabled>
                                <label for='laravel-e'>Expert</label>
                                <span id='laravel-err'>{$_COOKIE['laravel_err']}</span>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset id='fs-6' >
                    <legend>Reference Contact</legend>
                    <h6>Reference contact-1</h6>
                    <table>
                        <tr>
                            <td>
                                 <label>Name</label>
                            </td>
                            <td>
                                <input type='text' name='referenceName1' id='referenceName1' tabindex='1'><br>
                                <span id='referenceName1-err'>{$_COOKIE['referenceName1_err']}</span>
                            </td>
                            <td>
                                <label>Contact Number</label>
                            </td>
                            <td>
                                <input type='text' name='referenceContact1' id='referenceContact1' tabindex='1'><br>
                                <span id='referenceContact1-err'>{$_COOKIE['referenceContact1_err']}</span>
                            </td>
                            <td>
                                <label>Relation</label>
                            </td>
                            <td>
                                <input type='text' name='referenceRelation1' id='referenceRelation1' tabindex='1'><br>
                                <span id='referenceRelation1-err'>{$_COOKIE['referenceRelation1_err']}</span>
                            </td>
                        </tr>
                    </table>
            
                    <h6>Reference contact-2</h6>
                    <table>
                        <tr>
                            <td>
                                 <label>Name</label>
                            </td>
                            <td>
                                <input type='text' name='referenceName2' id='referenceName2' tabindex='1'><br>
                                <span id='referenceName2-err'>{$_COOKIE['referenceName2_err']}</span>
                            </td>
                            <td>
                                <label>Contact Number</label>
                            </td>
                            <td>
                                <input type='text' name='referenceContact2' id='referenceContact2' tabindex='1'><br>
                                <span id='referenceContact2-err'>{$_COOKIE['referenceContact2_err']}</span>
                            </td>
                            <td>
                                <label>Relation</label>
                            </td>
                            <td>
                                <input type='text' name='referenceRelation2' id='referenceRelation2' tabindex='1'><br>
                                <span id='referenceRelation2-err'>{$_COOKIE['referenceRelation2_err']}</span>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <br>
                <fieldset id='fs-7' >
                    <legend>Preferences</legend>
                    <table>
                        <tr>
                            <td>
                                <label>Prefered Location</label>
                            </td>
                            <td>
                                <select name='preferedLocation[]' id='preferedLocation' multiple tabindex='1'>
                                    <option value='Ahmedabad' name='preferedLocation'>Ahmedabad</option>
                                    <option value='Bangalore' name='preferedLocation'>Bangalore</option>
                                    <option value='Hydrabad' name='preferedLocation'>Hydrabad</option>
                                    <option value='Gurugram' name='preferedLocation'>Gurugram</option>
                                </select>
                            </td>
                            <td>
                                <label>Notice Period</label>
                            </td>
                            <td>
                                <input type='number' name='noticePeriod' id='noticePeriod' min='1' max='4' tabindex='1'>
                                <label>(Months)</label>
                            </td>
                            <td>
                                <label>Expected CTC</label>
                            </td>
                            <td>
                                <input type='number' name='expectedCTC' id='expectedCTC' step='50000' tabindex='1'>
                            </td>
                            <td>
                                <label>Current CTC</label>
                            </td>
                            <td>
                                <input type='number' name='currentCTC' id='currentCTC' step='150000' tabindex='1'>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Department</label>
                            </td>
                            <td>
                                <select name='department' id='department' tabindex='1'>
                                    <option value='Development'>Development</option>
                                    <option value='Marketing'>Marketing</option>
                                    <option value='Design'>Design</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <div class='control-btn'>
                       <input type='submit' name = 'submit' value='submit' tabindex='1'>
                </div>
            </form>    
        </div>
        
    </div>
    <script src='../Components/Scripts/preserve_state.js'></script>
    </body>
    </html>
    ";
  }
?>