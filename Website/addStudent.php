<?php include'header.php'; ?>

			<?php
				require_once 'server_login.php';
				//hard-code test session
				$_SESSION['account_id'] = 1;

				$getMail = "SELECT email FROM email WHERE email_id = 1";
				$swag = mysql_query($getMail);
				$email = str_replace("\$voornaam", $voornaam, mysql_result($swag,0));
				
				if(isset($_POST["submit"])){
					$voornaam = $_POST["voornaam"];
					$tussenvoegsel = $_POST["tussenvoegsel"];
					$achternaam = $_POST["achternaam"];
					$adres = $_POST["email"];
					$phone = $_POST["telefoon"];
					$opleiding = $_POST["opleiding"];
					
					$insQuery = "INSERT INTO leerling (voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam, decaan_id)
						VALUES ('$voornaam', '$tussenvoegsel', '$achternaam', '$adres', '$telefoon', '$opleiding', '".$_SESSION['account_id']."')";
					mysql_query($insQuery) or die("NOOOOOOO! ". mysql_error());
					
					echo "Leerling toegevoegd.<br>";
					
					//$email = strip_tags($email);
					$replaceVar = array(":voornaam", ":tussenvoegsel", ":achternaam", ":email", ":phone", ":opleiding");
					$replaceRes = array($voornaam, $tussenvoegsel, $achternaam, $adres, $phone, $opleiding);
					
					$subject = "Je bent toegevoegd aan de opleiding $opleiding!";
					$email = str_replace($replaceVar, $replaceRes, $email);
					mail($adres, $subject, $email, "Content-type: text/html; charset=iso-8859-1");
					
				}else{
					$query = "SELECT opleidingnaam FROM opleiding";
					$result = mysql_query($query);
					$opleidingen = array();
					while($res = mysql_fetch_assoc($result)) {
						$opleidingen[] = $res['opleidingnaam'];
					}

				if(isset($_POST['submit1'])){
					$leerling_id = $_POST['leerling_id'];
					$voornaam = $_POST["voornaam"];
					$tussenvoegsel = $_POST["tussenvoegsel"];
					$achternaam = $_POST["achternaam"];
					$email = $_POST["email"];
					$telefoon = $_POST["telefoon"];
					$opleiding = $_POST["opleiding"];
					
					$insQuery = "UPDATE leerling SET Voornaam='".$voornaam."', tussenvoegsel='".$tussenvoegsel."', achternaam='".$achternaam."', email='".$email."', telefoon='".$telefoon."', opleidingnaam='".$opleiding."' WHERE leerling_id='".$leerling_id."'";
					mysql_query($insQuery) or die("NOOOOOOO! ". mysql_error());
					
					header("Location: Overzicht.php");
					
					
					$subject = "ROC leiden | Gegevens aangepast!";
					$body = "Email";
					mail($email, $subject, $body);


				}
				
			?>
			<form action="addStudent.php" method="POST">
				Voornaam: <input id="voornaamInput" name="voornaam" type="text"><br>
				Tussenvoegsel: <input id="tussenvoegselInput" name="tussenvoegsel" type="text"><br>
				Achternaam: <input id="achternaamInput" name="achternaam" type="text"><br>
				E-Mail Adres: <input id="emailInput" name="email" type="text"><br>
				Telefoonnummer: <input id="phoneInput" name="telefoon" type="number"><br>
				<br>
				Opleiding: <input id="searchbox" type="text" placeholder="Search"><br>
				<div id="opleidingDIV" style="height:100px; width: 300px; overflow: auto; border:solid 2px #009de0; border-radius:5px;">
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
<?php include 'footer.php' ?>
