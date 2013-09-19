<?php require 'header.php' ?>
            <?php
            //hard-code session variable test
            $_SESSION['account-type'] = 1;

            require_once 'server_login.php';
                // Selectie van welk account daarop dan gebaaseerd welke studenten je kan aanpassen
                if($_SESSION['account-type'] == 0){
                    $query = ("SELECT leerling_id, voornaam, tussenvoegsel, achternaam FROM leerling where decaan_id =".$_SESSION['account_id']);
                }else{
                    $query = "SELECT * FROM leerling";
                }
                    $result = mysql_query($query);

                        echo "<table border='1'>";
                        echo "<tr>";
                        echo "<th>Voornaam</th>";
                        echo "<th>Tussenvoegsel</th>";
                        echo "<th>Achternaam</th>";
                        echo "<th>Email</th>";
                        echo "<th>Telefoon</th>";
                        echo "<th>opleidingnaam</th>";
                        echo "</tr>";
                    while($row = mysql_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>".$row['voornaam']."</td>";
                        echo "<td>".$row['tussenvoegsel']."</td>";
                        echo "<td>".$row['achternaam']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['telefoon']."</td>";
                        echo "<td>".$row['opleidingnaam']."</td>";
                        echo "<form action='overzicht.php' method='POST'>";
                        echo "<input type='hidden' name='leerling_id' value='".$row['leerling_id']."'/>";
                        echo "<input type='hidden' name='voornaam' value='".$row['voornaam']."'/>";
                        echo "<input type='hidden' name='tussenvoegsel' value='".$row['tussenvoegsel']."'/>";
                        echo "<input type='hidden' name='achternaam' value='".$row['achternaam']."'/>";
                        echo "<input type='hidden' name='email' value='".$row['email']."'/>";
                        echo "<input type='hidden' name='telefoon' value='".$row['telefoon']."'/>";
                        echo "<input type='hidden' name='opleidingnaam' value='".$row['opleidingnaam']."'/>";
                        echo "<td>"."<input type='submit' name='submit' value='aanpasssen'>"."</td>";
                        echo "</form>";
                        echo "</tr>";
                        echo "<br />";
                    }
                echo "</table>";
                

                if(isset($_POST['submit'])){
                    // fetch opleidingen
                                    $query = "SELECT opleidingnaam FROM opleiding";
                    $result = mysql_query($query);
                    $opleidingen = array();
                    while($res = mysql_fetch_assoc($result)) {
                        $opleidingen[] = $res['opleidingnaam'];
                    }

                $Leerling_id = $_POST['leerling_id'];
                $voornaam = $_POST['voornaam'];
                $tussenvoegsel = $_POST['tussenvoegsel'];
                $achternaam = $_POST['achternaam'];
                $email = $_POST['email'];
                $telefoon = $_POST['telefoon'];
                $opleidingnaam = $_POST['opleidingnaam'];
                ?>
                <form action="addStudent.php" method="POST">
                Leerling_id: <input id="leerling_idInput" name="leerling_id" type="text" value="<?php echo $Leerling_id ?>"><br>
                Voornaam: <input id="voornaamInput" name="voornaam" type="text" value="<?php echo $voornaam ?>"><br>
                Tussenvoegsel: <input id="tussenvoegselInput" name="tussenvoegsel" type="text" value="<?php echo $tussenvoegsel ?>"><br>
                Achternaam: <input id="achternaamInput" name="achternaam" type="text" value="<?php echo $achternaam ?>"><br>
                E-Mail Adres: <input id="emailInput" name="email" type="text" value="<?php echo $email ?>"><br>
                Telefoonnummer: <input id="phoneInput" name="telefoon" type="number" value="<?php echo $telefoon ?>"><br>
                <br>
                Opleiding: <input id="searchbox" type="text" placeholder="Search"><br>
                <div id="opleidingDIV" style="height:100px; width: 300px; background-color: #aaa; overflow: auto;">
                    <?php
                        foreach($opleidingen as $op){
                            echo "<span><input type='radio' name='opleiding' id='".$op."' value='".$op."'><label for='".$op."'>".$op."</label><br></span>";
                        }
                    ?>
                </div>
                <input type="submit" name="submit1" value="Verzenden">
            </form>
                    
           <?php     }

            ?>
            </div>
<?php require 'footer.php' ?>
