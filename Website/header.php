<?php include('server_login.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>
	<script src="js/addStudent.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/style.css">

	<!-- CDN hosted by Cachefly -->
	<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
	<script>
			tinymce.init({selector:'textarea', width:600, height:300});
	</script>
</head>
<body>
	<div id='homeNav' class="opties">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="addStudent.php">Leerling toevoegen</a></li>
			<li><a href="opleiding_aanmaken.php">Opleiding toevoegen</a></li>
            <li><a href="overzicht.php">Student overzicht/aanpassen</a></li>
          
            <?php
                if($_SESSION['account-type'] == 1){
                    echo "<li><a href='editEmail.php'>Email bericht aanpassen</a></li>";
                }
            ?>
		</ul>
	</div>

<!-- 	<?php 
	// if (!isset($_SESSION['user']) || empty($_SESSION['user']) && $_SERVER['REQUEST_URI'] != '/login.php') {
 //    header("location: login.php");

?> -->
