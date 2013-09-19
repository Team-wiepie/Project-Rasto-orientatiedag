<?php include_once 'header.php'; ?>
            <div id="body">
            <?php
            require_once 'server_login.php';
                // Selectie van welk account daarop dan gebaaseerd welke studenten je kan aanpassen
                if($_SESSION['account-type'] == 0){
                    $query = ("SELECT leerling_id, voornaam, tussenvoegsel, achternaam FROM leerling where decaan_id =".$_SESSION['account_id']);
                }else{
                    $query = "SELECT leerling_id, voornaam, tussenvoegsel, achternaam FROM leerling";
                }
                    $result = mysql_query($query);     
                    echo "<table border='1'>";
                while($row = mysql_fetch_array($result)){
                    echo "<tr>";
                    echo "<td><a ".$row['leerling_id'].">".$row['voornaam']." ".$row['tussenvoegsel']." ".$row['achternaam']."</a></td>";
                    echo "</tr>";
                    echo "<br />";
                }
                echo "</table>";
                echo "<form action='Student_Edit.php' method='POST'><input type='submit' name='Volgende' value='Volgende'></form>";
                
                if (isset($POST['Volgende'])){
                    if(isset($_POST["Update"])){
                        $leerlingqry = ("select * from leerling where leerling_id ==".$leerling_id);
                        $leerling = mysql_query($leerlingqry);
                        $updateQuery = "update ";
                        mysql_query($updateQuery) or die("Update query". mysql_error());

                        echo "Leerling toegevooegd.<br>";
                        echo $_SESSION['decaan_id'];

                        $subject = "Je bent toegevoegd aan de opleiding $opleiding!";
                        $body = "Hallo, $voornaam $achternaam.\n Je bent toegevoegd aan de opleiding $opleiding op het ROC Leiden.\n De decaan heeft deze onformatie over u ingevoerd:\n - Voornaam: $voornaam\n - Tussenvoegsel: $tussenvoegsel\n - Achternaam: $achternaam\n - E-Mail adres: $email\n - Telefoonnummer: $phone\n - Opleiding: $opleiding\n \n Als de informatie niet klopt dan kan de decaan het aanpassen door naar Student aanpassen te gaan";
                        mail($email, $subject, $body);
                    }else{
                        $query = "SELECT opleidingnaam FROM opleiding";
                        $result = mysql_query($query);
                        $opleidingen = array();
                            while($res = mysql_fetch_assoc($result)) {
                                $opleidingen[] = $res['opleidingnaam'];
                            }
                ?>
                    <form action="Student_Edit.php" method="POST">
                        Voornaam: <input id="voornaamInput" name="voornaam" type="text" value="<?php echo $_POST['Voornaam'] ?>" ><br>
                        Tussenvoegsel: <input id="tussenvoegselInput" name="tussenvoegsel" type="text" value="<?php echo $_POST['tussenvoegsel'] ?>" ><br>
                        Achternaam: <input id="achternaamInput" name="achternaam" type="text" value="<?php echo $_POST['achternaam'] ?>"><br>
                        E-Mail Adres: <input id="emailInput" name="email" type="text" value="<?php echo $_POST['email'] ?>"><br>
                        Telefoonnummer: <input id="phoneInput" name="phone" type="number" value="<?php echo $_POST['telefoon'] ?>"><br>
                        <br>
                        Opleiding: <input id="searchbox" type="text" placeholder="Search" value="<?php echo $_POST['opleidingnaam'] ?>"><br>
                        <div id="opleidingDIV" style="height:100px; width: 300px; background-color: #aaa; overflow: auto;">
                            <?php
                                foreach($opleidingen as $op){
                                    echo "<span><input type='radio' name='opleiding' id='".$op."' value='".$op."'><label for='".$op."'>".$op."</label><br></span>";
                                }
                            ?>
                        </div>
                    <input type="submit" name="Update" value="Update">
                    <a href="index.php"><button>Terug</button></a>
                    </form>
                            <?php
                    }
                }
            ?>
            </div>
<?php include 'footer.php' ?>