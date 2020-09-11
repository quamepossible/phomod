<?php 
    session_start();
    include '../myauto.php';
?>
    <?php if(isset($_GET['name'])):?> 
        <?php $uname = $_GET['name'];
            $getUserObj = new view;
            $getUserInfo = $getUserObj->viewUser($uname);
            $getUserDet = $getUserInfo->fetchAll();
        ?>
        <?php if(isset($_SESSION['log'])):?>
            <?php
                $meconn = new controller();
                $getConn = $meconn->getConnect();
                //CHECK IF PERSON'S USERNAME = ADDRESS USERNAME
                $sesDet = $_SESSION['log'];            
                $valConv = $meconn->convert($sesDet);
                $getStats = $meconn->checkStatus($sesDet);
            ?>
            <?php if($valConv == $uname && $getStats == 'freelancer'):?>
                <?php include 'dashboard.php'?>
            <?php else:?>
                <?php include 'error404.html'?>
            <?php endif?>

        <?php else:?>
            <?php include 'error404.html'?>
        <?php endif?>

    <?php else:?>
        <?php include 'error404.html'?>
    <?php endif?>
