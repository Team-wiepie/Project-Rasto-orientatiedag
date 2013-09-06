<?php
require_once 'server_login.php';
if(isset($_POST['Submit'])){

session_start();

// Gebruikersnaam en Wachtwoord van de Index.php//
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
$mypassword= md5(sha1($mypassword));

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM account WHERE email='$myusername' and wachtwoord='$mypassword'" or die ("this is gay");
$result=mysql_query($sql);

// Mysql_num_row is counting table row


// If result matched $myusername and $mypassword, table row must be 1 row
if($result==1){
    
// Register $myusername, $mypassword and redirect to file "login_success.php"
header("location:Register.php");

$_SESSION['decaan_id'] = $result[0];
$_SESSION['account-type'] = $result[3];
}
else {
echo "Wrong Username or Password";
}
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
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="index.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login</strong></td>
</tr>
<tr>
<td width="78">E-Mail</td>
<td width="6">:</td>
<td width="294"><input name="username" type="text" id="myusername" required></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="password" type="password" id="mypassword" required></td>
</tr>
<tr>
<td><input type="submit" name="Submit" value="Login"></td>
<td><a href="RForm.php">Register</a></td>
<td><a href="WVForm.php">Wachtwoord vergeten</a></td>
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


