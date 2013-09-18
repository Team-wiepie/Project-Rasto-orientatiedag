<html>
	<head>
	</head>
	<body>
		<?php 
			if(isset($_POST['submit'])){
				echo "<nocode>" . $_POST['emailText'] . "</nocode>";
			}
		?>
		<form action="editEmail.php" method="POST">
			<textarea id="editEmail" name="emailText"><?php echo $text ?></textarea>
			<br>
			Om in de email gegevens te verwerken gebruik:<br>
			- $voornaam voor de voornaam<br>
			- $tussenvoegsel voor het tussenvoegsel<br>
			- $achternaam voor de achternaam<br>
			- $email voor het E-Mail adress van de leerling<br>
			- $phone voor het telefoonnummer<br>
			- $opleiding voor de opleiding<br>
			- \n voor een nieuwe regel<br>
			<br>
			<input type="submit" name="submit" value="Verzenden">
		</form>
	</body>
</html>
