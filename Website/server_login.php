<?php	
    $host = "localhost";
    $user = "rsbloom";
    $pass = "uK34rRGy";
    $db = "rsbloom_orientatiedag";
    
    $connection = mysql_connect($host, $user, $pass, $db) or die("Unable to connect database");
    


    mysql_select_db($db) or die("Unable to select database");


?>
