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
            <div class="my-slider">
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
                        <div class="each-pic dp" style="background:url(<?php echo $newSrc;?>);background-position:center;background-size:cover;"></div>
                        <div class="short-info">
                            <p class="short-name new-in"><?php echo $viewRes['FULL_NAME'];?></p>
                            <p class="prof"><?php echo $viewRes['LANCER_TYPE'];?></p>
                        </div>
                    </div>      
                <?php endforeach?>
            </div>
        </div>
    </section>
    <?php else:?>
        <p>Empty results</p>
    <?php endif?>
    






