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

        //GET LANCER'S TOTAL STAR
        $lanStar = $getUserObj->getStar($user);
    ?>

    <?php if(isset($_SESSION['log'])):?>
            <?php
                //CHECK IF PERSON'S USERNAME = ADDRESS USERNAME
                $sesDet = $_SESSION['log'];            
                $valConv = $meconn->convert($sesDet);
            ?>
            <?php if($valConv === $user):?>
                <?php include 'dash/private.php';?>
            <?php else:?>
                <?php include 'dash/public.php'?>
            <?php endif?>

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
