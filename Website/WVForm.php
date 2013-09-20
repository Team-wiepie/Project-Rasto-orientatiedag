<?php 
	require_once 'server_login.php';

if(isset($_POST['submit'])){
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
    if (mail($to, $subject, $body)) {
      echo("<p>Email successfully sent!</p>");

     } else {
      echo("<p>Email delivery failed…</p>");
     }
     
     $passwordencrypt = md5(sha1($passwordrandom));
   	 $usernamem=$_POST['Eusername'];
     
     mysql_query("UPDATE account SET wachtwoord='$passwordencrypt' WHERE email='$to';")or die("Can't Insert");
     

   
}
else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="PHP.css" rel="StyleSheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-2.0.3.min.js" type="text/javascript"></script>
        <script type="text/javascript" src='js/addStudent.js'></script>
    </head>
    <body>
<div id="Logo">
</div>
<table width="300" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form2" method="post" action="WVForm.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>wachtwoord vergeten</strong></td>
</tr>
<tr>
<td width="78">E-mail</td>
<td width="6">:</td>
<td width="294"><input name="Eusername" type="text" id="Eusername" maxlength="50" required></td>
</tr>
<tr>
<td><input type="submit" name="submit" value="Submit" id='submitWV' class='submit'></td>
<td><a href="index.php">Back</a></td>
</tr>
</table>
</td>
</form>
</tr>
</table> 
<?php require 'footer.php';
 } ?>