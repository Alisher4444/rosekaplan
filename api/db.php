<?php 
      $servername = "localhost";
      $username = "root";
    //  $password = "";
    // ____________
   // $servername = getenv('IP');
    //$username = getenv('C9_USER');
    $password = "";
    $database = "rosekaplan";
    $dbport = 3306;
    // ____________
    // $servername = "srv-pleskdb29.ps.kz:3306";
    // $username = "sokko_food";
    // $password = "duisen_29";
    // $database = "sokkofoo_sokko";
    // $dbport = 3306;
    
    
    $conn = new mysqli($servername, $username, $password, $database, $dbport);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
?>