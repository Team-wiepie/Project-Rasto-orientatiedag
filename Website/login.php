<?php
if (isset($_POST['submit'])){
	

	require_once 'server_login.php';


	// Gebruikersnaam en Wachtwoord van de Index.php//
	$myusername=$_POST['username']; 
	$mypassword=$_POST['password'];
	$mypassword= md5(sha1($mypassword));

	// To protect MySQL injection (more detail about MySQL injection)
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysql_real_escape_string($myusername);
	$mypassword = mysql_real_escape_string($mypassword);
	$sql="SELECT * FROM account WHERE email='$myusername' and wachtwoord='$mypassword'";
	$result=mysql_query($sql);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);


	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){

		$row = mysql_fetch_row($result);

		$_SESSION['account_id'] = $row[0];
		$_SESSION['account-type'] = $row[3];

		header("location:index.php");
	}
	else {
	echo "Wrong Username or Password";
	}
	 
	// Register $myusername, $mypassword and redirect to file "login_success.php"


}

else {
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
<form name="form1" method="post" action="login.php">
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
<td><input type="submit" name="submit" value="Login"></td>
<td><a href="Register.php">Register</a></td>
<td><a href="WVForm.php">Wachtwoord vergeten</a></td>
</tr>
</table>
</td>
</form>
</tr>
</table>
    </body>
</html>
<?php } ?>