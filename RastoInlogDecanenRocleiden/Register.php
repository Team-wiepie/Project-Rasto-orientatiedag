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


 $to = $_POST['username'];
 $subject = "Your Password";
 $body = "Your password is"." ".$passwordrandom;
 $from = "00099743@student.rocleiden.nl";
 if (mail($to, $subject, $body)) {
   echo("<p>Email successfully sent!</p>");
   echo ($body);
  } else {
   echo("<p>Email delivery failed…</p>");
  }
  
$host="localhost"; // Host name 
$username=""; // Mysql username 
$password=""; // Mysql password 
$db_name=""; // Database name 
$tbl_name="account"; // Table name 


$bd = mysql_connect($host, $username, $password) or die("Could not connect database");
mysql_select_db($db_name,$bd) or die("Could not select database");

$passwordr=$passwordrandom;
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
$mobieltelefoon=$_POST['MobielTelefoon'];
mysql_query("INSERT INTO members(username, password, Voornaam, Achternaam  voorzetsels, Postcodeletters, Postcodecijfers, StadDorp, Straatnaam, 
Straattoevoegsels, Straatnummer, Telefoon, MobielTelefoon)VALUES('$usernamem', '$passwordr', '$voornaam', '$achternaam', '$voorzetsels', '$postcodeL', '$postcodeC', '$staddorp', '$straatnaam', '$straattoevoegsels', '$straatnummer', '$telefoon', '$mobieltelefoon')")or die("Can't Insert");

?>

<h1>You Succesfully Registered</h1>
<td><a href="Index.php">Click here to go back</a></td>

