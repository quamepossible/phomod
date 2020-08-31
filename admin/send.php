<?php

$name = "Kwame Opoku - Appiah";
$from = "appiahkwame274@gmail.com";
$subject = "Hello Phomod";
$message = "Please I want to be part of the phomod team";


$mailto = "phomod.com@gmail.com";
$headers = "From: ". $from;
$txt = "You have receive an e-mail from " . $name.".\n\n".$message;

ini_set('SMTP', "smtp.gmail.com");
ini_set('smtp_port', "587");
ini_set('sendmail_from', $from);

mail($mailto, $subject, $txt, $headers);



?>