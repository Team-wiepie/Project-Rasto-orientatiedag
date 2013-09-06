<?php
{
  $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.
            'abcdefghijklmnopqrstuvwxyz'.
            '0123456789';
  $length = 5;
  $str = '';
  $max = strlen($chars) - 1;

  for ($i=0; $i < $length; $i++)
  $str .= $chars[rand(0, $max)];
  $passwordrandom="ROC".$str;

}


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
  ?>

 <?php 


$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="orientatiedag"; // Database name 
$tbl_name=""; // Table name 


$bd = mysql_connect($host, $username, $password) or die("Could not connect database");
mysql_select_db($db_name,$bd) or die("Could not select database");

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
?>
<h1>Check your e-mail for youre password</h1>
<h1>You Succesfully Registered</h1>
<td><a href="Index.php">Click here to go back</a></td>


