<?php
require_once 'server_login.php';
function opleidingoverzicht(){
            $query2 = "SELECT * FROM opleiding";
            $result = mysql_query($query2) or die("Could not get opleiding list, database offline or query is wrong <br />".mysql_error());
            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Opleiding naam</th>";
            echo "<th>Opleiding code</th>";
            echo "<th>locatie</th>";
            echo "</tr>";
            while($row = mysql_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$row['opleidingnaam']."</td>";
                echo "<td>".$row['opleidingcode']."</td>";
                echo "<td>".$row['locatie']."</td>";
                echo "<form action='opleiding_aanmaken.php' method='POST'>";
                echo "<td><input type='submit' name='singledelete' value='verwijderen'></td>";
                echo "<input type='hidden' name='opleiding_id' value='".$row['opleiding_id']."'/>";
                echo "</form>";
                echo "</tr>";
            }
            echo "</table>";
}
if (isset($_POST['submit'])) {  
        $opleidingnaam = $_POST['opleidingnaam'];
        $opleidingcode = $_POST['opleidingcode'];
        $locatie = $_POST['locatie'];
        
        $query = ("INSERT INTO opleiding(opleidingnaam, opleidingcode, locatie)VALUES('$opleidingnaam', $opleidingcode, '$locatie')") or die('Cant insert');
        
        mysql_query($query) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $query . "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
        header("Location: opleiding_aanmaken.php");
        
}else if(isset($_POST['singledelete'])){
    
    $opleiding = $_POST['opleiding_id'];
    $query4 = ("DELETE from opleiding where opleiding_id = '".$opleiding."' limit 1");
    mysql_query($query4) or die("Kan opleiding niet verwijderen <br />".mysql_error());
    header("Location: opleiding_aanmaken.php");
    
}else if (isset($_POST['opverwijderen'])){
    
    $query3 =("TRUNCATE TABLE opleiding");
    mysql_query($query3) or die("failed to empty the table opleiding <br />".mysql_error());
    header("Location: opleiding_aanmaken.php");
     
}else{ 
    require 'header.php';
        ?>
<script>
    function opleidingverwijdern() {
        if(confirm('Weet je zeker dat je alle opleidingen wil verwijderen?')){
           return true;
        }else{
           return false;
        }
    }
</script>
        
        <div id="opleiding_main">
        <h2>Opleiding toevoegen</h2>
        <form action="opleiding_aanmaken.php" method="post">
        <input type="text" placeholder="opleiding" name="opleidingnaam" required>
        <br>
        <input type="text" placeholder="opleidings code" name="opleidingcode" required>
        <br>
        <input type="text" placeholder="locatie" name="locatie" required>
        <br>
        <input type="submit" name="submit" value="voeg toe" required> 
        </form>
        </div>
        <div id="">
            <h2>Opleiding verwijderen</h2>
            <?php opleidingoverzicht(); ?>       
            <form action="opleiding_aanmaken.php" method="POST" onsubmit="opleidingverwijdern();">
            <input type="submit" name="opverwijderen" value="verwijder alles">
            </form>
        </div>
        

<?php require 'footer.php';
 }
 mysql_close();
 ?>