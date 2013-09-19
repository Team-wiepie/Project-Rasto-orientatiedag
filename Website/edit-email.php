<?php include 'header.php' ?>
	
	<form action='add-email.php'>

		<label for='aanhef'>Aanhef </label> <br />
		<label for='aanhef'>voornaam, tussenvoegsel en achternaam wordt automatisch toegevoegd </label> <br /><br />
		<label for='aanhef'>Voorbeeld: Geachte</label> </br>
		<label for='aanhef'>In de email: Geachte Voornaam Tussenvoegsel Achternaam.</label> </br>
		<textarea id='aanhef' name='aanhef' rows='1' cols='50'></textarea> <br /><br />

		<label for='inhoud'>Inhoud email</label><br />
		<textarea id='inhoud' rows='10' cols='50'></textarea> <br />

		<input type='submit' name='submit' value='submit' >
		
	</form>

<?php include 'footer.php' ?>