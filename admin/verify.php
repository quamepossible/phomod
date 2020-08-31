<?php
    include '../myauto.php';

    $verified = $_POST['ver'];
    $user = $_POST['user'];

    if($verified == 'YES'){
        $verified = 'NO';
    }

    else{
        $verified = 'YES';
    }

    if($verified == 'NO'){
        $featured = $verified;
        $unverify = new Controller;
        $unverify->feature($featured, $user);
    }

    $verify = new Controller;
    $verify->verify($verified, $user);
    
    header("Location: reviewuser.php?name=$user");


?>