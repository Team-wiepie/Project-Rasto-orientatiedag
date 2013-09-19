<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "orientatiedag";
    
    $connection = mysql_connect($host, $user, $pass, $db) or die("Unable to connect database");
    
    if (!isset($_SESSION['user']) || empty($_SESSION['user']) && $_SERVER['REQUEST_URI'] != '/login.php') {
    header("location: login.php");
	}

    mysql_select_db($db) or die("Unable to select database");


?>
