<?php include('server_login.php');
mysql_select_db("$db")or die("cannot select DB");

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
echo $passwordrandom;
echo "<br /><br />";
 $variable =$_POST['user'];
 echo $variable;

 $to = $_POST['user'];
echo "<br /><br />";
echo $to;

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

mysql_query("UPDATE account SET wachtwoord='$passwordencrypt' WHERE email='$to';")or die("Can't Insert");
 ?>
