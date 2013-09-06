<?php
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

$sql="SELECT password FROM $tbl_name WHERE username='$myusername'";
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
  
$passwordencrypt = md5(sha1($passwordrandom));


 mysql_query("UPDATE account SET wachtwoord='$passwordencrypt' WHERE CustomerName='Alfreds Futterkiste';")or die("Can't Insert");
 ?>
