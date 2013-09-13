<?php 
session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
</head>
<body>
	<div class="opties">
		<ul>
			<li><a href="addStudent.php">Leerling toevoegen</a></li>
			<li><a href="opleiding_aanmaken.php">Opleiding toevoegen</a></li>
                        <li><a href="Student_Edit.php">Student aanpassen</a></li>
                        <?php
                        if($_SESSION['account-type']== 1){
                            echo "<li><a href='Account_Edit.php'>Account aanpassen</a></li>";
                            echo "<li><a href=''>Emails sturen (werkt nog niet)</a></li>";
                        }
                        ?>
		</ul>
	</div>
<<<<<<< HEAD
	
=======
>>>>>>> sync didnt't work

	<?php  ?>
</body>
</html>