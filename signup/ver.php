<?php
    include '../myauto.php';

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $code = $_POST['vercode'];

        $getCont = new controller;
        $sendEmec = $getCont->isAcc($email, $code);

        if($sendEmec){
            echo 'valid';
        }
        else{
            echo 'invalid';
        }
    }

    else{
        
    }
?>