<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "orientatiedag";
    
    $connection = mysql_connect($host, $user, $pass, $db) or die("Unable to connect database");
    
    mysql_select_db($db) or die("Unable to select database");
?>
