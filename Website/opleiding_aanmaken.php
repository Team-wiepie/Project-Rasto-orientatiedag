<?php
session_start();
if (isset($_POST['submit'])) {
    require_once 'server_login.php';
        
        $opleidingnaam = $_POST['opleidingnaam'];
        $opleidingcode = $_POST['opleidingcode'];
        $locatie = $_POST['locatie'];
        
        
        $query = ("INSERT INTO opleiding(opleidingnaam, opleidingcode, locatie)VALUES('$opleidingnaam', $opleidingcode, '$locatie')") or die('Cant insert');
        
        mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
        
        echo "Opleiding toegevoegd.";
        
        mysql_close();
}
else {
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link type="text/css" rel="stylesheet" href="global.css.css" />
        <title>student aanmelden!</title>
    </head>
    <body>
        <div id="opleiding_main">
        <h2>opleiding toevoegen</h2>
        <form action="opleiding_aanmaken.php" method="post">
        <input type="text" placeholder="opleiding" name="opleidingnaam">
        <br>
        <input type="text" placeholder="opleidings code" name="opleidingcode">
        <br>
        <input type="text" placeholder="locatie" name="locatie">
        <br>
        <input type="submit" name="submit" value="voeg toe"> 
        </form>
        </div>
    </body>
</html>
<?php } ?>