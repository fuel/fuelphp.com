<?php

include 'Mail.php';

$from = "email@fuelphp.com";
 $to = "dan@dhorrigan.com";
 $subject = "GitHub Hook";
 $body = print_r($_POST, TRUE);
 
 $host = "smtp.postmarkapp.com";
 $username = "620a7bd3-1b31-41dd-b511-6b03e05f4acf";
 $password = "620a7bd3-1b31-41dd-b511-6b03e05f4acf";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
 $mail = $smtp->send($to, $headers, $body);
 
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
  } else {
   echo("<p>Message successfully sent!</p>");
  }