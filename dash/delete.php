<?php

    include '../myauto.php';
    $conn = new controller;
    $connect = $conn->getConnect();
    
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $link = $_POST['link'];

        $initPath = '../gallery/'.$link;
        if(!unlink($initPath)){
        }

        else{

            $sql = 'DELETE FROM gallery WHERE IMG_SRC = :src and USERNAME = :uid';
            $stmt = $connect->prepare($sql);
            $stmt->execute(['src' => $link, 'uid' => $username]);
        } 

    }

    else{
        include 'error404.html';
    }

?>