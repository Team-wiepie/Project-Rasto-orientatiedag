<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="orientatiedag"; // Database name 
$tbl_name="account"; // Table name 


// Connect naar server en select de database//
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

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
}
else {
echo "Wrong Username or Password";
}
?>
