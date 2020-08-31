<?php


/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/* Include the Composer generated autoload.php file. */
require 'vendor/autoload.php';

$mail = new PHPMailer(TRUE);

try {
   
   $mail->setFrom('phomod.com@gmail.com', 'Pho Mod');
   $mail->addAddress('appiahkwame274@gmail.com');
   $mail->Subject = 'Phomod Mail';
   $mail->Body = 'This is my first phomod mail';
   
   /* SMTP parameters. */
   
   /* Tells PHPMailer to use SMTP. */
   $mail->isSMTP();
   
   /* SMTP server address. */
   $mail->Host = 'smtp.gmail.com';

   /* Use SMTP authentication. */
   $mail->SMTPAuth = TRUE;
   
   /* Set the encryption system. */
   $mail->SMTPSecure = 'tls';
   
   /* SMTP authentication username. */
   $mail->Username = 'phomod.com@gmail.com';
   
   /* SMTP authentication password. */
   $mail->Password = 'mslvkshaaxngmuyd';
   
   /* Set the SMTP port. */
   $mail->Port = 587;
   
   /* Finally send the mail. */
   $mail->send();
}
catch (Exception $e)
{
   echo $e->errorMessage();
}
catch (\Exception $e)
{
   echo $e->getMessage();
}