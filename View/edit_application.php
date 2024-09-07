<?php
$a_id = $_SERVER['QUERY_STRING'];
require '../Model/connection.php';
$sql = "SELECT `application_of` FROM `application` WHERE `application_id` = '$a_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$uuid = $row['application_of'];

// $sql = "SELECT `first_name`,`last_name`,`email`,`contact`,`address`,`gender`,`profile_photo`,education_details_ssc.name_of_board,education_details_ssc.passing_year,education_details_ssc.percentage,education_details_hsc.name_of_board,education_details_hsc.passing_year,education_details_hsc.percentage,education_details_be.university,education_details_be.course,education_details_be.cgpa,education_details_be.passing_year,education_details_me.university,education_details_me.course,education_details_me.cgpa,education_details_me.passing_year,work_experience_main.company_name,work_experience_main.designation,work_experience_main.from_date,work_experience_main.to_date FROM `users` INNER JOIN education_details_ssc on users.id = education_details_ssc.id INNER JOIN education_details_hsc on users.id = education_details_hsc.id INNER JOIN education_details_be on education_details_be.id = users.id INNER JOIN education_details_me ON users.id = education_details_me.id INNER JOIN work_experience_main ON users.id = work_experience_main.experience_of WHERE users.id = '$uuid';";
$sql = "SELECT `first_name`, `last_name`, `email`, `contact`,`address`,`gender`,`profile_photo`,`education_details_ssc`.`name_of_board` as ssc_nob,`education_details_ssc`.`passing_year` as ssc_year ,`education_details_ssc`.`percentage` as ssc_per,education_details_hsc.name_of_board hsc_nob,education_details_hsc.passing_year as hsc_year,education_details_hsc.percentage as hsc_per FROM `users` INNER JOIN `education_details_ssc` ON `education_details_ssc`.`id` = `users`.`id` INNER JOIN education_details_hsc ON education_details_hsc.id = users.id WHERE `users`.`id` = '$uuid';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
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
            <form name='job_application_form' id='demo_form' method='post' action='../Controller/process_job_application_form.php?{$a_id}'>
                <fieldset id='fs-1'>
                    <legend>Basic Detail</legend>
                    <table>
                        <tr>
                            <td>
                                <label>First name</label>
                            </td>
                            <td>
                                <input type='text' name='fname' id='fname' value='{$row['first_name']}' tabindex='1'  ><br>
                            </td>
                            <td>
                                <label>Last name</label>
                            </td>
                            <td>
                                <input type='text' name='lname' id='lname' value='{$row['last_name']}' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                            <div>
                              <img src='..{$row['profile_photo']}' alt='' height='100' width='100'>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type='text' name='email' id='email' value='{$row['email']}' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                                <label>Phone Number</label>
                            </td>
                            <td>
                                <input type='text' name='phone' id='phone' value='{$row['contact']}' tabindex='1'  ><br>
                                
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                              <textarea name='address' id='' rows='3'  >{$row['address']}</textarea>
                            </td>
                            <td>
                              <label>Gender</label>
                              <td>";
                              if ($row['gender'] == 'Male') {
                                echo "
                                <label>Male</label><input type='radio' name='gender' id='male' value='male' tabindex='1'   >
                            <label>Female</label><input type='radio' name='gender' id='female' tabindex='1' checked  >
                                ";
                              }
                              if($row['gender'] = 'Female'){
                                echo "
                                <label>Male</label><input type='radio' name='gender' id='male' value='male' tabindex='1'   >
                            <label>Female</label><input type='radio' name='gender' id='female' tabindex='1' checked  >
                                ";  
                              }
                              echo "
                            
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
                                <input type='text' name='nameOfBoardSSC' id='nameOfBoardSSC' tabindex='1' value='{$row['ssc_nob']}'  ><br>
                                
                            </td>
                            <td>
                                <label>Passing Year</label>
                            </td>
                            <td>
                                <input type='number' name='passingYearSSC' id='passingYearSSC' min='2000' max='2023' tabindex='1' value='{$row['ssc_year']}'  ><br>
                                
                            </td>
                            <td>
                                <label>Percentage</label>
                            </td>
                            <td>
                                <input type='number' name='percentageSSC' id='percentageSSC' min='0' max='100' tabindex='1' value='{$row['ssc_per']}'  ><br>
                                
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
                                <input type='text' name='nameOfBoardHSC' id='nameOfBoardHSC' tabindex='1' value='{$row['hsc_nob']}'  ><br>
                               
                            </td>
                            <td>
                                <label>Passing Year</label>
                            </td>
                            <td>
                                <input type='number' name='passingYearHSC' id='passingYearHSC min='2000' min='2000' max='2023' tabindex='1' value='{$row['hsc_year']}'  ><br>
                               
                            </td>
                            <td>
                                <label>Percentage</label>
                            </td>
                            <td>
                                <input type='number' name='percentageHSC' id='percentageHSC' min='0' max='100' tabindex='1' value='{$row['hsc_per']}'  ><br>
                               
                            </td>
                        </tr>
                    </table>";
                                


                    $sql = "SELECT education_details_be.university as be_uni,education_details_be.course as be_course,education_details_be.cgpa as be_per,education_details_be.passing_year as be_year, education_details_me.university as me_uni, education_details_me.course as me_course,education_details_me.cgpa as me_per,education_details_me.passing_year as me_year FROM education_details_be INNER JOIN education_details_me on education_details_be.id = education_details_me.id WHERE education_details_be.application_id = '$a_id';";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo"
                    <h6>Bachlor Degree</h6>
                        <table>
                            <tr>
                                <td>
                                    <label>Course Name</label>
                                </td>
                                <td>
                                    <input type='text' name='courseBE' id='courseBE' tabindex='1' value='{$row['be_course']}'  ><br>
                                    
                                </td>
                                <td>
                                    <label>University</label>
                                </td>
                                <td>
                                    <input type='text' name='universityBE' id='universityBE' tabindex='1' value='{$row['be_uni']}' ><br>
                                   
                                </td>
                                <td>
                                    <label>Passing Year</label>
                                </td>
                                <td>
                                    <input type='number' name='passingYearBE' id='passingYearBE' min='2000' max='2023' tabindex='1'  value = '{$row['be_year']}'  ><br>
                                  
                                </td>
                                <td>
                                    <label>Percentage</label>
                                </td>
                                <td>
                                    <input type='number' name='percentageBE' id='percentageBE' min='0' max='100' tabindex='1' value = '{$row['be_per']}'  ><br>
                                    
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
                                    <input type='text' name='courseME' id='courseME' tabindex='1' value = '{$row['me_course']}'  ><br>
                                    
                                </td>
                                <td>
                                    <label>University</label>
                                </td>
                                <td>
                                    <input type='text' name='universityME' id='universityME' tabindex='1' value = '{$row['me_uni']}'  ><br>
                                    
                                </td>
                                <td>
                                    <label>Passing Year</label>
                                </td>
                                <td>
                                    <input type='number' name='passingYearME' id='passingYearME' min='2000' max='2023' tabindex='1' value = '{$row['me_year']}'  ><br>
                                    
                                </td>
                                <td>
                                    <label>Percentage</label>
                                </td>
                                <td>
                                    <input type='number' name='percentageME' id='percentageME' min='0' max='100' tabindex='1' value = '{$row['me_per']}'  ><br>
                                    
                                </td>
                            </tr>
                        </table>
                </fieldset>
                <br>
                <fieldset id='fs-3' >
                    <legend>Work Experience</legend>
                    <h6>Experience</h6>
                    <table>";
                    $sql = "SELECT work_experience_main.company_name,work_experience_main.designation,work_experience_main.from_date,work_experience_main.to_date FROM work_experience_main WHERE application_id = '$a_id';";
                    $result = $conn->query($sql);
                    while($row = $result->fetch_assoc()){
                      echo "
                      <tr>
                            <td>
                                <label>Comapany Name</label>
                            </td>
                            <td>
                                <input type='text' name='companyName1' id='companyName1' tabindex='1' value='{$row['company_name']}'  ><br>
                                
                            </td>
                            <td>
                                <label>Designation</label>
                            </td>
                            <td>
                                <input type='text' name='pastDesignation1' id='pastDesignation1' tabindex='1' value='{$row['designation']}'  ><br>
                                
                            </td>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type='date' name='fromDate1' id='fromDate1' tabindex='1' value='{$row['to_date']}'  ><br>
                                
                            </td>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type='date' name='toDate1' id='toDate1' tabindex='1' value='{$row['from_date']}'  ><br>
                              
                            </td>
                        </tr>
                    
                        ";
                      
                    }
                    $sql = "SELECT `hindi`,`english`,`gujarati` FROM `language_known` WHERE `application_id` = '$a_id';";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    echo"
                    </table>
                </fieldset>
                <br>
                <fieldset id='fs-4' >
                    <legend>Language Known</legend>
                    <table>
                        <tr>";
                            
                            if($row['hindi'] == 1){
                              echo "<td><input type='checkbox' name='hindi[]' id='hindi' value='hindi'' tabindex='1' checked  >
                              <label for='hindi'><i>Hindi</i></label></td>";
                            }else{
                              echo "<input type='checkbox' name='hindi[]' id='hindi' value='hindi'' tabindex='1'  >
                              <label for='hindi'><i>Hindi</i></label></td>";
                            }
                            echo"
                            <td>
                                <input type='checkbox' name='hindi[]' id='hRead' value='read' tabindex='1'  >
                                <label for='hRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hWrite' value='write' tabindex='1'  >
                                <label for='hWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='hindi[]' id='hSpeak'  value='speak' tabindex='1'  >
                                <label for='hSpeak'>Speak</label>
                                
                            </td>
                        </tr>
                        <tr>";
                        if($row['english'] == 1){
                          echo "<td>
                          <input type='checkbox' name='english[]' id='english' value='english' onclick='enable(); disable();' tabindex='1' checked  >
                          <label for='english'><i>English</i></label>
                      </td>";
                        }else{
                          echo "<td>
                          <input type='checkbox' name='english[]' id='english' value='english' tabindex='1'  >
                          <label for='english'><i>English</i></label>
                      </td>";
                        }
                        echo "
                            <td>
                                <input type='checkbox' name='english[]' id='eRead' value='read' tabindex='1'  >
                                <label for='eRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='english[]' id='eWrite' value='write' tabindex='1'  >
                                <label for='eWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='english[]' id='eSpeak' value='speak' tabindex='1'  >
                                <label for='eSpeak'>Speak</label>
                                
                            </td>
                        </tr>
                        <tr>";
                        if($row['gujarati'] == 1){
                          echo "<td>
                          <input type='checkbox' name='gujarati[]' id='gujarati' value='gujarati' checked onclick='enable(); disable();' tabindex='1'  >
                          <label for='gujarati'><i>Gujarati</i></label>
                      </td>
                      </td>";
                        }else{
                          echo "<td>
                          <input type='checkbox' name='gujarati[]' id='gujarati' value='gujarati' onclick='enable(); disable();' tabindex='1'  >
                          <label for='gujarati'><i>Gujarati</i></label>
                      </td>";
                        }
                        echo"
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gRead' value='read' tabindex='1'  >
                                <label for='gRead'>Read</label>
                            </td>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gWrite' value='write' tabindex='1'  >
                                <label for='gWrite'>Write</label>
                            </td>
                            <td>
                                <input type='checkbox' name='gujarati[]' id='gSpeak' value='speak' tabindex='1'  >
                                <label for='gSpeak'>Speak</label>
                                
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
                                <input type='checkbox' name='php' id='php' onclick='enable(); disable();' tabindex='1'  >
                                <label for='php'><i>PHP</i></label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-b' tabindex='1' value='beginner'  >
                                <label for='php-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-m' tabindex='1' value='mideator'  >
                                <label for='php-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='phpLevel' id='php-e' tabindex='1' value='expert'  >
                                <label for='php-e'>Expert</label>
                                
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <input type='checkbox' name='mysql' id='mysql' onclick='enable(); disable();' tabindex='1'  >
                                <label for='mysql'><i>MySQL</i></label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-b' tabindex='1' value='beginner'  >
                                <label for='mysql-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-m' tabindex='1' value='mideator'  >
                                <label for='mysql-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='mysqlLevel' id='mysql-e' tabindex='1' value='expert'  >
                                <label for='mysql-e'>Expert</label>
                                
                            </td>
                        </tr>
            
                        <tr>
                            <td>
                                <input type='checkbox' name='laravel' id='laravel' onclick='enable(); disable();' value='beginner' tabindex='1'  >
                                <label for='laravel'><i>Laravel</i></label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-b' tabindex='1' value='mideator'  >
                                <label for='laravel-b'>Beginer</label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-m' tabindex='1' value='expert'  >
                                <label for='laravel-m'>Mideator</label>
                            </td>
                            <td>
                                <input type='radio' name='laravelLevel' id='laravel-e' tabindex='1'  >
                                <label for='laravel-e'>Expert</label>
                                
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
                                <input type='text' name='referenceName1' id='referenceName1' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                                <label>Contact Number</label>
                            </td>
                            <td>
                                <input type='text' name='referenceContact1' id='referenceContact1' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                                <label>Relation</label>
                            </td>
                            <td>
                                <input type='text' name='referenceRelation1' id='referenceRelation1' tabindex='1'  ><br>
                                
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
                                <input type='text' name='referenceName2' id='referenceName2' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                                <label>Contact Number</label>
                            </td>
                            <td>
                                <input type='text' name='referenceContact2' id='referenceContact2' tabindex='1'  ><br>
                                
                            </td>
                            <td>
                                <label>Relation</label>
                            </td>
                            <td>
                                <input type='text' name='referenceRelation2' id='referenceRelation2' tabindex='1'  ><br>
                                
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
                                <select name='preferedLocation[]' id='preferedLocation' multiple tabindex='1'  >
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
                                <input type='number' name='noticePeriod' id='noticePeriod' min='1' max='4' tabindex='1'  >
                                <label>(Months)</label>
                            </td>
                            <td>
                                <label>Expected CTC</label>
                            </td>
                            <td>
                                <input type='number' name='expectedCTC' id='expectedCTC' step='50000' tabindex='1'  >
                            </td>
                            <td>
                                <label>Current CTC</label>
                            </td>
                            <td>
                                <input type='number' name='currentCTC' id='currentCTC' step='150000' tabindex='1'  >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Department</label>
                            </td>
                            <td>
                                <select name='department' id='department' tabindex='1'  >
                                    <option value='Development'>Development</option>
                                    <option value='Marketing'>Marketing</option>
                                    <option value='Design'>Design</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </fieldset>
                <div class='control-btn'>
                <input type='submit' name = 'submit' value='Update' tabindex='1'>
         </div>
            </form>    
        </div>
        
    </div>
    <script src='../Components/Scripts/preserve_state.js'></script>
    </body>
    </html>
  
  ";
?>