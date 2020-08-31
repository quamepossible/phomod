<?php

    include '../myauto.php';

    $email = $_POST['email'];
    $code = $_POST['code'];
    $pass = $_POST['pass'];

    $checkCode = new controller;
    $retCode = $checkCode->getCode($email, $code);

    if($retCode->rowCount() == 1){
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        
        //update password;
        $updatePass = new controller;
        $updatePass->newPass($email, $pass);
        echo "correct";
        $newCode = mt_rand(123456, 987654);
        $changeCode = new controller;
        $changeCode->resCode($email, $newCode);

    }

    else{
        echo "incorrect";
        // header("Location: verify.php?email=$email&error=$error");
    }




?>