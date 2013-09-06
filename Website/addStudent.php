<html>
	<head>
		<title>Rasto shit</title>
		<!--<link rel="stylesheet" type="text/css" href="../style/style.css">-->
		<script src="jquery-2.0.3.min.js" type="text/javascript"></script>
		<script src="addStudent.js" type="text/javascript"></script>
	</head>
	<body>
		<div id="body">
			<?php
				
			?>
			<form action="addStudent.php" method="POST">
				Voornaam: <input id="voornaamInput" name="voornaam" type="text"><br>
				Achternaam: <input id="achternaamInput" name="achternaam" type="text"><br>
				E-Mail Adres: <input id="emailInput" name="email" type="text"><br>
				Telefoonnummer: <input id="phoneInput" name="phone" type="text"><br>
				<br>
				Opleiding: <input id="searchbox" type="text" placeholder="Search"><br>
				<div id="opleidingDIV" style="height:100px; width: 300px; background-color: #aaa; overflow: auto;">
					<?php
						$opleiding = array(
						"Applicatie Ontwikkeling",
						"Media Development",
						"Auto Techniek",
						"Opleiding1",
						"Opleiding2",
						"vnrogaeiugr",
						"blabla",
						"Nog een opleiding",
						"Opleiding opleiding!",
						"SWAG Opleiding",
						"Yolo opleiding");
						
						
						foreach($opleiding as $op){
							echo "<span><input type='radio' name='opleiding' id='".$op."' value='".$op."'><label for='".$op."'>".$op."</label><br></span>";
						}
					?>
				</div>
				<input type="submit" value="Verzenden">
			</form>
		</div>
	</body>
</html>
