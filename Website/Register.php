<?php
if(isset($voornaam)){
    $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.
              'abcdefghijklmnopqrstuvwxyz'.
              '0123456789';
    $length = 5;
    $str = '';
    $max = strlen($chars) - 1;

    for ($i=0; $i < $length; $i++)
    $str .= $chars[rand(0, $max)];
    $passwordrandom="ROC".$str;

    $to = $_POST['Eusername'];
    $subject = "Your Password";
    $body = "Your password is"." ".$passwordrandom;
    $from = "00099743@student.rocleiden.nl";
    if (mail($to, $subject, $body)) {
      echo("<p>Email successfully sent!</p>");
      echo $passwordrandom;
     } else {
      echo("<p>Email delivery failed…</p>");
     }
   require_once 'server_login.php';

   $passwordencrypt = md5(sha1($passwordrandom));
   $usernamem=$_POST['Eusername'];
   $voornaam=$_POST['Voornaam'];
   $achternaam=$_POST['Achternaam'];
   $voorzetsels=$_POST['voorzetsels'];
   $postcodeL=$_POST['Postcodeletters'];
   $postcodeC=$_POST['Postcodecijfers'];
   $staddorp=$_POST['StadDorp'];
   $straatnaam=$_POST['Straatnaam'];
   $straattoevoegsels=$_POST['Straattoevoegsels'];
   $straatnummer=$_POST['Straatnummer'];
   $telefoon=$_POST['Telefoon'];
   mysql_query("INSERT INTO account(email, wachtwoord)VALUES('$usernamem', '$passwordencrypt')")or die("Can't Insert");
   mysql_query("INSERT INTO decanen(voornaam, tussenvoegsel, achternaam, postcode_cijf, postcode_let, stad_dorp, straatnaam, 
   straatnummer, straattoev, email, telefoon)VALUES('$voornaam', '$voorzetsels', '$achternaam', '$postcodeC', '$postcodeL', '$staddorp', '$straatnaam', '$straatnummer' , '$straattoevoegsels','$usernamem', '$telefoon')")or die("Can't Insert");
   echo "<h1>Check your e-mail for youre password</h1>
         <h1>You Succesfully Registered</h1>
         <td><a href="Index.php">Click here to go back</a></td>";
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="PHP.css" rel="StyleSheet" type="text/css" />
    </head>
    <body>
<div id="Logo">
</div>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form2" method="post" action="Register.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Register</strong></td>
</tr>
<tr>
<td width="78">E-mail</td>
<td width="6">:</td>
<td width="294"><input name="Eusername" type="text" id="Eusername" maxlength="50" required></td>
</tr>
<tr>
<td>Voornaam</td>
<td>:</td>
<td><input name="Voornaam" type="text" id="Voornaam"  maxlength="50"  required></td>
</tr>
<tr>
<td>Tussenvoegsels</td>
<td>:</td>
<td><input name="voorzetsels" type="text" id="voorzetsels" maxlength="50" required></td>
</tr>
<tr>
<td>Achternaam</td>
<td>:</td>
<td><input name="Achternaam" type="text" id="Achternaam" maxlength="50" required></td>
</tr>
<tr>
<td>Postcode</td>
<td>:</td>
<td><input name="Postcodecijfers" type="text" id="Postcodecijfers" maxlength="4" required></td>
<td><input name="Postcodeletters" type="text" id="Postcodeletters"  maxlength="2" required></td>
</tr>
<tr>
<td>Stad/Dorp</td>
<td>:</td>
<td><input name="StadDorp" type="text" id="StadDorp" maxlength="50" required></td>
</tr>
<tr>
<td>Straatnaam</td>
<td>:</td>
<td><input name="Straatnaam" type="text" id="Straatnaam" maxlength="50" required></td>
</tr>
<tr>
<td>Straatnummer</td>
<td>:</td>
<td><input name="Straatnummer" type="text" id="Straatnummer" maxlength="8" required></td>
</tr>
<tr>
<td>Straat toevoegsel</td>
<td>:</td>
<td><input name="Straattoevoegsels" type="text" id="Straattoevoegsels" maxlength="10" required></td>
</tr>
<tr>
<td>Telefoon</td>
<td>:</td>
<td><input name="Telefoon" type="text" id="Telefoon" maxlength="20" required></td>
</tr>
<tr>
<td>ROC Medewerkers code</td>
<td>:</td>
<td><input name="ROC-Code" type="text" id="ROC-Code" maxlength="20" required></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Submit"></td>
<td><a href="index.php">Back</a></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 
</body>
</html>
<?php 
    } 
?>