<html>
	<head>
		<title>Leerling toevoegen</title>
		<!--<link rel="stylesheet" type="text/css" href="../style/style.css">-->
		<script src="jquery-2.0.3.min.js" type="text/javascript"></script>
		<script src="addStudent.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="body">
			<?php
				require_once 'server_login.php';skype:paulvandenhelder
				session_start();
				
				if(isset($_POST["submit"])){
					$voornaam = $_POST["voornaam"];
					$tussenvoegsel = $_POST["tussenvoegsel"];
					$achternaam = $_POST["achternaam"];
					$email = $_POST["email"];
					$phone = $_POST["phone"];
					$opleiding = $_POST["opleiding"];
					
					$insQuery = "INSERT INTO leerling (voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam, decaan_id)
						VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$email', '$phone', '$opleiding', '".$_SESSION['decaan_id']."')";
					mysql_query($insQuery) or die("NOOOOOOO! ". mysql_error());
					
					echo "Leerling toegevooegd.<br>";
					echo $_SESSION['decaan_id'];
					
					$subject = "Je bent toegevoegd aan de opleiding $opleiding!";
					$body = "Hallo, $voornaam $achternaam.<br>
							Je bent toegevoegd aan de opleiding $opleiding op het ROC Leiden.<br>
							De decaan heeft deze onformatie over U ingevoerd:<br>
							- Voornaam: $voornaam<br>
							- Tussenvoegsel: $tussenvoegsel<br>
							- Achternaam: $achternaam<br>
							- E-Mail adres: $email<br>
							- Telefoonnummer: $phone<br>
							- Opleiding: $opleiding<br>
							<br>
							Klopt deze informatie niet? Mail dan naar: foute_inschrijving@ROCleiden.nl";
					mail($email, $subject, $body);
					
				}else{
				$query = "SELECT opleidingnaam FROM opleiding";
					$result = mysql_query($query);
					$opleidingen = array();
					while($res = mysql_fetch_assoc($result)) {
						$opleidingen[] = $res['opleidingnaam'];
					}
				
			?>
			<form action="addStudent.php" method="POST">
				Voornaam: <input id="voornaamInput" name="voornaam" type="text"><br>
				Tussenvoegsel: <input id="tussenvoegselInput" name="tussenvoegsel" type="text"><br>
				Achternaam: <input id="achternaamInput" name="achternaam" type="text"><br>
				E-Mail Adres: <input id="emailInput" name="email" type="text"><br>
				Telefoonnummer: <input id="phoneInput" name="phone" type="number"><br>
				<br>
				Opleiding: <input id="searchbox" type="text" placeholder="Search"><br>
				<div id="opleidingDIV" style="height:100px; width: 300px; background-color: #aaa; overflow: auto;">
					<?php
						foreach($opleidingen as $op){
							echo "<span><input type='radio' name='opleiding' id='".$op."' value='".$op."'><label for='".$op."'>".$op."</label><br></span>";
						}
					?>
				</div>
				<input type="submit" name="submit" value="Verzenden">
			</form>
			<?php
				}
			?>
		</div>
	</body>
</html>
