<?php
    require_once 'server_login.php';
    session_start();
        $opleidingnaam = $_POST['opleidingnaam'];
        $opleidingcode = $_POST['opleidingcode'];
        $locatie = $_POST['locatie'];
        
        $query = ("Select voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam from leerling where decaan_id == ".$_SESSION['decaan_id']) or die('Cant find the students');
        
        $leerlingen = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
        
        mysql_close();
        function tabellen() {
            if (mysql_num_rows($leerlingen) > 0) {
                echo "<table cellpadding=10 border=1>";
                    while($row = mysql_fetch_row($leerlingen)) {
                        echo "<tr>";
                        echo "<td>".$row[0]."</td>";
                        echo "<td>".$row[1]."</td>";
                        echo "<td>".$row[2]."</td>";
                        echo "<td>".$row[3]."</td>";
                        echo "<td>".$row[4]."</td>";
                        echo "<td>".$row[5]."</td>";
                        echo "</tr>";
                    }
                echo "</table>";
            } else {
                echo "No rows found!";
            }
        }
  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="global.css.css" />
        <title>Aangemelden leerlingen</title>
    </head>
    <body>
        <h2>Leerling overzicht</h2>
        <div>
            <textarea rows="20" cols="80">
                tabellen();
            </textarea>
        </div>
    </body>
</html>
