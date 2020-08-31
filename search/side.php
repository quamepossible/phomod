                
<?php 
$need = $_GET['need'];
$search = $_GET['location'];

$searchObj = new view;
$getData = $searchObj->viewSearchItem($need, $search);
$rows = $getData->fetchAll();
?>

<?php if($getData->rowCount() > 0):?>
    <?php foreach($rows as $row):?>
        <?php
            $pic = $row['USERNAME'];
            $picObj = new view;
            $getPicMet = $picObj->getProfilePic($pic);
        ?>

        <?php if($getPicMet->rowCount() == 0):?>
                        <?php $src = 'profilepic/avatar.jpg';?>
                        
                <?php else:?>

                <?php while($picRow = $getPicMet->fetch()): ?>            
                    <?php $src = 'profilepic/'.$picRow['IMG_SRC']; ?>
                    
                <?php endwhile ?>
        <?php endif ?>


        <div class="span-1-of-3">
            <div class="dp-img" style="background:url(<?php echo $src;?>);background-position:center;background-size:cover;">

            </div>

            <div class="short-info">
                <p class="short-name"><?php echo $row['FULL_NAME'];?></p>
                <p class="prof"><?php echo $row['LANCER_TYPE'];?></p>
            </div>

            <div class="details row">
                <div class="span-1-of-2">
                    <p class="location"><ion-icon class="loc-ico" name="location-outline"></ion-icon><?php echo $row['CITY'];?></p>
                </div>

                <div class="span-1-of-2">
                    <a href="u.php?name=<?php echo $row['USERNAME'];?>" class="hire">Connect</a>
                </div>
            </div>

            <div class="rate">
                <p><span class="ratee">5.0</span>
                    <ion-icon class="star-ico" name="star"></ion-icon>
                    <ion-icon class="star-ico" name="star"></ion-icon>
                    <ion-icon class="star-ico" name="star"></ion-icon>
                    <ion-icon class="star-ico" name="star"></ion-icon>
                    <ion-icon class="star-ico" name="star"></ion-icon>&nbsp;&nbsp;
                    <?php echo $row['RATING'] . ' reviews';?>
                </p>
            </div>

            <div class="others">
                <p><ion-icon class="ver-ico" name="shield-checkmark"></ion-icon><span class="ver-span">verified</span></p>
            </div>                    
        </div>



    <?php endforeach?>


<?php else:?>
    <p>User not found</p>
<?php endif ?>