<?php
    include '../myauto.php';

    $city = $_GET['city'];
    $need = '';

    $getRes = new view;
    $getSea = $getRes->viewSearchItem($need, $city);
    $finRes = $getSea->fetchAll();
?>
    <?php if($getSea->rowCount() > 0):?>
    <section class="near-you">
        <div class="row hol-free">
        <?php foreach($finRes as $viewRes):?>
            <?php
                $name = $viewRes['FULL_NAME'];
                $lancer = $viewRes['LANCER_TYPE'];
                $img = $viewRes['USERNAME'];
                //GET PROFILE PIC
                $getPic = $getRes->getProfilePic($img);
            ?>

            <?php if($getPic->rowCount() == 0):?>
                <?php $newSrc = 'profilepic/avatar.jpg';?>
            <?php else:?>
                <?php while($newRow = $getPic->fetch()): ?>    
                    <?php if(empty($newRow['IMG_SRC'])):?>
                        <?php $newSrc = 'profilepic/avatar.jpg';?>

                    <?php else:?>
                        <?php $newSrc = 'profilepic/'.$newRow['IMG_SRC']; ?>
                    <?php endif?>
                <?php endwhile ?>
            <?php endif?>

            <div class="each span-1-of-loc">
                <div class="each-pic dp" style="background:url(<?php echo $newSrc;?>);background-position:center;background-size:cover;">

                </div>
                <div class="dets">

                </div>
            </div>      

        <?php endforeach?>
        </div>
    </section>
    <?php else:?>
        <p>Empty results</p>
    <?php endif?>
    






