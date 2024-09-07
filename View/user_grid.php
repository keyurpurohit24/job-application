<?php
  function fetchGrid($result){
    echo "
    <html>
    <head>
    <link rel='stylesheet' href='../Components/StyleSheets/form_style.css'>
    <link rel='stylesheet' href='../Components/StyleSheets/navbar.css'>
    </head>
    ";
   echo " 
   <body>
    <div class='container form-container'>
  <table>
    <th>Profile Photo</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Contact</th>
    <th>Gender</th>
    <th>Address</th>
    ";

    while($row = $result->fetch_assoc()){
      echo "<tr>";
      $img =  '..' . $row['profile_photo'];
      echo "<td><img src='{$img}' height='50' width='50'></td>";
      foreach($row as $key => $val){
        if($key != 'profile_photo'){
          echo "<td>" . $val . "</td>";
        }
      }
      echo "</tr>";
    }
    echo "
    </table>
    </body>
    </html>
    ";
  }
?>