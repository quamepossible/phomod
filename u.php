<?php 
    session_start();
    require_once 'myauto.php';
?>


<?php if(isset($_GET['name'])):?>
    <?php
        $user = $_GET['name']; 
        $getUserObj = new view;
        $getUserInfo = $getUserObj->viewUser($user);
        $getUserDet = $getUserInfo->fetchAll();

        $meconn = new controller();
        $getConn = $meconn->getConnect();

        $getStats = $meconn->checkStatus($sesDet);

    ?>
//i have this
    <?php if(isset($_SESSION['log']) &&  ($getStats !== 'freelancer')):?>
                <?php include 'dash/public.php';?>
   
    <?php else:?>
        <?php if(isset($_SESSION['log'])):?>
            <?php
            
                $sesDet = $_SESSION['log'];
                $valConv = $meconn->convert($sesDet);
            ?>
            <?php if($valConv === $user):?>
                <?php include 'dash/private.php';?>
            <?php else:?>
                <?php include 'error404.html'?>
            <?php endif?>

        <?php else:?>
                <?php include 'dash/public.php';?>

        <?php endif?>
    <?php endif?>
    
        <script src="Chocolat-master/dist/js/chocolat.js"></script>
        </div>
    </body>
</html>

<?php else:?>
    <?php include 'error404.html'?>
<?php endif ?>

