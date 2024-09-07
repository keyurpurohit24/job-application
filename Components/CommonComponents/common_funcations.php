<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
  function lineBreak($break){
    while($break > 0){
      echo "<br>";
      $break--;
    }
  }
?>