<?php 
	require_once 'server_login.php';
	$query = "SELECT email FROM email";
	$result = mysql_query($query);
	$text = mysql_fetch_array($result);
	
	if(isset($_POST['submit'])){
		mysql_query("UPDATE email SET email = '". $_POST['emailText'] . "' WHERE email_id = 1") or die("Kut! " . mysql_error());
	}
?>
<?php include('header.php'); ?>
		<div id="resultaat">
			<?php if(isset($_POST['submit'])){echo "<b>Het E-Mail bericht is bijgewerkt!</b><br>";} ?>
			Voorbeeld van de E-Mail:<br>
			<?php if(isset($_POST['submit'])){echo $_POST['emailText'];}else{echo $text['email'];} ?>
		</div>
		
		<form action="editEmail.php" method="POST">
			<textarea id="editEmail" name="emailText"><?php if(isset($_POST['submit'])){echo $_POST['emailText'];}else{echo $text['email'];} ?></textarea>
			<br>
			<input type="submit" name="submit" value="Verzenden" class='submit'>
			<br>
			Om in de email gegevens te verwerken gebruik:<br>
			- :voornaam voor de voornaam<br>
			- :tussenvoegsel voor het tussenvoegsel<br>
			- :achternaam voor de achternaam<br>
			- :email voor het E-Mail adress van de leerling<br>
			- :phone voor het telefoonnummer<br>
			- :opleiding voor de opleiding<br>
			Voorbeeld: "Hallo $voornaam $achternaam!"<br>
			Geeft als output: "Hallo Jan Janssen!"
			<br>
			
		</form>
	</body>
</html>
