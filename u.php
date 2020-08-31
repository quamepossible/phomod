<?php 
    session_start();
    include_once 'myauto.php';
?>


<?php if(isset($_GET['name'])):?>
    <?php
        $user = $_GET['name']; 
        $getUserObj = new view;
        $getUserInfo = $getUserObj->viewUser($user);
        $getUserDet = $getUserInfo->fetchAll();

        $meconn = new controller();
        $getConn = $meconn->getConnect();
    ?>

    <?php if(isset($_SESSION['log']) && $_SESSION['log'] === $user):?>

            <?php include 'dash/private.php';?>

    <?php else:?>
            <?php include 'dash/public.php';?>

    <?php endif?>
        <script src="Chocolat-master/dist/js/chocolat.js"></script>
        </div>
    </body>
</html>

<?php else:?>
    <?php include 'error404.html'?>
<?php endif ?>


