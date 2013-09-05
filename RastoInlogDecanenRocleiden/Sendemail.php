<?php
 $to = $_POST['username'];
 $subject = "Your Password";
 $body = "Your password is";
 if (mail($to, $subject, $body)) {
   echo("<p>Email successfully sent!</p>");
  } else {
   echo("<p>Email delivery failed…</p>");
  }
 ?>

  mail("someone@example.com", $subject,
  $message, "From:" . $email);
  echo "Thank you for using our mail form";