<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'myauto.php';
require 'vendor/autoload.php';


if(isset($_GET['email'])){
    $email = $_GET['email'];

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        $ver_code = mt_rand(123456, 987654);

        $detailsObj = new controller;
        $getDetails = $detailsObj->sendDet($email);

        if($getDetails->rowCount() == 1){

            $detailsObj->setEmailCode($email, $ver_code);

            $fisLine = 'Your Verification code is <br>';
            $secLine = "<p style='font-size: 70px'>$ver_code</p>";
            $thiLine = 'If you did not create an account on PHOMOD.com please ignore this message<br><br>';      
            $mail = new PHPMailer(TRUE);

            try {
                $mail->setFrom('SMTP email', 'Pho Mod');
                $mail->addAddress($email);
                $mail->Subject = 'Password Reset [PHOMOD]';
                $mail->Body = $fisLine . '<br>'. $secLine. $thiLine;
                $mail->IsHTML(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'SMTP email';
                $mail->Password = 'SMTP password';
                $mail->Port = 587;
                $mail->send();
                header("Location: verify/index.php?email=$email");
            }
            catch (Exception $e)
            {
                echo 'Not sent';
            }
            catch (\Exception $e)
            {
                echo 'Not sent';
            }
        }
        
        else{
            echo 'Email not found';
        }
    }
    else{
        
    }
}

else{
    echo 'No email found';
}