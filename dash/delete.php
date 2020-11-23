<?php
    session_start();
    include '../myauto.php';
    $conn = new Controller;
    $connect = $conn->getConnect();
    
    if(isset($_SESSION['log'])){
        $prid = $_SESSION['log'];
        $getConv = $conn->convert($prid);

        $username = $getConv;
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
        echo 'logout';
    }

?>