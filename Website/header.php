<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>
	<script src="js/addStudent.js" type="text/javascript"></script>
	<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id='homeNav' class="opties">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="addStudent.php">Leerling toevoegen</a></li>
			<li><a href="opleiding_aanmaken.php">Opleiding toevoegen</a></li>
                        <li><a href="overzicht.php">Student overzicht/aanpassen</a></li>
                        <?php
                        if($_SESSION['account-type']== 1){
                            echo "<li><a href='Account_Edit.php'>Account aanpassen</a></li>";
                            echo "<li><a href=''>Emails sturen (werkt nog niet)</a></li>";
                        }
                        ?>
		</ul>
	</div>

<!-- 	<?php 
	// if (!isset($_SESSION['user']) || empty($_SESSION['user']) && $_SERVER['REQUEST_URI'] != '/login.php') {
 //    header("location: login.php");

?> -->