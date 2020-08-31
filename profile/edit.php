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
        <?php if(isset($_SESSION['log']) && $_SESSION['log'] === $uname):?>
            <?php include 'dashboard.php'?>

        <?php else:?>
            <?php include 'error404.html'?>
        <?php endif?>

    <?php else:?>
        <?php include 'error404.html'?>
    <?php endif?>
