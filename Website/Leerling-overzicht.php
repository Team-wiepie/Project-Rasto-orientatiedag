<?php
    session_start();
    require_once 'server_login.php';
    

    function tabellen() {

        
        if($_SESSION['account-type'] == 0){
            $query = ("Select voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam from leerling where decaan_id = ".$_SESSION['account_id']) or die('Cant find the students');
            $leerlingen = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
        }
        else{
            $query = ("Select voornaam, tussenvoegsel, achternaam, email, telefoon, opleidingnaam from leerling") or die('Cant find the students');
            $leerlingen = mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
         }

        $count = mysql_num_rows($leerlingen);
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Voornaam</th>";
        echo "<th>Tussenvoegsel</th>";
        echo "<th>Achternaam</th>";
        echo "<th>Email</th>";
        echo "<th>Telefoon</th>";
        echo "<th>opleidingnaam</th>";
        echo "</tr>";

        while($row = mysql_fetch_array($leerlingen))
    {
        



        echo "<tr>";
        echo "<td>".$row['voornaam']."</td>";
        echo "<td>".$row['tussenvoegsel']."</td>";
        echo "<td>".$row['achternaam']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "<td>".$row['telefoon']."</td>";
        echo "<td>".$row['opleidingnaam']."</td>";
        echo "</tr>";

        echo "<br />";
    }
        

        mysql_close(); 
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
             <?php   tabellen(); ?>
        </div>
    </body>
</html>
