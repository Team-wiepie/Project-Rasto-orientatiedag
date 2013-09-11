<?php
    require_once 'server_login.php';
    session_start();
    function tabellen() {
            if($_SESSION['account-type'] == 0){
                $query = "Select voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam from leerling where decaan_id == ".$_SESSION['decaan_id'];
                $leerlingen = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
            }else{
                $query = "Select voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam from leerling";
                $leerlingen = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
             }
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
        mysql_close();
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
