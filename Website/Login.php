<?php
require_once 'server_login.php';
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
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and wachtwoord='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
    
// Register $myusername, $mypassword and redirect to file "login_success.php"
header("location:Homepage.html");
$_SESSION['username']= $myusername;
}
else {
echo "Wrong Username or Password";
}
?>
